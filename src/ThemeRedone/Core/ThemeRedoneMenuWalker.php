<?php

// src/ThemeRedone/Core/ThemeRedoneMenuWalker.php

//Cannot use strict types here, until we figure out how to use properly

namespace ThemeRedone\Core;

final class ThemeRedoneMenuWalker extends \Walker_Nav_Menu
{
    public function register(): void
    {
        // Registration logic if needed
    }

    /**
     * Starts the list before the elements are added.
     * Matches original signature: ( &$output, $depth=0, $args=array() )
     */
    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"collapsible__content\"><div class=\"collapsible__content__inner\">\n";
    }

    /**
     * Ends the list after the elements are added.
     * Matches original signature: ( &$output, $depth=0, $args=array() )
     */
    public function end_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div></div>\n";
    }

    /**
     * Start the element output.
     * Matches original signature: (&$output, $item, $depth=0, $args=array(), $id=0)
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names .= ' nav-item';

        if (in_array('menu-item-has-children', $classes)) {
            $class_names .= ' collapsible';
        }
        if (in_array('current-menu-item', $classes)) {
            $class_names .= ' active';
        }

        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        if ($depth === 0) {
            $output .= $indent . '<li' . $id . $class_names;
            if (in_array('menu-item-has-children', $classes)) {
                $output .= 'data-hover-trigger';
            }
            $output .= ' >';
        }

        $atts = [];
        $atts['title'] = ! empty($item->attr_title) ? $item->attr_title : '';

        $atts['target'] = '';
        $atts['rel'] = ! empty($item->xfn) ? $item->xfn : '';
        if (!empty($item->target)) {
            if ($item->target === "_blank") {
                $atts['target'] = $item->target;
                $atts['rel'] = "noopener";
            } else {
                $atts['target'] = $item->target;
            }
        }

        $atts['href'] = ! empty($item->url) ? $item->url : '';

        if ($depth === 0) {
            $atts['class'] = 'nav-link';
        }
        if ($depth > 0) {
            $manual_class = array_values($classes)[0] . ' ' . 'nav-link';
            $atts['class'] = $manual_class;
        }
        if (in_array('current-menu-item', $item->classes)) {
            $atts['class'] .= ' active';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        if ($depth > 0) {
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
        } else {
            if (in_array('menu-item-has-children', $classes)) {
                $item_output .= '<button class="collapsible__trigger" aria-label="Toggle Dropdown">';
            }
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            if (in_array('menu-item-has-children', $classes)) {
                $item_output .= '<span class="chevron"></span>';
                $item_output .= '</button>';
            }
            $item_output .= $args->after;
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output, if needed.
     * Matches original signature: (&$output, $item, $depth=0, $args=array())
     */
    public function end_el(&$output, $item, $depth = 0, $args = [])
    {
        if ($depth === 0) {
            $output .= "</li>\n";
        }
    }
}

// wp_nav_menu([
//     'theme_location' => 'menu-1',
//     'walker' => new \ThemeRedone\Core\ThemeRedoneMenuWalker()
// ]);
