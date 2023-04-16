<?php

if (class_exists('Kirki')) {

    /**
     * Add sections
     */
    function kirki_demo_scripts() {
        wp_enqueue_style('kirki-demo', get_stylesheet_uri(), array(), time());
    }

    add_action('wp_enqueue_scripts', 'kirki_demo_scripts');
    $priority = 1;
    Kirki::add_panel('panel_theme', array(
            'title' => __('Chức năng giao diện', 'monamedia'),
            'priority' => $priority++,
            'capability' => 'edit_theme_options',
    ));
    Kirki::add_section('section_contact', array(
        'title' => esc_attr__('Thông tin liên hệ', 'monamedia'),
        'priority' => $priority++,
        'capability' => 'edit_theme_options',
        'panel' => 'panel_theme',
    ));
    Kirki::add_section('section_social', array(
        'title' => esc_attr__('Liên kết mạng xã hội', 'monamedia'),
        'priority' => $priority++,
        'capability' => 'edit_theme_options',
        'panel' => 'panel_theme',
    ));
    // Kirki::add_section('section_copyright', array(
    //     'title' => esc_attr__('Copyright', 'monamedia'),
    //     'priority' => $priority++,
    //     'capability' => 'edit_theme_options',
    //     'panel' => 'panel_theme',
    // ));

    /**
     * Add field
     */
    // Kirki::add_field('mona_setting', array(
    //     'type' => 'textarea',
    //     'settings' => 'form_title',
    //     'label' => esc_attr__('Tên nội dung', 'monamedia'),
    //     'description' => '',
    //     'help' => '',
    //     'section' => 'section_form',
    //     'default' => '',
    //     'priority' => $priority++,
    // ));

    /**
     * Add field
     */
    Kirki::add_field('mona_setting', array(
        'type' => 'image',
        'settings' => 'mona_logo_blue',
        'label' => esc_attr__('Logo desktop blue', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'title_tagline',
        'default' => '',
        'priority' => $priority++,
    ));

    Kirki::add_field('mona_setting', array(
        'type' => 'image',
        'settings' => 'mona_logo_mb_light',
        'label' => esc_attr__('Logo mobile light', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'title_tagline',
        'default' => '',
        'priority' => $priority++,
    ));

    Kirki::add_field('mona_setting', array(
        'type' => 'image',
        'settings' => 'mona_logo_mb_blue',
        'label' => esc_attr__('Logo mobile blue', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'title_tagline',
        'default' => '',
        'priority' => $priority++,
    ));

    /**
     * Add field
     */
    Kirki::add_field('mona_setting', array(
        'type' => 'text',
        'settings' => 'social_fb',
        'label' => esc_attr__('Facebook URL', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'section_social',
        'default' => '',
        'priority' => $priority++,
    ));

    Kirki::add_field('mona_setting', array(
        'type' => 'text',
        'settings' => 'social_tw',
        'label' => esc_attr__('Twitter URL', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'section_social',
        'default' => '',
        'priority' => $priority++,
    ));

    Kirki::add_field('mona_setting', array(
        'type' => 'text',
        'settings' => 'social_ld',
        'label' => esc_attr__('Linkedin URL', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'section_social',
        'default' => '',
        'priority' => $priority++,
    ));


    Kirki::add_field('mona_setting', array(
        'type' => 'text',
        'settings' => 'social_yb',
        'label' => esc_attr__('Youtube URL', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'section_social',
        'default' => '',
        'priority' => $priority++,
    ));

    Kirki::add_field('mona_setting', array(
        'type' => 'text',
        'settings' => 'social_zalo',
        'label' => esc_attr__('Zalo URL', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'section_social',
        'default' => '',
        'priority' => $priority++,
    ));

    /**
     * Add field
     */
    Kirki::add_field('mona_setting', array(
        'type' => 'text',
        'settings' => 'contact_tel',
        'label' => esc_attr__('Số điện thoại', 'monamedia'),
        'description' => '',
        'help' => '',
        'section' => 'section_contact',
        'default' => '',
        'priority' => $priority++,
    ));

}
if (!function_exists('mona_option')) {

    function mona_option($setting, $default = '') {
        echo mona_get_option($setting, $default);
    }

    function mona_get_option($setting, $default = '') {
        if (class_exists('Kirki')) {
            $value = $default;
            $options = get_option('option_name', array());
            $options = get_theme_mod($setting, $default);
            if (isset($options)) {
                $value = $options;
            }
            return $value;
        }
        return $default;
    }

}
