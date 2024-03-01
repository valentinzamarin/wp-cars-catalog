<?php $page_count = (int)$args['page_count']; ?>
<div class="d-flex justify-content-center mt-4 mb-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $page_count; $i++) :
                echo '<li class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
            endfor;
            ?>
        </ul>
    </nav>
</div>