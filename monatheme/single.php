<?php
$obz = get_queried_object();
if ( $obz->post_type == 'post' ) {
    $header = '2';
} else {
    $header = '';
}
get_header( $header );
while (have_posts()):
    the_post();
    mona_set_post_views(get_the_ID());
    ?>
    <?php
    /**
     * MONA GET LAYOUT - POST
     * CONTEN SINGLE POST - GET SLUG POST TYPE
     * SINGLE-CONTENT-{post_type}
     */
    get_template_part('patch/single-content/single', $obz->post_type);
    ?>
    <?php
endwhile;
get_footer();
?>
