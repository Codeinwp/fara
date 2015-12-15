<?php
/**
 * @package fara
 */

//Dynamic styles
function fara_custom_styles($custom) {



	//Logo size
	$logo_size = get_theme_mod( 'logo_size', '200' );
	if ( get_theme_mod( 'logo_size' )) {
		$custom = ".site-logo { max-width:" . intval($logo_size) . "px; }"."\n";
	}

	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
	if ( $body_fonts !='' ) {
		$custom .= "body { font-family:" . $body_fonts . ";}"."\n";
	}
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family:" . $headings_fonts . ";}"."\n";
	}
    //Site title
    $site_title_size = get_theme_mod( 'site_title_size', '62' );
    if ( get_theme_mod( 'site_title_size' )) {
        $custom .= ".site-title { font-size:" . intval($site_title_size) . "px; }"."\n";
    }
    //Site description
    $site_desc_size = get_theme_mod( 'site_desc_size', '18' );
    if ( get_theme_mod( 'site_desc_size' )) {
        $custom .= ".site-description { font-size:" . intval($site_desc_size) . "px; }"."\n";
    }
    //Menu
    $menu_size = get_theme_mod( 'menu_size', '16' );
    if ( get_theme_mod( 'menu_size' )) {
        $custom .= ".main-navigation li { font-size:" . intval($menu_size) . "px; }"."\n";
    }    	    	
	//H1 size
	$h1_size = get_theme_mod( 'h1_size' );
	if ( get_theme_mod( 'h1_size' )) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size' );
    if ( get_theme_mod( 'h2_size' )) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size' );
    if ( get_theme_mod( 'h3_size' )) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size' );
    if ( get_theme_mod( 'h4_size' )) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size' );
    if ( get_theme_mod( 'h5_size' )) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size' );
    if ( get_theme_mod( 'h6_size' )) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size' );
    if ( get_theme_mod( 'body_size' )) {
        $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    }

    //__COLORS
    //Color scheme
	$color_scheme_1 = get_theme_mod( 'color_scheme_1' );
	if ( isset($color_scheme_1) && ( $color_scheme_1 != '#cf4647' ) ) {
		$custom .= ".post-number-0 .post-content { background:" . esc_html($color_scheme_1) . "}"."\n";
		$custom .= ".post-number-0 .post-content { background:" . "-moz-linear-gradient(left," . esc_html($color_scheme_1) . "0%," . esc_html($color_scheme_1) . " 25%, #ffffff 25%, #ffffff 25%, #ffffff 100%);}"."\n";
		$custom .= ".post-number-0 .post-content { background:" . "-webkit-gradient(linear, left top, right top, color-stop(0%," . esc_html($color_scheme_1) . "), color-stop(25%," . esc_html($color_scheme_1) . "), color-stop(25%,#ffffff), color-stop(25%,#ffffff), color-stop(100%,#ffffff));}"."\n";
		$custom .= ".post-number-0 .post-content { background:" . "linear-gradient(to right," . esc_html($color_scheme_1) . " 0%," . esc_html($color_scheme_1) . " 25%,#ffffff 25%,#ffffff 25%,#ffffff 100%);}"."\n";
		$custom .= ".post-number-0 .post-content { filter:" . "progid:DXImageTransform.Microsoft.gradient( startColorstr='" . esc_html($color_scheme_1) . "', endColorstr='#ffffff',GradientType=1 );}"."\n";
		$custom .= "@media (max-width: 767px) { .post-number-0 .post-meta { background:" . esc_html($color_scheme_1) . "} }"."\n";
	}
	$color_scheme_2 = get_theme_mod( 'color_scheme_2' );
	if ( isset($color_scheme_2) && ( $color_scheme_2 != '#00b4cc' ) ) {
		$custom .= ".post-number-1 .post-content { background:" . esc_html($color_scheme_2) . "}"."\n";
		$custom .= ".post-number-1 .post-content { background:" . "-moz-linear-gradient(left," . esc_html($color_scheme_2) . "0%," . esc_html($color_scheme_2) . " 25%, #ffffff 25%, #ffffff 25%, #ffffff 100%);}"."\n";
		$custom .= ".post-number-1 .post-content { background:" . "-webkit-gradient(linear, left top, right top, color-stop(0%," . esc_html($color_scheme_2) . "), color-stop(25%," . esc_html($color_scheme_2) . "), color-stop(25%,#ffffff), color-stop(25%,#ffffff), color-stop(100%,#ffffff));}"."\n";
		$custom .= ".post-number-1 .post-content { background:" . "linear-gradient(to right," . esc_html($color_scheme_2) . " 0%," . esc_html($color_scheme_2) . " 25%,#ffffff 25%,#ffffff 25%,#ffffff 100%);}"."\n";
		$custom .= ".post-number-1 .post-content { filter:" . "progid:DXImageTransform.Microsoft.gradient( startColorstr='" . esc_html($color_scheme_2) . "', endColorstr='#ffffff',GradientType=1 );}"."\n";
		$custom .= "@media (max-width: 767px) { .post-number-1 .post-meta { background:" . esc_html($color_scheme_2) . "} }"."\n";
	}
	$color_scheme_3 = get_theme_mod( 'color_scheme_3' );
	if ( isset($color_scheme_3) && ( $color_scheme_3 != '#3fb8af' ) ) {
		$custom .= ".post-number-2 .post-content { background:" . esc_html($color_scheme_3) . "}"."\n";
		$custom .= ".post-number-2 .post-content { background:" . "-moz-linear-gradient(left," . esc_html($color_scheme_3) . "0%," . esc_html($color_scheme_3) . " 25%, #ffffff 25%, #ffffff 25%, #ffffff 100%);}"."\n";
		$custom .= ".post-number-2 .post-content { background:" . "-webkit-gradient(linear, left top, right top, color-stop(0%," . esc_html($color_scheme_3) . "), color-stop(25%," . esc_html($color_scheme_3) . "), color-stop(25%,#ffffff), color-stop(25%,#ffffff), color-stop(100%,#ffffff));}"."\n";
		$custom .= ".post-number-2 .post-content { background:" . "linear-gradient(to right," . esc_html($color_scheme_3) . " 0%," . esc_html($color_scheme_3) . " 25%,#ffffff 25%,#ffffff 25%,#ffffff 100%);}"."\n";
		$custom .= ".post-number-2 .post-content { filter:" . "progid:DXImageTransform.Microsoft.gradient( startColorstr='" . esc_html($color_scheme_3) . "', endColorstr='#ffffff',GradientType=1 );}"."\n";
		$custom .= "@media (max-width: 767px) { .post-number-2 .post-meta { background:" . esc_html($color_scheme_3) . "} }"."\n";
	}
	$color_scheme_4 = get_theme_mod( 'color_scheme_4' );
	if ( isset($color_scheme_4) && ( $color_scheme_4 != '#f7a541' ) ) {
		$custom .= ".post-number-3 .post-content { background:" . esc_html($color_scheme_4) . "}"."\n";
		$custom .= ".post-number-3 .post-content { background:" . "-moz-linear-gradient(left," . esc_html($color_scheme_4) . "0%," . esc_html($color_scheme_4) . " 25%, #ffffff 25%, #ffffff 25%, #ffffff 100%);}"."\n";
		$custom .= ".post-number-3 .post-content { background:" . "-webkit-gradient(linear, left top, right top, color-stop(0%," . esc_html($color_scheme_4) . "), color-stop(25%," . esc_html($color_scheme_4) . "), color-stop(25%,#ffffff), color-stop(25%,#ffffff), color-stop(100%,#ffffff));}"."\n";
		$custom .= ".post-number-3 .post-content { background:" . "linear-gradient(to right," . esc_html($color_scheme_4) . " 0%," . esc_html($color_scheme_4) . " 25%,#ffffff 25%,#ffffff 25%,#ffffff 100%);}"."\n";
		$custom .= ".post-number-3 .post-content { filter:" . "progid:DXImageTransform.Microsoft.gradient( startColorstr='" . esc_html($color_scheme_4) . "', endColorstr='#ffffff',GradientType=1 );}"."\n";
		$custom .= "@media (max-width: 767px) { .post-number-3 .post-meta { background:" . esc_html($color_scheme_4) . "} }"."\n";
	}

	//Site title
	$site_title = get_theme_mod( 'site_title_color' );
	if ( isset($site_title) && ( $site_title != '#ffffff' )) {
		$custom .= ".site-title a, .site-title a:hover { color:" . esc_html($site_title) . "}"."\n";
	}
	//Site desc
	$site_desc = get_theme_mod( 'site_desc_color' );
	if ( isset($site_desc) && ( $site_desc != '#b5b5b5' )) {
		$custom .= ".site-description { color:" . esc_html($site_desc) . "}"."\n";
	}
	//Menu items
	$menu_items = get_theme_mod( 'menu_items_color' );
	if ( isset($menu_items) && ( $menu_items != '#ffffff' )) {
		$custom .= ".main-navigation a, .main-navigation li::before { color:" . esc_html($menu_items) . "}"."\n";
	}
	//Body text
	$body_text = get_theme_mod( 'body_text_color' );
	if ( isset($body_text) && ( $body_text != '#6E757C' )) {
		$custom .= "body { color:" . esc_html($body_text) . "}"."\n";
	}


	//Output all the styles
	wp_add_inline_style( 'fara-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'fara_custom_styles' );