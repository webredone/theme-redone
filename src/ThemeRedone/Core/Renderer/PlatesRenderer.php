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
        $themeDir = Config::getThemeDir();
        $this->plates = new Engine($themeDir);

        // Define folders with namespaces
        $this->plates->addFolder('layout', $themeDir . '/views/layout');
        $this->plates->addFolder('templates', $themeDir . '/views/templates');
        $this->plates->addFolder('components', $themeDir . '/views/components');
        $this->plates->setFileExtension('tpl');
    }

    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        // Convert the absolute template path to a relative path
        $themeDir = Config::getThemeDir();
        $relativePath = str_replace($themeDir . '/', '', $templateFile);

        // Remove the ".tpl" extension
        $relativePath = preg_replace('/\.tpl$/', '', $relativePath);

        // Convert 'views/templates/front-page' to 'templates::front-page'
        if (strpos($relativePath, 'views/') === 0) {
            $relativePath = substr($relativePath, strlen('views/')); // Remove 'views/'
        }

        // Split the path to extract namespace and template name
        $parts = explode('/', $relativePath);
        if (count($parts) >= 2) {
            $namespace = array_shift($parts);
            $templateName = implode('/', $parts);
            $relativePath = "$namespace::$templateName";
        } else {
            // Handle cases where the template is directly under 'views/'
            $relativePath = $parts[0];
        }

        // Debugging: Uncomment the following line to verify the relativePath
        error_log("Rendering template: $relativePath");

        // Check if the template exists before rendering
        if (!$this->plates->exists($relativePath)) {
            error_log("Plates Error: Template '$relativePath' does not exist.");

            return ''; // Return empty string or a default message
        }

        $output = $this->plates->render($relativePath, (array) $data);
        error_log("Rendered template: $relativePath");

        return $output;

    }
}
