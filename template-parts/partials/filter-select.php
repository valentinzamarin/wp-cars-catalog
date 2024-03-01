<?php
if (isset($args['taxonomy'])) :
    $taxonomy = (string)$args['taxonomy'];
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));

    echo '<select name="' . $taxonomy . '" class="form-select">';
    echo '<option value="" disabled selected>Select your option</option>';
    foreach ($terms as $term) {
        echo '<option value="' . $term->name . '">' . $term->name . '</option>';
    }
    echo '</select>';
endif;