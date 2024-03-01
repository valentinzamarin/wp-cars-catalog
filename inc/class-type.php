<?php

namespace CarsCatalog;

class Type extends Singleton {

    public function init() {
        add_action('init', [ $this, 'register_car_post_type' ] );
    }

    public function register_car_post_type() {
        $args = [
            'labels' => [
                'name' => 'Cars',
                'singular_name' => 'Car'
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => [
                'slug' => 'cars'
            ],
            'supports' => [
                'title',
                'thumbnail',
            ],
        ];
        register_post_type('cars', $args);
    }

}