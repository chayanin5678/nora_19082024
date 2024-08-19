<?php
/**
 * wp-traveler WordPress Theme, ordasvit.com
 * wp-traveler is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

function wp_traveler_register_theme_customizer($wp_customize)
{

    /**
     * Site Title & Description.
     * */
    $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial(
        'blogname',
        array(
            'selector'        => '.site-title a',
            'render_callback' => 'wp_traveler_customize_partial_blogname',
        )
    );

    $wp_customize->selective_refresh->add_partial(
        'blogdescription',
        array(
            'selector'        => '.site-description',
            'render_callback' => 'wp_traveler_customize_partial_blogdescription',
        )
    );

    $wp_customize->selective_refresh->add_partial(
        'custom_logo',
        array(
            'selector'            => '.header-titles [class*=site-]:not(.site-description)',
            'render_callback'     => 'wp_traveler_customize_partial_site_logo',
            'container_inclusive' => true,
        )
    );


    //Main Menu------------------------------------------------------------------
    $wp_customize->add_section(
        'wp_traveler_advanced_main_menu',
        array('title' => __('Main menu', 'wp-traveler'), 'priority' => 1)
    );
    //font size----------------------
    $wp_customize->add_setting(
        'wp_traveler_main_menu_font_size',
        array(
            'default' => '12', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_font_size',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'main_menu_font_size',
            array(
                'label' => __('Main Menu font size', 'wp-traveler'),
                'settings' => 'wp_traveler_main_menu_font_size',
                'section' => 'wp_traveler_advanced_main_menu',
                'priority' => 1
            )
        )
    );
    //Main Menu Link Color------------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_main_menu_link_color',
        array(
            'default' => '#92999E',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_menu_link_color',
            array(
                'label' => __('Main Menu Link Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_main_menu',
                'settings' => 'wp_traveler_main_menu_link_color',
                'priority' => 2
            )
        )
    );
    //Main Menu Link Hover Color-------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_main_menu_link_hover_color',
        array(
            'default' => '#12abff', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color')
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_menu_link_hover_color',
            array(
                'label' => __('Main Menu Link Hover Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_main_menu',
                'settings' => 'wp_traveler_main_menu_link_hover_color',
                'priority' => 3
            )
        )
    );
    //link underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_main_menu_link_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'main_menu_link_underline',
            array(
                'label' => __('Main menu links underline', 'wp-traveler'),
                'settings' => 'wp_traveler_main_menu_link_underline',
                'section' => 'wp_traveler_advanced_main_menu',
                'type' => 'radio',
                'priority' => 4,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );
    //link hover underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_main_menu_link_hover_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'main_menu_link_hover_underline',
            array(
                'label' => __('Main menu links hover underline', 'wp-traveler'),
                'settings' => 'wp_traveler_main_menu_link_hover_underline',
                'section' => 'wp_traveler_advanced_main_menu',
                'type' => 'radio',
                'priority' => 5,
                'choices' => array(
                    'none' => 'no',
                    'underline' => 'yes'
                )
            )
        )
    );

    //Top Menu-------------------------------------------------------------------------

    $wp_customize->add_section(
        'wp_traveler_advanced_top_menu',
        array('title' => __('Top menu', 'wp-traveler'), 'priority' => 2)
    );
    $wp_customize->add_setting(
        'wp_traveler_top_menu_font_size',
        array(
            'default' => '12', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_font_size',
            )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'top_menu_font_size',
            array(
                'label' => __('Top menu font size', 'wp-traveler'),
                'settings' => 'wp_traveler_top_menu_font_size',
                'section' => 'wp_traveler_advanced_top_menu',
                'priority' => 1
            )
        )
    );

    //Top Menu Link Color------------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_top_menu_link_color',
        array(
            'default' => '#92999e', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_menu_link_color',
            array(
                'label' => __('Top Menu Link Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_top_menu',
                'settings' => 'wp_traveler_top_menu_link_color',
                'priority' => 2
            )
        )
    );
    //Top Menu Link Hover Color-------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_top_menu_link_hover_color',
        array(
            'default' => '#12abff', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_menu_link_hover_color',
            array(
                'label' => __('Top Menu Link Hover Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_top_menu',
                'settings' => 'wp_traveler_top_menu_link_hover_color',
                'priority' => 3
            )
        )
    );

    //link underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_top_menu_link_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'eswp_traveler_sanitize_link_underlinec_attr'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'top_menu_link_underline',
            array(
                'label' => __('Top menu links underline', 'wp-traveler'),
                'settings' => 'wp_traveler_top_menu_link_underline',
                'section' => 'wp_traveler_advanced_top_menu',
                'type' => 'radio',
                'priority' => 4,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );
    //link hover underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_top_menu_link_hover_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'top_menu_link_hover_underline',
            array(
                'label' => __('Top menu links hover underline', 'wp-traveler'),
                'settings' => 'wp_traveler_top_menu_link_hover_underline',
                'section' => 'wp_traveler_advanced_top_menu',
                'type' => 'radio',
                'priority' => 5,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );

    //Footer Menu------------------------------------------------------------

    $wp_customize->add_section(
        'wp_traveler_advanced_footer_menu',
        array('title' => __('Footer menu', 'wp-traveler'), 'priority' => 3)
    );
    $wp_customize->add_setting(
        'wp_traveler_footer_menu_font_size',
        array(
            'default' => '12', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_font_size',
            )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'footer_menu_font_size',
            array(
                'label' => __('Footer menu font size', 'wp-traveler'),
                'settings' => 'wp_traveler_footer_menu_font_size',
                'section' => 'wp_traveler_advanced_footer_menu',
                'priority' => 1
            )
        )
    );

    //Footer Menu Link Color------------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_footer_menu_link_color',
        array(
            'default' => '#92999e', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_menu_link_color',
            array(
                'label' => __('Footer Menu Link Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_footer_menu',
                'settings' => 'wp_traveler_footer_menu_link_color',
                'priority' => 2
            )
        )
    );
    //Footer Menu Link Hover Color-------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_footer_menu_link_hover_color',
        array(
            'default' => '#12abff', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_menu_link_hover_color',
            array(
                'label' => __('Footer Menu Link Hover Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_footer_menu',
                'settings' => 'wp_traveler_footer_menu_link_hover_color',
                'priority' => 3
            )
        )
    );

    //link underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_footer_menu_link_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'footer_menu_link_underline',
            array(
                'label' => __('Footer menu links underline', 'wp-traveler'),
                'settings' => 'wp_traveler_footer_menu_link_underline',
                'section' => 'wp_traveler_advanced_footer_menu',
                'type' => 'radio',
                'priority' => 4,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );
    //link hover underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_footer_menu_link_hover_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'footer_menu_link_hover_underline',
            array(
                'label' => __('Footer menu links hover underline', 'wp-traveler'),
                'settings' => 'wp_traveler_footer_menu_link_hover_underline',
                'section' => 'wp_traveler_advanced_footer_menu',
                'type' => 'radio',
                'priority' => 5,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );


    //Body links---------------------------------------------------------------------------
    $wp_customize->add_section(
        'wp_traveler_advanced_body_links',
        array('title' => __('Body Links', 'wp-traveler'), 'priority' => 5)
    );
    
    $wp_customize->add_setting(
        'wp_traveler_main_body_links',
        array(
            'default' => 'underline', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'body_links_underline',
            array(
                'label' => __('Body links underline', 'wp-traveler'),
                'settings' => 'wp_traveler_main_body_links',
                'section' => 'wp_traveler_advanced_body_links',
                'type' => 'radio',
                'priority' => 3,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );

    // Body Link Color--------------------------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_link_color',
        array(
            'default' => '#92999e', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label' => __('Link Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_body_links',
                'settings' => 'wp_traveler_link_color',
                'priority' => 1
            )
        )
    );
    //Body Link Hover Color---------------------------------------------------
    $wp_customize->add_setting(
        'wp_traveler_link_hover_color',
        array(
            'default' => '#12abff', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover_color',
            array(
                'label' => __('Link Hover Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_body_links',
                'settings' => 'wp_traveler_link_hover_color',
                'priority' => 2
            )
        )
    );


    $wp_customize->add_setting(
        'wp_traveler_main_body_links_hover_underline',
        array(
            'default' => 'underline', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'body_links_hover_underline',
            array(
                'label' => __('Body links hover underline', 'wp-traveler'),
                'settings' => 'wp_traveler_main_body_links_hover_underline',
                'section' => 'wp_traveler_advanced_body_links',
                'type' => 'radio',
                'priority' => 4,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );

    //Typography---------------------------------------------------------------------------------------

    $wp_customize->add_section(
        'wp_traveler_advanced_typography',
        array('title' => __('Typography', 'wp-traveler'), 'priority' => 8)
    );
    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_body',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'body_font',
            array(
                'label' => __('Body Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_body',
                'priority' => 1,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_body_links',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'body_links_font',
            array(
                'label' => __('Body Links Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_body_links',
                'priority' => 2,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_main_menu_font',
        array(
            'default' => 'Arial,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'main_menu_links_font',
            array(
                'label' => __('Main Menu Links Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_main_menu_font',
                'priority' => 3,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_top_menu_font',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'top_menu_links_font',
            array(
                'label' => __('Top Menu Links Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_top_menu_font',
                'priority' => 4,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_footer_menu_font',
        array(
            'default' => 'Arial,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'footer_menu_links_font',
            array(
                'label' => __('Footer Menu Links Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_footer_menu_font',
                'priority' => 4,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_h1',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'h1_font',
            array(
                'label' => __('h1 Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_h1',
                'priority' => 5,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_h2',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'h2_font',
            array(
                'label' => __('h2 Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_h2',
                'priority' => 6,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_h3',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'h3_font',
            array(
                'label' => __('h3 Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_h3',
                'priority' => 7,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_h4',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'h4_font',
            array(
                'label' => __('h4 Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_h4',
                'priority' => 8,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_h5',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'h5_font',
            array(
                'label' => __('h5 Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_h5',
                'priority' => 9,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    $wp_customize->add_setting(
        'wp_traveler_advanced_typography_h6',
        array(
            'default' => 'Abel,sans-serif', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'h6_font',
            array(
                'label' => __('h6 Font', 'wp-traveler'),
                'settings' => 'wp_traveler_advanced_typography_h6',
                'priority' => 10,
                'section' => 'wp_traveler_advanced_typography',
                'type' => 'select',
                'choices' => array(
                    "Abel,sans-serif" => "Abel",
                    "Arial,sans-serif" => "Arial",
                    "Comfortaa" => "Comfortaa",
                    "Dancing Script,cursive" => "Dancing Script",
                    "Dosis,sans-serif" => "Dosis",
                    "Droid Sans,sans-serif" => "Droid Sans",
                    "Droid Serif,sans-serif" => "Droid Serif",
                    "Francois One,sans-serif" => "Francois One",
                    "Georgia,serif" => "Georgia",
                    "Helvetica,sans-serif" => "Helvetica",
                    "Lato,sans-serif" => "Lato",
                    "Lobster,sans-serif" => "Lobster",
                    "Lora,sans-serif" => "Lora",
                    "Open Sans Condensed,sans-serif" => "Open Sans Condensed",
                    "Open Sans,sans-serif" => "Open Sans",
                    "Oswald,sans-serif" => "Oswald",
                    "Oxygen,sans-serif" => "Oxygen",
                    "PT Sans Narrow,sans-serif" => "PT Sans Narrow",
                    "PT Sans" => "PT Sans",
                    "Prosto One,cursive" => "Prosto One",
                    "Quicksand,sans-serif" => "Quicksand",
                    "Roboto Condensed, sans-serif" => "Roboto Condensed",
                    "Roboto,sans-serif" => "Roboto",
                    "Share,cursive" => "Share",
                    "Source Sans Pro,sans-serif" => "Source Sans Pro",
                    "Times New Roman,sans-serif" => "Times New Roman",
                    "Ubuntu Condensed,sans-serif" => "Ubuntu Condensed",
                    "Ubuntu,sans-serif" => "Ubuntu",
                    "Verdana,sans-serif" => "Verdana"
                )
            )
        )
    );

    //Social icons
    $wp_customize->add_section(
        'wp_traveler_advanced_social_links',
        array('title' => __('Social Links', 'wp-traveler'), 'priority' => 120)
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_facebook',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_twitter',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_skype',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_whatsapp',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_tiktok',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_snapshat',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_youtube_play',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_instagram',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_linkedin',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_social_links_telegram',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );

    //Social links Font Size
    $wp_customize->add_setting(
        'wp_traveler_social_links_font_size',
        array('default' => '18', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_font_size'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_links_font_size',
            array(
                'label' => __('Social Links font size', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_font_size',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 1
            )
        )
    );

    // Social link color
    $wp_customize->add_setting(
        'wp_traveler_social_links_color',
        array(
            'default' => '#92999e', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'social_links_link_color',
            array(
                'label' => __('Social Links Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_social_links',
                'settings' => 'wp_traveler_social_links_color',
                'priority' => 2
            )
        )
    );

    // Social link hover color
    $wp_customize->add_setting(
        'wp_traveler_social_links_hover_color',
        array(
            'default' => '#12abff', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'social_links_link_hover_color',
            array(
                'label' => __('Social Links Hover Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_social_links',
                'settings' => 'wp_traveler_social_links_hover_color',
                'priority' => 3
            )
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'facebook',
            array(
                'label' => __('Facebook', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_facebook',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 4
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'twitter',
            array(
                'label' => __('Twitter', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_twitter',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 5
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'skype',
            array(
                'label' => __('Skype', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_skype',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 6
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whatsapp',
            array(
                'label' => __('Whatsapp', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_whatsapp',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 7
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'google',
            array(
                'label' => __('Google', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_google',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 8
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tiktok',
            array(
                'label' => __('Tiktok', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_tiktok',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 9
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'snapchat',
            array(
                'label' => __('Snapchat', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_snapshat',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 10
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'youtube_play',
            array(
                'label' => __('Youtube play', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_youtube_play',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 11
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'Instagram',
            array(
                'label' => __('Instagram', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_instagram',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 12
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'Linkedin',
            array(
                'label' => __('Linkedin', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_linkedin',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 13
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'telegram',
            array(
                'label' => __('Telegram', 'wp-traveler'),
                'settings' => 'wp_traveler_social_links_telegram',
                'section' => 'wp_traveler_advanced_social_links',
                'priority' => 14
            )
        )
    );


    //Copyright-------------------------------------------------------
    $wp_customize->add_section(
        'wp_traveler_advanced_copyright',
        array('title' => __('Copyright', 'wp-traveler'), 'priority' => 160)
    );
    $wp_customize->add_setting(
        'wp_traveler_copyright',
        array(
            'default' => '', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_setting(
        'wp_traveler_copyright_link',
        array(
            'default' => '', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_url'
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'copyright',
            array(
                'label' => __('Copyright', 'wp-traveler'),
                'settings' => 'wp_traveler_copyright',
                'section' => 'wp_traveler_advanced_copyright',
                'priority' => 1
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'copyright_link',
            array(
                'label' => __('Copyright link', 'wp-traveler'),
                'settings' => 'wp_traveler_copyright_link',
                'section' => 'wp_traveler_advanced_copyright',
                'priority' => 2
            )
        )
    );


    // Copyright link color
    $wp_customize->add_setting(
        'wp_traveler_copyright_color',
        array(
            'default' => '#949698', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_link_color',
            array(
                'label' => __('Copyright Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_copyright',
                'settings' => 'wp_traveler_copyright_color',
                'priority' => 4
            )
        )
    );

    // Copyright link hover color
    $wp_customize->add_setting(
        'wp_traveler_copyright_hover_color',
        array(
            'default' => '#949698', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_link_hover_color',
            array(
                'label' => __('Copyright Hover Color', 'wp-traveler'),
                'section' => 'wp_traveler_advanced_copyright',
                'settings' => 'wp_traveler_copyright_hover_color',
                'priority' => 5
            )
        )
    );

    //font size----------------------
    $wp_customize->add_setting(
        'wp_traveler_copyright_font_size',
        array('default' => '14', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_font_size'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'copyright_font_size',
            array(
                'label' => __('Copyright Font Size', 'wp-traveler'),
                'settings' => 'wp_traveler_copyright_font_size',
                'section' => 'wp_traveler_advanced_copyright',
                'priority' => 6
            )
        )
    );

    //link underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_copyright_link_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'copyright_link_underline',
            array(
                'label' => __('Copyright links underline', 'wp-traveler'),
                'settings' => 'wp_traveler_copyright_link_underline',
                'section' => 'wp_traveler_advanced_copyright',
                'type' => 'radio',
                'priority' => 7,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );
    //link hover underline----------------------
    $wp_customize->add_setting(
        'wp_traveler_copyright_link_hover_underline',
        array(
            'default' => 'none', 
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_traveler_sanitize_link_underline'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'copyright_link_hover_underline',
            array(
                'label' => __('Copyright links hover underline', 'wp-traveler'),
                'settings' => 'wp_traveler_copyright_link_hover_underline',
                'section' => 'wp_traveler_advanced_copyright',
                'type' => 'radio',
                'priority' => 8,
                'choices' => array('none' => 'no', 'underline' => 'yes')
            )
        )
    );

}
add_action('customize_register', 'wp_traveler_register_theme_customizer');

/**
 * PARTIAL REFRESH FUNCTIONS
 * */
if ( ! function_exists( 'wp_traveler_customize_partial_blogname' ) ) {
    /**
     * Render the site title for the selective refresh partial.
     */
    function wp_traveler_customize_partial_blogname() {
        bloginfo( 'name' );
    }
}

if ( ! function_exists( 'wp_traveler_customize_partial_blogdescription' ) ) {
    /**
     * Render the site description for the selective refresh partial.
     */
    function wp_traveler_customize_partial_blogdescription() {
        bloginfo( 'description' );
    }
}

if ( ! function_exists( 'wp_traveler_customize_partial_site_logo' ) ) {
    /**
     * Render the site logo for the selective refresh partial.
     *
     * Doing it this way so we don't have issues with `render_callback`'s arguments.
     */
    function wp_traveler_customize_partial_site_logo() {
        wp_traveler_site_logo();
    }
}
