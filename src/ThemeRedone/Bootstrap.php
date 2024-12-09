<?php

// src/ThemeRedone/bootstrap.php

declare(strict_types=1);

namespace ThemeRedone;

use Dotenv\Dotenv;
use ThemeRedone\Core\{
    Blocks,
    BlocksRegister,
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

        $blocksRegister = new BlocksRegister();
        $blocks = new Blocks($blocksRegister);

        // Instantiate and boot the theme
        $theme = new Theme(
            new ThemeSupport(),
            new Enqueues(),
            new Dequeues(),
            $blocks,
            new TemplateEngine(),
            new AcfIntegration()
        );
        $theme->boot();

        // Make latte globally available

        /** @var \Latte\Engine $tr_renderer */
        global $tr_renderer;
        $tr_renderer = $theme->getTemplateEngine()->getRenderer();

        // Initialize the logger and make it globally available
        global $tr_logger;
        $loggerService = new LoggerService();
        $tr_logger = $loggerService->getLogger();
    }
}
