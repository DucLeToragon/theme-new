<?php
$obz = get_queried_object();
$Mona_Load_Field = new Mona_Load_Field();
$mona_post_image_big_featured = $Mona_Load_Field->mona_post_images(get_the_ID(), ['get_content' => '_image_featured_url']);
if ($mona_post_image_big_featured) {
    $image_url = $mona_post_image_big_featured;
} else {
    $image_url = get_site_url() . '/template/images/banner-sanpham.png';
}
?>
<main class="main">

    <div class="banner-home">
        <div class="slide-banner banner" style="background-image: url(<?php echo $image_url ?>);">
            <div class="container">
                <div class="wrapper-container">
                    <h1 class="txt-title txt-upcase" data-aos="flip-down">
                        <?php echo get_the_title() ?>
                    </h1>
                </div>
            </div>
            <?php
            /**
             * MONA GET LAYOUT - CONTENT SOCIAL
             * BANNER
             */
            get_template_part('patch/loop/content-social', 'banner');
            ?>
        </div>
    </div>

    <div class="breadcrumb">
        <div class="container">
            <div class="wrapper-container">
                <?php
                /**
                 * MONA GET LAYOUT - BREADCRUMB
                 */
                get_template_part('patch/breadcrumb');
                ?>
            </div>
        </div>

    </div>

    <section class="sec-product-detail">
        <div class="container">
            <div class="wrapper-container">
                <div class="detail-product">
                    <div class="box-flex">
                        <div class="col-3 col" data-aos="fade-right">
                            <div class="box-btn" id="close-danhmuc">
                                <i class="fas fa-th-list"></i>
                            </div>
                            <div class="box-danhmuc">
                                <p class="txt-danhmuc">
                                    <?php echo __('Các sản phẩm khác', 'monamedia') ?>
                                </p>
                                <div class="wrapper-danhmuc">
                                    <ul class="list-danhmuc">
                                        <li class="active">
                                            <a href="<?php echo get_the_permalink(MONA_SAN_PHAM); ?>">
                                                <?php echo __('ALL', 'monamedia') ?>
                                            </a>
                                        </li>
                                        <?php
                                        $argspost = [
                                            'post_type' => 'mona_product',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 6,
                                            'post__not_in' => [get_the_ID()],
                                        ];
                                        $queryposts = get_posts($argspost);
                                        if (!empty($queryposts)) {
                                            foreach ($queryposts as $key => $item) {
                                        ?>
                                                <li class="pro-item-text">
                                                    <a href="<?php echo get_the_permalink($item->ID); ?>">
                                                        <?php echo get_the_title($item->ID) ?>
                                                    </a>
                                                </li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col" data-aos="fade-lfet">
                            <?php
                            $args = [
                                'get_content' => '_gallery',
                                'size' => '500x500',
                            ];
                            $Mona_Load_Field->mona_detail_products(get_the_ID(), $args);
                            ?>
                        </div>
                        <div class="col-5 col" data-aos="fade-left">
                            <div class="content-detail">
                                <div class="wrapper-content">
                                    <h2 class="txt-title txt-40">
                                        <?php the_title(); ?>
                                    </h2>
                                    <?php
                                    $args = [
                                        'get_content' => '_featured_single',
                                    ];
                                    $Mona_Load_Field->mona_detail_products(get_the_ID(), $args);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $args = [
                    'get_content' => '_description',
                    'size' => '570x400',
                ];
                $Mona_Load_Field->mona_detail_products(get_the_ID(), $args);
                ?>
            </div>
        </div>
        <?php
        $args = [
            'get_content' => '_gallery_description',
            'size' => '450x315',
        ];
        $Mona_Load_Field->mona_detail_products(get_the_ID(), $args);
        ?>

        <div class="container">
            <div class="wrapper-container">
                <div class="content-thongso">
                    <h3 class="txt-title txt-46">
                        <?php echo __('Thông số tiêu chuẩn', 'monamedia') ?>
                    </h3>
                    <?php
                    $mona_specifications_list = get_field('mona_specifications_list');
                    if (!empty($mona_specifications_list)) {
                        $mona_specifications_groups = array_chunk($mona_specifications_list, 3, false);

                    ?>

                        <?php
                        foreach ($mona_specifications_groups as $key_specifications_groups => $specifications_group) {
                        ?>
                            <div class="specifications-content">
                                <?php foreach ($specifications_group as $key_specifications_group => $specification_item) { ?>
                                    <div class="specification-box">
                                        <div class="spec-ti"><?php echo $specification_item['mona_specification_title']; ?></div>
                                        <?php

                                        if ($specification_item['mona_specification_content_select'] == 'text') {
                                            echo $specification_item['mona_specification_content_text'];
                                        } else {
                                            echo  wp_get_attachment_image($specification_item['mona_specification_content_img'], '340×300');
                                        }

                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                    <?php
                    $mota = get_field('mona_sing_bottom_content');
                    if ($mota != '') {
                    ?>

                        <section class="mona-sec pt-0 ">
                            <div class="container">
                                <div class="mona-bton-show-content mona-btn">Xem thêm</div>
                                <div class="mona-content mona-collap-content" style="display:none;"><?php echo $mota; ?></div>
                            </div>
                        </section>
                    <?php
                    }
                    ?>
                    <!-- <div class="specifications-content">
                        <div class="specification-box">
                            <div class="spec-ti">GSM</div>
                            <img src="images/product/olive-nets/olive-nets-s1.jpg" alt="specification"
                                title="specification" />
                        </div>
                        <div class="specification-box">
                            <div class="spec-ti">Width</div>
                            <img src="images/product/olive-nets/olive-nets-s2.jpg" alt="specification"
                                title="specification" />
                        </div>
                        <div class="specification-box">
                            <div class="spec-ti">Length</div>
                            <img src="images/product/olive-nets/olive-nets-s3.jpg" alt="specification"
                                title="specification" />
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        </div>
    </section>

</main>