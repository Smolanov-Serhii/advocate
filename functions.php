<?php
/**
 * advocate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package advocate
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
function advocate_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on advocate, use a find and replace
		* to change 'advocate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'advocate', get_template_directory() . '/languages' );

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
			'Top-Menu' => esc_html__( 'Верхнее меню', 'advocate' ),
			'Footer-Menu' => esc_html__( 'Футер меню', 'advocate' ),
			'Praktic-Menu' => esc_html__( 'Направления меню', 'advocate' ),
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
			'advocate_custom_background_args',
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
			'height'      => 120,
			'width'       => 241,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'advocate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function advocate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'advocate_content_width', 640 );
}
add_action( 'after_setup_theme', 'advocate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function advocate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'advocate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'advocate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'advocate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function advocate_scripts() {
	wp_enqueue_style( 'advocate-style', get_template_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );
//    wp_enqueue_script('advocate-jquery', "https://code.jquery.com/jquery-3.6.0.min.js");
	wp_enqueue_script( 'advocate-script', get_template_directory_uri() . '/dist/js/common.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'advocate_scripts' );

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

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Параметры',
        'menu_title'	=> 'Параметры темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Header',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Footer',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры общие',
        'menu_title'	=> 'Общие',
        'parent_slug'	=> 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Контакты',
        'menu_title'	=> 'Контакты',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

add_action( 'init', 'register_post_types' );
function register_post_types()
{
    register_post_type('directions', [
        'label' => null,
        'labels' => [
            'name' => 'Направления', // основное название для типа записи
            'singular_name' => 'Направление', // название для одной записи этого типа
            'add_new' => 'Добавить направление', // для добавления новой записи
            'add_new_item' => 'Добавить направление', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактировать направление', // для редактирования типа записи
            'new_item' => 'Новое направление', // текст новой записи
            'view_item' => 'Посмотреть направление', // для просмотра записи этого типа.
            'search_items' => 'Искать направление', // для поиска по этим типам записи
            'not_found' => 'ничего не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Направления', // название меню
        ],
        'description' => '',
        'public' => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu' => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => null,
        'menu_icon' => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical' => false,
        'supports' => ['title','editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
        'rewrite' => true,
        'query_var' => true,
    ]);
}
