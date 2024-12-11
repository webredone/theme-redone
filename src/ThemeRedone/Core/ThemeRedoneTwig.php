<?php

// src/ThemeRedone/Core/ThemeRedoneTwig.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use Timber\Menu;
use Timber\Site as TimberSite;
use Timber\Timber;
use Twig\TwigFunction;

class ThemeRedoneTwig extends TimberSite
{
    public function __construct()
    {
        // Register filters for adding context and twig functions
        add_filter('timber_context', [$this, 'addToContext'], 10, 1);
        add_filter('get_twig', [$this, 'addToTwig'], 10, 1);

        parent::__construct();
    }

    public function addToContext($context)
    {
        $context['primary_menu'] = Timber::get_menu('menu-1', ['depth' => 2]);

        // Add the custom walker for the primary menu, because we can't use classes in twig
        // used for the main menu
        $context['tr_nav_walker'] = new ThemeRedoneMenuWalker();

        $context['site'] = 'nikola';

        return $context;

    }

    public function addToTwig(\Twig\Environment $twig)
    {
        // Add custom Twig functions/filters if needed

        $twig->addFunction(new TwigFunction('bdump', 'bdump'));

        return $twig;
    }
}
