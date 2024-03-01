<?php

use CarsCatalog\Setup;
use CarsCatalog\Type;
use CarsCatalog\Taxonomy;
use CarsCatalog\Shortcode;
use CarsCatalog\Ajax;
use CarsCatalog\Query;

if ( ! function_exists( 'cars_catalog_autoload' ) ) {

    function cars_catalog_autoload( string $classname ) {
        $prefix = 'CarsCatalog\\';

        if ( substr( $classname, 0, strlen( $prefix ) ) !== $prefix ) {
            return;
        }

        $classname = substr( $classname, strlen( $prefix ) );
        $classname = strtolower( str_replace( '_', '-', $classname ) );
        $parts     = explode( '\\', $classname );

        if ( 1 > count( $parts ) ) {
            return;
        }

        $parts[ count( $parts ) - 1 ] = 'class-' . $parts[ count( $parts ) - 1 ] . '.php';

        $filename = get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . implode( DIRECTORY_SEPARATOR, $parts );

        if ( ! file_exists( $filename ) ) {
            return;
        }
        require_once $filename;
    }

    spl_autoload_register( 'cars_catalog_autoload' );
}

function setup_theme(): Setup {
    return Setup::instance();
}

setup_theme()->init();

Type::instance()->init();
Taxonomy::instance()->init();
Shortcode::instance()->init();
Ajax::instance()->init();


function showCategories( int $id, string $taxonomy ) : string {
    $categories = get_the_terms(get_the_ID(), $taxonomy );
    if ($categories && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            return $category->name;
        }
    }
    return false;
}

function showColors( int $id ) {
    $colors_term = get_the_terms(get_the_ID(), 'car_color' );
    echo '<div class="colors">';
    if ($colors_term && !is_wp_error($colors_term)) {
        foreach ($colors_term as $color) {
            echo '<div class="colors__btn" style="background-color: ' . $color->name . ';""></div>';
        }
    }
    echo '</div>';
}