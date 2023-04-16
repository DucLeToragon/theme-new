<?php
if(is_user_logged_in()) {
    if(get_current_user_id() == 1) {
        define('ACF_LITE', false);
    } else {
        define('ACF_LITE', true);
    }
} else {
    define('ACF_LITE', true);
}
define( 'MONA_PAGE_HOME', get_option( 'page_on_front', true ) );
define( 'MONA_PAGE_BLOG', get_option( 'page_for_posts', true ) );
define('MONA_LIEN_HE', url_to_postid( get_the_permalink( 20 ) ));
define('MONA_QUY_TRINH_SAN_XUAT', url_to_postid( get_the_permalink( 16 ) ));
define('MONA_SAN_PHAM', url_to_postid( get_the_permalink( 18 ) ));
define('MONA_VE_CHUNG_TOI', url_to_postid( get_the_permalink( 14 ) ));
define('MONA_BAI_VIET_NOI_BAT', url_to_postid( get_the_permalink( 59 ) ));
/**
 * Add core
 */
require_once( get_template_directory() . '/core/class/core.class.php' );
require_once( get_template_directory() . '/core/class/Mona_walker.php' );
require_once( get_template_directory() . '/core/class/hook.class.php' );
require_once( get_template_directory() . '/core/customizer.php' );

/**
 * Add include
 */
require_once( get_template_directory() . '/includes/functions.php' );
require_once( get_template_directory() . '/includes/ajax.php' );

/**
 * Add extension
 */
require_once( get_template_directory() . '/extensions/autoload.php' );

/**
 * Add widgets
 */
require_once( get_template_directory() . '/widgets/autoload.php' );

/**
 * Fields Class
 */
require_once( get_template_directory() . '/extensions/Fields_Class/Posts_class.php' );
require_once( get_template_directory() . '/extensions/Fields_Class/Categorys_class.php' );
require_once( get_template_directory() . '/extensions/Fields_Class/Pages_class.php' );
