<?php

// src/ThemeRedone/Core/Renderer/TimberRenderer.php

namespace ThemeRedone\Core\Renderer;

use Nette\Utils\ArrayHash;
use ThemeRedone\Core\Config;
use ThemeRedone\Enums\Flavor;
use ThemeRedone\Interfaces\TemplateRendererInterface;
use Timber\Loader;
use Timber\Timber;

class TimberRenderer implements TemplateRendererInterface
{
    public function __construct()
    {
        // Set the directory for Twig templates
        Timber::$dirname = ['views'];

        // Enable Twig file-based caching
        add_filter('timber/twig/environment/options', function ($options) {
            $options['cache'] = Config::getCacheDirectoryForFlavor(Flavor::Twig); // Enable file cache
            $options['auto_reload'] = true; // Always reload templates in development

            return $options;
        });
    }

    /**
     * @param ArrayHash<string,mixed> $data
     */
    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        $themeDir = Config::getThemeDir();
        $viewsDir = $themeDir . '/views/';

        // Prepare the Timber context
        $timberContext = Timber::context();

        // Merge additional data into the context
        $data = array_merge($timberContext, (array)$data);

        // Check if the template is an absolute path
        if (file_exists($templateFile)) {
            // Convert absolute path to relative (relative to viewsDir)
            $relativePath = str_replace($viewsDir, '', $templateFile);

            // Ensure .twig extension
            if (!str_ends_with($relativePath, '.twig')) {
                $relativePath .= '.twig';
            }

            // Render and cache the compiled Twig file
            return Timber::compile($relativePath, $data);
        } else {
            // Assume $templateFile is something like "layout.header" or "layout/header"
            // Convert dot notation to slash and append .twig
            $templatePath = str_replace('.', '/', $templateFile);

            if (!str_ends_with($templatePath, '.twig')) {
                $templatePath .= '.twig';
            }

            // Render and cache the compiled Twig file
            return Timber::compile($templatePath, $data);
        }
    }
}
