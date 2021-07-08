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