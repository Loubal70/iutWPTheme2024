<?php
/**
 * iut functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iut
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function iut_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on iut, use a find and replace
		* to change 'iut' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'iut', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'iut' ),
			'menu-footer' => esc_html__( 'Pied de page', 'iut' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'iut_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'iut_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iut_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'iut_content_width', 640 );
}
add_action( 'after_setup_theme', 'iut_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iut_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'iut' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'iut' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'iut_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function iut_scripts() {
	wp_enqueue_style( 'iut-style', get_template_directory_uri() . '/assets/css/output.css', array(), _S_VERSION );
	wp_style_add_data( 'iut-style', 'rtl', 'replace' );

	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), _S_VERSION );

	wp_enqueue_script( 'iut-js', get_template_directory_uri() . '/assets/js/app.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'iut_scripts' );
add_action( 'admin_enqueue_scripts', 'iut_scripts' );

add_filter("script_loader_tag", function ($tag, $handle, $src)
{
    if ("iut-js" === $handle) {
        $tag = '<script type="module" id="iut-js" src="' . esc_url($src) . '"></script>';
    }

    return $tag;
}, 10, 3);


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Fonction pour créer le custom post type "Témoignage"
function create_testimonial_post_type() {
    // Labels pour le post type
    $labels = array(
        'name'               => 'Témoignages',
        'singular_name'      => 'Témoignage',
        'menu_name'          => 'Témoignages',
        'add_new_item'       => 'Ajouter un témoignage',
        'edit_item'          => 'Modifier le témoignage',
        'new_item'           => 'Nouveau témoignage',
        'view_item'          => 'Voir le témoignage',
        'view_items'         => 'Voir les témoignages',
        'search_items'       => 'Rechercher des témoignages',
        'not_found'          => 'Aucun témoignage trouvé',
        'not_found_in_trash' => 'Aucun témoignage trouvé dans la corbeille',
    );

    // Arguments pour le post type
    $args = array(
        'labels'              => $labels,
        'description'         => 'Témoignages clients',
        'public'              => true,
        'menu_icon'           => 'dashicons-format-quote',
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'temoignages'),
    );

    // Enregistrement du post type
    register_post_type('testimonial', $args);

    // Créé une taxonomy nommé "type" pour le post type "testimonial"
    register_taxonomy( 'type', 'testimonial', [
        'labels'        => array(
            'name'                        => _x( 'Types', 'iut' ),
            'singular_name'               => _x( 'Type', 'iut' ),
            'menu_name'                   => __( 'Types', 'iut' ),
        ),
    ] );
}

// Hook pour appeler la fonction lors de l'initialisation de WordPress
add_action('init', 'create_testimonial_post_type');

// Fonction pour créer le custom post type "Témoignage"
function create_services_post_type() {
    // Labels pour le post type
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'add_new'            => 'Ajouter un service',
        'add_new_item'       => 'Ajouter un service',
        'edit_item'          => 'Modifier le service',
        'new_item'           => 'Nouveau service',
        'view_item'          => 'Voir le service',
        'view_items'         => 'Voir les services',
        'search_items'       => 'Rechercher des services',
        'not_found'          => 'Aucun service trouvé',
        'not_found_in_trash' => 'Aucun service trouvé dans la corbeille',
    );

    // Arguments pour le post type
    $args = array(
        'label'               => 'Services',
        'labels'              => $labels,
        'description'         => 'Services',
        'public'              => true,
        'menu_icon'           => 'dashicons-menu',
        'menu_position'       => 6,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'services'),
    );

    // Enregistrement du post type
    register_post_type('services', $args);
}

// Hook pour appeler la fonction lors de l'initialisation de WordPress
add_action('init', 'create_services_post_type');


// Create a custom post type for courses
function create_courses_post_type() {
    // Labels pour le post type
    $labels = array(
        'name'               => 'Cours',
        'singular_name'      => 'Cours',
        'menu_name'          => 'Cours',
        'add_new'            => 'Ajouter un cours',
        'add_new_item'       => 'Ajouter un cours',
        'edit_item'          => 'Modifier le cours',
        'new_item'           => 'Nouveau cours',
        'view_item'          => 'Voir le cours',
        'view_items'         => 'Voir les cours',
        'search_items'       => 'Rechercher des cours',
        'not_found'          => 'Aucun cours trouvé',
        'not_found_in_trash' => 'Aucun cours trouvé dans la corbeille',
    );

    // Arguments pour le post type
    $args = array(
        'label'               => 'Cours',
        'labels'              => $labels,
        'description'         => 'CPT Cours',
        'public'              => true,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        'menu_position'       => 6,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'cours'),
    );

    // Enregistrement du post type
    register_post_type('cours', $args);

    register_taxonomy( 'courses_cat', 'cours', [
        'labels'        => array(
            'name'                        => _x( 'Catégories de cours', 'iut' ),
            'singular_name'               => _x( 'Catégorie de cours', 'iut' ),
            'menu_name'                   => __( 'Catégorie de cours', 'iut' ),
        ),
    ] );
}

// Hook pour appeler la fonction lors de l'initialisation de WordPress
add_action('init', 'create_courses_post_type');