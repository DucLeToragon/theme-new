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

    <section class="sec-new-detail">
        <div class="container">
            <div class="wrapper-container">
                <div class="box-flex">
                    <div class="col-8">
                        <div class="content-new-detail " data-aos="fade-right">
                            <!-- <div class="wrapper-img">
                                <?php //the_post_thumbnail( '930x560' ) ?>
                            </div> -->
                            <h1 class="txt-title txt-40"><?php the_title(); ?></h1>
                            <div class="box-info-new">
                                <p class="txt-day">
                                    <img src="<?php echo get_site_url() ?>/template/images/icon-caledar.svg"
                                        alt="icon-caledar.svg">
                                    <?php echo get_the_title() ?>
                                </p>
                                <p class="txt-info">
                                    <img src="<?php echo get_site_url() ?>/template/images/icon-man-user.svg"
                                        alt="icon-man-user.svg">
                                    <?php echo __( 'Được đăng bởi', 'monamedia' ) ?>
                                    <?php the_author(); ?>
                                </p>
                            </div>
                            <div class="wrapper-content mona-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="box-ft-new">
                                <div class="box-left-right">
                                    <?php
                                    $tagspost = get_the_terms( get_the_ID(), 'post_tag' );
                                    if ( ! empty( $tagspost ) ) {
                                    ?>
                                    <div class="wrapper-left">
                                        <span class="bold"><?php echo __('TAGS:', 'monamedia') ?></span>
                                        <span class="blog-info-tag">
                                            <?php
                                            foreach ( $tagspost as $key => $item ) {
                                                echo '<strong>'.$item->name.'</strong>';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <?php } ?>
                                    <!-- <div class="wrapper-right">
                                        <div class="box-share">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                                <span>Chia sẻ 20</span>
                                            </a>

                                        </div>
                                        <div class="box-like">
                                            <a href="#">
                                                <i class="fas fa-thumbs-up"></i>
                                                <span>Thích 20</span>
                                            </a>

                                        </div>
                                        <div class="box-luu">
                                            <a href="#">
                                                <i class="fas fa-bookmark"></i>
                                                <span>Lưu vào Facebook</span>
                                            </a>

                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="wrapper-sidebar-new" data-aos="fade-left">
                            <?php
                            $argsfeatured = [
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 1,
                                'post__not_in' => [get_the_ID()],
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
                            ?>
                            <div class="box-new-noibat">
                                <h3 class="txt-title">
                                    <?php echo __( 'Bài viết nổi bật', 'monamedia' ) ?>
                                </h3>
                                <div class="box-new-v">
                                    <div class="box-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( '360x210' ) ?>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <a href="<?php the_permalink(); ?>" class="link-w-0">
                                            <?php the_title(); ?>
                                        </a>
                                        <span class="txt-day">
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <div class="txt-desc">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile;
                            wp_reset_query();
                            endif;
                            ?>
                            <?php
                            $argspost = [
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 3,
                                'post__not_in' => [get_the_ID()],
                                'tax_query' => [
                                    'relation' => 'AND',
                                        [
                                            'taxonomy' => 'category',
                                            'field' => 'term_id',
                                            'terms' => get_post_term_ids( get_the_ID(), 'category' ),
                                        ]
                                ]
                            ];
                            $querypost = new WP_Query( $argspost );
                            if ( $querypost->have_posts() ) :
                            ?>
                            <div class="box-new-lienquan">
                                <div class="wrapper-box">
                                    <h3 class="txt-title">
                                        <?php echo __( 'Các bài viết liên quan', 'monamedia' ) ?>
                                    </h3>
                                    <div class="wrapper-row">
                                        <?php
                                        while ( $querypost->have_posts() ) :
                                            $querypost->the_post();
                                        ?>
                                        <div class="row-item">
                                            <div class="box-new-h">
                                                <div class="box-img">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail( '140x80' ) ?>
                                                    </a>
                                                </div>
                                                <div class="box-content">
                                                    <a href="<?php the_permalink(); ?>" class="link-w-0">
                                                        <?php the_title(); ?>
                                                    </a>
                                                    <span class="txt-day">
                                                        <?php echo get_the_date(); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        endwhile;
                                        wp_reset_query();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                            $social_fb = mona_get_option('social_fb');
                            $social_tw = mona_get_option('social_tw');
                            $social_ld = mona_get_option('social_ld');
                            $social_yb = mona_get_option('social_yb');
                            if ( $social_fb || $social_tw || $social_ld || $social_yb ) {
                            ?>
                            <div class="box-social">
                                <div class="wrapper-box">
                                    <h3 class="txt-title">
                                        <?php echo __( 'Liên kết mạng xã hội:', 'monamedia' ) ?>
                                    </h3>
                                    <ul class="list-social">
                                        <?php if ( $social_fb ) { ?>
                                        <li>
                                            <a target="_blank" href="<?php echo esc_url( $social_fb ) ?>">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if ( $social_tw ) { ?>
                                        <li>
                                            <a target="_blank" href="<?php echo esc_url( $social_tw ) ?>">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if ( $social_ld ) { ?>
                                        <li>
                                            <a target="_blank" href="<?php echo esc_url( $social_ld ) ?>">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        <?php if ( $social_yb ) { ?>
                                        <li>
                                            <a target="_blank" href="<?php echo esc_url( $social_yb ) ?>">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
