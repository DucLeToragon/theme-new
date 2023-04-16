<footer class="footer">
    <div class="container">
        <div class="wrapper-container">
            <div class="box-flex">
                <div class="col-8">
                    <div class="wrapper-col">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('_footer_1')) : ?><?php endif; ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="wrapper-col">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('_footer_2')) : ?><?php endif; ?>
                    </div>
                </div>
                <span class="copy-right">
                    Copyright © HSIA CHENG WOVEN TEXTILE FACTORY CO.,LTD. All Rights Reserved<br>
                    <a href="<?php echo get_the_permalink(481)?>" target="_blank"><?php echo get_the_title(481);?></a>
                </span>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo site_url(); ?>/template/js/jquery/jquery-3.5.1.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/lightGallery/lightgallery.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/lightGallery/lightgallery-all.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/lightGallery/lg-zoom.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/magificPopup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/aos/aos.js"></script>
<script src="<?php echo site_url(); ?>/template/js/lib/fluidplayer/fluidplayer.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/wow.min.js"></script>
<script src="<?php echo site_url(); ?>/template/js/main.js" type="module"></script>
<?php wp_footer(); ?>
</body>

</html  