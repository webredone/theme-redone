<?php

// src/ThemeRedone/Core/ThemeRedoneTwig.php

declare(strict_types=1);

namespace ThemeRedone\Core;

use Timber\Menu;
use Timber\Site as TimberSite;
use Timber\Timber;
use Twig\TwigFunction;
use Twig\TwigTest;
use WP_Query;

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

        // Expose Tracy's dump and bdump debugging fns to twig
        $twig->addFunction(new TwigFunction('dump', 'dump'));
        $twig->addFunction(new TwigFunction('bdump', 'bdump'));

        // TODO: Fix, problematic right now
        // Add function to access generic WordPress functions
        // $twig->addFunction(new TwigFunction('function', function ($function_name) {
        //     return call_user_func_array($function_name, array_slice(func_get_args(), 1));
        // }));

        // WP_Query wrapper
        $twig->addFunction(new TwigFunction('wp_query', function (array $args = []) {
            return new WP_Query($args);
        }));

        // Add custom tests for checking types
        $twig->addTest(new TwigTest('object', function ($value) {
            return is_object($value);
        }));

        $twig->addTest(new TwigTest('array', function ($value) {
            return is_array($value);
        }));

        // have_posts wrapper
        $twig->addFunction(new TwigFunction('have_posts', function ($query) {
            if (!($query instanceof WP_Query)) {
                return false;
            }

            return $query->have_posts();
        }));

        // the_post wrapper
        $twig->addFunction(new TwigFunction('the_post', function ($query) {
            if (!($query instanceof WP_Query)) {
                return null;
            }

            return $query->the_post();
        }));

        // Reset postdata wrapper
        $twig->addFunction(new TwigFunction('wp_reset_postdata', function () {
            wp_reset_postdata();
        }));

        return $twig;

    }
}
