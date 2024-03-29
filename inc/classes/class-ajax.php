<?php


namespace CarsCatalog\classes;

use CarsCatalog\abstracts\Singleton;
use CarsCatalog\traits\Query;

class Ajax extends Singleton {

    use Query;

    public function init() {
        add_action('wp_ajax_cars_filter', [$this, 'cars_filter_response']);
        add_action('wp_ajax_nopriv_cars_filter', [$this, 'cars_filter_response']);
    }

    public function cars_filter_response() {

        $brand = stripcslashes($_POST['brand']);
        $type  = stripcslashes($_POST['type']);
        $year  = stripcslashes($_POST['year']);

        $colors_string = stripcslashes($_POST['colors']);
        $colors_array = json_decode($colors_string);

        $args = [
            'post_type' => 'cars',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'tax_query' => [
                'relation' => 'AND'
            ]
        ];

        if ($brand) :
            $args['tax_query'][] = [
                [
                    'taxonomy' => 'car_brand',
                    'field' => 'name',
                    'terms' => $brand,

                ],
            ];
        endif;

        if ($type) :
            $args['tax_query'][] = [
                [
                    'taxonomy' => 'car_type',
                    'field' => 'name',
                    'terms' => $type,

                ],
            ];
        endif;

        if ($year) :
            $args['tax_query'][] = [
                [
                    'taxonomy' => 'car_year',
                    'field' => 'name',
                    'terms' => $year,

                ],
            ];
        endif;

        if ($colors_array) :
            $args['tax_query'][] = [
                [
                    'taxonomy' => 'car_color',
                    'field' => 'term_id',
                    'terms' => $colors_array,
                ],
            ];
        endif;

        $page  = stripcslashes($_POST['page']);
        if ($page) :
            $args['paged'] = $page;
        endif;

        $price_from = intval( $_POST['price_from'] );
        $price_to   = intval( $_POST['price_to'] );

        if ($price_from) :
            $args['meta_query'][] = [
                [
                    'key' => 'car_price',
                    'value' => $price_from,
                    'type' => 'NUMERIC',
                    'compare' => '>='
                ],
            ];
        endif;

        if ($price_to) :
            $args['meta_query'][] = [
                [
                    'key' => 'car_price',
                    'value' => $price_to,
                    'type' => 'NUMERIC',
                    'compare' => '<='
                ],
            ];
        endif;

        $posts = '';
        ob_start();

        $this->cars_query( $args,  );

        $posts = ob_get_contents();
        ob_end_clean();

        wp_send_json_success( [
            'posts' => $posts,
        ]);
    }


}