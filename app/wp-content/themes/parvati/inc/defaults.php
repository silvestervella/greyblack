<?php
/**
 * Sets all of our theme defaults.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'parvati_get_defaults' ) ) {
	/**
	 * Set default options
	 *
	 */
	function parvati_get_defaults() {
		$parvati_defaults = array(
			'hide_title' => '',
			'hide_tagline' => true,
			'top_bar_width' => 'full',
			'top_bar_inner_width' => 'contained',
			'top_bar_alignment' => 'left',
			'container_width' => '1170',
			'header_layout_setting' => 'fluid-header',
			'header_inner_width' => 'contained',
			'nav_alignment_setting' => 'right',
			'header_alignment_setting' => 'left',
			'nav_layout_setting' => 'fluid-nav',
			'nav_inner_width' => 'contained',
			'nav_position_setting' => 'nav-float-right',
			'nav_dropdown_type' => 'hover',
			'nav_search' => 'enable',
			'content_layout_setting' => 'one-container',
			'layout_setting' => 'no-sidebar',
			'blog_layout_setting' => 'right-sidebar',
			'single_layout_setting' => 'right-sidebar',
			'fixed_side_content' => '',
			'blog_header_image' => '',
			'blog_header_title' => '',
			'blog_header_text' => '',
			'blog_header_button_text' => '',
			'blog_header_button_url' => '',
			'post_content' => 'excerpt',
			'footer_layout_setting' => 'fluid-footer',
			'footer_widgets_inner_width' => 'contained',
			'footer_inner_width' => 'contained',
			'footer_widget_setting' => '3',
			'footer_bar_alignment' => 'right',
			'back_to_top' => 'enable',
			'socials_display_side' => '',
			'socials_display_top' => true,
			'socials_facebook_url' => '#',
			'socials_twitter_url' => '#',
			'socials_google_url' => '',
			'socials_tumblr_url' => '#',
			'socials_pinterest_url' => '',
			'socials_youtube_url' => '#',
			'socials_linkedin_url' => '',
			'socials_custom_icon_1' => '',
			'socials_custom_icon_2' => '',
			'socials_custom_icon_3' => '',
			'socials_custom_icon_url_1' => '',
			'socials_custom_icon_url_2' => '',
			'socials_custom_icon_url_3' => '',
			'socials_mail_url' => '#',
			'side_inside_color' => '',
			'text_color' => '#252525',
			'link_color' => '#151515',
			'link_color_hover' => '#252525',
			'link_color_visited' => '',
			'font_awesome_essentials' => true,
		);

		return apply_filters( 'parvati_option_defaults', $parvati_defaults );
	}
}

