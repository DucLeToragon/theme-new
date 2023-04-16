<?php

/**
 * Template name: Home Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()) :
    the_post();
    $Mona_Load_Field = new Mona_Load_Field();
?>
    <main class="main">
        <h1 style=" opacity: 0; visibility: hidden; position: absolute; top: 0; left: 0;">HSIA CHENG WOVEN TEXTILE - LƯỚI NÔNG NGHIỆP ĐÀI LOAN</h1>
        <?php $Mona_Load_Field->mona_home_contents(get_the_ID(), ['get_content' => '_banner_slider']); ?>
        <?php $Mona_Load_Field->mona_home_contents(get_the_ID(), ['get_content' => '_introduction']); ?>
        <?php $Mona_Load_Field->mona_home_contents(get_the_ID(), ['get_content' => '_benefit']); ?>
        <?php $Mona_Load_Field->mona_home_contents(get_the_ID(), ['get_content' => '_video']); ?>
        <?php
        $argsproduct = [
            'post_type' => 'mona_product',
            'post_status' => 'publish',
            'posts_per_page' => 10,
        ];
        $queryproduct = new WP_Query($argsproduct);
        if ($queryproduct->have_posts()) :
        ?>
            <section class="sec-product">
                <div class="container">
                    <div class="wrapper-container">
                        <h2 class="txt-title txt-46">
                            <?php echo get_the_title(MONA_SAN_PHAM) ?>
                        </h2>
                        <p class="meta-desc">
                            <?php echo $Mona_Load_Field->mona_post_description(MONA_SAN_PHAM); ?>
                        </p>
                    </div>
                </div>
                <div class="container-full">
                    <div class="wrapper-container">
                        <div class="slide-product" id="slide-product" data-aos="fade-up">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($queryproduct->have_posts()) :
                                        $queryproduct->the_post();
                                        global $post;
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="box-product-v">
                                                <div class="box-img">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                        $args = [
                                                            'get_content' => '_home_image',
                                                            'default' => '<img src="' . get_site_url() . '/template/images/img-product-5.png" alt="default image">',
                                                        ];
                                                        echo $Mona_Load_Field->mona_detail_products($post->ID, $args);
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="box-content">
                                                    <h3><a href="<?php the_permalink(); ?>" class="txt-title">
                                                            <?php the_title(); ?>
                                                        </a></h3>
                                                    <div class="txt-desc">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    wp_reset_query();
                                    ?>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php $Mona_Load_Field->mona_home_contents(get_the_ID(), ['get_content' => '_contact']); ?>
        <?php $Mona_Load_Field->mona_home_contents(get_the_ID(), ['get_content' => '_loiket']); ?>
    </main>
<?php
endwhile;
get_footer();
?>