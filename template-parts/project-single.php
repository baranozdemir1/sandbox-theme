<?php
/**
 * Template part for displaying projects detail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandbox
 */

?>

<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-22 text-center">
        <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <div class="post-header">
                    <div class="post-category text-line">
                    <?php
                    $terms = get_terms('project-category' );

                    foreach ($terms as $term) {
                        //Always check if it's an error before continuing. get_term_link() can be finicky sometimes
                        $term_link = get_term_link( $term, 'project-category' );
                        if( is_wp_error( $term_link ) )
                            continue;

                        echo '<a class="hover" rel="category" href="' . $term_link . '">' . $term->name . '</a>';
                    }
                    ?>
                    </div>

                    <!-- /.post-category -->
                    <h1 class="display-1 mb-3"><?php the_title() ?></h1>
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
<section class="wrapper bg-light wrapper-border">
    <div class="container py-8">
        <div class="row">
            <div class="col-12">
                <article class="mt-n21">
                    <figure class="rounded mb-8 mb-md-12">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </figure>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <h2 class="display-6 mb-4">About the Project</h2>
                            <div class="row gx-0">
                                <div class="col-md-9 text-justify">
                                    <?php the_content(); ?>
                                </div>
                                <!--/column -->
                                <div class="col-md-2 ms-auto">
                                    <ul class="list-unstyled">
                                        <?php

                                        $list_values = array(
                                            'project_created_date_key',
                                            'project_website_name_key',
                                            'project_theme_used_in_the_project_key',
                                            'project_software_used_in_the_project_key'
                                        );

                                        foreach ( $list_values as $list_value) {
                                            $get_fields = get_field_object( $list_value );
                                            ?>
                                            <li>
                                                <h5 class="mb-1"><?php echo $get_fields['label']; ?></h5>
                                                <?php if (gettype( get_field( $list_value ) ) === 'string'): ?>
                                                    <p><?php the_field( $list_value ); ?></p>
                                                <?php else:
                                                    $array_keys = get_field($list_value);
                                                    foreach ( $array_keys as $item) {
                                                        ?>
                                                        <p>Label: <?php echo $item['label']; ?></p>
                                                        <p>Value: <?php echo $item['value']; ?></p>
                                                        <?php
                                                    }
                                                    endif; ?>
                                            </li>
                                            <?php

                                        }
                                        ?>
                                    </ul>
                                    <a target="_blank" href="<?php echo esc_url( get_field( 'project_website_link_key' ) ) ?>" class="more hover">See The Project</a>
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!--/.row -->
                    <div class="row mt-5 gx-md-6 gy-6 light-gallery-wrapper">

                        <?php

                        $values = get_field('project_gallery_key');

                        foreach ( $values as $value ){
                            ?>

                            <div class="item col-md-6">
                                <figure class="rounded">
                                    <?php
                                    echo wp_get_attachment_image( $value['ID'], 'full', '', array( 'class' => 'classname' ) );
                                    ?>
                                </figure>
                            </div>
                            <?php
                        }

                        ?>
                        <!--/column -->
                    </div>
                    <!-- /.row -->
                </article>
                <!-- /.project -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light">
    <div class="container pb-14 pt-5 pb-md-16 pt-md-5">
        <div class="row gx-lg-8 gx-xl-12">
            <div class="col-md-8 align-self-center text-center text-md-start navigation">
                <a href="#" class="btn btn-soft-ash rounded-pill btn-icon btn-icon-start mb-0 me-1"><i class="uil uil-arrow-left"></i> Prev Post</a>
                <a href="#" class="btn btn-soft-ash rounded-pill btn-icon btn-icon-end mb-0">Next Post <i class="uil uil-arrow-right"></i></a>
            </div>
            <!--/column -->
            <aside class="col-md-4 sidebar text-center text-md-end">
                <div class="dropdown share-dropdown btn-group">
                    <button class="btn btn-red rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-share-alt"></i> Share </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="uil uil-twitter"></i>Twitter</a>
                        <a class="dropdown-item" href="#"><i class="uil uil-facebook-f"></i>Facebook</a>
                        <a class="dropdown-item" href="#"><i class="uil uil-linkedin"></i>Linkedin</a>
                    </div>
                    <!--/.dropdown-menu -->
                </div>
                <!--/.share-dropdown -->
            </aside>
            <!-- /column .sidebar -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->