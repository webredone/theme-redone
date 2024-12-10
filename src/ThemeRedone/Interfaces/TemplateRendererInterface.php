<?php

declare(strict_types=1);

namespace ThemeRedone\Interfaces;

use Nette\Utils\ArrayHash;

interface TemplateRendererInterface
{
    /**
     * Renders a template file with given data and returns it as a string.
     *
     * @param string $templateFile Full path to the template file.
     * @param ArrayHash<string, mixed> $data Data to be passed to the template.
     *
     * @return string Rendered template as a string.
     */
    public function renderToString(string $templateFile, ArrayHash $data): string;
}
