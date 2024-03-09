<?php

namespace CarsCatalog\classes;

use CarsCatalog\abstracts\Singleton;
class Taxonomy extends Singleton {
    public function init() {
        add_action( 'init', [ $this, 'register_car_brand_taxonomy' ] );
        add_action( 'init', [ $this, 'register_car_type_taxonomy' ] );
        add_action( 'init', [ $this, 'register_car_color_taxonomy' ] );
        add_action( 'init', [ $this, 'register_car_year_taxonomy' ] );
    }

    public function register_car_brand_taxonomy() {
        $labels = array(
            'name'              => _x( 'Марки', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Марка', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Поиск марок', 'textdomain' ),
            'all_items'         => __( 'Все марки', 'textdomain' ),
            'edit_item'         => __( 'Редактировать марку', 'textdomain' ),
            'update_item'       => __( 'Обновить марку', 'textdomain' ),
            'add_new_item'      => __( 'Добавить новую марку', 'textdomain' ),
            'new_item_name'     => __( 'Новая марка', 'textdomain' ),
            'menu_name'         => __( 'Марка', 'textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
        );

        register_taxonomy( 'car_brand', [ 'cars' ], $args );
    }

    public function register_car_type_taxonomy() {
        $labels = array(
            'name'              => _x( 'Типы авто', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Тип авто', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Поиск типов авто', 'textdomain' ),
            'all_items'         => __( 'Все типы авто', 'textdomain' ),
            'edit_item'         => __( 'Редактировать тип авто', 'textdomain' ),
            'update_item'       => __( 'Обновить тип авто', 'textdomain' ),
            'add_new_item'      => __( 'Добавить новый тип авто', 'textdomain' ),
            'new_item_name'     => __( 'Новый тип авто', 'textdomain' ),
            'menu_name'         => __( 'Тип авто', 'textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
        );

        register_taxonomy( 'car_type', [ 'cars' ], $args );
    }

    public function register_car_color_taxonomy() {
        $labels = array(
            'name'              => _x( 'Цвета', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Цвет', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Поиск цветов', 'textdomain' ),
            'all_items'         => __( 'Все цвета', 'textdomain' ),
            'edit_item'         => __( 'Редактировать цвет', 'textdomain' ),
            'update_item'       => __( 'Обновить цвет', 'textdomain' ),
            'add_new_item'      => __( 'Добавить новый цвет', 'textdomain' ),
            'new_item_name'     => __( 'Новый цвет', 'textdomain' ),
            'menu_name'         => __( 'Цвет', 'textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
        );

        register_taxonomy( 'car_color', [ 'cars' ], $args );
    }

    public function register_car_year_taxonomy()
    {
        $labels = array(
            'name' => _x('Годы выпуска', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('Год выпуска', 'taxonomy singular name', 'textdomain'),
            'search_items' => __('Поиск годов выпуска', 'textdomain'),
            'all_items' => __('Все годы выпуска', 'textdomain'),
            'edit_item' => __('Редактировать год выпуска', 'textdomain'),
            'update_item' => __('Обновить год выпуска', 'textdomain'),
            'add_new_item' => __('Добавить новый год выпуска', 'textdomain'),
            'new_item_name' => __('Новый год выпуска', 'textdomain'),
            'menu_name' => __('Год выпуска', 'textdomain'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => false,
        );

        register_taxonomy('car_year', [ 'cars' ], $args);
    }
}