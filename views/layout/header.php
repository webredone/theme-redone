<!doctype html>
<html <?php echo language_attributes(); ?>>

<head>
    <meta charset="<?php echo bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <?php wp_head(); ?>

    <style id="critical-css" type="text/css">
        <?php echo file_get_contents(get_template_directory() . '/dist/global/critical.css'); ?>
    </style>

    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/global/style.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/global/style.css">

    <script type="text/javascript">
        var tr_theme_url = "<?php echo get_bloginfo('template_url'); ?>";
        var tr_site_url = "<?php echo esc_url(home_url('/')); ?>";
    </script>
</head>

<body <?php echo body_class(); ?>>
    <?php $this->insert(tr_view_path('layout/main-menu')); ?>
    <main class="main-content">
