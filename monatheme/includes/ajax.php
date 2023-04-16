<?php
// AJAX
function mona_ajax_pagination() {

}
add_action('wp_ajax_mona_ajax_pagination', 'mona_ajax_pagination'); // login
add_action('wp_ajax_nopriv_mona_ajax_pagination', 'mona_ajax_pagination'); // no login
