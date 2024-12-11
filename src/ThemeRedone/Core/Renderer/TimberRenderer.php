<?php

// src/ThemeRedone/Core/Renderer/TimberRenderer.php

namespace ThemeRedone\Core\Renderer;

use Nette\Utils\ArrayHash;
use ThemeRedone\Core\Config;
use ThemeRedone\Enums\Flavor;
use ThemeRedone\Interfaces\TemplateRendererInterface;
use Timber\Timber;

class TimberRenderer implements TemplateRendererInterface
{
    public function __construct()
    {
        // We assume templates live in /views directory
        Timber::$dirname = ['views'];
    }

    /**
     * @param ArrayHash<string,mixed> $data
     */
    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        $themeDir = Config::getThemeDir();
        $viewsDir = $themeDir . '/views/';

        // If it's an absolute path (like a block template), make it relative
        if (file_exists($templateFile)) {
            // Convert absolute path to relative (relative to viewsDir)
            $relativePath = str_replace($viewsDir, '', $templateFile);

            // Ensure .twig extension
            if (!str_ends_with($relativePath, '.twig')) {
                $relativePath .= '.twig';
            }

            $data = Timber::context();

            return Timber::compile($relativePath, (array)$data);
        } else {
            // Assume $templateFile is something like "layout.header" or "layout/header"
            // Convert dot notation to slash and append .twig
            $templatePath = str_replace('.', '/', $templateFile);

            if (!str_ends_with($templatePath, '.twig')) {
                $templatePath .= '.twig';
            }

            return Timber::compile($templatePath, (array)$data);
        }
    }
}
