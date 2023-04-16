<?php
global $post;
$Mona_Load_Field = new Mona_Load_Field();
?>
<div class="box-product">
    <div class="wrapper-box">
        <div class="box-img">
            <a href="<?php the_permalink(); ?>" class="img-w-100">
                <?php the_post_thumbnail( '310x310' ); ?>
            </a>
        </div>
        <div class="box-content">
            <a href="<?php the_permalink(); ?>" class="txt-name">
                <?php the_title(); ?>
            </a>
            <?php
            $args = [
                'get_content' => '_featured_list',
            ];
            $Mona_Load_Field->mona_detail_products( $post->ID, $args );
            ?>
            <a href="<?php the_permalink(); ?>" class="link">
                <?php echo __( 'XEM CHI TIẾT SẢN PHẨM', 'monamedia' ) ?>
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>
</div>
