<?php

// src/ThemeRedone/bootstrap.php

declare(strict_types=1);

namespace ThemeRedone;

use Dotenv\Dotenv;
use ThemeRedone\Core\Config;
use ThemeRedone\Core\LoggerService;
use ThemeRedone\Core\Renderer\TemplateEngineFactory;
use Tracy\Debugger;

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

        $dotenv = Dotenv::createImmutable(Config::getThemeDir());

        $dotenv->load();

        if (isset($_ENV['TRACY_DEBUGGER']) && $_ENV['TRACY_DEBUGGER'] === 'true') {
            Debugger::enable();
        }

        // Create the template engine based on the configured flavor
        $engine = TemplateEngineFactory::createEngine(Config::getFlavor());

        // Build the container and fetch the main ThemeRedone class
        $container = ContainerConfig::build();
        $theme = $container->get(ThemeRedone::class);
        $theme->boot();

        // Setup global variables
        /** @var \Latte\Engine $tr_renderer */
        global $tr_renderer;
        $tr_renderer = $engine;

        global $tr_logger;
        $loggerService = $container->get(LoggerService::class);
        $tr_logger = $loggerService->getLogger();
    }
}
