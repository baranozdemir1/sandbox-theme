<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'item post col-md-6' ); ?>>
    <div class="card">
        <figure class="card-img-top overlay overlay1 hover-scale">
            <?php sandbox_post_thumbnail(); ?>
            <figcaption>
                <h5 class="from-top mb-0"><?php _e( 'Read More', 'sandbox' ); ?></h5>
            </figcaption>
        </figure>
        <div class="card-body">
            <div class="post-header">
                <?php
                $get_the_category = get_the_category();
                if ( !empty( $get_the_category ) ):
                    ?>
                    <div class="post-category text-line">
                        <a href="<?php echo get_category_link($get_the_category[0]->term_id) ?>" class="hover" rel="category">
                            <?php echo $get_the_category[0]->name ?>
                        </a>
                    </div>
                <?php endif; ?>
                <!-- /.post-category -->
                <h2 class="post-title h3 mt-1 mb-3">
                    <a class="link-dark" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                </h2>
            </div>
            <!-- /.post-header -->
            <div class="post-content">
                <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
            </div>
            <!-- /.post-content -->
        </div>
        <!--/.card-body -->
        <div class="card-footer">
            <ul class="post-meta d-flex mb-0">
                <li class="post-date"><?php sandbox_posted_on(); ?></li>
                <li class="post-comments">
                    <a href="<?php echo get_comments_pagenum_link() ?>">
                        <i class="uil uil-comment"></i> <?php echo get_comments_number() ?>
                    </a>
                </li>
                <li class="post-likes ms-auto">
                    <?php echo get_simple_likes_button( get_the_ID() ) ?>
                </li>
            </ul>
            <!-- /.post-meta -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</article><!-- #post-<?php the_ID(); ?> -->