if ( ! function_exists( 'parvati_get_color_defaults' ) ) {
	/**
	 * Set default options
	 */
	function parvati_get_color_defaults() {
		$parvati_color_defaults = array(
			'top_bar_background_color' => '#151515',
			'top_bar_text_color' => '#e0a655',
			'top_bar_link_color' => '#e0a655',
			'top_bar_link_color_hover' => '#ffffff',
			'header_background_color' => '#151515',
			'header_text_color' => '#ffffff',
			'header_link_color' => '#ffffff',
			'header_link_hover_color' => '#ffffff',
			'site_title_color' => '#e0a655',
			'site_tagline_color' => '#ffffff',
			'navigation_background_color' => 'rgba(21,21,21,0.9)',
			'navigation_text_color' => '#ffffff',
			'navigation_background_hover_color' => '',
			'navigation_text_hover_color' => '#e0a655',
			'navigation_background_current_color' => '',
			'navigation_text_current_color' => '',
			'subnavigation_background_color' => 'rgba(21,21,21,0.9)',
			'subnavigation_text_color' => '#ffffff',
			'subnavigation_background_hover_color' => '',
			'subnavigation_text_hover_color' => '#e0a655',
			'subnavigation_background_current_color' => '',
			'subnavigation_text_current_color' => '',
			'fixed_side_content_background_color' => '#151515',
			'fixed_side_content_text_color' => '#e0a655',
			'fixed_side_content_link_color' => '#e0a655',
			'fixed_side_content_link_hover_color' => '#ffffff',
			'content_background_color' => '',
			'content_text_color' => '',
			'content_link_color' => '',
			'content_link_hover_color' => '',
			'content_title_color' => '',
			'blog_header_bg_color' => '#1c0d08',
			'blog_header_title_color' => '#e0a655',
			'blog_header_text_color' => '#ffffff',
			'blog_header_button' => '#ffffff',
			'blog_header_button_bg' => '#e0a655',
			'blog_header_button_hover' => '#ffffff',
			'blog_header_button_hover_bg' => '#e0a655',
			'blog_post_title_color' => '',
			'blog_post_title_hover_color' => '',
			'entry_meta_text_color' => '',
			'entry_meta_link_color' => '',
			'entry_meta_link_color_hover' => '',
			'h1_color' => '',
			'h2_color' => '',
			'h3_color' => '',
			'h4_color' => '',
			'h5_color' => '',
			'h6_color' => '',
			'sidebar_widget_background_color' => '#151515',
			'sidebar_widget_text_color' => '#eeeeee',
			'sidebar_widget_link_color' => '#ffffff',
			'sidebar_widget_link_hover_color' => '#eeeeee',
			'sidebar_widget_title_color' => '#e0a655',
			'footer_widget_background_color' => '#151515',
			'footer_widget_text_color' => '#ffffff',
			'footer_widget_link_color' => '#e0a655',
			'footer_widget_link_hover_color' => '#ffffff',
			'footer_widget_title_color' => '#e0a655',
			'footer_background_color' => '#e0a655',
			'footer_text_color' => '#151515',
			'footer_link_color' => '#151515',
			'footer_link_hover_color' => '#ffffff',
			'form_background_color' => '#fafafa',
			'form_text_color' => '#555555',
			'form_background_color_focus' => '#ffffff',
			'form_text_color_focus' => '#555555',
			'form_border_color' => '#cccccc',
			'form_border_color_focus' => '#bfbfbf',
			'form_button_background_color' => '#151515',
			'form_button_background_color_hover' => '#ffffff',
			'form_button_text_color' => '#e0a655',
			'form_button_text_color_hover' => '#e0a655',
			'back_to_top_background_color' => 'rgba(21,21,21,0.7)',
			'back_to_top_background_color_hover' => '#151515',
			'back_to_top_text_color' => '#e0a655',
			'back_to_top_text_color_hover' => '#e0a655',
		);

		return apply_filters( 'parvati_color_option_defaults', $parvati_color_defaults );
	}
}

