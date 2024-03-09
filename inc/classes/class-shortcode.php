<?php

namespace CarsCatalog\classes;
use CarsCatalog\abstracts\Singleton;
use CarsCatalog\traits\Query;

class Shortcode extends Singleton {
    use Query;

    private $count;

    public function init() {

        add_shortcode( 'cars_catalog', [ $this, 'cars_shortcode_display'] , 99, 1 );

        add_action('before_cars_catalog_loop', [$this, 'cars_catalog_filter_html']);
        add_action('cars_catalog_loop', [$this, 'cars_catalog_posts_html']);
    }
    public function cars_shortcode_display( $atts ) {
        $atts = shortcode_atts(
            [
                'count'   => 4,
            ],
            $atts
        );

        $this->count = $atts['count'];

        $display_catalog = '';
        ob_start();

        get_template_part('template-parts/catalog', 'loop', [] );

        $display_catalog = ob_get_contents();
        ob_end_clean();

        return $display_catalog;
    }

    public function cars_catalog_posts_html() {
        $args = [
            'post_type' => 'cars',
            'post_status' => 'publish',
            'paged' => 1,
            'posts_per_page' => 4,
        ];

        $this->cars_query( $args );
    }
    public function cars_catalog_filter_html() {
        get_template_part('template-parts/catalog', 'filter', [] );
    }
}