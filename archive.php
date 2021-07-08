<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

get_header();
?>


    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pb-12 pt-md-14 pb-md-16 text-center">
            <div class="row">
                <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
                    <h1 class="display-1 mb-3"><?php echo get_the_archive_title() ?></h1>
                    <p class="lead px-lg-5 px-xxl-8"><?php _e( 'Welcome to our journal. Here you can find the latest company news and business articles', 'sandbox' ); ?></p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light wrapper-border">
        <div class="container inner py-8">
            <div class="row gx-lg-8 gx-xl-12 gy-4 gy-lg-0">
                <div class="col-lg-8 align-self-center">
                    <div class="blog-filter filter">
                        <p><?php _e( 'Categories:', 'sandbox' ); ?></p>
                        <ul>
                            <?php wp_list_categories( array(
                                'orderby'    => 'name',
                                'title_li'   => ''
                            ) ); ?>

                        </ul>
                    </div>
                    <!--/.filter -->
                </div>
                <!--/column -->
                <aside class="col-lg-4 sidebar">
                    <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
                        <div class="form-label-group mb-0">
                            <input onkeyup="sandboxAjaxSearch()" id="search-form" type="text" name="s" value="<?php echo get_search_query(); ?>" class="form-control" placeholder="Search">
                            <label for="search-form">Search</label>
                        </div>
                    </form>
                    <div id="searchContent"></div>
                    <!-- /.search-form -->
                </aside>
                <!-- /column .sidebar -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-14 pt-5 pb-md-16 pt-md-5">
            <div class="row gx-lg-8 gx-xl-12">
                <div class="col-lg-8">
                    <div class="blog grid grid-view">
                        <div class="row isotope gx-md-8 gy-8 mb-8">
                            <?php

                            if ( have_posts() ) {
                                while ( have_posts() ) {
                                    the_post();

                                    get_template_part( 'template-parts/content', 'posts' );

                                }
                            } else {

                                get_template_part( 'template-parts/content', 'none' );

                            }

                            wp_reset_postdata();
                            ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.blog -->
                    <nav class="d-flex" aria-label="pagination">
                        <?php sandbox_custom_pagination(); ?>
                        <!-- /.pagination -->
                    </nav>
                    <!-- /nav -->
                </div>
                <!-- /column -->
                <aside class="col-lg-4 sidebar mt-8 mt-lg-6">
                    <div class="widget">
                        <h4 class="widget-title mb-3">About Us</h4>
                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.</p>
                        <nav class="nav social">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Popular Posts</h4>
                        <ul class="image-list">
                            <li>
                                <figure class="rounded"><a href="blog-post.html"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/a1.jpg" alt="" /></a></figure>
                                <div class="post-content">
                                    <h6 class="mb-2"> <a class="link-dark" href="blog-post.html">Magna Mollis Ultricies</a> </h6>
                                    <ul class="post-meta">
                                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>26 Mar 2021</span></li>
                                        <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>3</a></li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                            </li>
                            <li>
                                <figure class="rounded"> <a href="blog-post.html"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/a2.jpg" alt="" /></a></figure>
                                <div class="post-content">
                                    <h6 class="mb-2"> <a class="link-dark" href="blog-post.html">Ornare Nullam Risus</a> </h6>
                                    <ul class="post-meta">
                                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>16 Feb 2021</span></li>
                                        <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>6</a></li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                            </li>
                            <li>
                                <figure class="rounded"><a href="blog-post.html"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/a3.jpg" alt="" /></a></figure>
                                <div class="post-content">
                                    <h6 class="mb-2"> <a class="link-dark" href="blog-post.html">Euismod Nullam Fusce</a> </h6>
                                    <ul class="post-meta">
                                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>8 Jan 2021</span></li>
                                        <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>5</a></li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                            </li>
                        </ul>
                        <!-- /.image-list -->
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Categories</h4>
                        <ul class="unordered-list bullet-primary text-reset">
                            <li><a href="#">Teamwork (21)</a></li>
                            <li><a href="#">Ideas (19)</a></li>
                            <li><a href="#">Workspace (16)</a></li>
                            <li><a href="#">Coding (7)</a></li>
                            <li><a href="#">Meeting (12)</a></li>
                            <li><a href="#">Business Tips (14)</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Tags</h4>
                        <ul class="list-unstyled tag-list">
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Still Life</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Urban</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Nature</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Landscape</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Macro</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Fun</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Workshop</a></li>
                            <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill">Photography</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title mb-3">Archive</h4>
                        <ul class="unordered-list bullet-primary text-reset">
                            <li><a href="#">February 2019</a></li>
                            <li><a href="#">January 2019</a></li>
                            <li><a href="#">December 2018</a></li>
                            <li><a href="#">November 2018</a></li>
                            <li><a href="#">October 2018</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </aside>
                <!-- /column .sidebar -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

<?php
get_footer();
