<?php
/**
 * ProjectName functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ProjectName
 */

if ( ! function_exists( 'projectname_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function projectname_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ProjectName, use a find and replace
		 * to change 'projectname' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'projectname', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'projectname' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'projectname_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'projectname_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function projectname_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'projectname_content_width', 640 );
}
add_action( 'after_setup_theme', 'projectname_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function projectname_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'projectname' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'projectname' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'projectname_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function projectname_scripts() {
	wp_enqueue_style( 'projectname-style', get_stylesheet_uri() );
	/* base css */	
	//wp_enqueue_style( 'reset-style', get_template_directory_uri() . '/assets/bundle/css/normalize.css');
	//wp_enqueue_style( 'fonts-style', get_template_directory_uri() . '/assets/bundle/css/fonts.css');
	/* plugins css */
	//wp_enqueue_style( 'slickslider-style', get_template_directory_uri() . '/assets/bundle/libs/slick/slick.css');	
	/* user css */	
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/bundle/css/main.min.css');
	//wp_enqueue_style( 'media-style', get_template_directory_uri() . '/assets/bundle/css/media.css');
	/* plugins js */
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/bundle/libs/jquery/jquery.min.js', array(), '3.2.1', true );	
	//wp_enqueue_script( 'slickslider', get_template_directory_uri() . '/assets/bundle/libs/slick/slick.min.js', array(), '1.8.0', true );	
	//wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/assets/bundle/libs/scrollto/jquery.scrollTo.min.js', array(), '1.4.13', true );	
	//wp_enqueue_script( 'jquery-mousewheel', get_template_directory_uri() . '/assets/bundle/libs/jquery-mousewheel/jquery.mousewheel.min.js', array(), '0.1.0', true );	
	/* user js */
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/assets/bundle/js/scripts.min.js', array(), '20180615', true );	
	/* plugins css */	
	wp_enqueue_script( 'projectname-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'projectname-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'projectname_scripts' );

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
/*
function change_post_menu_label() {
	global $menu, $submenu;
	$menu[5][0] = 'Модели';
	$submenu['edit.php'][5][0] = 'Все модели';
	$submenu['edit.php'][10][0] = 'Добавить модель';
	$submenu['edit.php'][16][0] = 'Метки моделей';
	echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$icon = &$wp_post_types['post']->menu_icon;
	$labels->name = 'Модели';
	$labels->singular_name = 'Модели';
	$labels->name_admin_bar = 'Модель';	
	$labels->add_new = 'Добавить модель';
	$labels->add_new_item = 'Добавить модель';
	$labels->edit_item = 'Редактировать модель';
	$labels->new_item = 'Добавить модель';
	$labels->view_item = 'Посмотреть модель';
	$labels->search_items = 'Найти модель';
	$labels->not_found = 'Моделей не найдено';
	$labels->not_found_in_trash = 'Корзина моделей пуста';
	$labels->not_found_in_trash = 'Корзина моделей пуста';
	$icon = 'dashicons-lightbulb';
}
add_action( 'init', 'change_post_object_label' ); 
*/