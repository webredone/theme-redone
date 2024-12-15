<?php

namespace ThemeRedone\Enums;

enum Flavor: string
{
    case Latte = 'latte';
    case Blade = 'blade';
    case Twig = 'twig';
    case Php = 'php';

    public function getTemplateExtension(): string
    {
        return match ($this) {
            self::Latte => '.latte',
            self::Blade => '.blade.php',
            self::Twig => '.twig',
            self::Php => '.tpl'
        };
    }
}
