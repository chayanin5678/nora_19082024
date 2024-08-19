<?php
/**
 * wp-traveler WordPress Theme, ordasvit.com
 * wp-traveler is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

/**
 * Header styles for this theme
 *
 * @package WordPress
 * @subpackage wp_traveler
 */

//css styles connect to the admin
function wp_traveler_true_style_backend()
{
	wp_enqueue_style('wp_traveler_admin_style', get_stylesheet_directory_uri() . '/css/admin_style.css');
}
add_action('admin_enqueue_scripts', 'wp_traveler_true_style_backend');

function wp_traveler_true_include_in_font()
{
	wp_enqueue_style('wp_traveler_fontawesome', get_stylesheet_directory_uri() . '/css/fontawesome.css');
}
add_action('admin_enqueue_scripts', 'wp_traveler_true_include_in_font');
//css styles connect to the admin



add_action('wp_enqueue_scripts', 'wp_traveler_rigistre_header_styles');
function wp_traveler_rigistre_header_styles()
{

	$os_uri = get_template_directory_uri();

	wp_register_style('wp_traveler_fonts_googleapis_comfortaa', '//fonts.googleapis.com/css?family=Comfortaa:400,300,700|Abel|Dosis:400,200,300,500,600,700,800|Droid+Sans:400,700|Droid+Serif:400,700,400italic,700italic|Dancing+Script:400,700|Francois+One|Lato:400,100,300,400italic,300italic,100italic,700,700italic,900,900italic|Lobster|Lora:400,400italic,700,700italic|Open+Sans+Condensed:300,300italic,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800|Oswald:400,300,700|Oxygen:400,300,700|PT+Sans+Narrow:400,700|PT+Sans:400,400italic,700,700italic|Prosto+One|Quicksand:400,300,700|Roboto+Condensed:400,300,300italic,400italic,700,700italic|Share:400,400italic,700,700italic|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic|Ubuntu+Condensed|Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic|Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic-ext,latin-ext,cyrillic', false);
	wp_enqueue_style('wp_traveler_fonts_googleapis_comfortaa');

	wp_register_style('wp_traveler_fonts_googleapis_oswald', '//fonts.googleapis.com/css?family=Oswald:300,400,700', false);
	wp_enqueue_style('wp_traveler_fonts_googleapis_oswald');

	wp_register_style('wp_traveler_fonts_googleapis_droid', '//fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic', false);
	wp_enqueue_style('wp_traveler_fonts_googleapis_droid');

    wp_register_style('wp_traveler_fontawesome_style', $os_uri . '/css/fontawesome.css', false);
	wp_enqueue_style('wp_traveler_fontawesome_style');

	wp_register_style('wp_traveler_bootstrap_style', $os_uri . '/bootstrap/css/bootstrap.css', true);
	wp_enqueue_style('wp_traveler_bootstrap_style');

	wp_register_style('wp_traveler_bootstrap_style_rtl', $os_uri . '/bootstrap/css/bootstrap.rtl.css', true);
	wp_enqueue_style('wp_traveler_bootstrap_style_rtl');

	if (isset($_REQUEST['tp']) && $_REQUEST['tp']) {
		wp_register_style('wp_traveler_style_positions_preview', $os_uri . '/css/style-positions-preview.css', false);
		wp_enqueue_style('wp_traveler_style_positions_preview');
	}

	wp_register_style('wp_traveler_style_wp', $os_uri . '/css/wp-style.css', false);
	wp_enqueue_style('wp_traveler_style_wp');

	wp_register_style('wp_traveler_style_main', $os_uri . '/style.css', false);
	wp_enqueue_style('wp_traveler_style_main');


?>	
	<style>
		body {
			color:
			<?php if (get_theme_mod('wp_traveler_body_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_body_color'));
			} else {
				echo '#333';
			} ?>;
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_body')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_body'));
			} else {
				echo 'Arial,sans-serif';
			} ?>;
			background-color:
			<?php if (get_theme_mod('wp_traveler_bg_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_bg_color'));
			} else {
				echo 'transparent';
			} ?>;
			<?php if (get_theme_mod('wp_traveler_advanced_body_bg')) { ?>
				background-image: url(<?php echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_body_bg')); ?>;
			<?php } ?>
			background-repeat:
			<?php if (get_theme_mod('wp_traveler_advanced_body_bg_repeat')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_body_bg_repeat'));
			} else {
				echo 'no-repeat';
			} ?>;
		}

		html body {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_body')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_body'));
			} else {
				echo 'Arial,sans-serif';
			} ?>;
		}

		body a {
			color:
			<?php if (get_theme_mod('wp_traveler_link_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_link_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_main_body_links')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_body_links'));
			} else {
				echo 'underline';
			} ?>
			;
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_body_links')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_body_links'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body a:hover {
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_main_body_links_hover_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_body_links_hover_underline'));
			} else {
				echo 'none';
			} ?>
			;
			color:
			<?php if (get_theme_mod('wp_traveler_link_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_link_hover_color'));
			} else {
				echo '#000';
			} ?>
			;
		}

		ul.navbar-nav>li a {
			font-size:
			<?php if (get_theme_mod('wp_traveler_main_menu_font_size')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_menu_font_size'));
			} else {
				echo '12';
			} ?>px;
			color:
			<?php if (get_theme_mod('wp_traveler_main_menu_link_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_menu_link_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_main_menu_link_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_menu_link_underline'));
			} else {
				echo 'none';
			} ?>
			;
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_main_menu_font')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_main_menu_font'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		ul.navbar-nav>li a:hover {
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_main_menu_link_hover_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_menu_link_hover_underline'));
			} else {
				echo 'none';
			} ?>
			;
			color:
			<?php if (get_theme_mod('wp_traveler_main_menu_link_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_main_menu_link_hover_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
		}


		ul#menu-top-menu>li a {
			font-size:
			<?php if (get_theme_mod('wp_traveler_top_menu_font_size')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_top_menu_font_size'));
			} else {
				echo '14';
			} ?>px;
			color:
			<?php if (get_theme_mod('wp_traveler_top_menu_link_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_top_menu_link_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_top_menu_link_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_top_menu_link_underline'));
			} else {
				echo 'none';
			} ?>
			;
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_top_menu_font')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_top_menu_font'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		ul#menu-top-menu>li a:hover {
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_top_menu_link_hover_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_top_menu_link_hover_underline'));
			} else {
				echo 'none';
			} ?>
			;
			color:
			<?php if (get_theme_mod('wp_traveler_top_menu_link_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_top_menu_link_hover_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
		}

		ul#menu-footer-menu>li>a {
			font-size:
			<?php if (get_theme_mod('wp_traveler_footer_menu_font_size')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_menu_font_size'));
			} else {
				echo '14';
			} ?>px;
			color:
			<?php if (get_theme_mod('wp_traveler_footer_menu_link_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_menu_link_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_footer_menu_link_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_menu_link_underline'));
			} else {
				echo 'none';
			} ?>
			;
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_footer_menu_font')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_footer_menu_font'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		ul#menu-footer-menu>li>a:hover {
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_footer_menu_link_hover_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_menu_link_hover_underline'));
			} else {
				echo 'none';
			} ?>
			;
			color:
			<?php if (get_theme_mod('wp_traveler_footer_menu_link_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_menu_link_hover_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
		}


		div#copyright a {
			font-size:
			<?php if (get_theme_mod('wp_traveler_copyright_font_size')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_copyright_font_size'));
			} else {
				echo '14';
			} ?>px;
			color:
			<?php if (get_theme_mod('wp_traveler_copyright_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_copyright_color'));
			} else {
				echo '#ccc';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_copyright_link_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_copyright_link_underline'));
			} else {
				echo 'none';
			} ?>
			;
		}

		div#copyright a:hover {
			color:
			<?php if (get_theme_mod('wp_traveler_copyright_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_copyright_hover_color'));
			} else {
				echo '#ccc';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_copyright_link_hover_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_copyright_link_hover_underline'));
			} else {
				echo 'none';
			} ?>
			;
		}

		.soc_links a {
			font-size:
			<?php if (get_theme_mod('wp_traveler_social_links_font_size')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_social_links_font_size'));
			} else {
				echo '14';
			} ?>px;
			color:
			<?php if (get_theme_mod('wp_traveler_social_links_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_social_links_color'));
			} else {
				echo '#ccc';
			} ?>
			;
		}

		.soc_links a:hover {
			color:
			<?php if (get_theme_mod('wp_traveler_social_links_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_social_links_hover_color'));
			} else {
				echo '#ccc';
			} ?>
			;
		}

		/*
		.site-footer a {
			color:
			<?php if (get_theme_mod('wp_traveler_footer_link_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_link_color'));
			} else {
				echo '#1E73BE';
			} ?>
		;
		text-decoration:
		<?php if (get_theme_mod('wp_traveler_footer_links_underline')) {
			echo sanitize_text_field(get_theme_mod('wp_traveler_footer_links_underline'));
		} else {
			echo 'none';
		} ?>
		;
		}

		.site-footer a:hover {
			color:
			<?php if (get_theme_mod('wp_traveler_footer_link_hover_color')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_link_hover_color'));
			} else {
				echo '#1E73BE';
			} ?>
			;
			text-decoration:
			<?php if (get_theme_mod('wp_traveler_footer_links_hover_underline')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_footer_links_hover_underline'));
			} else {
				echo 'none';
			} ?>
			;
		}

		body h1 {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h1')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h1'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body h2 {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h2')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h2'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body h3 {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h3')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h3'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body h4 {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h4')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h4'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body h5 {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h5')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h5'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body h6 {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h6')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h6'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		body {
			font-family:
			<?php if (get_theme_mod('wp_traveler_advanced_typography_h6')) {
				echo sanitize_text_field(get_theme_mod('wp_traveler_advanced_typography_h6'));
			} else {
				echo 'Arial,sans-serif';
			} ?>
			;
		}

		.site-header {
			<?php if (!is_front_page())
				echo "background:none;"; ?>
		}

		#header {
			<?php if (is_front_page())
				echo "padding-bottom:117px;"; ?>
		}
	</style>
<?php	
}


