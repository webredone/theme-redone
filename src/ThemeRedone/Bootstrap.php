<?php

// src/ThemeRedone/bootstrap.php

declare(strict_types=1);

namespace ThemeRedone;

use Dotenv\Dotenv;

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

        // Build the container and fetch the main ThemeRedone class
        $container = ContainerConfig::build();
        $theme = $container->get(ThemeRedone::class);
        $theme->boot();

        // Setup global variables
        /** @var \Latte\Engine $tr_renderer */
        global $tr_renderer;
        $tr_renderer = $theme->getTemplateEngine()->getRenderer();

        global $tr_logger;
        $loggerService = $container->get(Core\LoggerService::class);
        $tr_logger = $loggerService->getLogger();
    }
}
