<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Sandbox
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sandbox_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sandbox_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sandbox_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sandbox_pingback_header' );

function sandbox_tax_cat_active( $output, $args ) {

    if(is_archive()){
        global $post;

        $terms = get_the_terms( $post->ID, 'category' );
        foreach( $terms as $term ) {
            if (preg_match('#aria-current="page"#', $output)) {
                $output = str_replace('aria-current="page"', 'aria-current="page" class="active"', $output);
            }
        }
    }

    return $output;
}
add_filter( 'wp_list_categories', 'sandbox_tax_cat_active', 10, 2 );

function sandbox_custom_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<ul class='pagination'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' aria-label='Start' href='".get_pagenum_link(1)."'><span aria-hidden='true'><i class='uil uil-angle-double-left'></i></span></a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' aria-label='Previous' href='".get_pagenum_link($paged - 1)."'><span aria-hidden='true'><i class='uil uil-arrow-left'></i></span></a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='page-item active'><a class='page-link'>".$i."</a></li>" : "<li class='page-item'><a class='page-link' href='".get_pagenum_link($i)."'>".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li class='page-item'><a class='page-link' aria-label='Next' href='".get_pagenum_link($paged + 1)."'><span aria-hidden='true'><i class='uil uil-arrow-right'></i></span></a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='page-item'><a class='page-link' aria-label='End' href='".get_pagenum_link($pages)."'><span aria-hidden='true'><i class='uil uil-angle-double-right'></i></span></a></li>";
        echo "</ul>\n";
    }
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'sandbox_data_fetch');
add_action('wp_ajax_nopriv_data_fetch','sandbox_data_fetch');
function sandbox_data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => 5, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        ?>
        <ul class="mt-5 icon-list bullet-primary">
        <?php
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <li>
                <span><i class="uil uil-arrow-right"></i></span><span>
                  <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a>
                </span>
            </li>

        <?php endwhile;?>
        </ul>
        <?php
        wp_reset_postdata();
    else:
        echo '<div class="mt-5 alert alert-danger alert-icon" role="alert"><i class="uil uil-times-circle"></i> No Results Found </div>';
    endif;
    die();
}

// add the ajax fetch js
add_action( 'wp_footer', 'sandbox_ajax_fetch' );
function sandbox_ajax_fetch() {
    ?>
    <script type="text/javascript">
        function sandboxAjaxSearch(){
            let keyword = jQuery( '#search-form' ).val();
            if ( keyword === '' ){
                jQuery( '#searchContent' ).html('');
            } else {
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: {
                        action: 'data_fetch',
                        keyword: keyword
                    },
                    success: function ( data ) {
                        jQuery( '#searchContent' ).html( data );
                    },
                    error: function ( data ) {
                        jQuery( '#searchContent' ).html( data );
                    }
                });
            }

        }
    </script>
    <?php
}

/*-----------------------------------------------------------*/
/*   Add User Social Links (functions.php)
/*-----------------------------------------------------------*/
function sandbox_add_user_social_links( $user_contact ) {

    /* Add user contact methods */
    $user_contact['twitter']   = __('Twitter Link', 'sandbox');
    $user_contact['facebook']  = __('Facebook Link', 'sandbox');
    $user_contact['linkedin']  = __('LinkedIn Link', 'sandbox');
    $user_contact['github']    = __('Github Link', 'sandbox');
    $user_contact['instagram'] = __('Instagram Link', 'sandbox');
    $user_contact['youtube']   = __('YouTube Link', 'sandbox');
    $user_contact['behance']   = __('Behance Link', 'sandbox');

    return $user_contact;
}
add_filter('user_contactmethods', 'sandbox_add_user_social_links');

function sandbox_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    unset( $fields['cookies'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'sandbox_move_comment_field_to_bottom' );

function sandbox_comment_reply_link($content) {
    $extra_classes = 'btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}
add_filter( 'comment_reply_link', 'sandbox_comment_reply_link', 99 );

function sandbox_get_comment_author_link( $content ) {
    $extra_classes = 'link-dark';
    return preg_replace( '/url/', 'url ' . $extra_classes, $content );
}
add_filter( 'get_comment_author_link', 'sandbox_get_comment_author_link', 99 );

function sandbox_add_blog_posts_classes($content)
{
    if ( empty( $content ) ) {
        $content = ' ';
    }

    $doc = new DOMDocument(); //Instantiate DOMDocument
    libxml_use_internal_errors(true);
    $doc->loadHTML($content); //Load the Post/Page Content as HTML
    libxml_clear_errors();
    $blockquotes = $doc->getElementsByTagName( 'blockquote' );

    $tagH = 'h';

    for ( $say = 1; $say <= 6; $say++ ) {
        $tagHs = $tagH . $say;

        $h1s = $doc->getElementsByTagName( $tagHs );

        foreach ( $h1s as $h1 ) {
            sandbox_append_attr_to_element($h1, 'class', $tagHs . ' mb-4');
        }
    }

    foreach ($blockquotes as $blockquote ) {
        sandbox_append_attr_to_element($blockquote, 'class', 'fs-lg my-8');
    }

    if ( $doc->getElementsByTagName( 'blockquote' ) ) {
        $cites = $doc->getElementsByTagName( 'cite' );

        foreach ( $cites as $cite ){
            sandbox_append_attr_to_element($cite, 'class', 'set-footer blockquote-footer');
        }
    }

    return $doc->saveHTML(); //Return modified content as string
}
add_filter( 'the_content', 'sandbox_add_blog_posts_classes', 20 );

/**
 * @param $element
 * @param $attr
 * @param $value
 */
function sandbox_append_attr_to_element(&$element, $attr, $value)
{
    if($element->hasAttribute($attr)) {
        $attrs = explode(' ', $element->getAttribute($attr)); //Explode existing values
        if(!in_array($value, $attrs))
            $attrs[] = $value; //Append the new value
        $attrs = array_map('trim', array_filter($attrs)); //Clean existing values
        $element->setAttribute($attr, implode(' ', $attrs)); //Set cleaned attribute
    } else {
        $element->setAttribute($attr, $value); //Set attribute
    }
}

function sandbox_next_post_link( $html ){
    return str_replace( '<a ', '<a class="btn btn-soft-ash rounded-pill btn-icon btn-icon-end mb-2 mt-2" ', $html );
}

function sandbox_previous_post_link( $html ){
    return str_replace( '<a ', '<a class="btn btn-soft-ash rounded-pill btn-icon btn-icon-start mb-2 mt-2 me-1" ', $html );
}
add_filter( 'next_post_link', 'sandbox_next_post_link' );
add_filter( 'previous_post_link', 'sandbox_previous_post_link' );