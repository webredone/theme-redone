<?php

namespace ThemeRedone\Enums;

enum Flavor: string
{
    case Latte = 'latte';
    case Blade = 'blade';
    case Php = 'php';

    public function getTemplateExtension(): string
    {
        return match ($this) {
            self::Latte => '.latte',
            self::Blade => '.blade.php',
            self::Php => '.php',
        };
    }
}
