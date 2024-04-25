<?php /* Template Name: Services */ ?>

<?php
    get_header();

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

        if(has_excerpt()){ // Est-ce qu'il y a un extrait ?
            the_excerpt(); // Affiche l'extrait
        }

        if(has_post_thumbnail()){ // Est-ce qu'il y a une image à la une ?
            // Affiche l'image à la une avec une taille de 100px de large
            the_post_thumbnail('medium', ['style' => 'width: 100px; height: auto;']);
        }

        echo '<a href="' . get_permalink() . '">Lien vers l\'article</a>'; // Lien vers l'article

    endwhile;
    wp_reset_postdata(); // Réinitialiser la requête
else :
    echo 'Aucun service trouvé';
endif;


get_footer();