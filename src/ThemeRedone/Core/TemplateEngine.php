<?php

// src/ThemeRedone/Core/TemplateEngine.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use Latte\Engine;

final readonly class TemplateEngine
{
    private Engine $latte;

    public function initialize(): void
    {
        $this->latte = new Engine();
        $this->latte->setTempDirectory(get_template_directory() . '/views/temp');

        if (isset($_ENV['TRACY_DEBUGGER']) && $_ENV['TRACY_DEBUGGER'] === 'true') {
            \Tracy\Debugger::enable();
        }
    }

    public function getLatte(): Engine
    {
        return $this->latte;
    }
}
