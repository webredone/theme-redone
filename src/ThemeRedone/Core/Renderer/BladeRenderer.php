<?php

namespace ThemeRedone\Core\Renderer;

use eftec\bladeone\BladeOne;
use Nette\Utils\ArrayHash;
use ThemeRedone\Core\Config;
use ThemeRedone\Enums\Flavor;
use ThemeRedone\Interfaces\TemplateRendererInterface;

class BladeRenderer implements TemplateRendererInterface
{
    private BladeOne $blade;

    public function __construct()
    {
        $viewsDir = Config::getThemeDir() . '/views';
        $cacheDir = Config::getCacheDirectoryForFlavor(Flavor::Blade);

        $this->blade = new BladeOne($viewsDir, $cacheDir, BladeOne::MODE_AUTO);
    }

    /**
     * @param ArrayHash<string,mixed> $data
     */
    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        // If $templateFile is an absolute path, we will read the file content and use runString().
        // Otherwise, we assume it's a dot-notation view name located in the /views directory and use run().

        if (file_exists($templateFile)) {
            // It's an absolute file path (e.g. block template)
            $templateContent = file_get_contents($templateFile);

            if ($templateContent === false) {
                // File could not be read
                return '';
            }

            // Render using runString:
            return $this->blade->runString($templateContent, (array)$data);
        } else {
            // It's a dot-notation template name (e.g. 'layout.header')
            return $this->blade->run($templateFile, (array)$data);
        }
    }
}
