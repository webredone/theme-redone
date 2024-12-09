<?php

// src/ThemeRedone/Core/TemplateEngine.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use Latte\Engine;
use Tracy\Debugger;

final readonly class TemplateEngine
{
    private Engine $latte;

    public function __construct()
    {
        // Assign the readonly property here
        $this->latte = new Engine();
    }

    public function initialize(): void
    {
        $this->latte->setTempDirectory(get_template_directory() . '/views/cache');

        if (isset($_ENV['TRACY_DEBUGGER']) && $_ENV['TRACY_DEBUGGER'] === 'true') {
            Debugger::enable();
        }
    }

    public function getRenderer(): Engine
    {
        return $this->latte;
    }
}
