<?php
/**
 * Fara functions and definitions
 *
 * @package Fara
 */

if ( ! function_exists( 'fara_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fara_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Fara, use a find and replace
	 * to change 'fara' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fara', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1020;
	}

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('fara-entry-thumb', 1020);

	register_nav_menus( array(
		'primary' 	=> __( 'Primary Menu', 'fara' ),
		'social' 	=> __( 'Social', 'fara' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fara_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri() . '/images/bg.jpg',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
		'default-attachment'     => 'fixed',
	) ) );
}
endif; // fara_setup
add_action( 'after_setup_theme', 'fara_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fara_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fara' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'fara_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fara_scripts() {

	wp_enqueue_style( 'fara-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), true );

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'fara-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) );
	} else {
	    wp_enqueue_style( 'fara-body-fonts', '//fonts.googleapis.com/css?family=Fira+Sans:400,700,400italic,700italic');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'fara-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) );
	} else {
	    wp_enqueue_style( 'fara-headings-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	}

	wp_enqueue_style( 'fara-style', get_stylesheet_uri() );

	wp_enqueue_style( 'fara-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_script( 'fara-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), true );

	wp_enqueue_script( 'fara-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.min.js', array('jquery'), true );

	wp_enqueue_script( 'fara-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true );

	wp_enqueue_script( 'fara-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-masonry');

	wp_enqueue_script( 'fara-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), true );

	wp_enqueue_script( 'fara-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array(), true );


}
add_action( 'wp_enqueue_scripts', 'fara_scripts' );


/**
 * Body classes
 */
add_filter('body_class', 'fara_wide_body_class');
function fara_wide_body_class($classes) {
	if ( is_home() || is_archive() ) {
		$classes[] = 'wide-layout';
    }
   	return $classes;
}

/**
 * Load html5shiv
 */
function fara_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'fara_html5shiv' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';

/**
 *TGM Plugin activation.
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

/**
 * TGMPA register
 */
function fara_register_required_plugins() {
		$plugins = array(
			array(
				'name'      => 'WP Product Reviews',
				'slug'      => 'wp-product-reviews',
				'required'  => false,
			),

			array(
				'name'      => 'Intergeo Maps - Google Maps Plugin',
				'slug'      => 'intergeo-maps',
				'required'  => false
			),

			array(
				'name'     => 'Pirate Forms',
				'slug' 	   => 'pirate-forms',
				'required' => false
			));

	$config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'fara' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'fara' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'fara' ),
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'fara' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'fara' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'fara' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'fara' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'fara' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'fara' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'fara' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'fara' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'fara' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'fara' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'fara' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'fara' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'fara' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'fara' ),
            'nag_type'                        => 'updated'
        )
    );

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'fara_register_required_plugins' );
