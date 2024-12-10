<?php

namespace ThemeRedone\Core\Renderer;

use Latte\Engine;
use Nette\Utils\ArrayHash;
use ThemeRedone\Core\Config;
use ThemeRedone\Enums\Flavor;
use ThemeRedone\Interfaces\TemplateRendererInterface;

class LatteRenderer implements TemplateRendererInterface
{
    private Engine $latte;

    public function __construct()
    {
        $this->latte = new Engine();
        $cacheDir = Config::getCacheDirectoryForFlavor(Flavor::Latte);
        $this->latte->setTempDirectory($cacheDir);
    }

    public function renderToString(string $templateFile, ArrayHash $data): string
    {
        return $this->latte->renderToString($templateFile, $data);
    }
}
