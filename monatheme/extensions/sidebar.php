<?php
/**
 * Add sidebar
 */
function mona_register_sidebars() {

    register_sidebar(array(
        'id' => '_footer_1',
        'name' => __('Footer 1', 'mona_media'),
        'description' => __('Widget hiển thị nội dung footer 1', 'mona_media'),
        'before_widget' => '<div id="%1$s" class="widget wrapper-col mona-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="mona-widget-label txt-title txt-upcase txt-24">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => '_footer_2',
        'name' => __('Footer 2', 'mona_media'),
        'description' => __('Widget hiển thị nội dung footer 2', 'mona_media'),
        'before_widget' => '<div id="%1$s" class="widget mona-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="mona-widget-label txt-title txt-upcase txt-24">',
        'after_title' => '</h4>',
    ));

}
add_action('widgets_init', 'mona_register_sidebars');
