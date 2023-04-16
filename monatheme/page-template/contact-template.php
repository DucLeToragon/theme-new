<?php
/**
 * Template name: Liên hệ Page
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

        <section class="sec-lienhe">

            <div class="container">
                <div class="wrapper-container">
                    <div class="box-flex">
                        <div class="col-6" data-aos="fade-left">
                            <?php $Mona_Load_Field->mona_contact_info( get_the_ID(), ['get_content' => '_form'] ); ?>
                        </div>
                        <div class="col-6" data-aos="fade-right">
                            <?php $Mona_Load_Field->mona_contact_info( get_the_ID(), ['get_content' => '_map'] ); ?>
                        </div>
                    </div>
                    <?php $Mona_Load_Field->mona_contact_info( get_the_ID(), ['get_content' => '_address'] ); ?>
                </div>
            </div>
        </section>


    </main>
    <?php
endwhile;
get_footer();
?>
