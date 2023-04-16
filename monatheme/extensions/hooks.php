<?php
/**
 * Hook
 * author: Hy hý
 * Add admin ajax url
 */
function mona_filter_admin_url($url, $path, $blog_id){

    if($path=== 'admin-ajax.php' && !is_admin()){

        $url.='?mona-ajax';
    }
    return $url;
}
add_filter('admin_url', 'mona_filter_admin_url', 999,3);

/**
 * function
 * Add icon menu
 */
function mona_wp_nav_menu_objects( $items, $args ) {
	foreach( $items as &$item ) {
		$icon = get_field('top_menu_icon', $item);
		if($icon !='') {
			$item->title = ''.wp_get_attachment_image($icon, '14x14').''.$item->title;
		} else {
			$item->title = '<img src="" alt="">'.$item->title;
        }
	}
	return $items;
}
//add_filter('wp_nav_menu_objects', 'mona_wp_nav_menu_objects', 10, 2);

/**
 * Hook
 */
//add_filter( 'get_custom_logo', 'change_logo_class', 10 );
function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'header-logo', $html );

	$html = str_replace( 'custom-logo', 'header-logo-img', $html );

    return $html;
}
