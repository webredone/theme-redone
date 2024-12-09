<?php

// src/ThemeRedone/bootstrap.php

declare(strict_types=1);

namespace ThemeRedone;

use Dotenv\Dotenv;
use ThemeRedone\Core\{
    BlockTypesRegistrar,
    Blocks,
    CustomPostTypesRegistrar,
    Dequeues,
    Enqueues,
    LoggerService,
    TemplateEngine,
    ThemeSupport
};
use ThemeRedone\Plugins\{
    AcfSyncManager,
    CptuiSyncManager
};

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

        $blockTypesRegistrar = new BlockTypesRegistrar();
        $blocks = new Blocks($blockTypesRegistrar);

        // Instantiate and boot the theme
        $theme = new ThemeRedone(
            new ThemeSupport(),
            new Enqueues(),
            new Dequeues(),
            $blocks,
            new TemplateEngine(),
            new CustomPostTypesRegistrar(),
            new AcfSyncManager(),
            new CptuiSyncManager()
        );
        $theme->boot();

        // Make $tr_renderer globally available
        /** @var \Latte\Engine $tr_renderer */
        global $tr_renderer;
        $tr_renderer = $theme->getTemplateEngine()->getRenderer();

        // Initialize the logger and make it globally available
        global $tr_logger;
        $loggerService = new LoggerService();
        $tr_logger = $loggerService->getLogger();
    }
}
