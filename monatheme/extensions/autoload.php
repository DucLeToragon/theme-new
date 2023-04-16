<?php
/**
 * Auto load file
 * extensions
 */
$filename = glob( get_template_directory() . '/extensions/*.php' );
foreach ( $filename as $file ) {
    require_once( $file );
}
?>
