<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php
if ( have_comments() ){
    echo '<hr>';
}
?>

<div id="comments">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
        ?>
        <h3 class="mb-6">
            <?php
            $sandbox_comment_count = get_comments_number();
            if ( '1' === $sandbox_comment_count ) {
                printf(
                /* translators: 1: title. */
                    esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'sandbox' ),
                    wp_kses_post( get_the_title() )
                );
            } else {
                printf(
                /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $sandbox_comment_count, 'comments title', 'sandbox' ) ),
                    number_format_i18n( $sandbox_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    wp_kses_post( get_the_title() )
                );
            }
            ?>
        </h3><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol id="singlecomments" class="commentlist">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'callback'   => 'sandbox_comment'
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sandbox' ); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().

    ?>
</div>
<hr />
<?php sandbox_comment_form() ?>
