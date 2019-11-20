<?php
/**
 * Tanawul Bakery functions and definitions
 */

function tanawul_bakery_setup() {
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'tanawul-bakery-featured-image', 2000, 1200, true );
	add_image_size( 'tanawul-bakery-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'left-menu'    => __( 'Left Menu', 'tanawul-bakery' ),
		'right-menu'    => __( 'Right Menu', 'tanawul-bakery' ),
		'responsive-menu'    => __( 'Responsive Menu', 'tanawul-bakery' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style( array( 'assets/css/editor-style.css', tanawul_bakery_fonts_url() ) );
}
add_action( 'after_setup_theme', 'tanawul_bakery_setup' );

/**
 * Register custom fonts.
 */
function tanawul_bakery_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Courgette';
	$font_family[] = 'Varela';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/**
 * Widget area.
 */
function tanawul_bakery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'tanawul-bakery' ),
		'id'            => 'sidebox-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'tanawul-bakery' ),
		'id'            => 'sidebox-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on Pages and archive pages.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'tanawul-bakery' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'tanawul-bakery' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'tanawul-bakery' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'tanawul-bakery' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tanawul_bakery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tanawul_bakery_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'tanawul-bakery-fonts', tanawul_bakery_fonts_url(), array(), null );

	//bootstrap
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ));

	// Theme stylesheet.
	wp_enqueue_style( 'tanawul-bakery-basic-style', get_stylesheet_uri() );

	//font-awesome 
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'tanawul-bakery-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$tanawul_bakeryScreenReaderText=array();
	
	// if ( has_nav_menu( 'responsive-menu' ) ) {
		wp_enqueue_script( 'tanawul-bakery-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );

		$tanawul_bakeryScreenReaderText['expand']         = __( 'Expand child menu', 'tanawul-bakery' );
		$tanawul_bakeryScreenReaderText['collapse']       = __( 'Collapse child menu', 'tanawul-bakery' );
		
	// }
	
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_localize_script( 'tanawul-bakery-skip-link-focus-fix', 'tanawul_bakeryScreenReaderText', $tanawul_bakeryScreenReaderText );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tanawul_bakery_scripts' );

function tanawul_bakery_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tanawul_bakery_loop_columns');
	if (!function_exists('tanawul_bakery_loop_columns')) {
	function tanawul_bakery_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Excerpt Limit Begin */
function tanawul_bakery_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function tanawul_bakery_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//footer Link
define('TANAWUL_BAKERY_CREDIT','https://www.themeseye.com/','tanawul-bakery');

if ( ! function_exists( 'tanawul_bakery_credit' ) ) {
	function tanawul_bakery_credit(){
		echo "<a href=".esc_url(TANAWUL_BAKERY_CREDIT)." target='_blank'>".esc_html__('Themeseye','tanawul-bakery')."</a>";
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );