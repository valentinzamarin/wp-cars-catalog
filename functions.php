<?php

use CarsCatalog\Setup;
use CarsCatalog\Type;
use CarsCatalog\Taxonomy;
use CarsCatalog\Meta;
use CarsCatalog\Shortcode;
use CarsCatalog\Ajax;

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

Setup::instance()->init();
Type::instance()->init();
Taxonomy::instance()->init();
Meta::instance()->init();
Shortcode::instance()->init();
Ajax::instance()->init();

