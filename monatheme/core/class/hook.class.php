<?php

class Mona_hook {

    public function __construct() {
        add_filter('pre_get_posts', [$this, 'prefix_limit_post_types_in_search']);
        add_filter('wpcf7_autop_or_not', '__return_false');
    }

    public function prefix_limit_post_types_in_search($query) {
        if (!is_admin()) {
            $query->set('ignore_sticky_posts', true);
            $ptype = $query->get('post_type', true);
            $ptype = (array) $ptype;

            // if (isset($_GET['s'])) {
            //     $ptype[] = 'product';
            //     $query->set('post_type', $ptype);
            //     $query->set( 'posts_per_page' , 6);
            // }

            if ($query->is_main_query() && $query->is_tax('category_product')) {
                $ptype[] = 'mona_product';
                $query->set('post_type', $ptype);
                $query->set('posts_per_page', 12);
            }
        }

        return $query;
    }

}

new Mona_hook();
