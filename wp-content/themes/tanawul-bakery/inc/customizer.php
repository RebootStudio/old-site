<?php
/**
 * Tanawul Bakery: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tanawul_bakery_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'tanawul_bakery_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'tanawul-bakery' ),
	    'description' => __( 'Description of what this panel does.', 'tanawul-bakery' ),
	) );

	$wp_customize->add_section( 'tanawul_bakery_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'tanawul-bakery' ),
		'priority'   => 30,
		'panel' => 'tanawul_bakery_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tanawul_bakery_layout_settings',array(
        'default' => __('Right Sidebar','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'	        
	));

	$wp_customize->add_control('tanawul_bakery_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'tanawul-bakery'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'tanawul-bakery'),
        'section' => 'tanawul_bakery_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','tanawul-bakery'),
            'Right Sidebar' => __('Right Sidebar','tanawul-bakery'),
            'One Column' => __('Full Width','tanawul-bakery'),
            'Grid Layout' => __('Grid Layout','tanawul-bakery')
        ),
	));

	//Topbar section
	$wp_customize->add_section('tanawul_bakery_contact_details',array(
		'title'	=> __('Topbar Section','tanawul-bakery'),
		'description'	=> __('Add Header Content here','tanawul-bakery'),
		'priority'	=> null,
		'panel' => 'tanawul_bakery_panel_id',
	));

	$wp_customize->add_setting('tanawul_bakery_contact_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_contact_number',array(
		'label'	=> __('Add Phone Number','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_contact_number',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_email_address',array(
		'label'	=> __('Add Email Address','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_facebook_url',array(
		'label'	=> __('Add Facebook link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_twitter_url',array(
		'label'	=> __('Add Twitter link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_youtube_url',array(
		'label'	=> __('Add Youtube link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_googleplus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_googleplus_url',array(
		'label'	=> __('Add Google Plus link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_googleplus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tanawul_bakery_linkedin_url',array(
		'label'	=> __('Add Linkedin link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_linkedin_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'tanawul_bakery_slider' , array(
    	'title'      => __( 'Slider Settings', 'tanawul-bakery' ),
		'priority'   => null,
		'panel' => 'tanawul_bakery_panel_id'
	) );

	$wp_customize->add_setting('tanawul_bakery_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','tanawul-bakery'),
      	'section' => 'tanawul_bakery_slider',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'tanawul_bakery_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'tanawul_bakery_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'tanawul_bakery_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'tanawul-bakery' ),
			'section'  => 'tanawul_bakery_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//What We Offer
	$wp_customize->add_section('tanawul_bakery_we_offer',array(
		'title'	=> __('What We Offer Section','tanawul-bakery'),
		'description'	=> __('Add What We Offer sections below.','tanawul-bakery'),
		'panel' => 'tanawul_bakery_panel_id',
	));
	
	$wp_customize->add_setting('tanawul_bakery_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_text',array(
		'label'	=> __('Add Text','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_we_offer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_we_offer_title',array( 
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_we_offer_title',array(
		'label'	=> __('Section Title','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_we_offer',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('tanawul_bakery_we_offer_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('tanawul_bakery_we_offer_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','tanawul-bakery'),
		'section' => 'tanawul_bakery_we_offer',
	));

	//Footer
	$wp_customize->add_section( 'tanawul_bakery_footer' , array(
    	'title'      => __( 'Footer Text', 'tanawul-bakery' ),
		'priority'   => null,
		'panel' => 'tanawul_bakery_panel_id'
	) );

	$wp_customize->add_setting('tanawul_bakery_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_footer_text',array(
		'label'	=> __('Add Copyright Text','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_footer',
		'setting'	=> 'tanawul_bakery_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'tanawul_bakery_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'tanawul_bakery_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'tanawul_bakery_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Tanawul Bakery 1.0
 * @see tanawul-bakery_customize_register()
 *
 * @return void
 */
function tanawul_bakery_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Tanawul Bakery 1.0
 * @see tanawul-bakery_customize_register()
 *
 * @return void
 */
function tanawul_bakery_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function tanawul_bakery_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tanawul_Bakery_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Tanawul_Bakery_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Tanawul_Bakery_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Tanawul Bakery Pro', 'tanawul-bakery' ),
					'pro_text' => esc_html__( 'Go Pro', 'tanawul-bakery' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/bakery-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'tanawul-bakery-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'tanawul-bakery-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Tanawul_Bakery_Customize::get_instance();