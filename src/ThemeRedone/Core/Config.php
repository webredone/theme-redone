<?php

// src/ThemeRedone/Core/Config.php

namespace ThemeRedone\Core;

use ThemeRedone\Enums\Flavor;

final class Config
{
    private static string $themeDir = '';
    private static ?string $blockNamePrefix = null;
    private static ?Flavor $flavor = null;

    public static function getThemeDir(): string
    {
        if (empty(self::$themeDir)) {
            $themeDir = get_template_directory();
            // Assert to help PHPStan know it's a string.
            assert(is_string($themeDir));
            self::$themeDir = $themeDir;
        }

        return self::$themeDir;
    }

    public static function getGutenbergDir(): string
    {
        return self::getThemeDir() . '/gutenberg';
    }

    public static function getBlocksDir(): string
    {
        return self::getGutenbergDir() . '/blocks';
    }

    public static function getBlockNamePrefix(): string
    {
        $filePath = self::getThemeDir() . "/theme_redone_global_config.json";
        $configContent = (string) file_get_contents($filePath);
        $config = json_decode($configContent, false);

        self::$blockNamePrefix = $config->BLOCK_NAME_PREFIX ?? 'tr';

        return self::$blockNamePrefix;
    }

    // TODO: Maybe totally get rid of this theme redone json file and do all the config inside the Config class
    public static function getFlavor(): Flavor
    {
        if (self::$flavor === null) {
            $filePath = self::getThemeDir() . "/theme_redone_global_config.json";
            $configContent = (string) file_get_contents($filePath);
            $config = json_decode($configContent, false);

            $flavorName = $config->FLAVOR ?? 'latte';
            self::$flavor = Flavor::from($flavorName);
        }

        return self::$flavor;
    }

    public static function getCacheDirectoryForFlavor(Flavor $flavor): string
    {
        $dir = self::getThemeDir() . '/views/cache/' . $flavor->value;
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        return $dir;
    }
}
