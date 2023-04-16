<?php
/**
 * Add enqueue css, js
 */
function mona_style() {
    wp_enqueue_style('mona-custom', get_template_directory_uri() . '/css/mona-custom.css');
    wp_enqueue_style('mona-loading-btn', get_template_directory_uri() . '/css/loading-btn.css');
    wp_enqueue_style('mona-loading-group', get_template_directory_uri() . '/css/loading-group.css');
    wp_enqueue_style('mona-custom-not-found', get_template_directory_uri() . '/css/404.css');
    wp_enqueue_script('mona-front', get_template_directory_uri() . '/js/front.js', array(), false, true);
    wp_enqueue_script('mona-sweetalert', get_template_directory_uri() . '/js/sweetalert.min.js', array(), false, true);
    wp_localize_script('mona-front', 'mona_ajax_url', array(
        'ajaxURL' => admin_url('admin-ajax.php'),
        'siteURL' => get_site_url(),
    ));
}
add_action('wp_enqueue_scripts', 'mona_style');
