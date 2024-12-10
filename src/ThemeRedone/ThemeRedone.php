<?php

// src/ThemeRedone/ThemeRedone.php
declare(strict_types=1);

namespace ThemeRedone;

use ThemeRedone\Core\{
    Blocks,
    Config,
    CustomPostTypesRegistrar,
    Dequeues,
    Enqueues,
    ThemeSupport
};
use ThemeRedone\Plugins\{
    AcfSyncManager,
    CptuiSyncManager
};

final class ThemeRedone
{
    public function __construct(
        private readonly ThemeSupport $themeSupport,
        private readonly Enqueues $enqueues,
        private readonly Dequeues $dequeues,
        private readonly Blocks $blocks,
        private readonly ?CustomPostTypesRegistrar $customPostTypesRegistrar = null,
        private readonly ?AcfSyncManager $acfSyncManager = null,
        private readonly ?CptuiSyncManager $cptuiSyncManager = null,
    ) {
        // expose globally available theme redone functions
        require_once Config::getThemeDir() . '/src/ThemeRedone/Functions/global.php';
    }

    public function boot(): void
    {

        // Initialize core features
        $this->themeSupport->initialize();
        $this->enqueues->register();
        $this->dequeues->register();
        $this->blocks->initialize();

        // Delay ACF initialization
        add_action('plugins_loaded', function () {
            if ($this->hasAcf() && $this->acfSyncManager) {
                $this->acfSyncManager->initialize();
            }
        }, 20, 0);

        // Delay CPTUI sync
        add_action('init', function () {
            if ($this->hasCptUi() && $this->cptuiSyncManager) {
                $this->cptuiSyncManager->initialize();
            }
        }, 20, 0);

        // Register features after setup
        add_action('after_setup_theme', [$this, 'registerFeatures'], 20, 0);
    }

    private function hasAcf(): bool
    {
        return class_exists('acf');
    }

    // TODO: Check if this is correct
    private function hasCptUi(): bool
    {
        return function_exists('cptui_init');
    }

    public function registerFeatures(): void
    {
        $this->customPostTypesRegistrar?->register();
    }
}
