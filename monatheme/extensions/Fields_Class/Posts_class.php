<?php
Class Mona_Field_Posts  {
    public function __construct() {}

    public function mona_post_images( $post_id = '', $args = [] ) {
        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }
        if ( ! empty( $args['size'] ) ) {
            $size = $args['size'];
        } else {
            $size = '1900x790';
        }
        $mona_post_image_big_featured = get_field('mona_post_image_big_featured', $post_id);
        if ( ! empty( $args ) && $args['get_content'] === '_image_featured' ) {
            if ($mona_post_image_big_featured != '') {
                return wp_get_attachment_image($mona_post_image_big_featured, $size);
            }
            return get_the_post_thumbnail($post_id, $size); 
        }
        if ( ! empty( $args ) && $args['get_content'] === '_image_featured_url' ) {
            return wp_get_attachment_image_url( $mona_post_image_big_featured, $size );
        }
    }

    public function mona_detail_products( $post_id = '', $args = [] ) {
        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }
        if ( ! empty( $args['size'] ) ) {
            $size = $args['size'];
        } else {
            $size = '500x500';
        }
        $mona_detail_product_image_ishome = get_field('mona_detail_product_image_ishome', $post_id);
        $mona_detail_product_features = get_field('mona_detail_product_features', $post_id);
        $mona_detail_product_gallery_items = get_field('mona_detail_product_gallery_items', $post_id);
        $mona_detail_product_descriptions = get_field('mona_detail_product_descriptions', $post_id);
        // get gallery image
        if ( ! empty( $args ) && $args['get_content'] === '_gallery' ) { ?>
        <div class="wrapper-slide-product-detail">
            <div class="slide-product-detail" id="slide-product-detail">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        if ( is_array( $mona_detail_product_gallery_items ) ) {
                            foreach ( $mona_detail_product_gallery_items as $key => $item ) {
                        ?>
                        <div class="swiper-slide">
                            <div class="wrapper-img">
                                <a href="<?php echo wp_get_attachment_image_url( $item['mona_detail_product_gallery_item_image'], 'full' ) ?>" class="img-light">
                                    <?php echo wp_get_attachment_image( $item['mona_detail_product_gallery_item_image'], $size ) ?>
                                </a>
                                <?php if ( $item['mona_detail_product_gallery_item_label'] ) { ?>
                                <span class="tag-green">
                                    <?php echo $item['mona_detail_product_gallery_item_label'] ?>
                                </span>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }} else { ?>
                        <div class="swiper-slide">
                            <div class="wrapper-img">
                                <a href="<?php echo get_the_post_thumbnail_url( $post_id, 'full' ); ?>" class="img-light">
                                    <?php echo get_the_post_thumbnail( $post_id, $size ); ?>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if ( is_array( $mona_detail_product_gallery_items ) ) { ?>
            <div class="slide-product-thumb" id="slide-product-thumb">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ( $mona_detail_product_gallery_items as $key => $item ) { ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image( $item['mona_detail_product_gallery_item_image'], '70x70' ) ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php }
        // get nội dung tính năng sản phẩm ở trang chi tiết
        if ( ! empty( $args ) && $args['get_content'] === '_featured_single' ) { ?>
            <p class="txt-tinhnang txt-30">
                <?php echo $mona_detail_product_features['mona_detail_product_feature_title'] ?>
            </p>
            <?php
            $mona_detail_product_features_items = $mona_detail_product_features['mona_detail_product_feature_items'];
            if ( is_array( $mona_detail_product_features_items ) ) {
            ?>
            <ul class="list-tinhnang">
                <?php foreach ( $mona_detail_product_features_items as $key => $item ) { ?>
                <li>
                    <span>
                        <?php echo $item['mona_detail_product_feature_item_title'] ?>
                    </span>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
            <?php
            $mona_detail_product_feature_icon_items = $mona_detail_product_features['mona_detail_product_feature_icon_items'];
            if ( is_array( $mona_detail_product_feature_icon_items ) ) {
            ?>
            <div class="box-flex">
                <?php foreach( $mona_detail_product_feature_icon_items as $key => $item ) { ?>
                <div class="col-4">
                    <div class="col-item">
                        <?php echo wp_get_attachment_image( $item['mona_detail_product_feature_icon_item_icon'] ) ?>
                        <span class="txt-item">
                            <?php echo $item['mona_detail_product_feature_icon_item_title'] ?>
                        </span>
                    </div>
]                </div>
                <?php } ?>
            </div>
        <?php }}
        // get nôi dung tính năng sản phẩm trang list t
        if ( ! empty( $args ) && $args['get_content'] === '_featured_list' ) {
        $mona_detail_product_features_items = $mona_detail_product_features['mona_detail_product_feature_items'];
        if ( is_array( $mona_detail_product_features_items ) ) {
        ?>
            <ul class="list-congdung">
                <?php foreach ( $mona_detail_product_features_items as $key => $item ) { ?>
                <li>
                    <span><?php echo $item['mona_detail_product_feature_item_title'] ?></span>
                </li>
                <?php } ?>
            </ul>
        <?php }}
        // get nội danh sách mô tả sản phẩm
        if ( ! empty( $args ) && $args['get_content'] === '_description' ) { ?>
        <div class="box-mota-product">
            <div class="box-title" data-aos="fade-down">
                <div class="box-left-right">
                    <h3 class="txt-title txt-46">
                        <?php echo $mona_detail_product_descriptions['mona_detail_product_description_title'] ?>
                    </h3>
                    <a href="<?php echo get_the_permalink( MONA_LIEN_HE ); ?>" class="btn btn-main">
                        <?php echo __( 'Liên hệ chúng tôi', 'monamedia' ) ?>
                    </a>
                </div>
            </div>
            <div class="wrapper-content mona-content" data-aos="fade-up">
                <?php
                $mona_detail_product_description_items = $mona_detail_product_descriptions['mona_detail_product_description_items'];
                if ( is_array( $mona_detail_product_description_items ) ) {
                ?>
                <div class="box-flex">
                    <?php foreach ( $mona_detail_product_description_items as $key => $item ) { ?>
                    <?php if( $key % 2 == 0 ) { ?>
                    <div class="col-7 mona-content">
                        <?php echo $item['mona_detail_product_description_item_desc'] ?>
                    </div>
                    <div class="col-5">
                        <div class="img-w-100">
                            <?php echo wp_get_attachment_image( $item['mona_detail_product_description_item_image'], $size ) ?>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-5">
                        <div class="img-w-100">
                            <?php echo wp_get_attachment_image( $item['mona_detail_product_description_item_image'], $size ) ?>
                        </div>
                    </div>
                    <div class="col-7 mona-content">
                        <?php echo $item['mona_detail_product_description_item_desc'] ?>
                    </div>
                    <?php }} ?>
                </div>
                <?php } ?>
                <div class="mona-content">
                    <?php  echo $mona_detail_product_descriptions['mona_detail_product_description_addon'] ?>
                </div>
            </div>
        </div>
        <?php }
        // get gallery image mô tả sản phẩm
        if ( ! empty( $args ) && $args['get_content'] === '_gallery_description' ) {
        $mona_detail_product_description_gallerys = $mona_detail_product_descriptions['mona_detail_product_description_gallerys'];
        if ( ! empty( $mona_detail_product_description_gallerys ) ) {
        ?>
        <div class="container-full">
            <div class="wrapper-container">
                <div class="slide-product-mota" id="slide-product-mota" data-aos="fade-up-right">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ( $mona_detail_product_description_gallerys as $key => $item ) { ?>
                            <div class="swiper-slide">
                                <a href="<?php echo wp_get_attachment_image_url( $item, 'full' ); ?>" class="img-w-100">
                                    <?php echo wp_get_attachment_image( $item, $size ); ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <?php }} elseif ( ! empty( $args ) && $args['get_content'] === '_home_image' ) {
            if ( $mona_detail_product_image_ishome ) {
                return wp_get_attachment_image( $mona_detail_product_image_ishome, '500x500' );
            } else {
                $mona_detail_product_image_ishome = $args['default'];
                return $mona_detail_product_image_ishome;
            }
        }
    }
}
