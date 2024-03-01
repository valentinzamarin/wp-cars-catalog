<?php
$colors = get_terms(array(
    'taxonomy' => 'car_color',
    'hide_empty' => false,
));
echo '<div class="colors">';
    foreach( $colors as $color ) :
        echo '<div class="colors__btn" style="background-color: ' . $color->name . ';""><input type="checkbox" name="colors" value="' . $color->term_id . '" /></div>';
    endforeach;
echo '</div>';
