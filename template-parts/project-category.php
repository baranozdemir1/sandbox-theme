<?php
/**
 * Template part for displaying projects category
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

global $say;
$cat_name = get_queried_object()->name;

if ( $say % 2  == 0 ):
?>
    <div class="project item">
        <div class="row">
            <figure class="col-lg-7 offset-lg-5 col-xl-6 offset-xl-5 rounded">
                <?php the_post_thumbnail(); ?>
            </figure>
            <div class="project-details d-flex justify-content-center flex-column" style="left: 18%; bottom: 25%;">
                <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="post-category text-line text-leaf mb-3"><?php echo $cat_name ?></div>
                            <h2 class="post-title mb-3"><?php the_title() ?></h2>
                        </div>
                        <!-- /.post-header -->
                        <div class="post-content">
                            <?php the_content(); ?>
                            <a href="<?php the_permalink(); ?>" class="more hover link-leaf"><?php _e( 'See Project', 'sandbox' ); ?></a>
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
<?php
else:
?>
    <div class="project item">
        <div class="row">
            <figure class="col-lg-9 col-xl-7 offset-xl-2 rounded">
                <?php the_post_thumbnail(); ?>
            </figure>
            <div class="project-details d-flex justify-content-center flex-column" style="right: 3%; bottom: 25%;">
                <div class="card shadow rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="post-category text-line text-violet mb-3"><?php echo $cat_name ?></div>
                            <h2 class="post-title mb-3"><?php the_title() ?></h2>
                        </div>
                        <!-- /.post-header -->
                        <div class="post-content">
                            <?php the_content(); ?>
                            <a href="<?php the_permalink(); ?>" class="more hover link-violet"><?php _e( 'See Project', 'sandbox' ); ?></a>
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
<?php
endif;
?>
