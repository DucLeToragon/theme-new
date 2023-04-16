<?php
// Creating the widget
class Mona_widget_ft_socials extends WP_Widget {

    function __construct() {
        parent::__construct(
        'wpb_widget_ft_socials',
        __('Mona - Liên kết mạng xã hội', 'monamedia'),
        array(
            'description' => __( 'Hiển thị các button liên kết mạng xã hội', 'monamedia' ), )
        );
    }


    public function widget( $args, $instance ) {
        $widget_id = $args['widget_id'];
        $_title = esc_attr( $instance['_title'] );
        $_facebook = esc_attr( $instance['_facebook'] );
        $_youtobe = esc_attr( $instance['_youtobe'] );
        $_instagram = esc_attr( $instance['_instagram'] );
        $_linkedin = esc_attr( $instance['_linkedin'] );
        $_zalo = esc_attr( $instance['_zalo'] );
        ?>
        <h3 class="txt-title txt-upcase txt-24">
            <?php echo $_title ?>
        </h3>
        <ul class="list-social">
            <?php if ( $_facebook ) { ?>
            <li>
                <a target="_blank" href="<?php echo esc_url( $_facebook ) ?>">
                    <img src="<?php echo get_site_url() ?>/template/images/icon-fb-light.png" alt="icon-fb-light.png">
                </a>
            </li>
            <?php } ?>
            <?php if ( $_youtobe ) { ?>
            <li>
                <a target="_blank" href="<?php echo esc_url( $_youtobe ) ?>">
                    <img src="<?php echo get_site_url() ?>/template/images/icon-twitter-light.png" alt="icon-twitter-light.png">
                </a>
            </li>
            <?php } ?>
            <?php if ( $_instagram ) { ?>
            <li>
                <a target="_blank" href="<?php echo esc_url( $_instagram ) ?>">
                    <img src="<?php echo get_site_url() ?>/template/images/icon-ins-light.png" alt="icon-ins-light.png">
                </a>
            </li>
            <?php } ?>
            <?php if ( $_linkedin ) { ?>
            <li>
                <a target="_blank" href="<?php echo esc_url( $_linkedin ) ?>">
                    <img src="<?php echo get_site_url() ?>/template/images/linkedin.png" alt="icon-ins-light.png">
                </a>
            </li>
            <?php } ?>
            <?php if ( $_zalo ) { ?>
            <li>
                <a target="_blank" href="<?php echo esc_url( $_zalo ) ?>">
                    <img style="
    max-width: 32px;
    border-radius: 100%;
" src="<?php echo get_site_url() ?>/template/images/zalo-icon-nen-trang.png" alt="icon-ins-light.png">
                </a>
            </li>
            <?php } ?>
        </ul>
        <?php
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ '_title' ] ) ) {
            $_title = $instance[ '_title' ];
        }
        if ( isset( $instance[ '_facebook' ] ) ) {
            $_facebook = $instance[ '_facebook' ];
        }
        if ( isset( $instance[ '_youtobe' ] ) ) {
            $_youtobe = $instance[ '_youtobe' ];
        }
        if ( isset( $instance[ '_instagram' ] ) ) {
            $_instagram = $instance[ '_instagram' ];
        }
        if ( isset( $instance[ '_linkedin' ] ) ) {
            $_linkedin = $instance[ '_linkedin' ];
        }
        if ( isset( $instance[ '_zalo' ] ) ) {
            $_zalo = $instance[ '_zalo' ];
        }
        ?>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( '_title' ); ?>"><?php echo __( 'Tiêu đề:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( '_title' ); ?>"
                name="<?php echo $this->get_field_name( '_title' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ '_title' ] ) ? $instance[ '_title' ] : '' ); ?>" />
            </p>
        </div>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( '_facebook' ); ?>"><?php echo __( 'Facebook:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( '_facebook' ); ?>"
                name="<?php echo $this->get_field_name( '_facebook' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ '_facebook' ] ) ? $instance[ '_facebook' ] : '' ); ?>" />
            </p>
        </div>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( '_youtobe' ); ?>"><?php echo __( 'Twitter:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( '_youtobe' ); ?>"
                name="<?php echo $this->get_field_name( '_youtobe' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ '_youtobe' ] ) ? $instance[ '_youtobe' ] : '' ); ?>" />
            </p>
        </div>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( '_instagram' ); ?>"><?php echo __( 'Instagram:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( '_instagram' ); ?>"
                name="<?php echo $this->get_field_name( '_instagram' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ '_instagram' ] ) ? $instance[ '_instagram' ] : '' ); ?>" />
            </p>
        </div>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( '_linkedin' ); ?>"><?php echo __( 'Linkedin:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( '_linkedin' ); ?>"
                name="<?php echo $this->get_field_name( '_linkedin' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ '_linkedin' ] ) ? $instance[ '_linkedin' ] : '' ); ?>" />
            </p>
        </div>
        <div class="mona-widget-items">
            <p class="widget-item field-widget-title">
                <label for="<?php echo $this->get_field_id( '_zalo' ); ?>"><?php echo __( 'Zalo:', 'monamedia' ); ?></label>
                <input type="text"
                class="mona-custom-widget w-100"
                id="<?php echo $this->get_field_id( '_zalo' ); ?>"
                name="<?php echo $this->get_field_name( '_zalo' ); ?>"
                value="<?php echo esc_attr( isset( $instance[ '_zalo' ] ) ? $instance[ '_zalo' ] : '' ); ?>" />
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
        $instance['_title'] = ( ! empty( $new_instance['_title'] ) ) ? strip_tags( $new_instance['_title'] ) : '';
        $instance['_facebook'] = ( ! empty( $new_instance['_facebook'] ) ) ? strip_tags( $new_instance['_facebook'] ) : '';
        $instance['_youtobe'] = ( ! empty( $new_instance['_youtobe'] ) ) ? strip_tags( $new_instance['_youtobe'] ) : '';
        $instance['_instagram'] = ( ! empty( $new_instance['_instagram'] ) ) ? strip_tags( $new_instance['_instagram'] ) : '';
        $instance['_linkedin'] = ( ! empty( $new_instance['_linkedin'] ) ) ? strip_tags( $new_instance['_linkedin'] ) : '';
        $instance['_zalo'] = ( ! empty( $new_instance['_zalo'] ) ) ? strip_tags( $new_instance['_zalo'] ) : '';
        return $instance;
    }

}

    // Register and load the widget
function wpb_load_widget_ft_sicals() {
    register_widget( 'Mona_widget_ft_socials' );
}
add_action( 'widgets_init', 'wpb_load_widget_ft_sicals' );
