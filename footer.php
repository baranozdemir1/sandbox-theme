<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sandbox
 */

?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="bg-soft-primary ">
        <div class="container">
            <div class="row">
                <div class="col-xl-11 col-xxl-10 mx-auto pb-10 pb-sm-10 pb-md-10 pb-lg-0">
                    <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400 mt-n50p mb-n5" data-image-src="<?= get_template_directory_uri() ?>/assets/img/photos/bg3.jpg">
                        <div class="card-body py-6 px-0 p-md-10 px-md-5 d-lg-flex flex-row align-items-lg-center justify-content-md-between text-center text-lg-start">
                            <div class="px-lg-5">
                                <div class="row gx-0 gx-md-8 gx-xl-12 gy-8 align-items-center">
                                    <div class="col-4 col-md-2">
                                        <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4"><img src="<?= get_template_directory_uri() ?>/assets/img/brands/c1.png" alt="" /></figure>
                                    </div>
                                    <!--/column -->
                                    <div class="col-4 col-md-2">
                                        <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4"><img src="<?= get_template_directory_uri() ?>/assets/img/brands/c2.png" alt="" /></figure>
                                    </div>
                                    <!--/column -->
                                    <div class="col-4 col-md-2">
                                        <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4"><img src="<?= get_template_directory_uri() ?>/assets/img/brands/c3.png" alt="" /></figure>
                                    </div>
                                    <!--/column -->
                                    <div class="col-4 col-md-2">
                                        <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4"><img src="<?= get_template_directory_uri() ?>/assets/img/brands/c4.png" alt="" /></figure>
                                    </div>
                                    <!--/column -->
                                    <div class="col-4 col-md-2">
                                        <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4"><img src="<?= get_template_directory_uri() ?>/assets/img/brands/c5.png" alt="" /></figure>
                                    </div>
                                    <!--/column -->
                                    <div class="col-4 col-md-2">
                                        <figure class="px-5 px-md-0 px-lg-2 px-xl-3 px-xxl-4"><img src="<?= get_template_directory_uri() ?>/assets/img/brands/c6.png" alt="" /></figure>
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                            </div>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <div class="container pb-12 text-center">
            <div class="row mt-n10 mt-lg-0">
                <div class="col-xl-10 mx-auto">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Address</h4>
                                <address>Moonshine St. 14/05 <br class="d-none d-md-block" /> Light City, London, UK</address>
                            </div>
                            <!-- /.widget -->
                        </div>
                        <!--/column -->
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Phone</h4>
                                <p>00 (123) 456 78 90 <br class="d-none d-md-block" />00 (987) 654 32 10</p>
                            </div>
                            <!-- /.widget -->
                        </div>
                        <!--/column -->
                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">E-mail</h4>
                                <p><a href="mailto:sandbox@email.com" class="link-body">sandbox@email.com</a> <br class="d-none d-md-block" /><a href="mailto:help@sandbox.com" class="link-body">help@sandbox.com</a></p>
                            </div>
                            <!-- /.widget -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                    <p>© 2021 Sandbox. All rights reserved.</p>
                    <nav class="nav social justify-content-center">
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                        <a href="#"><i class="uil uil-dribbble"></i></a>
                        <a href="#"><i class="uil uil-instagram"></i></a>
                        <a href="#"><i class="uil uil-youtube"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

<?php wp_footer(); ?>

</body>
</html>
