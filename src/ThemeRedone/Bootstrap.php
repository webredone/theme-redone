<?php

// src/ThemeRedone/bootstrap.php

declare(strict_types=1);

namespace ThemeRedone;

use Dotenv\Dotenv;
use ThemeRedone\Core\{
    Blocks,
    Dequeues,
    Enqueues,
    LoggerService,
    TemplateEngine,
    ThemeSupport
};
use ThemeRedone\Features\AcfIntegration;

final class Bootstrap
{
    private static bool $initialized = false;

    public static function init(): void
    {
        if (self::$initialized) {
            return;
        }

        self::$initialized = true;

        // Define constants BEFORE we instantiate the theme
        define('TR_THEME_DIR', get_template_directory());
        define('TR_GUTENBERG_DIR', TR_THEME_DIR . '/gutenberg');
        define('TR_BLOCKS_DIR', TR_GUTENBERG_DIR . '/blocks');

        // Load environment variables
        $dotenv = Dotenv::createImmutable(TR_THEME_DIR);
        $dotenv->load();

        // Instantiate and boot the theme
        $theme = new Theme(
            new ThemeSupport(),
            new Enqueues(),
            new Dequeues(),
            new Blocks(),
            new TemplateEngine(),
            new AcfIntegration()
        );
        $theme->boot();

        // Make latte globally available
        global $latte;
        $latte = $theme->getTemplateEngine()->getLatte();

        // Initialize the logger and make it globally available
        global $tr_logger;
        $loggerService = new LoggerService();
        $tr_logger = $loggerService->getLogger();
    }
}
