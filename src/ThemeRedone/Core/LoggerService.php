<?php

// src/ThemeRedone/Core/LoggerService.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

final class LoggerService
{
    private Logger $logger;

    public function __construct()
    {
        $this->initialize();
        $this->registerErrorHandlers();
    }

    private function initialize(): void
    {
        $log_path = WP_CONTENT_DIR . '/theme_redone_logs/theme.log';

        // Ensure directory exists
        if (!file_exists(dirname($log_path))) {
            mkdir(dirname($log_path), 0775, true);
        }

        $this->logger = new Logger('themeredone');
        $this->logger->pushHandler(new StreamHandler($log_path, Logger::DEBUG));
    }

    public function getLogger(): Logger
    {
        return $this->logger;
    }

    private function registerErrorHandlers(): void
    {
        // Capture a reference to the logger
        $logger = $this->logger;

        // Custom error handler
        set_error_handler(static function ($errno, $errstr, $errfile, $errline) use ($logger) {
            // Log to original PHP error log
            error_log("PHP Error: [$errno] $errstr in $errfile on line $errline");

            // Also log to Monolog
            $logger->error("PHP Error: [$errno] $errstr in $errfile on line $errline");

            // Returning false allows default PHP error handling to proceed as well
            return false;
        });

        // Custom exception handler
        set_exception_handler(static function ($exception) use ($logger) {
            $message = "Uncaught exception: " . $exception->getMessage() .
                " in " . $exception->getFile() .
                " on line " . $exception->getLine();

            // Log to original error log
            error_log($message);

            // Also log to Monolog
            $logger->critical($message, ['exception' => $exception]);
        });
    }
}
