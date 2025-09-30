<?php

namespace ThemeRedone\Enums;

enum Flavor: string
{
    case Latte = 'latte';
    case BladeOne = 'bladeone';
    case BladeLaravel = 'bladelaravel';
    case Twig = 'twig';
    case Php = 'php';

    public function getTemplateExtension(): string
    {
        return match ($this) {
            self::Latte => '.latte',
            self::BladeOne => '.blade.php',
            self::BladeLaravel => '.blade.php',
            self::Twig => '.twig',
            self::Php => '.tpl'
        };
    }
}
