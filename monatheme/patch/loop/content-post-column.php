<div class="box-new-v">
    <div class="wrapper-new">
        <div class="box-img">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( '450x370' ) ?>
            </a>
        </div>
        <div class="box-content">
            <a href="<?php the_permalink(); ?>" class="link-w-0" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
            <span class="txt-day"><?php echo get_the_date(); ?></span>
            <div class="txt-desc">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="link-w-100">
                <?php echo __('Tiếp tục đọc', 'monamedia' ) ?>
            </a>
        </div>
    </div>
</div>
