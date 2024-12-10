<?php

declare(strict_types=1);

namespace ThemeRedone\Core;

final class TemplateResolver
{
    /**
     * @var array<string,string>
     */
    private array $templateMap = [
        'is_front_page' => 'front-page.php',
        'is_home' => 'home.php',
        'is_single' => 'single.php',
        'is_page' => 'page.php',
        'is_category' => 'category.php',
        'is_tag' => 'tag.php',
        'is_author' => 'author.php',
        'is_archive' => 'archive.php',
        'is_search' => 'search.php',
        'is_404' => '404.php',
    ];

    /**
     * Resolves the correct template based on WordPress conditions.
     *
     * @return string|null The path to the template or null if none found.
     */
    public function resolveTemplate(): ?string
    {
        $themeDir = Config::getThemeDir();
        $templatesDir = $themeDir . '/templates';

        foreach ($this->templateMap as $condition => $templateFile) {
            if (function_exists($condition) && $condition() && file_exists($templatesDir . '/' . $templateFile)) {
                return $templatesDir . '/' . $templateFile;
            }
        }

        // Default template if none matched
        if (file_exists($templatesDir . '/index.php')) {
            return $templatesDir . '/index.php';
        }

        // If no template found in theme templates, return null.
        return null;
    }
}
