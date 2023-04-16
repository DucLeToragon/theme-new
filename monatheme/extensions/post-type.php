<?php
/**
 * Add custom post type
 */
function mona_hook_add_custom_post() {

    $products = array(
        'labels' => array(
            'name' => 'Sản phẩm',
            'singular_name' => 'Sản phẩm',
            'all_items' => __('Tất cả bài viết', 'monamedia'),
            'add_new' => __('Viết bài mới', 'monamedia'),
            'add_new_item' => __('Bài viết mới', 'monamedia'),
            'edit_item' => __('Chỉnh sửa bài viết', 'monamedia'),
            'new_item' => __('Thêm bài viết', 'monamedia'),
            'view_item' => __('Xem bài viết', 'monamedia'),
            'view_items' => __('Xem bài viết', 'monamedia'),
        ),
        'description' => 'Thêm bài viết',
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
            'excerpt',
        ),
        'taxonomies' => array('category_product', 'category_product_type', 'category_product_size'),
        'hierarchical' => false,
		'show_in_rest' => true,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'product',
            'with_front' => true
        ),
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    );
    register_post_type('mona_product', $products);

    $tax_products = array(
        'labels' => array(
            'name' => __('Danh mục - Sản phẩm', 'monamedia'),
            'singular_name' => __('Danh mục - Sản phẩm', 'monamedia'),
            'search_items' => __('Tìm kiếm', 'monamedia'),
            'all_items' => __('Tất cả', 'monamedia'),
            'parent_item' => __('Danh mục Sản phẩm', 'monamedia'),
            'parent_item_colon' => __('Danh mục Sản phẩm', 'monamedia'),
            'edit_item' => __('Chỉnh sửa', 'monamedia'),
            'add_new' => __('Thêm mới', 'monamedia'),
            'update_item' => __('Cập nhật', 'monamedia'),
            'add_new_item' => __('Thêm mới', 'monamedia'),
            'new_item_name' => __('Thêm mới', 'monamedia'),
            'menu_name' => __('Danh mục', 'monamedia'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'has_archive' => true,
        'public' => true,
        'rewrite' => array(
            'slug' => 'products',
            'with_front' => true
        ),
        'capabilities' => array(
            'manage_terms' => 'publish_posts',
            'edit_terms' => 'publish_posts',
            'delete_terms' => 'publish_posts',
            'assign_terms' => 'publish_posts',
        ),
    );
    register_taxonomy('category_product', 'mona_product', $tax_products);

    $tax_types = array(
        'labels' => array(
            'name' => __('Danh mục - Loại', 'monamedia'),
            'singular_name' => __('Danh mục - Loại', 'monamedia'),
            'search_items' => __('Tìm kiếm', 'monamedia'),
            'all_items' => __('Tất cả', 'monamedia'),
            'parent_item' => __('Danh mục Loại', 'monamedia'),
            'parent_item_colon' => __('Danh mục Loại', 'monamedia'),
            'edit_item' => __('Chỉnh sửa', 'monamedia'),
            'add_new' => __('Thêm mới', 'monamedia'),
            'update_item' => __('Cập nhật', 'monamedia'),
            'add_new_item' => __('Thêm mới', 'monamedia'),
            'new_item_name' => __('Thêm mới', 'monamedia'),
            'menu_name' => __('Loại', 'monamedia'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'has_archive' => true,
        'public' => true,
        'rewrite' => array(
            'slug' => 'product_type',
            'with_front' => true
        ),
        'capabilities' => array(
            'manage_terms' => 'publish_posts',
            'edit_terms' => 'publish_posts',
            'delete_terms' => 'publish_posts',
            'assign_terms' => 'publish_posts',
        ),
    );
    register_taxonomy('category_product_type', 'mona_product', $tax_types);

    $tax_sizes = array(
        'labels' => array(
            'name' => __('Danh mục - Kích thước', 'monamedia'),
            'singular_name' => __('Danh mục - Kích thước', 'monamedia'),
            'search_items' => __('Tìm kiếm', 'monamedia'),
            'all_items' => __('Tất cả', 'monamedia'),
            'parent_item' => __('Danh mục Kích thước', 'monamedia'),
            'parent_item_colon' => __('Danh mục Kích thước', 'monamedia'),
            'edit_item' => __('Chỉnh sửa', 'monamedia'),
            'add_new' => __('Thêm mới', 'monamedia'),
            'update_item' => __('Cập nhật', 'monamedia'),
            'add_new_item' => __('Thêm mới', 'monamedia'),
            'new_item_name' => __('Thêm mới', 'monamedia'),
            'menu_name' => __('Kích thước', 'monamedia'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'has_archive' => true,
        'public' => true,
        'rewrite' => array(
            'slug' => 'product_size',
            'with_front' => true
        ),
        'capabilities' => array(
            'manage_terms' => 'publish_posts',
            'edit_terms' => 'publish_posts',
            'delete_terms' => 'publish_posts',
            'assign_terms' => 'publish_posts',
        ),
    );
    register_taxonomy('category_product_size', 'mona_product', $tax_sizes);

    flush_rewrite_rules();
}

add_action('init', 'mona_hook_add_custom_post');


/**
 * Add custom slug taxonomy
 *
 */
function mona_custom_linhvuc_tax_slug_args( $taxonomy, $object_type, $args ){
    // if( 'linhvuc_tax' == $taxonomy ){
    //     remove_action( current_action(), __FUNCTION__ );
    //     $args['rewrite'] = array( 'slug' => 'loai-linh-vuc' );
    //     register_taxonomy( $taxonomy, $object_type, $args );
    // }
}
//add_action( 'registered_taxonomy', 'mona_custom_linhvuc_tax_slug_args', 10, 3 );
