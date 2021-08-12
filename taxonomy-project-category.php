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
            <div class="projects-overflow mt-md-10 mb-10 mb-lg-15">
                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $cat_slug = get_queried_object()->slug;
                // Custom Taxonomy Query
                $tax_query = array(
                    'post_type' => 'project',
                    'posts_per_page' => 1,
                    'order' => 'DESC',
                    'paged' => $paged,
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'project-category',
                            'field' => 'slug',
                            'include_children' => true,
                            'operator' => 'IN',
                            'terms' => $cat_slug
                        )
                    ),
                );

                $query = new WP_Query( $tax_query );

                $say = 0;

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();

                        $say++;

                        get_template_part( 'template-parts/project', 'category' );
                    }
                } else {

                    get_template_part( 'template-parts/content', 'none' );

                }

                wp_reset_query();

                ?>
            </div>
            <!-- /.projects-overflow -->
            <nav class="d-flex justify-content-center" aria-label="pagination">
                <?php sandbox_project_cat_paging_nav( $query ); ?>
                <!-- /.pagination -->
            </nav>
            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->


<?php
get_footer();
