<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iut
 */

get_header();
?>

<?php
// Utilisation d'une boucle standard pour afficher les articles
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        ?>
        <div style="background: #002B4E; color: white;">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <p>Publié le : <?php the_date(); ?> par <?php the_author(); ?></p>
        </div>
        <?php
    }
} else {
    // Aucun article trouvé
}
?>


<?php
get_footer();
