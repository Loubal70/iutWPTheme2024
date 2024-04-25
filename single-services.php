<?php
get_header();

$price = get_field('prix');

while (have_posts()) : the_post();
    // Your single service content here
    the_title('<h1>', '</h1>');
    the_content();

    if(!empty($price)):
        echo "Prix du service : " . $price . "€";
    endif;
endwhile;

get_footer();