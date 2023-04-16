<?php
/**
 * Template name: Về chúng tôi Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    $Mona_Load_Field = new Mona_Load_Field();
    $mona_post_image_big_featured = $Mona_Load_Field->mona_post_images( get_the_ID(), ['get_content' => '_image_featured_url'] );
    if ( $mona_post_image_big_featured ) {
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
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
                <?php
                /**
                 * MONA GET LAYOUT - CONTENT SOCIAL
                 * BANNER
                 */
                get_template_part( 'patch/loop/content-social', 'banner' );
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
                    get_template_part( 'patch/breadcrumb' );
                    ?>
                </div>
            </div>

        </div>
        <?php
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-khoinguon'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-giaiphap'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-congnghe'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-phattrien'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-giatri'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-muctieu'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-sumenh'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-doitac'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-trachnhiem'] );
        $Mona_Load_Field->mona_section_about_contents( get_the_ID(), ['get_content' => '_sec-caunoi'] );
        ?>
    </main>
    <?php
endwhile;
get_footer();
?>
