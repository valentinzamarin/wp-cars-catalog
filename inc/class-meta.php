<?php

namespace CarsCatalog;

class Meta extends Singleton {
    public function init() {
        add_action( 'add_meta_boxes', [ $this, 'cars_post_meta' ] );
        add_action( 'save_post', [ $this, 'cars_save_post_meta' ] );
    }

    public function cars_post_meta( $post ) {
        add_meta_box(
            'cars_meta',
            'Cars Meta Fields',
            [ $this, 'cars_meta_display' ],
            'cars',
            'normal',
            'low'
        );
    }

    public function cars_save_post_meta( $post_id ) {
        if ( ! isset( $_POST['cars_nonce'] ) || ! wp_verify_nonce( $_POST['cars_nonce'], 'cars_action' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        if ( ! isset( $_POST['cars_price'] ) ) {
            return;
        }

        update_post_meta( $post_id, 'car_price', sanitize_text_field( $_POST['cars_price'] ) );
    }

    public function cars_meta_display() {
        global $post;
        $car_price = get_post_meta( $post->ID, 'car_price', true );
        ?>
        <input type="number" name="cars_price" id="cars_price" value="<?php echo esc_attr( $car_price ); ?>">
        <?php
        wp_nonce_field( 'cars_action', 'cars_nonce' );
    }
}