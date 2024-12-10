<?php

namespace ThemeRedone\Core\Renderer;

use League\Plates\Engine;
use Nette\Utils\ArrayHash;
use ThemeRedone\Core\Config;
use ThemeRedone\Interfaces\TemplateRendererInterface;

class PlatesRenderer implements TemplateRendererInterface
{
    private Engine $plates;

    public function __construct()
    {
        // Set the base directory for templates to the theme directory.
        // You can adjust this if you want a different structure.
        $themeDir = Config::getThemeDir();
        $this->plates = new Engine($themeDir);
        $this->plates->setFileExtension('php');
    }

    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        // Convert the absolute template path to a relative path
        // relative to the $themeDir we defined above.

        $themeDir = Config::getThemeDir();
        $relativePath = str_replace($themeDir . '/', '', $templateFile);

        // Remove the ".php" extension because we already setFileExtension('php')
        $relativePath = preg_replace('/\.php$/', '', $relativePath);

        // Plates automatically looks for templates in the base directory.
        // The template name should not include the extension now.
        // For example, if $templateFile was /path/to/theme/gutenberg/blocks/hero/view.php,
        // $relativePath might be "gutenberg/blocks/hero/view" after stripping themeDir and extension.

        return $this->plates->render($relativePath, (array) $data);

    }
}
