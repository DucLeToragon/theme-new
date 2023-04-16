<?php
$obz = get_queried_object();
$categorypost = get_the_terms( get_the_ID(), 'category' );
$categoryproduct = get_the_terms( get_the_ID(), 'category_product' );
?>
<ul class="breadcrumb-list">
    <li>
        <a href="<?php echo get_home_url(); ?>"><?php echo mona_get_home_title(); ?></a>
    </li>
    <?php
    if ( is_single() && $obz->post_type == 'post' ) {
        echo '<li>
            <a href="'.mona_get_blogs_url().'">'.mona_get_blogs_title().'</a>
        </li>';
        if ( ! empty( $categorypost ) ) {
            foreach ( $categorypost as $key => $item ) {
                echo '<li>
                    <a href="'.get_term_link( $item->term_id ).'">'.$item->name.'</a>
                </li>';
            }
        }
    }
    ?>
    <?php
    if ( is_single() && $obz->post_type == 'mona_product' ) {
        echo '<li>
            <a href="'.get_the_permalink( MONA_SAN_PHAM ).'">'.get_the_title( MONA_SAN_PHAM ).'</a>
        </li>';
        if ( ! empty( $categoryproduct ) ) {
            foreach ( $categoryproduct as $key => $item ) {
                echo '<li>
                    <a href="'.get_term_link( $item->term_id ).'">'.$item->name.'</a>
                </li>';
            }
        }
    }
    ?>
    <?php
    if ( $obz->taxonomy == 'category' ) {
        echo '<li>
            <a href="'.mona_get_blogs_url().'">'.mona_get_blogs_title().'</a>
        </li>';
        echo breadcrumb_terms_list_html( $obz->term_id, 'category' );
    }
    ?>
    <?php
    if ( is_tax() && $obz->taxonomy == 'category_product' ) {
        echo '<li>
            <a href="'.get_the_permalink( MONA_SAN_PHAM ).'">'.get_the_title( MONA_SAN_PHAM ).'</a>
        </li>';
        echo breadcrumb_terms_list_html( $obz->term_id, 'category_product' );
    }
    ?>
    <?php
    if ( is_tax() && $obz->taxonomy == 'category_product_type' ) {
        echo '<li>
            <a href="'.get_the_permalink( MONA_SAN_PHAM ).'">'.get_the_title( MONA_SAN_PHAM ).'</a>
        </li>';
        echo breadcrumb_terms_list_html( $obz->term_id, 'category_product_type' );
    }
    ?>
    <?php
    if ( is_tax() && $obz->taxonomy == 'category_product_size' ) {
        echo '<li>
            <a href="'.get_the_permalink( MONA_SAN_PHAM ).'">'.get_the_title( MONA_SAN_PHAM ).'</a>
        </li>';
        echo breadcrumb_terms_list_html( $obz->term_id, 'category_product_size' );
    }
    ?>
    <?php
    if ( $obz->taxonomy == 'post_tag' ) {
        echo '<li>
            <a href="'.mona_get_blogs_url().'">'.mona_get_blogs_title().'</a>
        </li>';
        echo breadcrumb_terms_list_html( $obz->term_id, 'post_tag' );
    }
    ?>
    <?php if ( is_single() || is_page() ) { ?>
    <li class="active">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
    <?php } ?>
</ul>
