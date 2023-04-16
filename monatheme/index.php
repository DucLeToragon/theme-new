<?php
get_header('2');
$Mona_Load_Field = new Mona_Load_Field();
?>
<main class="main">

    <div class="breadcrumb">
        <div class="container">
            <div class="wrapper-container">
                <ul class="breadcrumb-list">
                    <li><a href="<?php echo get_home_url(); ?>"><?php echo mona_get_home_title(); ?></a></li>
                    <li><a href="<?php echo home_url(); ?>"><?php echo mona_get_blogs_title(); ?></a></li>
                </ul>
            </div>
        </div>

    </div>

    <div class="sec-new">
        <div class="container">
            <div class="wrapper-container">
                <div class="box-title">
                    <h1 class="txt-title txt-46"><?php echo __( 'Danh Sách Tin Tức', 'monamedia' ) ?></h1>
                    <p class="meta-title"><?php echo $Mona_Load_Field->mona_post_description( get_option('page_for_posts', true) ) ?></p>
                </div>
                <?php
                $sticky = get_option('sticky_posts'); 
                $argsfeatured = [
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'post__in' => $sticky,
                    'order' => 'DESC',
                    // 'meta_query' => array(
                    //     'relation' => 'AND',
                    //     array(
                    //         'key' => 'mona_post_views_count',
                    //         'value' => 10,
                    //         'compare' => '>',
                    //         'type' => 'numeric',
                    //     )
                    // )
                ];
                $queryfeatured = new WP_Query( $argsfeatured );
                if ( $queryfeatured->have_posts() && count($sticky)>0 ) :
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
                <?php
                $mona_posts_categories = get_field('mona_posts_categories', MONA_PAGE_BLOG);
                if( empty( $mona_posts_categories ) ){

                    $categorypost = get_terms(
                        [
                            'taxonomy' => 'category',
                            'hide_empty' => true,
                            'include_children' => true,
                        ]
                    );

                }else{

                    $categorypost = $mona_posts_categories;
                    
                }
                
                if ( ! empty( $categorypost ) ) {
                    foreach ( $categorypost as $key => $item ) {
                ?>
                <div class="box-new">
                    <h3 class="txt-title mt-20 txt-30">
                        <?php echo $item->name ?>
                    </h3>
                    <div class="box-flex">
                        <?php
                        $argspost = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 9,
                            'tax_query' => [
                                'relation' => 'AND',
                                    [
                                        'taxonomy' => 'category',
                                        'field' => 'term_id',
                                        'terms' => $item->term_id,
                                    ]
                            ]
                        ];
                        $querypost = new WP_Query( $argspost );
                        if ( $querypost->have_posts() ) :
                        while ( $querypost->have_posts() ) :
                            $querypost->the_post();
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
                        endif;
                        ?>
                    </div>
                    <ul class="pagination">
                        <a class="btn-green btn btn-blue" href="<?php echo esc_url( get_term_link( $item->term_id ) ) ?>">
                            <?php echo __( 'Xem tất cả', 'monamedia' ) ?>
                        </a>
                    </ul>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>

</main>
<?php get_footer();
