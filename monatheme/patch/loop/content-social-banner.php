<?php
$social_fb = mona_get_option('social_fb');
$social_ld = mona_get_option('social_ld');
$social_yb = mona_get_option('social_yb');
$social_zalo = mona_get_option('social_zalo');
if ( $social_fb || $social_ld || $social_yb || $social_zalo ) {
?>
<ul class="list-social-banner">
    <?php if ( $social_fb ) { ?>
    <li>
        <a target="_blank" href="<?php echo esc_url( $social_fb ) ?>">
            <img src="<?php echo get_site_url() ?>/template/images/icon-fb-banner.png" alt="icon-fb-banner.png">
        </a>
    </li>
    <?php } ?>
    <?php if ( $social_yb ) { ?>
    <li>
        <a target="_blank" href="<?php echo esc_url( $social_yb ) ?>">
            <img src="<?php echo get_site_url() ?>/template/images/icon-youtube-banner.png" alt="icon-fb-banner.png">
        </a>
    </li>
    <?php } ?>
    <?php if ( $social_ld ) { ?>
    <li>
        <a target="_blank" href="<?php echo esc_url( $social_ld ) ?>">
            <img src="<?php echo get_site_url() ?>/template/images/icon-in-banner.png" alt="icon-fb-banner.png">
        </a>
    </li>
    <?php } ?>
    <?php if ( $social_zalo ) { ?>
    <li>
        <a target="_blank" href="<?php echo esc_url( $social_zalo ) ?>">
            <img style="
    max-width: 24px;
    border-radius: 100%;
" src="<?php echo get_site_url() ?>/template/images/zalo-icon-nen-trang.png" alt="icon-fb-banner.png">
        </a>
    </li>
    <?php } ?>
</ul>
<?php } ?>
