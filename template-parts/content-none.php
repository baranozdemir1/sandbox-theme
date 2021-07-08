<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

?>

<div class="alert alert-warning alert-icon alert-dismissible fade show" role="alert">
    <i class="uil uil-exclamation-triangle"></i>
    <?php esc_html_e( 'Nothing Found', 'sandbox' ); ?> <a href="<?php home_url( '/' ) ?>" class="alert-link hover">Go to Home Page</a>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="<?php _e( 'Close', 'sandbox' ); ?>"></button>
</div>

