<?php

for($i = 0; $i< 20; $i++) {

    $mod_by_4 = $i % 4 == 0;


    if ($mod_by_4) {
        echo '<div class="row image-row">';
    }

    echo '<div class="col-sm-6 col-md-3 img-container"><a class="image-link" href="/images/full/'.($i+1).'.jpg"><img class="img-responsive" src="/images/thumbs/' . ($i+1) . '.jpg"/></a></div>';

    if ($i % 4 == 3) {
        echo '</div>';
    }

}