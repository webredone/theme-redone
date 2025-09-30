<?php

namespace ThemeRedone\Core\Renderer;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Container\Container as LaravelContainer;
use Illuminate\Events\Dispatcher;
use Nette\Utils\ArrayHash;
use ThemeRedone\Core\Config;
use ThemeRedone\Enums\Flavor;
use ThemeRedone\Interfaces\TemplateRendererInterface;

class LaravelBladeRenderer implements TemplateRendererInterface
{
    private Factory $viewFactory;
    private BladeCompiler $bladeCompiler;
    private Filesystem $filesystem;
    private LaravelContainer $laravelContainer;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
        $this->laravelContainer = new LaravelContainer();

        // Setup view paths
        $viewsDir = Config::getThemeDir() . '/views';
        $cacheDir = Config::getCacheDirectoryForFlavor(Flavor::BladeLaravel);

        $this->setupBladeEnvironment($viewsDir, $cacheDir);
    }

    private function setupBladeEnvironment(string $viewsDir, string $cacheDir): void
    {
        // First, bind the container to itself (Laravel expects this)
        $this->laravelContainer->singleton(\Illuminate\Container\Container::class, function () {
            return $this->laravelContainer;
        });

        $this->laravelContainer->singleton(\Illuminate\Contracts\Container\Container::class, function () {
            return $this->laravelContainer;
        });

        // Set this container as the global instance so Blade internals can resolve via Container::getInstance()
        \Illuminate\Container\Container::setInstance($this->laravelContainer);

        // Create Blade compiler
        $this->bladeCompiler = new BladeCompiler($this->filesystem, $cacheDir);

        // Register Blade compiler in container
        $this->laravelContainer->singleton(\Illuminate\View\Compilers\BladeCompiler::class, function () {
            return $this->bladeCompiler;
        });

        // Create engine resolver
        $resolver = new EngineResolver();
        $resolver->register('blade', function () {
            return new CompilerEngine($this->bladeCompiler);
        });
        $resolver->register('php', function () {
            return new PhpEngine($this->filesystem);
        });

        // Create view finder
        $finder = new FileViewFinder($this->filesystem, [$viewsDir]);

        // Create dispatcher
        $dispatcher = new Dispatcher($this->laravelContainer);

        // Create view factory
        $this->viewFactory = new Factory($resolver, $finder, $dispatcher);
        $this->viewFactory->setContainer($this->laravelContainer);

        // Share $__env for compiled views expecting it
        $this->viewFactory->share('__env', $this->viewFactory);

        // Register view factory in container
        $this->laravelContainer->singleton(\Illuminate\Contracts\View\Factory::class, function () {
            return $this->viewFactory;
        });

        // Also bind the 'view' alias expected by Blade internals
        $this->laravelContainer->instance('view', $this->viewFactory);

        // Bind the common 'app' alias to the container
        $this->laravelContainer->instance('app', $this->laravelContainer);

        // Create a mock Application to satisfy Blade's component resolution
        $mockApp = new class($this->laravelContainer) {
            private $container;
            public function __construct($container) { $this->container = $container; }
            public function getNamespace() { return 'App\\'; }
            public function make($abstract, $parameters = []) { return $this->container->make($abstract, $parameters); }
        };

        // Bind the Application contract
        $this->laravelContainer->singleton(\Illuminate\Contracts\Foundation\Application::class, function () use ($mockApp) {
            return $mockApp;
        });

        // Register anonymous component paths and namespaces so <x-*> resolves as views/components/*
        $this->bladeCompiler->anonymousComponentPath($viewsDir . '/components');
        $this->bladeCompiler->anonymousComponentNamespace($viewsDir . '/components', 'components');

        // Also register the components directory as a view namespace
        $this->viewFactory->addNamespace('components', $viewsDir . '/components');

        // Register the tr_view_path function as a global helper for Blade templates
        $this->bladeCompiler->directive('tr_view_path', function ($expression) {
            return "<?php echo tr_view_path($expression); ?>";
        });

        // Register custom directives
        $this->registerCustomDirectives();
    }

    private function registerCustomDirectives(): void
    {
        $this->bladeCompiler->directive('wp_head', function () {
            return '<?php wp_head(); ?>';
        });

        $this->bladeCompiler->directive('wp_footer', function () {
            return '<?php wp_footer(); ?>';
        });

        $this->bladeCompiler->directive('tr_component', function ($expression) {
            return "<?php echo tr_component($expression); ?>";
        });
    }

    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        try {
            // Check if it's a dot-notation template name (like 'templates.front-page')
            if (!file_exists($templateFile) && !str_contains($templateFile, '/')) {
                // Convert dot notation to file path
                $templatePath = $this->resolveDotNotation($templateFile);

                if ($templatePath && file_exists($templatePath)) {
                    // Use the resolved file path - this is the preferred method
                    return $this->renderFile($templatePath, $data);
                } else {
                    // If dot notation resolution fails, throw an error instead of using view factory
                    throw new \RuntimeException("Template not found: {$templateFile}");
                }
            } elseif (file_exists($templateFile)) {
                // Absolute file path
                return $this->renderFile($templateFile, $data);
            } else {
                // For absolute paths that don't exist, try view factory as fallback
                return $this->renderWithViewFactory($templateFile, $data);
            }
        } catch (\Exception $e) {
            // Log error or handle gracefully
            error_log("Blade rendering error: " . $e->getMessage());
            return "Template rendering error: " . $e->getMessage();
        }
    }

    private function renderWithViewFactory(string $templateName, ArrayHash $data): string
    {
        try {
            // Set a timeout to prevent hanging
            set_time_limit(3);
            return $this->viewFactory->make($templateName, (array)$data)->render();
        } catch (\Exception $e) {
            error_log("View factory rendering error: " . $e->getMessage());
            throw $e;
        }
    }

    private function resolveDotNotation(string $templateName): ?string
    {
        $viewsDir = Config::getThemeDir() . '/views';
        $filePath = $viewsDir . '/' . str_replace('.', '/', $templateName) . '.blade.php';

        return file_exists($filePath) ? $filePath : null;
    }

    private function renderFile(string $filePath, ArrayHash $data): string
    {
        try {
            // Render via the View Factory so $__env is available for sections/includes/components
            $view = $this->viewFactory->file($filePath, (array)$data);

            // Share additional data that might be needed by the template
            $view->with((array)$data);

            return $view->render();
        } catch (\Exception $e) {
            error_log("LaravelBladeRenderer::renderFile error: " . $e->getMessage());
            throw $e;
        }
    }
}