<?php
/**
 * Regsiter menu
 */
function mona_register_menu() {
    register_nav_menus(
        [
            'primary-menu' => __('Theme Main Menu', 'monamedia'),
            'footer-menu' => __('Theme Footer Menu', 'monamedia'),
            'top-menu' => __('Theme Top Menu', 'monamedia'),
        ]
    );
}
add_action('after_setup_theme', 'mona_register_menu');

/**
 *Add class menu
 */
function add_menu_parent_class($items) {
    $parents = array();
    foreach ($items as $item) {
        //Check if the item is a parent item
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }

    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            //Add "menu-parent-item" class to parents
            $item->classes[] = 'dropdown';
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'add_menu_parent_class');
