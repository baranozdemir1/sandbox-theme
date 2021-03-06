<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

?>
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-md-10 col-xl-8 mx-auto">
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
                    <h1 class="display-1 mb-4"><?php the_title() ?></h1>
                    <ul class="post-meta mb-5">
                        <li class="post-date"><?php sandbox_posted_on(); ?></li>
                        <li class="post-author"><?php sandbox_posted_by(); ?></li>
                        <?php
                        if ( comments_open() ) {
                            echo '<li class="post-comments">';
                            comments_popup_link(
                                '<i class="uil uil-comment"></i><span> No Comments</span>',
                                '<i class="uil uil-comment"></i> 1 <span>Comment</span>',
                                '<i class="uil uil-comment"></i> % <span>Comments</span>',
                                'scroll',
                                'Comments are off for this post'
                            );
                            echo '</li>';
                        }
                        ?>
                        <li class="post-likes">
                            <?php echo get_simple_likes_button( get_the_ID() ) ?>
                        </li>
                    </ul>
                    <!-- /.post-meta -->
                </div>
                <!-- /.post-header -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light">
    <div class="container pb-14 pb-md-16">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="blog single mt-n17">
                    <div class="card">
                        <figure class="card-img-top">
                            <?php the_post_thumbnail(); ?>
                        </figure>
                        <div class="card-body">
                            <div class="classic-view">
                                <article class="post">
                                    <div class="post-content mb-5">
                                        <?php the_content(); ?>
                                    </div>
                                    <!-- /.post-content -->
                                    <div class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
                                        <div><?php sandbox_the_terms( 'post_tag' ); ?></div>
                                        <div class="mb-0 mb-md-2">
                                            <div class="dropdown share-dropdown btn-group">
                                                <button class="btn btn-sm btn-red rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="uil uil-share-alt"></i> <?php _e( 'Share', 'sandbox' ); ?> </button>
                                                <div class="dropdown-menu">
                                                    <a target="_blank" class="dropdown-item" href="https://twitter.com/share?url=<?php the_permalink() ?>&text=<?php the_title() ?>"><i class="uil uil-twitter"></i>Twitter</a>
                                                    <a target="_blank" class="dropdown-item" href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>"><i class="uil uil-facebook-f"></i>Facebook</a>
                                                    <a target="_blank" class="dropdown-item" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title() ?>&summary=<?php echo wp_trim_words(get_the_content(), 10, '...') ?>"><i class="uil uil-linkedin"></i>Linkedin</a>
                                                </div>
                                                <!--/.dropdown-menu -->
                                            </div>
                                            <!--/.share-dropdown -->
                                        </div>
                                    </div>
                                    <!-- /.post-footer -->
                                </article>
                                <!-- /.post -->
                            </div>
                            <!-- /.classic-view -->
                            <hr />
                            <div class="author-info d-md-flex align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <figure class="user-avatar">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full', '', 'Author', [ 'class' => 'rounded-circle' ]); ?>
                                    </figure>
                                    <div>
                                        <h6>
                                            <a class="link-dark" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
                                        </h6>
                                        <span class="post-meta fs-15">Administrator</span>
                                    </div>
                                </div>
                                <div class="mt-3 mt-md-0 ms-auto">
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="btn btn-sm btn-soft-ash rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-file-alt"></i> <?php _e( 'All Posts', 'sandbox' ); ?></a>
                                </div>
                            </div>
                            <!-- /.author-info -->
                            <p>
                                <?php echo get_the_author_meta( 'description' ) ?>
                            </p>
                            <?php echo sandbox_get_user_social_links() ?>
                            <!-- /.social -->
                            <hr />
                            <h3 class="mb-6"><?php _e( 'You Might Also Like', 'sandbox' ); ?></h3>
                            <div class="carousel owl-carousel blog grid-view mb-16" data-margin="30" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "3"}}'>
                                <?php
                                $related_args = array(
                                    'category__in' => wp_get_post_categories( get_the_ID() ),
                                    'numberposts' => 6,
                                    'post__not_in' => array( get_the_ID() )
                                );
                                $related_posts = get_posts( $related_args );
                                if ( $related_posts ) :
                                    foreach( $related_posts as $related_post ) :
                                        setup_postdata($related_post);
                                 ?>
                                    <div class="item">
                                        <article>
                                            <figure class="overlay overlay1 hover-scale rounded mb-5">
                                                <?php echo get_the_post_thumbnail( $related_post->ID, 'full' ) ?>
                                                <figcaption>
                                                    <h5 class="from-top mb-0"><?php _e( 'Read More', 'sandbox' ); ?></h5>
                                                </figcaption>
                                            </figure>
                                            <div class="post-header">
                                                <h2 class="post-title h3 mt-1 mb-3">
                                                    <a class="link-dark" href="<?php the_permalink( $related_post->ID ); ?>"><?php echo get_the_title( $related_post->ID ) ?></a>
                                                </h2>
                                            </div>
                                            <!-- /.post-header -->
                                            <div class="post-footer">
                                                <ul class="post-meta mb-0">
                                                    <li class="post-date"><?php sandbox_posted_on( $related_post->ID ); ?></li>
                                                    <li class="post-likes">
                                                        <?php echo get_simple_likes_button( $related_post->ID ) ?>
                                                    </li>
                                                </ul>
                                                <!-- /.post-meta -->
                                            </div>
                                            <!-- /.post-footer -->
                                        </article>
                                        <!-- /article -->
                                    </div>
                                    <!-- /.item -->
                                <?php endforeach; endif; wp_reset_postdata(); ?>
                            </div>
                            <!-- /.owl-carousel -->
                            <?php

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.blog -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
