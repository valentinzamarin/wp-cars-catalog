<form id="filter" class="mb-5">
    <div class="d-flex aligncenter row mb-2">
        <div class="col-md-2">
            <?php get_template_part( 'template-parts/partials/filter', 'select', [ 'taxonomy' => 'car_brand' ]); ?>
        </div>
        <div class="col-md-2">
            <?php get_template_part( 'template-parts/partials/filter', 'select', [ 'taxonomy' => 'car_type' ]); ?>
        </div>
        <div class="col-md-2">
            <?php get_template_part( 'template-parts/partials/filter', 'select', [ 'taxonomy' => 'car_year' ]); ?>
        </div>
        <div class="col-md-2">
            <?php get_template_part( 'template-parts/partials/filter', 'color'); ?>
        </div>
        <div class="col-md-4">
            <?php get_template_part( 'template-parts/partials/filter', 'price'); ?>
        </div>
    </div>
    <hr class="mb-2">
    <input type="submit" class="btn btn-primary" value="Filter">
    <button id="btn-reset" type="button" class="btn btn-danger">Reset</button>
</form>