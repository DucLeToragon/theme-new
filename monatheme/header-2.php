<?php

/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @author : monamedia
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <!-- Meta
                ================================================== -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <?php wp_site_icon(); ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" href="<?php echo get_site_url() ?>/template/css/style.css">
    <?php wp_head(); ?>
</head>
<?php
if (wp_is_mobile()) {
    $body = 'mobile-detect';
} else {
    $body = 'desktop-detect';
}
$logo_light = get_theme_mod('custom_logo');
$logo_blue = mona_get_mod_image_id(get_theme_mod('mona_logo_blue'));
$logo_mb_light = mona_get_mod_image_id(get_theme_mod('mona_logo_mb_light'));
$logo_mb_blue = mona_get_mod_image_id(get_theme_mod('mona_logo_mb_blue'));
?>

<body <?php body_class($body); ?> oncopy="return false" oncut="return false" onpaste="return false">
    <div id="page-loading">
        <img src="<?php echo get_site_url() ?>/template/images/logo.png" alt="" />
    </div>
    <header id="header" class="header hd-light">
        <div class="search-overlay" id="search-overlay">
            <div class="search">
                <div class="title-search">
                    <h3 class="title"><?php echo __('Nhập nội dung cần tìm kiếm ở đây', 'monamedia') ?></h3>
                </div>
                <div class="search-box">
                    <form class="frm-search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input class='search-text' name="s" value="<?php echo get_search_query(); ?>" placeholder='<?php echo __('Tìm kiếm', 'monamedia') ?>' type='text' />
                        <button class='search-button' type='submit'>
                            <span><i class="fas fa-search"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="bg-search">
                <div class="btn-close">
                    <i class="far fa-times-circle"></i>
                </div>
            </div>
        </div>
        <div class="header-menu" id="header-menu">
            <div class="container">

                <div class="header-menu-inner">
                    <div class="header-menu-logo">
                        <a href="<?php echo home_url(); ?>" class="custom-logo-link">
                            <?php echo wp_get_attachment_image($logo_light, '400x50', "", ['class' => 'logo-light']) ?>
                            <?php echo wp_get_attachment_image($logo_blue, '400x50', "", ['class' => 'logo-blue']) ?>
                            <?php echo wp_get_attachment_image($logo_mb_blue, '400x50', "", ['class' => 'logo-mb']) ?>
                        </a>
                    </div>
                    <div class="wrapper-menu-right">
                        <?php
                        wp_nav_menu(array(
                            'container' => false,
                            'container_class' => 'header-menu-nav',
                            'menu_class' => 'header-menu-nav',
                            'theme_location' => 'primary-menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'fallback_cb' => false,
                            'add_li_class'  => 'menu__item',
                            'walker' => new Mona_Custom_Walker_Nav_Menu,
                        ));
                        ?>
                        <div class="box-call">
                            <a href="<?php echo get_the_permalink(MONA_LIEN_HE); ?>" class="btn-green btn">
                                <?php echo get_the_title(MONA_LIEN_HE) ?>
                            </a>
                        </div>
                        <div class="box-lang item-menu ">
                            <select class="vodiapicker">
                                <option value="VN" class="test" data-thumbnail="<?php echo get_site_url() ?>/template/images/vn-logo.png">
                                    VN</option>
                                <option value="EN" data-thumbnail="<?php echo get_site_url() ?>/template/images/eng-logo.png">
                                    EN</option>
                            </select>

                            <div class="lang-select">
                                <button class="btn-select" value=""></button>
                                <div class="select-lang">
                                    <ul id="list-select"></ul>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="header-menu-overlay" id="header-menu-overlay"></div>

        </div>
        <div class="header-menu-mb">
            <a href="<?php echo home_url(); ?>" class="custom-logo-link-mb">
                <?php echo wp_get_attachment_image($logo_mb_light, '400x50', "", ['class' => 'logo-mb-light']) ?>
                <?php echo wp_get_attachment_image($logo_mb_blue, '400x50', "", ['class' => 'logo-mb-blue']) ?>
            </a>
            <div class="hamburger hamburger--collapse header-menu-btn" id="header-menu-btn">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>
        <div class="btn-srcoll">
            <i class="fas fa-angle-up"></i>
        </div>
    </header>