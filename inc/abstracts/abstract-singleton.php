<?php

namespace CarsCatalog\abstracts;
abstract class Singleton {

    public static function instance() {
        static $instances = array();

        $class = get_called_class();

        if ( ! isset( $instances[ $class ] ) ) {
            $instances[ $class ] = new $class();
        }

        return $instances[ $class ];
    }
}