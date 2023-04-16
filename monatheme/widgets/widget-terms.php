<?php
// Creating the widget
class Mona_widget_terms extends WP_Widget {

    function __construct() {
        parent::__construct(
        'wpb_widget_terms',
        __('Mona - Danh mục', 'monamedia'),
        array(
            'description' => __( 'Hiển thị danh sách danh mục tùy chọn', 'monamedia' ), )
        );
    }


    public function widget( $args, $instance ) {
        $widget_id = $args['widget_id'];
        $widget_title = esc_attr( $instance['widget_title'] );
        $widget_taxonomy = esc_attr( $instance['widget_taxonomy'] );
        $termsObj = get_terms(
            array(
                'taxonomy' => $widget_taxonomy,
                'hide_empty' => true,
                'parent' => 0,
            )
        )
        ?>
        <div class="box-sidebar">
            <div class="box-title-sidebar">
                <h4 class="title text-upcase text-white text-16">
                    <?php echo $widget_title ?>
                </h4>
            </div>
            <div class="box-content-sidebar">
                <div class="wrapper-content-danhmuc">
                    <ul class="box-link-sidebar">
                        <?php
                        if ( ! empty( $termsObj ) ) {
                            foreach ( $termsObj as $item ) {
                        ?>
                        <li>
                            <a href="<?php echo esc_url( get_term_link( $item->term_id ) ) ?>"><?php echo $item->name ?></a>
                            <span class="tag-amount"><?php echo $item->count ?></span>
                        </li>
                        <?php }} else { ?>
                        <div class="mona-mess-empty">
                            <p><?php echo __( 'Không có danh mục', 'monamedia' ) ?></p>
                        </div>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'widget_title' ] ) ) {
            $widget_title = $instance[ 'widget_title' ];
        }
        ?>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php echo __( 'Tiêu đề:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( 'widget_title' ); ?>"
                name="<?php echo $this->get_field_name( 'widget_title' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ 'widget_title' ] ) ? $instance[ 'widget_title' ] : '' ); ?>" />
            </p>
        </div>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-taxonomys">
                <label for="<?php echo $this->get_field_id( 'widget_taxonomy' ); ?>"><?php echo __( 'Chọn loại danh mục:', 'monamedia' ); ?></label>
                <select id="<?php echo $this->get_field_id('widget_taxonomy'); ?>" name="<?php echo $this->get_field_name('widget_taxonomy'); ?>" class="mona-custom-widget mona-select w-100">
                    <option <?php selected( isset( $instance['widget_taxonomy'] ) ? $instance['widget_taxonomy'] : '', 'category'); ?> value="<?php echo esc_attr( 'category' ) ?>"><?php echo __( 'Danh mục bài viết', 'monamedia' ) ?></option>
                    <option <?php selected( isset( $instance['widget_taxonomy'] ) ? $instance['widget_taxonomy'] : '', 'product_cat'); ?> value="<?php echo esc_attr( 'product_cat' ) ?>"><?php echo __( 'Danh mục sản phẩm', 'monamedia' ) ?></option>
                </select>
            </p>
        </div>
        <style>
        .w-100 {
            width: 100%;
        }
        </style>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ? strip_tags( $new_instance['widget_title'] ) : '';
        $instance['widget_taxonomy'] = ( ! empty( $new_instance['widget_taxonomy'] ) ) ? strip_tags( $new_instance['widget_taxonomy'] ) : '';
        return $instance;
    }

}

    // Register and load the widget
function wpb_load_widget_terms() {
    register_widget( 'Mona_widget_terms' );
}
add_action( 'widgets_init', 'wpb_load_widget_terms' );
