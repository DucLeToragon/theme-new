<?php
// Creating the widget
class Mona_widget_ft_images extends WP_Widget {

    function __construct() {
        parent::__construct(
        'wpb_widget_ft_images',
        __('Mona - Danh sách hình ảnh', 'monamedia'),
        array(
            'description' => __( 'Hiển thị các danh sách hình ảnh', 'monamedia' ), )
        );
    }


    public function widget( $args, $instance ) {
        $widget_id = $args['widget_id'];
        $mona_widget_image_title = get_field('mona_widget_image_title', 'widget_' .$widget_id);
        $mona_widget_image_item = get_field('mona_widget_image_item', 'widget_' .$widget_id);
        ?>
        <h3 class="txt-title txt-upcase txt-24 mt-20">
            <?php echo $mona_widget_image_title ?>
        </h3>
        <?php if ( ! empty( $mona_widget_image_item ) ) { ?>
        <ul class="list-chungnhan">
            <?php foreach ( $mona_widget_image_item as $key => $item ) { ?>
            <li>
                <?php echo wp_get_attachment_image( $item, 'full' ) ?>
            </li>
            <?php } ?>
        </ul>
        <?php
        }
    }

    // Widget Backend
    public function form( $instance ) {

    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        return $instance;
    }

}

    // Register and load the widget
function wpb_load_widget_ft_images() {
    register_widget( 'Mona_widget_ft_images' );
}
add_action( 'widgets_init', 'wpb_load_widget_ft_images' );