if ( ! function_exists( 'parvati_get_default_fonts' ) ) {
	/**
	 * Set default options.
	 *
	 *
	 * @param bool $filter Whether to return the filtered values or original values.
	 * @return array Option defaults.
	 */
	function parvati_get_default_fonts( $filter = true ) {
		$parvati_font_defaults = array(
			'font_body' => 'Merriweather',
			'font_body_category' => '',
			'font_body_variants' => '300,300italic,regular,italic,700,700italic,900,900italic',
			'body_font_weight' => '300',
			'body_font_transform' => 'none',
			'body_font_size' => '21',
			'body_line_height' => '1.3', // no unit
			'paragraph_margin' => '1.3', // em
			'font_top_bar' => 'Playfair Display',
			'font_top_bar_category' => '',
			'font_top_bar_variants' => 'regular,italic,700,700italic,900,900italic',
			'top_bar_font_weight' => 'normal',
			'top_bar_font_transform' => 'none',
			'top_bar_font_size' => '15',
			'font_site_title' => 'Cinzel',
			'font_site_title_category' => '',
			'font_site_title_variants' => 'regular,700,900',
			'site_title_font_weight' => '700',
			'site_title_font_transform' => 'uppercase',
			'site_title_font_size' => '45',
			'mobile_site_title_font_size' => '25',
			'font_site_tagline' => 'inherit',
			'font_site_tagline_category' => '',
			'font_site_tagline_variants' => '',
			'site_tagline_font_weight' => 'normal',
			'site_tagline_font_transform' => 'none',
			'site_tagline_font_size' => '19',
			'font_blog_header_title' => 'Playfair Display',
			'font_blog_header_title_category' => '',
			'font_blog_header_title_variants' => 'regular,italic,700,700italic,900,900italic',
			'blog_header_title_font_weight' => '700',
			'blog_header_title_font_transform' => 'none',
			'font_blog_header_text' => 'inherit',
			'font_blog_header_text_category' => '',
			'font_blog_header_text_variants' => '',
			'blog_header_text_font_weight' => '300',
			'blog_header_text_font_transform' => 'none',
			'font_navigation' => 'Cinzel',
			'font_navigation_category' => '',
			'font_navigation_variants' => 'regular,700,900',
			'navigation_font_weight' => '400',
			'navigation_font_transform' => 'uppercase',
			'navigation_font_size' => '19',
			'font_widget_title' => 'Playfair Display',
			'font_widget_title_category' => '',
			'font_widget_title_variants' => 'regular,italic,700,700italic,900,900italic',
			'widget_title_font_weight' => 'normal',
			'widget_title_font_transform' => 'none',
			'widget_title_font_size' => '30',
			'widget_title_separator' => '18',
			'widget_content_font_size' => '18',
			'font_buttons' => 'Playfair Display',
			'font_buttons_category' => '',
			'font_buttons_variants' => 'regular,italic,700,700italic,900,900italic',
			'buttons_font_weight' => '400',
			'buttons_font_transform' => 'none',
			'buttons_font_size' => '19',
			'font_heading_1' => 'inherit',
			'font_heading_1_category' => '',
			'font_heading_1_variants' => '',
			'heading_1_weight' => '600',
			'heading_1_transform' => 'none',
			'heading_1_font_size' => '80',
			'heading_1_line_height' => '1.2', // em
			'mobile_heading_1_font_size' => '30',
			'font_heading_2' => 'inherit',
			'font_heading_2_category' => '',
			'font_heading_2_variants' => '',
			'heading_2_weight' => '600',
			'heading_2_transform' => 'none',
			'heading_2_font_size' => '32',
			'heading_2_line_height' => '1.2', // em
			'mobile_heading_2_font_size' => '25',
			'font_heading_3' => 'inherit',
			'font_heading_3_category' => '',
			'font_heading_3_variants' => '',
			'heading_3_weight' => '600',
			'heading_3_transform' => 'none',
			'heading_3_font_size' => '25',
			'heading_3_line_height' => '1.2', // em
			'font_heading_4' => 'inherit',
			'font_heading_4_category' => '',
			'font_heading_4_variants' => '',
			'heading_4_weight' => 'normal',
			'heading_4_transform' => 'none',
			'heading_4_font_size' => '',
			'heading_4_line_height' => '', // em
			'font_heading_5' => 'inherit',
			'font_heading_5_category' => '',
			'font_heading_5_variants' => '',
			'heading_5_weight' => 'normal',
			'heading_5_transform' => 'none',
			'heading_5_font_size' => '',
			'heading_5_line_height' => '', // em
			'font_heading_6' => 'inherit',
			'font_heading_6_category' => '',
			'font_heading_6_variants' => '',
			'heading_6_weight' => 'normal',
			'heading_6_transform' => 'none',
			'heading_6_font_size' => '',
			'heading_6_line_height' => '', // em
			'font_footer' => 'Playfair Display',
			'font_footer_category' => '',
			'font_footer_variants' => 'regular,italic,700,700italic,900,900italic',
			'footer_weight' => 'normal',
			'footer_transform' => 'none',
			'footer_font_size' => '20',
			'font_fixed_side' => 'Playfair Display',
			'font_fixed_side_category' => '',
			'font_fixed_side_variants' => 'regular,italic,700,700italic,900,900italic',
			'fixed_side_font_weight' => 'normal',
			'fixed_side_font_transform' => 'none',
			'fixed_side_font_size' => '18',
		);

		if ( $filter ) {
			return apply_filters( 'parvati_font_option_defaults', $parvati_font_defaults );
		}

		return $parvati_font_defaults;
	}
}

