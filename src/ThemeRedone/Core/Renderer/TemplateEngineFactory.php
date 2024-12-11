<?php

// src/ThemeRedone/Core/Renderer/TemplateEngineFactory.php

namespace ThemeRedone\Core\Renderer;

use ThemeRedone\Enums\Flavor;
use ThemeRedone\Interfaces\TemplateRendererInterface;

final class TemplateEngineFactory
{
    public static function createEngine(Flavor $flavor): TemplateRendererInterface
    {
        return match ($flavor) {
            Flavor::Latte => new LatteRenderer(),
            Flavor::Blade => new BladeRenderer(),
            Flavor::Php => new PlatesRenderer(),
            Flavor::Twig => new TimberRenderer(),
        };
    }
}
