<?php
/**
 * The template for displaying project archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

get_header();
?>

    <!-- /header -->
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-14 text-center">
            <div class="row">
                <div class="col-md-8 col-lg-7 col-xl-6 col-xxl-5 mx-auto">
                    <h1 class="display-1 mb-3"><?php echo get_the_archive_title() ?></h1>
                    <p class="lead fs-lg px-lg-10 px-xxl-8"><?php _e( 'Check out some of our awesome projects with creative ideas and great design.', 'sandbox' ); ?></p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pt-9 pt-md-11 pb-14 pb-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-4 gy-lg-0">
                <div class="col-lg-8 align-self-center">
                    <div class="blog-filter filter">
                        <p><?php _e( 'Categories:', 'sandbox' ); ?></p>
                        <ul>
                            <?php wp_list_categories( array(
                                'orderby'    => 'name',
                                'taxonomy'   => 'project-category',
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

            <div class="projects-overflow mt-md-10 mb-10 mb-lg-15">
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-8 col-xl-7 offset-xl-1 rounded"> <img src="src/img/photos/cs16.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column" style="right: 10%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-purple mb-3">Cosmetic</div>
                                        <h2 class="post-title mb-3">Cras Fermentum Sem</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                                        <a href="#" class="more hover link-purple">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-7 offset-lg-5 col-xl-6 offset-xl-5 rounded"> <img src="src/img/photos/cs17.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column" style="left: 18%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-leaf mb-3">Coffee</div>
                                        <h2 class="post-title mb-3">Mollis Ipsum Mattis</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula.</p>
                                        <a href="#" class="more hover link-leaf">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-9 col-xl-7 offset-xl-2 rounded"> <img src="src/img/photos/cs18.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column" style="right: 3%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-violet mb-3">Still Life</div>
                                        <h2 class="post-title mb-3">Ipsum Ultricies Cursus</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                                        <a href="#" class="more hover link-violet">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-9 offset-lg-3 col-xl-7 offset-xl-4 rounded"> <img src="src/img/photos/cs19.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column" style="left: 12%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-yellow mb-3">Product</div>
                                        <h2 class="post-title mb-3">Sollicitudin Ornare Porta</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                                        <a href="#" class="more hover link-yellow">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-8 col-xl-6 offset-xl-1 rounded"> <img src="src/img/photos/cs20.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column" style="right: 15%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-orange mb-3">Product</div>
                                        <h2 class="post-title mb-3">Inceptos Euismod Egestas</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam id dolor id nibh ultricies vehicula.</p>
                                        <a href="#" class="more hover link-orange">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-9 offset-lg-3 col-xl-7 offset-xl-5 rounded"> <img src="src/img/photos/cs21.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column ms-lg-n150 ms-xl-0" style="left: 18%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-green mb-3">Workshop</div>
                                        <h2 class="post-title mb-3">Ipsum Mollis Vulputate</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                                        <a href="#" class="more hover link-green">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
                <div class="project item">
                    <div class="row">
                        <figure class="col-lg-8 col-xl-6 offset-xl-1 rounded"> <img src="src/img/photos/cs22.jpg" alt="" /></figure>
                        <div class="project-details d-flex justify-content-center flex-column" style="right: 15%; bottom: 25%;">
                            <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                <div class="card-body">
                                    <div class="post-header">
                                        <div class="post-category text-line text-red mb-3">Concept</div>
                                        <h2 class="post-title mb-3">Porta Ornare Cras</h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                                        <a href="#" class="more hover link-red">See Project</a>
                                    </div>
                                    <!-- /.post-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.project-details -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.project -->
            </div>
            <!-- /.projects-overflow -->
            <nav class="d-flex justify-content-center" aria-label="pagination">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
                        </a>
                    </li>
                </ul>
                <!-- /.pagination -->
            </nav>
            <!-- /nav -->
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
