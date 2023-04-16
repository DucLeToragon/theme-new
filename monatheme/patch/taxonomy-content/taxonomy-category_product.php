<?php
$obz = get_queried_object();
$Mona_Load_Field = new Mona_Load_Field();
$mona_post_image_big_featured = $Mona_Load_Field->mona_post_images($obz, ['get_content' => '_image_featured_url']);
if ($mona_post_image_big_featured) {
    $image_url = $mona_post_image_big_featured;
} else {

    $image_id_banner = get_field('mona_post_image_big_featured', MONA_SAN_PHAM);
    if (!empty($image_id_banner)) {
        $image_url = wp_get_attachment_image_url($image_id_banner, 'full');
    } else {
        $image_url = get_site_url() . '/template/images/banner-sanpham.png';
    }
}
?>
<main class="main">

    <div class="banner-home">
        <div class="slide-banner banner" style="background-image: url(<?php echo $image_url ?>);">
            <div class="container">
                <div class="wrapper-container">
                    <h1 class="txt-title txt-upcase" data-aos="flip-down">
                        <?php single_term_title(); ?>
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

    <?php
    $args = [
        'size' => '500x500',
    ];
    $Mona_Load_Field->mona_product_slider_image_items(MONA_SAN_PHAM, $args); ?>
    <section class="sec-page-product">
        <div class="container">
            <form id="firmfilterproduct" method="get" action="#">
                <div class="wrapper-container">
                    <!-- <div class="box-search-product">
                        <span class="txt-timkiem txt-20">
                            <?php echo __('Kết quả tìm kiếm cho:', 'monamedia') ?>
                            <?php echo mona_get_search(); ?>
                        </span>
                        <div class="form-search-product">
                            <input type="text" name="keyword" value="<?php echo mona_get_search(); ?>" class="f-control">
                            <button class="btn"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="box-select">
                        <span class="txt-20"><?php echo __('Lọc sản phẩm theo', 'monamedia') ?></span>
                        <div class="form-select-product">
                            <?php
                            $categoryproducttype = get_terms(
                                [
                                    'taxonomy' => 'category_product_type',
                                    'hide_empty' => false,
                                ]
                            );
                            if (!empty($categoryproducttype)) {
                            ?>
                            <select class="select-item" name="type">
                                <option value="0" disabled selected><?php echo __('Loại', 'monamedia') ?></option>
                                <?php foreach ($categoryproducttype as $key => $item) { ?>
                                <option value="<?php echo $item->slug ?>" <?php selected(@$_GET['type'], $item->slug) ?>><?php echo $item->name ?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                            <?php
                            $categoryproductsize = get_terms(
                                [
                                    'taxonomy' => 'category_product_size',
                                    'hide_empty' => false,
                                ]
                            );
                            if (!empty($categoryproductsize)) {
                            ?>
                            <select class="select-item" name="size">
                                <option value="0" disabled selected><?php echo __('Kích Thước', 'monamedia') ?></option>
                                <?php foreach ($categoryproductsize as $key => $item) { ?>
                                <option value="<?php echo $item->slug ?>" <?php selected(@$_GET['size'], $item->slug) ?>><?php echo $item->name ?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                    </div> -->
                    <?php
                    $categoryproduct = get_terms(
                        [
                            'taxonomy' => 'category_product',
                            'hide_empty' => false,
                        ]
                    )
                    ?>
                    <div class="box-danhmuc">
                        <span class="txt-danhmuc txt-30" id="btn-danhmuc"><?php echo __('Danh mục sản phẩm:', 'monamedia') ?></span>
                        <div class="wrapper-danhmuc">
                            <a href="<?php echo get_the_permalink(MONA_SAN_PHAM); ?>" class="item <?php echo (is_page(MONA_SAN_PHAM)) ? 'active' : '' ?> link-w-0">
                                <?php echo __('ALL', 'monamedia'); ?>
                            </a>
                            <?php
                            $obz_id = get_queried_object_id();
                            if (!empty($categoryproduct)) {
                                foreach ($categoryproduct as $key => $item) {
                                    if (is_tax() && $obz_id === $item->term_id) {
                                        echo '<a href="' . get_term_link($item->term_id) . '" class="item active link-w-0">' . $item->name . '</a>';
                                    } else {
                                        echo '<a href="' . get_term_link($item->term_id) . '" class="item link-w-0">' . $item->name . '</a>';
                                    }
                                }
                            } ?>
                        </div>
                    </div>
                    <?php
                    $mota = get_field('mona_top_content', $obz);
                    if ($mota != '') {
                    ?>
                        <section class="mona-sec pb-0">
                            <div class="container">
                                <div class="mona-content"><?php echo $mota; ?></div>
                            </div>
                        </section>
                    <?php
                    }
                    ?>
                    <div class="box-product-main">
                        <div class="box-flex">
                            <?php
                            $paged = max(1, get_query_var('paged'));
                            $offset = ($paged - 1) * 12;
                            $argsproduct = [
                                'post_type' => 'mona_product',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                                'paged' => 12,
                                'offset' => $offset,
                                's' => mona_get_search(),
                                'tax_query' => [
                                    'relation' => 'AND',
                                ]
                            ];
                            if (isset($_GET['type']) && isset($_GET['type']) != '') {
                                $argsproduct['tax_query'][] = [
                                    'taxonomy' => 'category_product_type',
                                    'field' => 'slug',
                                    'terms' => esc_attr(@$_GET['type']),
                                    'operator' => 'IN',
                                ];
                            }
                            if (isset($_GET['size']) && isset($_GET['size']) != '') {
                                $argsproduct['tax_query'][] = [
                                    'taxonomy' => 'category_product_size',
                                    'field' => 'slug',
                                    'terms' => esc_attr(@$_GET['size']),
                                    'operator' => 'IN',
                                ];
                            }
                            if (is_tax() && $obz->taxonomy == 'category_product') {
                                $argsproduct['tax_query'][] = [
                                    'taxonomy' => 'category_product',
                                    'field' => 'slug',
                                    'terms' => $obz->slug,
                                    'operator' => 'IN',
                                ];
                            }
                            $queryproduct = new WP_Query($argsproduct);
                            if ($queryproduct->have_posts()) :
                                while ($queryproduct->have_posts()) :
                                    $queryproduct->the_post();
                            ?>
                                    <div class="col-4 wow animate__fadeInUp">
                                        <?php
                                        /**
                                         * MONA GET LAYOUT - C0NTENT PRODUCT
                                         * COLUMN
                                         */
                                        get_template_part('patch/loop/content-product', 'column');
                                        ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_query();
                            else :
                                ?>
                                <div class="mona-mess-empty">
                                    <p><?php echo __('Nội dung đang dươc cập nhật', 'monamedia') ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $mota = get_field('mona_bot_content', $obz);
                    if ($mota != '') {
                    ?>
                        <section class="mona-sec pt-0 mona-hidden">
                            <div class="container">
                                <div class="mona-content"><?php echo $mota; ?></div>
                            </div>
                        </section>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </section>

</main>