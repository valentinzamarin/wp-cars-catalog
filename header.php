<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <?php session_start(); ?>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <?php wp_head(); ?>
    </head>
<body <?php body_class([]); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="<?php echo home_url(); ?>" class="navbar-brand d-flex align-items-center">
                <strong><?php echo get_bloginfo('name'); ?></strong>
            </a>
        </div>
    </div>
</header>
