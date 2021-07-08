<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
                    <h1 class="display-1 mb-3"><?php wp_title( '' ) ?></h1>
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
                    <?php
                    if ( is_active_sidebar( 'blog-sidebar' ) ) {
                        dynamic_sidebar( 'blog-sidebar' );
                    }
                    ?>
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
