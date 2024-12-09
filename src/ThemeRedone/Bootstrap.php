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

        /** @var \Latte\Engine $latte */
        global $latte;
        $latte = $theme->getTemplateEngine()->getLatte();

        // Initialize the logger and make it globally available
        global $tr_logger;
        $loggerService = new LoggerService();
        $tr_logger = $loggerService->getLogger();
    }
}
