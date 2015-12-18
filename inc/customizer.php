<?php
/**
 * Fara Theme Customizer
 *
 * @package Fara
 */

function fara_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    //Extra titles
    class Fara_Titles extends WP_Customize_Control {
        public $type = 'titles';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="padding: 10px; border: 1px solid #DF7B7B; color: #DF7B7B;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

    //___General___//
    $wp_customize->add_section(
        'fara_general',
        array(
            'title' => __('General', 'fara'),
            'priority' => 9,
        )
    );
    //Favicon Upload
    $wp_customize->add_setting(
        'site_favicon',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'fara' ),
               'type'           => 'image',
               'section'        => 'fara_general',
               'settings'       => 'site_favicon',
               'priority' => 10,
            )
        )
    );
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',

        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'fara' ),
               'type'           => 'image',
               'section'        => 'fara_general',
               'settings'       => 'site_logo',
               'priority'       => 11,
            )
        )
    );
    //Logo size
    $wp_customize->add_setting(
        'logo_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '200',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'logo_size', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'fara_general',
        'label'       => __('Logo size', 'fara'),
        'description' => __('Max-width for the logo. Default 200px', 'fara'),
        'input_attrs' => array(
            'min'   => 50,
            'max'   => 600,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //Logo style
    $wp_customize->add_setting(
        'logo_style',
        array(
            'default'           => 'hide-title',
            'sanitize_callback' => 'fara_sanitize_logo_style',
        )
    );
    $wp_customize->add_control(
        'logo_style',
        array(
            'type'          => 'radio',
            'label'         => __('Logo style', 'fara'),
            'description'   => __('This option applies only if you are using a logo', 'fara'),
            'section'       => 'fara_general',
            'priority'      => 13,
            'choices'       => array(
                'hide-title'  => __( 'Only logo', 'fara' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'fara' ),
            ),
        )
    );
    //___Slider___//
    $wp_customize->add_section(
        'fara_slider',
        array(
            'title' => __('Slider', 'fara'),
            'priority' => 10,
            'description' => __('You can add your shortcode for the MetaSlider plugin here. You can also add any other shortcode you want if you do not want to use MetaSlider.', 'fara'),
        )
    );
    //Shortcode
    $wp_customize->add_setting(
        'fara_meta_shortcode',
        array(
            'sanitize_callback' => 'fara_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'fara_meta_shortcode',
        array(
            'label' => __( 'Add your Metaslider shortcode here', 'fara' ),
            'section' => 'fara_slider',
            'type' => 'text',
            'priority' => 9
        )
    );
    //Front page
    $wp_customize->add_setting(
        'fara_slider_front',
        array(
            'sanitize_callback' => 'fara_sanitize_checkbox',
            'default' => 0,
        )
    );
    $wp_customize->add_control(
        'fara_slider_front',
        array(
            'type' => 'checkbox',
            'label' => __('Show the slider on the front page?', 'fara'),
            'section' => 'fara_slider',
            'priority' => 10,
        )
    );
    //Home page
    $wp_customize->add_setting(
        'fara_slider_home',
        array(
            'sanitize_callback' => 'fara_sanitize_checkbox',
            'default' => 0,
        )
    );
    $wp_customize->add_control(
        'fara_slider_home',
        array(
            'type' => 'checkbox',
            'label' => __('Show the slider on blog index/archives/etc?', 'fara'),
            'section' => 'fara_slider',
            'priority' => 11,
        )
    );
    //Singular
    $wp_customize->add_setting(
        'fara_slider_singular',
        array(
            'sanitize_callback' => 'fara_sanitize_checkbox',
            'default' => 0,
        )
    );
    $wp_customize->add_control(
        'fara_slider_singular',
        array(
            'type' => 'checkbox',
            'label' => __('Show the slider on single posts and pages?', 'fara'),
            'section' => 'fara_slider',
            'priority' => 12,
        )
    );

    //___Fonts___//
    $wp_customize->add_section(
        'fara_fonts',
        array(
            'title' => __('Fonts', 'fara'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: flyfreemedia.com/documentation/fara', 'fara'),
        )
    );
    //Body fonts title
    $wp_customize->add_setting('fara_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new fara_Titles( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'fara'),
        'section' => 'fara_fonts',
        'settings' => 'fara_options[titles]',
        'priority' => 10
        ) )
    );
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Fira+Sans:400,700,400italic,700italic',
            'sanitize_callback' => 'fara_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'fara' ),
            'section' => 'fara_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Fira Sans\', sans-serif',
            'sanitize_callback' => 'fara_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Font family', 'fara' ),
            'section' => 'fara_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Headings fonts title
    $wp_customize->add_setting('fara_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new fara_Titles( $wp_customize, 'headings_fonts', array(
        'label' => __('Headings fonts', 'fara'),
        'section' => 'fara_fonts',
        'settings' => 'fara_options[titles]',
        'priority' => 13
        ) )
    );
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Montserrat:400,700',
            'sanitize_callback' => 'fara_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'fara' ),
            'section' => 'fara_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Montserrat\', sans-serif',
            'sanitize_callback' => 'fara_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Font family', 'fara' ),
            'section' => 'fara_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    //Font sizes title
    $wp_customize->add_setting('fara_options[titles]', array(
            'type' => 'titles_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new fara_Titles( $wp_customize, 'font_sizes_title', array(
        'label' => __('Font sizes', 'fara'),
        'section' => 'fara_fonts',
        'settings' => 'fara_options[titles]',
        'priority' => 16
        ) )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '62',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'fara_fonts',
        'label'       => __('Site title', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'fara_fonts',
        'label'       => __('Site description', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    // Nav menu
    $wp_customize->add_setting(
        'menu_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'menu_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'fara_fonts',
        'label'       => __('Menu items', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'fara_fonts',
        'label'       => __('H1 font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'fara_fonts',
        'label'       => __('H2 font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'fara_fonts',
        'label'       => __('H3 font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'fara_fonts',
        'label'       => __('H4 font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'fara_fonts',
        'label'       => __('H5 font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'fara_fonts',
        'label'       => __('H6 font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'fara_fonts',
        'label'       => __('Body font size', 'fara'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //___Colors___//
    //Color scheme
    $wp_customize->add_setting(
        'color_scheme_1',
        array(
            'default'           => '#cf4647',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_scheme_1',
            array(
                'label'         => __('Color 1', 'fara'),
                'section'       => 'colors',
                'settings'      => 'color_scheme_1',
                'priority'      => 13
            )
        )
    );
    $wp_customize->add_setting(
        'color_scheme_2',
        array(
            'default'           => '#00b4cc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_scheme_2',
            array(
                'label'         => __('Color 2', 'fara'),
                'section'       => 'colors',
                'settings'      => 'color_scheme_2',
                'priority'      => 14
            )
        )
    );
    $wp_customize->add_setting(
        'color_scheme_3',
        array(
            'default'           => '#3fb8af',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_scheme_3',
            array(
                'label'         => __('Color 3', 'fara'),
                'section'       => 'colors',
                'settings'      => 'color_scheme_3',
                'priority'      => 15
            )
        )
    );
    $wp_customize->add_setting(
        'color_scheme_4',
        array(
            'default'           => '#f7a541',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_scheme_4',
            array(
                'label'         => __('Color 4', 'fara'),
                'section'       => 'colors',
                'settings'      => 'color_scheme_4',
                'priority'      => 16
            )
        )
    );
    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'fara'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 22
            )
        )
    );
    //Site desc
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#b5b5b5',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'fara'),
                'section' => 'colors',
                'priority' => 23
            )
        )
    );
    //Menu items
    $wp_customize->add_setting(
        'menu_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_items_color',
            array(
                'label' => __('Menu items', 'fara'),
                'section' => 'colors',
                'priority' => 25
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#6E757C',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'fara'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 27
            )
        )
    );

}
add_action( 'customize_register', 'fara_customize_register' );


/**
 * Sanitization
 */
// Logo style
function fara_sanitize_logo_style( $input ) {
    $valid = array(
                'hide-title'  => __( 'Only logo', 'fara' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'fara' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Text
function fara_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkbox
function fara_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fara_customize_preview_js() {
	wp_enqueue_script( 'fara_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fara_customize_preview_js' );


function fara_registers() {
	wp_enqueue_script( 'fara_customizer_script', get_template_directory_uri() . '/js/fara_customizer.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'fara_customizer_script', 'faraCustomizerObject', array(
		'github'				=> __('GitHub','fara'),
		'review'				=> __('Leave a Review', 'fara')
		) );
}
add_action( 'customize_controls_enqueue_scripts', 'fara_registers' );
