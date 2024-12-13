<?php

declare(strict_types=1);

namespace ThemeRedone;

use Dotenv\Dotenv;
use Spatie\Ignition\Ignition;
use ThemeRedone\Core\Config;
use ThemeRedone\Core\LoggerService;
use ThemeRedone\Core\Renderer\TemplateEngineFactory;
use ThemeRedone\Core\ThemeRedoneTwig;
use ThemeRedone\Enums\Flavor;
use Tracy\Debugger;

final class Bootstrap
{
    private static bool $initialized = false;

    public static function init(): void
    {
        if (self::$initialized) {
            return;
        }

        self::$initialized = true;

        // Load environment variables
        $dotenv = Dotenv::createImmutable(Config::getThemeDir());
        $dotenv->load();

        // Initialize Tracy only if TRACY_DEBUGGER is true, but we won't rely on it for error screens
        if (isset($_ENV['DEBUGGER']) && $_ENV['DEBUGGER'] === 'true') {
            // TODO: Only use dump and bdump from tracy
            Debugger::enable();
            // TODO: be more specific. Should run in prod

            // This makes dump(), bdump() and the Tracy debug bar available.
            // However, Tracy would normally also handle error screens.

            // Now Ignition is the active error handler, showing its error page on exceptions,
            // while Tracy is still enabled so you can use dump() and bdump().
            // The Tracy bar can still appear if in development mode.
            Ignition::make()
                ->setTheme('dark')
                ->shouldDisplayException(true) // TODO: be more specific. Should run in prod
                ->register();

        }

        $current_flavor = Config::getFlavor();

        // Create the template engine
        $engine = TemplateEngineFactory::createEngine($current_flavor);

        // Build the container and fetch the main ThemeRedone class
        $container = ContainerConfig::build();
        $theme = $container->get(ThemeRedone::class);
        $theme->boot();

        // Setup global vars
        global $tr_renderer;
        $tr_renderer = $engine;

        global $tr_logger;
        $loggerService = $container->get(LoggerService::class);
        $tr_logger = $loggerService->getLogger();

        // If Twig flavor is used and Timber is present, init ThemeRedoneTwig
        if (class_exists('Timber\Timber') && $current_flavor === Flavor::Twig) {
            new ThemeRedoneTwig();
        }

        // Test Ignition by throwing an exception
        // Remove this in production or once tested.
        // throw new \Exception('Testing Ignition error page!');
    }
}
