<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Sandbox
 */

if ( ! function_exists( 'sandbox_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function sandbox_posted_on( $post_id = 0 ) {
		$time_string = '<i class="uil uil-calendar-alt"></i><span>%1$s</span>';

		$time_string = sprintf(
			$time_string,
			esc_html( get_the_date( '', $post_id ) ),
		);

		echo $time_string;

	}
endif;

if ( ! function_exists( 'sandbox_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function sandbox_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'sandbox' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="uil uil-user"></i><span>' . esc_html( get_the_author() ) . '</span></a>'
		);

		echo $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'sandbox_the_terms' ) ) {

    function sandbox_the_terms( $taxonomy ) {

        $terms = get_the_terms( get_the_ID(), $taxonomy );

        if ( $terms && ! is_wp_error( $terms ) ) :

            $term_links = array();

            foreach ( $terms as $term ) {
                $term_links[] = '<li><a class="btn btn-soft-ash btn-sm rounded-pill mb-0" href="' . esc_attr( get_term_link( $term->slug, $taxonomy ) ) . '">' . __( $term->name ) . '</a></li>';
            }

            $all_terms = join( '', $term_links );

            echo '<ul class="list-unstyled tag-list mb-0">' . __( $all_terms ) . '</ul>';

        endif;

    }

}

if ( ! function_exists( 'sandbox_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function sandbox_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'sandbox_get_user_social_links' ) ):
    function sandbox_get_user_social_links() {
        $return  = '<nav class="nav social">';
        if(!empty(get_the_author_meta('twitter'))) {
            $return .= '<a href="'.get_the_author_meta('twitter').'" title="Twitter" target="_blank" id="twitter"><i class="uil uil-twitter"></i></a>';
        }
        if(!empty(get_the_author_meta('facebook'))) {
            $return .= '<a href="'.get_the_author_meta('facebook').'" title="Facebook" target="_blank" id="facebook"><i class="uil uil-facebook-f"></i></a>';
        }
        if(!empty(get_the_author_meta('linkedin'))) {
            $return .= '<a href="'.get_the_author_meta('linkedin').'" title="LinkedIn" target="_blank" id="linkedin"><i class="uil uil-linkedin"></i></a>';
        }
        if(!empty(get_the_author_meta('github'))) {
            $return .= '<a href="'.get_the_author_meta('github').'" title="Github" target="_blank" id="github"><i class="uil uil-github"></i></a>';
        }
        if(!empty(get_the_author_meta('instagram'))) {
            $return .= '<a href="'.get_the_author_meta('instagram').'" title="Instagram" target="_blank" id="instagram"><i class="uil uil-instagram"></i></a>';
        }
        if(!empty(get_the_author_meta('youtube'))) {
            $return .= '<a href="'.get_the_author_meta('youtube').'" title="YouTube" target="_blank" id="youtube"><i class="uil uil-youtube"></i></a>';
        }
        if(!empty(get_the_author_meta('behance'))) {
            $return .= '<a href="'.get_the_author_meta('behance').'" title="Behance" target="_blank" id="behance"><i class="uil uil-behance"></i></a>';
        }
        $return .= '</nav>';

        return $return;
    }
endif;

function baran_comment_form() {
    //Declare Vars
    $comment_author = __( 'Name *', 'sandbox' );
    $comment_email = __( 'Email *', 'sandbox' );
    $comment_body = __( 'Comment', 'sandbox' );

    $comments_args = array(
        //Define Fields
        'fields' => array(
            //Author field
            'author' => '<div class="form-label-group mb-4"><input type="text" class="form-control" id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"><label for="author">'. $comment_author .'</label></div>',
            //Email Field
            'email' => '<div class="form-label-group mb-4"><input class="form-control" id="email" name="email" placeholder="' . $comment_email .'"><label for="email">'. $comment_email .'</label></div>',
        ),
        // Redefine your own textarea (the comment body).
        'comment_field'         => '<div class="form-label-group mb-4"><textarea class="form-control" rows="5" id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea><label>'. $comment_body .'</label></div>',
        //Submit Button ID
        'class_form'            => 'comment-form',
        'title_reply'           => __( 'Would you like to share your thoughts?', 'sandbox' ),
        'submit_button'         => '<button type="submit" class="btn btn-primary rounded-pill mb-0">Submit</button>',
        'title_reply_to'       => __( 'Leave a Reply to %s', 'sandbox' ),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <span class="baran-cancel-reply">',
        'cancel_reply_after'   => '</span>',
        'cancel_reply_link'    => sprintf('<i class="fas fa-times"></i> %s', __( 'Cancel reply', 'sandbox' )),
    );

    comment_form( $comments_args );
}

function baran_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>

    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? 'comment ' : 'ozdemir' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-header d-md-flex align-items-center"><?php
    } ?>

            <div class="d-flex align-items-center">
                <figure class="user-avatar"><?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'rounded-circle' ));
                    }
                    ?>
                </figure>
                <div>
                    <h6 class="comment-author">
                        <?php echo get_comment_author_link() ?>
                    </h6>
                    <ul class="post-meta">
                        <li><i class="uil uil-calendar-alt"></i><?php echo get_comment_date() ?></li>
                    </ul>
                    <!-- /.post-meta -->
                </div>
                <!-- /div -->
            </div>
            <div class="mt-3 mt-md-0 ms-auto">
                <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text'=> '<i class="uil uil-comments"></i> Reply'
                        )
                    )
                );
                ?>
            </div>

        </div>
        <?php
        comment_text();
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( '( Your comment is awaiting moderation. )' ); ?></em><?php
        }
        ?>

    <?php
}


