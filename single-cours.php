<?php
get_header();

$duree = get_field('duree');
$level = get_field('level');


while (have_posts()) : the_post();
    // Your single service content here
    the_title('<h1>', '</h1>');

    if(has_excerpt()){
        the_excerpt();
    }

    if(!empty($duree)):
        echo 'Temps du cours : ' . $duree;
    endif;

    if(!empty($level)):
        echo '<br/> Niveau : ' . $level['label'];
    endif;
endwhile;

get_footer();