if ( ! function_exists( 'parvati_spacing_get_defaults' ) ) {
	/**
	 * Set the default options.
	 *
	 *
	 * @param bool $filter Whether to return the filtered values or original values.
	 * @return array Option defaults.
	 */
	function parvati_spacing_get_defaults( $filter = true ) {
		$parvati_spacing_defaults = array(
			'top_bar_top' => '6',
			'top_bar_right' => '20',
			'top_bar_bottom' => '3',
			'top_bar_left' => '20',
			'header_top' => '18',
			'header_right' => '20',
			'header_bottom' => '0',
			'header_left' => '20',
			'fixed_side_margin_top' => '250',
			'fixed_side_margin_right'=> '0',
			'fixed_side_margin_bottom' => '0',
			'fixed_side_margin_left' => '0',
			'fixed_side_top' => '20',
			'fixed_side_right' => '4',
			'fixed_side_bottom' => '20',
			'fixed_side_left' => '6',
			'menu_item' => '6',
			'menu_item_height' => '70',
			'sub_menu_item_height' => '10',
			'content_top' => '25',
			'content_right' => '15',
			'content_bottom' => '20',
			'content_left' => '15',
			'mobile_content_top' => '15',
			'mobile_content_right' => '15',
			'mobile_content_bottom' => '15',
			'mobile_content_left' => '15',
			'side_top' => '0',
			'side_right' => '0',
			'side_bottom' => '0',
			'side_left' => '0',
			'mobile_side_top' => '0',
			'mobile_side_right' => '0',
			'mobile_side_bottom' => '0',
			'mobile_side_left' => '0',
			'separator' => '15',
			'left_sidebar_width' => '25',
			'right_sidebar_width' => '25',
			'widget_top' => '20',
			'widget_right' => '20',
			'widget_bottom' => '20',
			'widget_left' => '20',
			'footer_widget_container_top' => '50',
			'footer_widget_container_right' => '30',
			'footer_widget_container_bottom' => '50',
			'footer_widget_container_left' => '30',
			'footer_widget_separator' => '30',
			'footer_top' => '10',
			'footer_right' => '30',
			'footer_bottom' => '10',
			'footer_left' => '30',
		);

		if ( $filter ) {
			return apply_filters( 'parvati_spacing_option_defaults', $parvati_spacing_defaults );
		}

		return $parvati_spacing_defaults;
	}
}

if ( ! function_exists( 'parvati_get_default_color_palettes' ) ) {
	/**
	 * Set up our colors for the color picker palettes and filter them so you can change them.
	 *
	 */
	function parvati_get_default_color_palettes() {
		$palettes = array(
			'#e0a655',
			'#1c0d08',
			'#151515',
			'#252525',
			'#eeeeee',
			'#ffffff'
		);

		return apply_filters( 'parvati_default_color_palettes', $palettes );
	}
}

if ( ! function_exists( 'parvati_typography_default_fonts' ) ) {
	/**
	 * Set the default system fonts.
	 *
	 */
	function parvati_typography_default_fonts() {
		$fonts = array(
			'inherit',
			'System Stack',
			'Arial, Helvetica, sans-serif',
			'Courier New',
			'Georgia, Times New Roman, Times, serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
			'Playfair Display',
			'Cinzel',
			'Merriweather'
		);

		return apply_filters( 'parvati_typography_default_fonts', $fonts );
	}
}

define( 'PARVATI_DEFAULT_FONTS' , '//fonts.googleapis.com/css?family=Merriweather:300,300italic,regular,italic,700,700italic,900,900italic|Cinzel:regular,700,900|Playfair+Display:regular,italic,700,700italic,900,900italic' );
