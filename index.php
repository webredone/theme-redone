<?php

use ThemeRedone\Core\TemplateResolver;

$resolver = new TemplateResolver();
$template = $resolver->resolveTemplate();

if ($template !== null) {
    include_once $template;
} else {
    // fallback to WordPress default
    include_once ABSPATH . WPINC . '/template-loader.php';
}
