<?php
class Mona_Load_Field extends Mona_Field_Categorys
{
    public function __construct()
    {
    }

    public function mona_post_description($post_id = '', $args = [])
    {
        if (empty($post_id)) {
            $post_id = get_the_ID();
        }
        $mona_post_descripton = get_field('mona_post_descripton', $post_id);
        if ($mona_post_descripton) {
            return $mona_post_descripton;
        }
    }

    public function mona_product_slider_image_items($post_id = '', $args = [])
    {
        if (empty($post_id)) {
            $post_id = get_the_ID();
        }
        if (!empty($args['size'])) {
            $size = $args['size'];
        } else {
            $size = '500x500';
        }
        $mona_product_slider_image_items = get_field('mona_product_slider_image_items', $post_id);
        if (is_array($mona_product_slider_image_items)) {
?>
            <section class="sec-slide-product">
                <div class="container-full">
                    <div class="wrapper-container">
                        <div class="slide-product-center wow animate__fadeInUp" id="slide-product-center">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($mona_product_slider_image_items as $key => $item) { ?>
                                        <div class="swiper-slide">
                                            <div class="box-product-slide">
                                                <div class="box-img">
                                                    <a href="<?php echo esc_url($item['mona_product_slider_image_item_link']) ?>">
                                                        <?php echo wp_get_attachment_image($item['mona_product_slider_image_item_image'], $size) ?>
                                                    </a>
                                                </div>
                                                <div class="box-title">
                                                    <a href="<?php echo esc_url($item['mona_product_slider_image_item_link']) ?>" class="txt-title">
                                                        <?php echo $item['mona_product_slider_image_item_title'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }

    public function mona_section_product_process_items($post_id = '', $args = [])
    {
        if (empty($post_id)) {
            $post_id = get_the_ID();
        }
        $mona_section_product_process_items = get_field('mona_section_product_process_items', $post_id);
        if (is_array($mona_section_product_process_items)) {
            foreach ($mona_section_product_process_items as $key => $item) {
                $item_option = $item['mona_section_product_process_item_option'];
                if ($item_option == 'sec_nguyenlieu') {
                    $mona_section_product_process_item_resources = $item['mona_section_product_process_item_resources'];
            ?>
                    <section class="sec-nguyenlieu bg-gray mt-100">
                        <div class="container-full">
                            <div class="wrapper-container">
                                <div class="box-flex">
                                    <div class="col-6">
                                        <div class="wrapper-content" data-aos="fade-right">
                                            <h3 class="txt-title txt-40 txt-upcase">
                                                <?php echo $mona_section_product_process_item_resources['mona_section_product_process_item_resource_title'] ?>
                                            </h3>
                                            <div class="box-content">
                                                <p class="txt-desc">
                                                    <?php echo $mona_section_product_process_item_resources['mona_section_product_process_item_resource_desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="wrapper-img" data-aos="fade-left">
                                            <div class="img-big">
                                                <?php echo wp_get_attachment_image($mona_section_product_process_item_resources['mona_section_product_process_item_resource_image_big'], '765x650') ?>
                                            </div>
                                            <div class="img-small">
                                                <?php echo wp_get_attachment_image($mona_section_product_process_item_resources['mona_section_product_process_item_resource_image_small'], '650x500') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } elseif ($item_option == 'sec_dunepsoi') {
                    $mona_section_product_process_item_yarnpress = $item['mona_section_product_process_item_yarnpress'];
                ?>
                    <section class="sec-bophan">
                        <div class="container">
                            <div class="wrapper-container">
                                <div class="box-flex">
                                    <div class="col-8">
                                        <div class="wrapper-img" data-aos="fade-left">
                                            <div class="img-big">
                                                <div class="wrapper-img-1">
                                                    <?php echo wp_get_attachment_image($mona_section_product_process_item_yarnpress['mona_section_product_process_item_yarnpress_image_big'], '420x720') ?>
                                                </div>
                                            </div>
                                            <?php
                                            $mona_section_product_process_item_yarnpress_gallery_small = $mona_section_product_process_item_yarnpress['mona_section_product_process_item_yarnpress_gallery_small'];
                                            if (is_array($mona_section_product_process_item_yarnpress_gallery_small)) {
                                            ?>
                                                <div class="wrapper-img-small">
                                                    <?php
                                                    $stt = 2;
                                                    foreach ($mona_section_product_process_item_yarnpress_gallery_small as $key => $child) { ?>
                                                        <div class="wrap-img-<?php echo $stt ?>">
                                                            <?php echo wp_get_attachment_image($child, '500x500') ?>
                                                        </div>
                                                    <?php
                                                        $stt++;
                                                    } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="box-content" data-aos="fade-right">
                                            <h3 class="txt-title txt-40">
                                                <?php echo $mona_section_product_process_item_yarnpress['mona_section_product_process_item_yarnpress_title'] ?>
                                            </h3>
                                            <div class="wrapper-content">
                                                <p class="txt-desc">
                                                    <?php echo $mona_section_product_process_item_yarnpress['mona_section_product_process_item_yarnpress_desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } elseif ($item_option == 'sec_cuonsoi') {
                    $mona_section_product_process_item_cuonsois = $item['mona_section_product_process_item_cuonsois'];
                ?>
                    <section class="sec-nguyenlieu bg-gray">
                        <div class="container-full">
                            <div class="wrapper-container">
                                <div class="box-flex">
                                    <div class="col-6">
                                        <div class="wrapper-content wow animate__fadeInLeft">
                                            <h3 class="txt-title txt-40 txt-upcase">
                                                <?php echo $mona_section_product_process_item_cuonsois['mona_section_product_process_item_cuonsoi_title'] ?>
                                            </h3>
                                            <div class="box-content">
                                                <p class="txt-desc">
                                                    <?php echo $mona_section_product_process_item_cuonsois['mona_section_product_process_item_cuonsoi_desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="wrapper-img wow animate__fadeInRight">
                                            <div class="img-big">
                                                <?php echo wp_get_attachment_image($mona_section_product_process_item_cuonsois['mona_section_product_process_item_cuonsoi_image_big'], '765x650') ?>
                                            </div>
                                            <div class="img-small">
                                                <?php echo wp_get_attachment_image($mona_section_product_process_item_cuonsois['mona_section_product_process_item_cuonsoi_image_small'], '650x500') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } elseif ($item_option == 'sec_det') {
                    $mona_section_product_process_item_weavings = $item['mona_section_product_process_item_weavings'];
                ?>
                    <section class="sec-det">
                        <div class="container">
                            <div class="wrapper-container">
                                <div class="box-flex">
                                    <?php
                                    $mona_section_product_process_item_weaving_gallery_small = $mona_section_product_process_item_weavings['mona_section_product_process_item_weaving_gallery_small'];
                                    if (!empty($mona_section_product_process_item_weaving_gallery_small)) {
                                    ?>
                                        <div class="col-8">
                                            <div class="wrapper-img">
                                                <div class="flex-img">
                                                    <?php foreach ($mona_section_product_process_item_weaving_gallery_small as $key => $child) { ?>
                                                        <div class="box-img" data-aos="fade-right" data-aos-delay="0">
                                                            <?php echo wp_get_attachment_image($child, '765x650') ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-4">
                                        <div class="box-content wow animate__fadeInRight">
                                            <h3 class="txt-title txt-40">
                                                <?php echo $mona_section_product_process_item_weavings['mona_section_product_process_item_weaving_title'] ?>
                                            </h3>
                                            <div class="wrapper-content">
                                                <p class="txt-desc">
                                                    <?php echo $mona_section_product_process_item_weavings['mona_section_product_process_item_weaving_desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-det">
                            <?php echo wp_get_attachment_image($mona_section_product_process_item_weavings['mona_section_product_process_item_weaving_image_big'], '860x1040') ?>
                        </div>
                    </section>
            <?php }
            }
        }
    }

    public function mona_section_about_contents($post_id = '', $args = [])
    {
        if (empty($post_id)) {
            $post_id = get_the_ID();
        }
        $mona_about_section_beginings = get_field('mona_about_section_beginings', $post_id);
        $mona_about_section_solutions = get_field('mona_about_section_solutions', $post_id);
        $mona_about_section_technologys = get_field('mona_about_section_technologys', $post_id);
        $mona_about_section_orienteds = get_field('mona_about_section_orienteds', $post_id);
        $mona_about_section_values = get_field('mona_about_section_values', $post_id);
        $mona_about_section_targets = get_field('mona_about_section_targets', $post_id);
        $mona_about_section_missions = get_field('mona_about_section_missions', $post_id);
        $mona_about_section_partners = get_field('mona_about_section_partners', $post_id);
        $mona_about_section_responsibilitys = get_field('mona_about_section_responsibilitys', $post_id);
        $mona_about_section_sayings = get_field('mona_about_section_sayings', $post_id);
        if (!empty($args) && $args['get_content'] === '_sec-khoinguon') { ?>
            <section class="sec-khoinguon">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="box-flex">
                            <div class="col-6" data-aos="fade-right">
                                <div class="wrapper-col">
                                    <h3 class="txt-title txt-46">
                                        <?php echo $mona_about_section_beginings['mona_about_section_begining_title'] ?>
                                    </h3>
                                    <div class="wrapper-content mona-content">
                                        <?php echo $mona_about_section_beginings['mona_about_section_begining_desc'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" data-aos="fade-left">
                                <div class="wrapper-img">
                                    <div class="img-small">
                                        <?php echo wp_get_attachment_image($mona_about_section_beginings['mona_about_section_begining_image_small'], '500x500') ?>
                                    </div>
                                    <div class="img-big">
                                        <?php echo wp_get_attachment_image($mona_about_section_beginings['mona_about_section_begining_image_big'], '500x670') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-leaf-1" data-aos="fade-up-left" data-aos-delay="1000">
                    <img src="<?php echo get_site_url() ?>/template/images/leaf-1.png" alt="leaf-1.png">
                </div>

            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-giaiphap') { ?>
            <section class="sec-giaiphap">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="box-flex">
                            <div class="col-4" data-aos="fade-up">
                                <div class="wrapper-img">
                                    <?php echo wp_get_attachment_image($mona_about_section_solutions['mona_about_section_solution_image'], '470x670') ?>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="wrapper-col">
                                    <h3 class="txt-title txt-46">
                                        <?php echo $mona_about_section_solutions['mona_about_section_solution_title'] ?>
                                    </h3>
                                    <?php
                                    $mona_about_section_solution_desc_items = $mona_about_section_solutions['mona_about_section_solution_desc_items'];
                                    if (is_array($mona_about_section_solution_desc_items)) {
                                    ?>
                                        <ol class="list-giaiphap">
                                            <?php foreach ($mona_about_section_solution_desc_items as $key => $item) { ?>
                                                <li data-aos="fade-up" data-aos-delay="00">
                                                    <span>
                                                        <?php echo $item['mona_about_section_solution_desc_item_title'] ?>
                                                    </span>
                                                </li>
                                            <?php } ?>
                                        </ol>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-leaf-2" data-aos="fade-up-right" data-aos-delay="1000">
                    <img src="<?php echo get_site_url() ?>/template/images/leaf-2.png" alt="leaf-2.png">
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-congnghe') { ?>
            <section class="sec-congnghe sec-90 bg-gray">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="content-tech">
                            <h3 class="txt-title txt-46">
                                <?php echo $mona_about_section_technologys['mona_about_section_technology_title'] ?>
                            </h3>
                            <div class="wrapper-content mona-content" data-aos="fade-down">
                                <?php echo $mona_about_section_technologys['mona_about_section_technology_desc'] ?>
                            </div>
                            <?php
                            $mona_about_section_technology_gallerys = $mona_about_section_technologys['mona_about_section_technology_gallerys'];
                            if (is_array($mona_about_section_technology_gallerys)) {
                            ?>
                                <div class="slide-tech" id="slide-tech" data-aos="fade-up">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($mona_about_section_technology_gallerys as $key => $item) { ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php echo wp_get_attachment_image_url($item, 'full') ?>" class="img-light">
                                                        <?php echo wp_get_attachment_image($item, '450x370') ?>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div> -->
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-phattrien') {
            $mona_about_section_oriented_image_banner = $mona_about_section_orienteds['mona_about_section_oriented_image_banner'];
            if ($mona_about_section_oriented_image_banner) {
                $image_url = wp_get_attachment_image_url($mona_about_section_oriented_image_banner, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/bg-phattrien.png';
            }
        ?>
            <section class="sec-phattrien" style="background-image: url(<?php echo $image_url ?>);">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="content-phattrien" data-aos="fade-down">
                            <h3 class="txt-title txt-46">
                                <?php echo $mona_about_section_orienteds['mona_about_section_oriented_title'] ?>
                            </h3>
                            <div class="wrapper-content mona-content">
                                <?php echo $mona_about_section_orienteds['mona_about_section_oriented_desc'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-giatri') {
            $mona_about_section_value_image_banner = $mona_about_section_values['mona_about_section_value_image_banner'];
            if ($mona_about_section_value_image_banner) {
                $image_url = wp_get_attachment_image_url($mona_about_section_value_image_banner, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/bg-phattrien.png';
            }
        ?>
            <section class="sec-giatri" style="background-image: url(<?php echo $image_url ?>);" data-aos="fade-up">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="content-giatri">
                            <h3 class="txt-title txt-46">
                                <?php echo $mona_about_section_values['mona_about_section_value_title'] ?>
                            </h3>
                            <div class="wrapper-content mona-content">
                                <?php echo $mona_about_section_values['mona_about_section_value_desc'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-muctieu') {
            $mona_about_section_target_image_banner = $mona_about_section_targets['mona_about_section_target_image_banner'];
            if ($mona_about_section_target_image_banner) {
                $image_url = wp_get_attachment_image_url($mona_about_section_target_image_banner, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/img-muctieu.png';
            }
        ?>
            <section class="sec-muctieu" style="background-image: url(<?php echo $image_url ?>);" data-aos="fade-up">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="content-giatri">
                            <h3 class="txt-title txt-46">
                                <?php echo $mona_about_section_targets['mona_about_section_target_title'] ?>
                            </h3>
                            <div class="wrapper-content mona-content">
                                <?php echo $mona_about_section_targets['mona_about_section_target_desc'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-sumenh') { ?>
            <section class="sec-sumenh">
                <div class="bg-leaf-3" data-aos="fade-up-left" data-aos-delay="1000">
                    <img src="<?php echo get_site_url() ?>/template/images/leaf-3.png" alt="leaf-3.png">
                </div>
                <div class="container">
                    <div class="wrapper-container">
                        <div class="box-flex">
                            <div class="col-6" data-aos="fade-right">
                                <div class="content-sumenh">
                                    <h3 class="txt-title txt-46">
                                        <?php echo $mona_about_section_missions['mona_about_section_mission_title'] ?>
                                    </h3>
                                    <div class="wrapper-content mona-content">
                                        <?php echo $mona_about_section_missions['mona_about_section_mission_desc'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" data-aos="fade-left">
                                <div class="wrapper-img">
                                    <?php echo wp_get_attachment_image($mona_about_section_missions['mona_about_section_mission_image'], '720x720') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-doitac') {
            $mona_about_section_partner_image_banner = $mona_about_section_partners['mona_about_section_partner_image_banner'];
            if ($mona_about_section_partner_image_banner) {
                $image_url = wp_get_attachment_image_url($mona_about_section_partner_image_banner, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/img-muctieu.png';
            }
        ?>
            <section class="sec-doitac" style="background-image: url(<?php echo $image_url ?>);" data-aos="fade-up">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="box-flex">
                            <div class="col-7">
                                <div class="wrapper-img">
                                    <div class="img-small img-left">
                                        <?php echo wp_get_attachment_image($mona_about_section_partners['mona_about_section_partner_image_small1'], '310x500') ?>
                                    </div>
                                    <div class="img-big ">
                                        <?php echo wp_get_attachment_image($mona_about_section_partners['mona_about_section_partner_image_small2'], '360x630') ?>
                                    </div>
                                    <div class="img-small img-right">
                                        <?php echo wp_get_attachment_image($mona_about_section_partners['mona_about_section_partner_image_small3'], '310x500') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="content-doitac">
                                    <h3 class="txt-title txt-46">
                                        <?php echo $mona_about_section_partners['mona_about_section_partner_title'] ?>
                                    </h3>
                                    <div class="wrapper-content mona-content">
                                        <?php echo $mona_about_section_partners['mona_about_section_partner_desc'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-trachnhiem') { ?>
            <section class="sec-trachnhiem">
                <div class="container-full">
                    <div class="wrapper-container">
                        <div class="box-flex">
                            <div class="col-6" data-aos="fade-left">
                                <div class="content-trachnhiem">
                                    <h3 class="txt-title txt-46">
                                        <?php echo $mona_about_section_responsibilitys['mona_about_section_responsibility_title'] ?>
                                    </h3>
                                    <div class="wrapper-content mona-content">
                                        <?php echo $mona_about_section_responsibilitys['mona_about_section_responsibility_desc'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" data-aos="fade-right">
                                <div class="wrapper-img">
                                    <?php echo wp_get_attachment_image($mona_about_section_responsibilitys['mona_about_section_responsibility_image_banner'], '960x700') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_sec-caunoi') {
            $mona_about_section_saying_image_banner = $mona_about_section_sayings['mona_about_section_saying_image_banner'];
            if ($mona_about_section_saying_image_banner) {
                $image_url = wp_get_attachment_image_url($mona_about_section_saying_image_banner, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/img-muctieu.png';
            }
        ?>
            <section class="sec-caunoi" style="background-image: url(<?php echo $image_url ?>);">
                <div class="container">
                    <div class="wrapper-container mona-content">
                        <div class="content-caunoi">
                            <img src="<?php echo get_site_url() ?>/template/images/daukep-vang.png" alt="daukep-vang.png">
                            <?php echo $mona_about_section_sayings['mona_about_section_saying_title'] ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
    }

    public function mona_contact_info($post_id = '', $args = [])
    {
        if (empty($post_id)) {
            $post_id = get_the_ID();
        }
        $mona_contact_info_forms = get_field('mona_contact_info_forms', $post_id);
        $mona_contact_info_iframe_map = get_field('mona_contact_info_iframe_map', $post_id);
        $mona_contact_info_items = get_field('mona_contact_info_items', $post_id);
        if (!empty($args) && $args['get_content'] === '_form') { ?>
            <div class="wrapper-col">
                <h3 class="txt-title txt-30">
                    <?php echo $mona_contact_info_forms['mona_contact_info_form_title'] ?>
                </h3>
                <span class="meta-title">
                    <?php echo $mona_contact_info_forms['mona_contact_info_form_desc'] ?>
                </span>
                <?php echo do_shortcode($mona_contact_info_forms['mona_contact_info_form_shortcode']) ?>
            </div>
        <?php } elseif (!empty($args) && $args['get_content'] === '_map') { ?>
            <div class="wrapper-col">
                <?php echo $mona_contact_info_iframe_map; ?>
            </div>
            <?php } elseif (!empty($args) && $args['get_content'] === '_address') {
            if (is_array($mona_contact_info_items)) {
            ?>
                <div class="box-thongtin">
                    <div class="box-flex">
                        <?php foreach ($mona_contact_info_items as $key => $item) { ?>
                            <div class="col-4" data-aos="fade-left">
                                <div class="col-item">
                                    <div class="wrapper-img">
                                        <?php echo wp_get_attachment_image($item['mona_contact_info_item_icon'], '70x70') ?>
                                    </div>
                                    <div class="box-content">
                                        <p class="bold"><?php echo $item['mona_contact_info_item_title'] ?></p>
                                        <span class="txt-diachi">
                                            <?php echo $item['mona_contact_info_item_desc'] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }
        }
    }

    public function mona_home_contents($post_id = '', $args = [])
    {
        if (empty($post_id)) {
            $post_id = get_the_ID();
        }
        if (!empty($args['size'])) {
            $size = $args['size'];
        } else {
            $size = '500x500';
        }
        $mona_home_banner_slider_items = get_field('mona_home_banner_slider_items', $post_id);
        $mona_home_introduction = get_field('mona_home_introduction', $post_id);
        $mona_home_about_title = get_field('mona_home_about_title', $post_id);
        $mona_home_benefit_items = get_field('mona_home_benefit_items', $post_id);
        $mona_home_video_reviews = get_field('mona_home_video_reviews', $post_id);
        $mona_home_contacts = get_field('mona_home_contacts', $post_id);
        $mona_home_loikets = get_field('mona_home_loikets', $post_id);
        if (!empty($args) && $args['get_content'] === '_banner_slider') {
            if (is_array($mona_home_banner_slider_items)) {
            ?>
                <div class="banner-home">

                    <div class="slide-banner" id="slide-banner">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($mona_home_banner_slider_items as $key => $item) {
                                    if (wp_is_mobile()) {
                                        $image_url = wp_get_attachment_image_url($item['mona_home_banner_slider_item_image_mobile'], 'full');
                                    } else {
                                        $image_url = wp_get_attachment_image_url($item['mona_home_banner_slider_item_image_desktop'], '1900x790');
                                    }
                                ?>
                                    <div class="swiper-slide" style="background-image: url(<?php echo $image_url ?>);">
                                        <div class="container">
                                            <div class="wrapper-container">
                                                <h3 class="txt-title txt-upcase">
                                                    <?php echo $item['mona_home_banner_slider_item_title'] ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="box-hotline">
                            <a href="<?php echo mona_replace_tel(mona_get_option('contact_tel')) ?>"><i class="fas fa-phone-alt"></i><span class="txt-hotline">
                                    <?php echo mona_get_option('contact_tel') ?>
                                </span></a>
                        </div>
                        <div class="box-keoxuong">
                            <a href="#say" class="txt-keoxuong">
                                <?php echo __('Kéo xuống', 'monamedia') ?>
                            </a>
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
            <?php }
        } elseif (!empty($args) && $args['get_content'] === '_introduction') {
            $mona_home_introduction_image_banner = $mona_home_introduction['mona_home_introduction_image_banner'];
            if ($mona_home_introduction_image_banner) {
                $image_url = wp_get_attachment_image_url($mona_home_introduction_image_banner, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/img-muctieu.png';
            }
            ?>
            <section class="sec-say" id="say" style="background-image: url(<?php echo $image_url; ?>);">
                <div class="container">
                    <div class="wrapper-container">
                        <div class="box-left-right">
                            <div class="wrapper-left" data-aos="fade-right">
                                <h3 class="txt-title txt-46">
                                    <?php echo $mona_home_introduction['mona_home_introduction_title'] ?>
                                </h3>
                                <?php if ($mona_home_introduction['mona_home_introduction_link']) { ?>
                                    <div class="wrapper-link">
                                        <a href="<?php echo esc_url($mona_home_introduction['mona_home_introduction_link']) ?>" class="link-w-0">
                                            <?php echo __('Xem chi tiết', 'monamedia') ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if ($mona_home_introduction['mona_home_introduction_button_link']) { ?>
                                <div class="wrapper-right" data-aos="fade-left">
                                    <a href="<?php echo esc_url($mona_home_introduction['mona_home_introduction_button_link']) ?>" class="btn-green-cir btn">
                                        <img src="<?php echo get_site_url() ?>/template/images/arrow-right.png" alt="arrow-right.png"></a>
                                    <p class="bold txt-24">
                                        <?php echo $mona_home_introduction['mona_home_introduction_button_text'] ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php } elseif (!empty($args) && $args['get_content'] === '_benefit') {
            if (is_array($mona_home_benefit_items)) {
            ?>
                <section class="sec-loiich">
                    <div class="container">
                        <?php
                        if ($mona_home_about_title != '') {
                            echo '<h2 class="txt-title txt-36" style="margin-bottom:40px">' . $mona_home_about_title . ' </h2>';
                        }
                        ?>
                        <div class="wrapper-container">
                            <div class="box-flex">
                                <?php foreach ($mona_home_benefit_items as $key => $item) { ?>
                                    <div class="col-3" data-aos="fade-right">
                                        <div class="wrapper-col">
                                            <div class="box-img">
                                                <?php echo wp_get_attachment_image($item['mona_home_benefit_item_icon'], '120x120') ?>
                                            </div>
                                            <div class="box-content">
                                                <h3 class="txt-title txt-24">
                                                    <?php echo $item['mona_home_benefit_item_title'] ?>
                                                </h3>
                                                <p class="txt-desc">
                                                    <?php echo $item['mona_home_benefit_item_desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php }
        } elseif (!empty($args) && $args['get_content'] === '_video') {
            $upload = $mona_home_video_reviews['mona_home_video_review_video_upload'];

            ?>
            <section class="sec-video">
                <div class="container-full">
                    <div class="wrapper-container">
                        <div class="box-video" data-aos="zoom-in-right">
                            <video src="<?php echo @($upload['url']) ?>" id="video-player" poster="<?php echo wp_get_attachment_image_url($mona_home_video_reviews['mona_home_video_review_image'], '1920x1075') ?>"></video>
                            <?php
                            $mona_home_video_review_items = $mona_home_video_reviews['mona_home_video_review_items'];
                            if (is_array($mona_home_video_review_items)) {
                            ?>
                                <div class="box-meta-video">
                                    <?php
                                    foreach ($mona_home_video_review_items as $key => $item) {
                                        $mona_home_video_review_item_obj = $item['mona_home_video_review_item_obj'];
                                        if (!empty($mona_home_video_review_item_obj)) {
                                    ?>
                                            <div class="item-video">
                                                <div class="wrapper-img">
                                                    <a href="<?php echo get_the_permalink($mona_home_video_review_item_obj->ID); ?>">
                                                        <?php echo get_the_post_thumbnail($mona_home_video_review_item_obj->ID, '140x80') ?>
                                                    </a>
                                                </div>
                                                <div class="box-title">
                                                    <a href="<?php echo get_the_permalink($mona_home_video_review_item_obj->ID); ?>" class="txt-title">
                                                        <?php echo get_the_title($mona_home_video_review_item_obj->ID) ?>
                                                    </a>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_contact') { ?>
            <section class="sec-contact">
                <div class="container-full">
                    <div class="wrapper-container">
                        <div class="box-flex">
                            <div class="col-4" data-aos="fade-up">
                                <div class="img-bg">
                                    <?php echo wp_get_attachment_image($mona_home_contacts['mona_home_contact_image1'], '640x1280') ?>
                                </div>
                                <div class="wrapper-col mona-content">
                                    <div class="txt-content bold txt-36">
                                        <?php echo $mona_home_contacts['mona_home_contact_desc1'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="item-col col-white" data-aos="fade-up">
                                    <div class="img-bg">
                                        <?php echo wp_get_attachment_image($mona_home_contacts['mona_home_contact_image2'], '1020x510') ?>
                                    </div>
                                    <div class="wrapper-col mona-content">
                                        <div class="txt-white txt-30">
                                            <?php echo $mona_home_contacts['mona_home_contact_desc2'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-col col-contact" data-aos="fade-up">
                                    <div class="img-bg">
                                        <?php echo wp_get_attachment_image($mona_home_contacts['mona_home_contact_image3'], '1020x510') ?>
                                    </div>
                                    <div class="wrapper-col">
                                        <div class="txt-title">
                                            <?php echo $mona_home_contacts['mona_home_contact_desc3'] ?>
                                        </div>
                                        <?php
                                        $mona_home_contact_items = $mona_home_contacts['mona_home_contact_items'];
                                        if (is_array($mona_home_contact_items)) {
                                        ?>
                                            <div class="box-contact">
                                                <?php
                                                foreach ($mona_home_contact_items as $key => $item) {
                                                    $item_option = $item['mona_home_contact_item_option'];
                                                ?>
                                                    <div class="item-box">
                                                        <div class="wrapper-img">
                                                            <?php echo wp_get_attachment_image($item['mona_home_contact_item_icon'], '32x32') ?>
                                                        </div>
                                                        <div class="wrapper-content">
                                                            <p class="text"><?php echo $item['mona_home_contact_item_title'] ?></p>
                                                            <?php
                                                            if ($item_option == 'value_email') {
                                                                echo '<a href="mailto:' . $item['mona_home_contact_item_desc'] . '" class="txt-link">' . $item['mona_home_contact_item_desc'] . '</a>';
                                                            } elseif ($item_option == 'value_phone') {
                                                                echo '<a href="' . mona_replace_tel($item['mona_home_contact_item_desc']) . '" class="txt-link">' . $item['mona_home_contact_item_desc'] . '</a>';
                                                            } else {
                                                                echo '<p class="txt-link">' . $item['mona_home_contact_item_desc'] . '</p>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif (!empty($args) && $args['get_content'] === '_loiket') {
            $mona_home_loiket_image = $mona_home_loikets['mona_home_loiket_image'];
            if ($mona_home_loiket_image) {
                $image_url = wp_get_attachment_image_url($mona_home_loiket_image, 'full');
            } else {
                $image_url = get_site_url() . '/template/images/img-muctieu.png';
            }
        ?>
            <section class="sec-loiket" style="background-image: url(<?php echo $image_url; ?>);">
                <div class="container">
                    <div class="wrapper-container" data-aos="zoom-in">
                        <div class="wrapper-img">
                            <img src="<?php echo get_site_url() ?>/template/images/daukep.png" alt="daukep.png">
                        </div>
                        <div class="wrapper-content">
                            <p class="bold txt-36">
                                <?php echo $mona_home_loikets['mona_home_loiket_desc']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
<?php }
    }
}
