<?php

// src/ThemeRedone/Theme.php

declare(strict_types=1);

namespace ThemeRedone;

use ThemeRedone\Core\{
    Blocks,
    Dequeues,
    Enqueues,
    TemplateEngine,
    ThemeSupport
};
use ThemeRedone\Features\{
    AcfIntegration,
    CustomPostTypes,
    ThemeRedoneWalker
};

final class Theme
{
    public function __construct(
        private readonly ThemeSupport $themeSupport,
        private readonly Enqueues $enqueues,
        private readonly Dequeues $dequeues,
        private readonly Blocks $blocks,
        private readonly TemplateEngine $templateEngine,
        private readonly ?AcfIntegration $acfIntegration = null,
    ) {
        require_once TR_THEME_DIR . '/src/ThemeRedone/Functions/global.php';
    }

    public function boot(): void
    {
        // Initialize core features
        $this->themeSupport->initialize();
        $this->enqueues->register();
        $this->dequeues->register();
        $this->blocks->initialize();
        $this->templateEngine->initialize();

        // Delay ACF initialization
        add_action('plugins_loaded', function () {
            if ($this->hasAcf() && $this->acfIntegration) {
                $this->acfIntegration->initialize();
            }
        }, 20);

        // Register features after setup
        add_action('after_setup_theme', [$this, 'registerFeatures']);
    }

    private function hasAcf(): bool
    {
        return class_exists('acf');
    }

    public function registerFeatures(): void
    {
        (new CustomPostTypes())->register();
        (new ThemeRedoneWalker())->register();
    }

    public function getTemplateEngine(): TemplateEngine
    {
        return $this->templateEngine;
    }
}
