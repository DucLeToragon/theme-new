<?php
/**
 * Image size register
 */
function mona_image_size() {
    add_image_size('1900x790', 1900, 790, false);
    add_image_size('400x50', 400, 50, true);
    add_image_size('90x50', 90, 50, true);
    add_image_size('930x560', 930, 560, true);
    add_image_size('360x210', 360, 210, true);
    add_image_size('140x80', 140, 80, true);
    add_image_size('450x370', 450, 370, true);
    add_image_size('500x500', 500, 500, true);
    add_image_size('70x70', 500, 500, true);
    add_image_size('570x400', 570, 400, false);
    add_image_size('310x310', 310, 310, true);
    add_image_size('765x650', 765, 650, true);
    add_image_size('650x500', 650, 500, true);
    add_image_size('420x720', 420, 720, false);
    add_image_size('480x260', 480, 260, true);
    add_image_size('860x1040', 860, 1040, true);
    add_image_size('500x670', 500, 670, false);
    add_image_size('470x670', 470, 670, false);
    add_image_size('720x720', 720, 720, true);
    add_image_size('310x500', 310, 500, false);
    add_image_size('360x630', 360, 630, false);
    add_image_size('960x700', 960, 700, false);
    add_image_size('120x120', 120, 120, false);
    add_image_size('640x1280', 640, 1280, false);
    add_image_size('1020x510', 1020, 510, true);
    add_image_size('32x32', 32, 32, true);
    add_image_size('170x70', 170, 70, true);
    add_image_size('375x999', 375, 999, false);
    add_image_size('1920x1075', 1920, 1075, true);
    add_image_size('340x300', 340, 300, true);
    add_image_size('450x315', 450, 315, true);
}
add_action('after_setup_theme', 'mona_image_size');
