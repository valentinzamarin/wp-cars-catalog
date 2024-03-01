<?php

namespace CarsCatalog;

class Setup extends Singleton {

    public function init() {
        add_action( 'after_setup_theme', [ $this, 'cars_theme_setup' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'theme_enqueue_scripts' ] );
    }

    public function cars_theme_setup() {
        add_theme_support('post-thumbnails');
    }
    public function theme_enqueue_scripts() {
        $time = time();

        wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', [], $time);

        wp_enqueue_style( 'style', get_stylesheet_uri(), [], $time );

        wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/catalog.min.js', [], $time, true);
        wp_localize_script('theme-scripts', 'theme_ajax', array(
            'nonce' => wp_create_nonce('theme_ajax'),
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }
}
