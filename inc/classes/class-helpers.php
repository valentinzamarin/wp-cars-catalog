<?php

namespace CarsCatalog\classes;

use CarsCatalog\abstracts\Singleton;

class Helpers{
    public static function showCategories( int $id, string $taxonomy ) : string {
        $categories = get_the_terms(get_the_ID(), $taxonomy );
        if ($categories && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                return $category->name;
            }
        }
        return false;
    }

    public static function showColors( int $id ) {
        $colors_term = get_the_terms(get_the_ID(), 'car_color' );
        echo '<div class="colors">';
        if ($colors_term && !is_wp_error($colors_term)) {
            foreach ($colors_term as $color) {
                echo '<div class="colors__btn" style="background-color: ' . $color->name . ';""></div>';
            }
        }
        echo '</div>';
    }
}