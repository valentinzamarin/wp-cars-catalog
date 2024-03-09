<?php

use CarsCatalog\classes\Setup;
use CarsCatalog\classes\Shortcode;
use CarsCatalog\classes\Type;
use CarsCatalog\classes\Taxonomy;
use CarsCatalog\classes\Meta;
use CarsCatalog\classes\Ajax;

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
        if (in_array('classes', $parts)) :
            $parts[ count( $parts ) - 1 ] = 'class-' . $parts[ count( $parts ) - 1 ] . '.php';
        elseif ( in_array('abstracts', $parts ) ) :
            $parts[ count( $parts ) - 1 ] = 'abstract-' . $parts[ count( $parts ) - 1 ] . '.php';
        elseif ( in_array('traits', $parts ) ) :
            $parts[ count( $parts ) - 1 ] = 'trait-' . $parts[ count( $parts ) - 1 ] . '.php';
        endif;

        $filename = get_template_directory() . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . implode( DIRECTORY_SEPARATOR, $parts );

        if ( ! file_exists( $filename ) ) {
            return;
        }
        require_once $filename;
    }

    spl_autoload_register( 'cars_catalog_autoload' );
}

Setup::instance()->init();
Shortcode::instance()->init();
Type::instance()->init();
Taxonomy::instance()->init();
Meta::instance()->init();
Ajax::instance()->init();


