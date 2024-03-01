<?php
namespace CarsCatalog;
trait Query{
    public function cars_query( array $args ) {

        $query = new \WP_Query( $args );

        $total_posts = $query->found_posts;
        $posts_per_page = $query->get('posts_per_page');
        $page_count = ceil($total_posts / $posts_per_page);

        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
                get_template_part('template-parts/partials/content', 'car');
            endwhile;

            if( $page_count != 1 ) :
                get_template_part('template-parts/catalog', 'pagination', [ 'page_count' => $page_count ] );
            endif;

        endif;
        wp_reset_postdata();
    }
}