<?php
    $id    = get_the_ID();
    $thumb = get_the_post_thumbnail_url($id);
    use CarsCatalog\classes\Helpers;
?>
<div class="block col-md-3 text-decoration-none">
    <div class="card mb-4 box-shadow">
        <img src="<?php echo esc_url( $thumb ); ?>" class="card-img-top object-fit-cover" alt="<?php the_title(); ?>" style="height: 225px; width: 100%; display: block;">
        <div class="card-body">
            <p class="card-text"><?php the_title(); ?></p>
            <hr>
            <p class="card-text text-muted">
                Brand:
                <?php echo Helpers::showCategories( get_the_ID(), 'car_brand' ); ?>
            </p>
            <p class="card-text text-muted">
                Type:
                <?php echo Helpers::showCategories( get_the_ID(), 'car_type' ); ?>
            </p>
            <p class="card-text text-muted">
                Year:
                <?php echo Helpers::showCategories( get_the_ID(), 'car_year' ); ?>
            </p>
            <p class="card-text text-muted">
                <?php Helpers::showColors( get_the_ID() ); ?>
            </p>
            <hr>
            <p>
                <?php echo get_post_meta( get_the_ID(), 'car_price', true ); ?>
            </p>
        </div>

    </div>
</div>