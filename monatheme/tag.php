<?php
get_header('2');
$Mona_Load_Field = new Mona_Load_Field();
?>
<main class="main">

    <div class="breadcrumb">
        <div class="container">
            <div class="wrapper-container">
                <?php
                /**
                 * MONA GET LAYOUT - BREADCRUMB
                 */
                get_template_part( 'patch/breadcrumb' );
                ?>
            </div>
        </div>

    </div>

    <div class="sec-new">
        <div class="container">
            <div class="wrapper-container">
                <div class="box-title">
                    <h1 class="txt-title txt-46">
                        <?php echo __( 'Thẻ: ', 'monamedia' ) ?>
                        <?php single_term_title() ?>
                    </h1>
                    <div class="meta-title"><?php echo term_description() ?></div>
                </div>
                <?php
                $argsfeatured = [
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'mona_post_views_count',
                            'value' => 10,
                            'compare' => '>',
                            'type' => 'numeric',
                        )
                    )
                ];
                $queryfeatured = new WP_Query( $argsfeatured );
                if ( $queryfeatured->have_posts() ) :
                while ( $queryfeatured->have_posts() ) :
                    $queryfeatured->the_post();
                    global $post;
                ?>
                <div class="box-new-main" data-aos="fade-up-right">
                    <div class="box-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo $Mona_Load_Field->mona_post_images( $post->ID, ['get_content' => '_image_featured', 'size' => '1900x790'] ); ?>
                        </a>
                    </div>
                    <div class="box-content">
                        <a href="<?php echo get_the_permalink( MONA_BAI_VIET_NOI_BAT ); ?>" class="btn-main btn">
                            <?php echo get_the_title( MONA_BAI_VIET_NOI_BAT ); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>" class="txt-title" title="Đây là tiêu đề Demo">
                            <?php the_title(); ?>
                        </a>
                        <p class="txt-desc">
                            <?php the_excerpt(); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="link-w-100">
                            <?php echo __('Tiếp tục đọc', 'monamedia') ?>
                        </a>
                    </div>
                    <div class="box-bg">
                        <img src="<?php echo get_site_url() ?>/template/images/line-bg.png" alt="line-bg.png">
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_query();
                endif;
                ?>
                <div class="box-new">
                    <div class="box-flex">
                        <?php
                        if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();
                        ?>
                        <div class="col-4" data-aos="fade-up">
                            <?php
                            /**
                             * MONA GET LAYOUT - CONTENT POST
                             * COLUMN
                             */
                            get_template_part( 'patch/loop/content-post', 'column' );
                            ?>
                        </div>
                        <?php
                        endwhile;
                        wp_reset_query();
                        else :
                        ?>
                        <div class="mona-mess-empty">
                            <p><?php echo __( 'Nội dung đang được cập nhật', 'monamedia' ) ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php mona_page_navi(); ?>
                </div>
            </div>
        </div>
    </div>

</main>
<?php get_footer();
