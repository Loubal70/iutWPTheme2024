<?php /* Template Name: Services */ ?>

<?php
$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1, // Afficher tous les services
    'orderby' => 'title', // Trier les services par titre
    'order' => 'ASC' // Dans l'ordre croissant
));

if ($services_query->have_posts()) :
    while ($services_query->have_posts()) : $services_query->the_post();
        the_title(); // Affiche le titre
        the_content(); // Affiche le contenu (ici la description)
        the_excerpt(); // Affiche l'extrait

        if(has_post_thumbnail()){
            the_post_thumbnail('medium', ['style' => 'width: 100px; height: auto;']); // Affiche l'image à la une
        }

        echo '<a href="' . get_permalink() . '">Lien vers l\'article</a>'; // Lien vers l'article
    endwhile;
    wp_reset_postdata(); // Réinitialiser la requête
else :
    echo 'Aucun service trouvé';
endif;
