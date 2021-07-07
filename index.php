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

    <section id="home" class="wrapper bg-gradient-primary">
        <div class="container py-14 pt-md-15 pb-md-18">
            <div class="row text-center">
                <div class="col-lg-9 col-xxl-7 mx-auto" data-cues="zoomIn" data-group="welcome" data-interval="-200">
                    <h2 class="display-1 mb-4">Creative. Smart. Awesome.</h2>
                    <p class="lead fs-24 lh-sm px-md-5 px-xl-15 px-xxl-10 mb-7">We are an award winning web & mobile design agency that strongly believes in the power of creative ideas.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="join" data-delay="900">
                <span><a class="btn btn-lg btn-primary rounded-pill mx-1 scroll" href="#projects">See Projects</a></span>
                <span><a class="btn btn-lg btn-outline-primary rounded-pill mx-1 scroll" href="#contact">Contact Us</a></span>
            </div>
            <!-- /div -->
            <div class="row mt-12" data-cue="fadeIn" data-delay="1600">
                <div class="col-lg-8 mx-auto">
                    <figure><img class="img-fluid" src="<?= get_template_directory_uri() ?>/assets/img/concept/concept12.png" srcset="<?= get_template_directory_uri() ?>/assets/img/concept/concept12@2x.png 2x" alt=""></figure>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section id="about" class="wrapper bg-light">
        <div class="container">
            <div class="row gx-lg-0 gy-10 mb-15 mb-md-18 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-6 text-center">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <figure class="rounded mb-6"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/se1.jpg" srcset="<?= get_template_directory_uri() ?>/assets/img/photos/se1@2x.jpg 2x" alt=""></figure>
                                </div>
                                <!-- /column -->
                                <div class="col-lg-12">
                                    <div class="card shadow-lg">
                                        <div class="card-body">
                                            <div class="icon btn btn-circle btn-lg btn-soft-purple disabled mb-3"> <i class="uil uil-monitor"></i> </div>
                                            <h4>Web Design</h4>
                                            <p class="mb-2">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida.</p>
                                            <a href="#" class="more hover link-purple">Learn More</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.card -->
                                </div>
                                <!-- /column -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /column -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-12 order-md-2">
                                    <figure class="rounded mb-6 mb-md-0"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/se2.jpg" srcset="<?= get_template_directory_uri() ?>/assets/img/photos/se2@2x.jpg 2x" alt=""></figure>
                                </div>
                                <!-- /column -->
                                <div class="col-lg-12">
                                    <div class="card shadow-lg mb-md-6 mt-lg-6">
                                        <div class="card-body">
                                            <div class="icon btn btn-circle btn-lg btn-soft-purple disabled mb-3"> <i class="uil uil-mobile-android"></i> </div>
                                            <h4>Mobile Design</h4>
                                            <p class="mb-2">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida.</p>
                                            <a href="#" class="more hover link-purple">Learn More</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.card -->
                                </div>
                                <!-- /column -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /column -->
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="display-4 mb-3">What We Do?</h2>
                    <p class="lead fs-lg lh-sm">The full service we are offering is specifically designed to meet your business needs.</p>
                    <p>Donec ullamcorper nulla non metus auctor fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas faucibus mollis elit interdum. Duis mollis, est non commodo luctus, nisi erat ligula. </p>
                    <a href="#" class="btn btn-primary rounded-pill mt-3">More Details</a>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="row gx-lg-0 gy-10 align-items-center mb-15 mb-lg-18">
                <div class="col-lg-6 order-lg-2 offset-lg-1 grid">
                    <div class="row gx-md-5 gy-5 align-items-center counter-wrapper isotope">
                        <div class="item col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex d-lg-block d-xl-flex flex-row">
                                        <div>
                                            <div class="icon btn btn-circle btn-lg btn-soft-primary disabled mx-auto me-4 mb-lg-3 mb-xl-0"> <i class="uil uil-presentation-check"></i> </div>
                                        </div>
                                        <div>
                                            <h3 class="counter mb-1">7518</h3>
                                            <p class="mb-0">Projects Done</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!--/column -->
                        <div class="item col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex d-lg-block d-xl-flex flex-row">
                                        <div>
                                            <div class="icon btn btn-circle btn-lg btn-soft-red disabled mx-auto me-4 mb-lg-3 mb-xl-0"> <i class="uil uil-users-alt"></i> </div>
                                        </div>
                                        <div>
                                            <h3 class="counter mb-1">3472</h3>
                                            <p class="mb-0">Happy Customers</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!--/column -->
                        <div class="item col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex d-lg-block d-xl-flex flex-row">
                                        <div>
                                            <div class="icon btn btn-circle btn-lg btn-soft-yellow disabled mx-auto me-4 mb-lg-3 mb-xl-0"> <i class="uil uil-user-check"></i> </div>
                                        </div>
                                        <div>
                                            <h3 class="counter mb-1">4537</h3>
                                            <p class="mb-0">Expert Employees</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!--/column -->
                        <div class="item col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex d-lg-block d-xl-flex flex-row">
                                        <div>
                                            <div class="icon btn btn-circle btn-lg btn-soft-aqua disabled mx-auto me-4 mb-lg-3 mb-xl-0"> <i class="uil uil-trophy"></i> </div>
                                        </div>
                                        <div>
                                            <h3 class="counter mb-1">2184</h3>
                                            <p class="mb-0">Awards Won</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <h2 class="display-4 mb-3">Join Our Community</h2>
                    <p class="lead fs-lg lh-sm">We have considered our business solutions to support you on every stage of your growth.</p>
                    <p class="mb-0">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
    </section>
    <!-- /section -->
    <section id="projects" class="wrapper bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                    <h3 class="display-4 mb-8">Our Recent Projects</h3>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="container-fluid px-md-6">
            <div class="carousel owl-carousel blog grid-view mb-16 mb-md-19" data-margin="30" data-nav="true" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "1500":{"items": "3"}}'>
                <div class="item">
                    <figure class="rounded"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/pp17.jpg" alt="" /><a class="item-link" href="single-project.html"><i class="uil uil-link"></i></a></figure>
                </div>
                <!-- /.item -->
                <div class="item">
                    <figure class="rounded"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/pp18.jpg" alt="" /><a class="item-link" href="single-project2.html"><i class="uil uil-link"></i></a></figure>
                </div>
                <!-- /.item -->
                <div class="item">
                    <figure class="rounded"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/pp19.jpg" alt="" /><a class="item-link" href="single-project3.html"><i class="uil uil-link"></i></a></figure>
                </div>
                <!-- /.item -->
                <div class="item">
                    <figure class="rounded"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/pp20.jpg" alt="" /><a class="item-link" href="single-project.html"><i class="uil uil-link"></i></a></figure>
                </div>
                <!-- /.item -->
                <div class="item">
                    <figure class="rounded"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/pp21.jpg" alt="" /><a class="item-link" href="single-project2.html"><i class="uil uil-link"></i></a></figure>
                </div>
                <!-- /.item -->
                <div class="item">
                    <figure class="rounded"><img src="<?= get_template_directory_uri() ?>/assets/img/photos/pp22.jpg" alt="" /><a class="item-link" href="single-project3.html"><i class="uil uil-link"></i></a></figure>
                </div>
                <!-- /.item -->
            </div>
            <!-- /.owl-carousel -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /section -->
    <section id="services" class="wrapper bg-light">
        <div class="container pb-8 pb-lg-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-15 mb-md-18 align-items-center">
                <div class="col-lg-7">
                    <figure><img class="w-auto" src="<?= get_template_directory_uri() ?>/assets/img/concept/concept9.png" srcset="<?= get_template_directory_uri() ?>/assets/img/concept/concept9@2x.png 2x" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <h3 class="display-4 mb-3">Have Perfect Control</h3>
                    <p class="lead fs-lg lh-sm">We are focused on establishing long-term relationships with customers.</p>
                    <p class="mb-6">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                    <div class="row gy-3">
                        <div class="col-xl-6">
                            <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                <li><span><i class="uil uil-check"></i></span><span>Aenean quam ornare. Curabitur blandit.</span></li>
                                <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Nullam quis risus eget urna mollis ornare.</span></li>
                            </ul>
                        </div>
                        <!--/column -->
                        <div class="col-xl-6">
                            <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                <li><span><i class="uil uil-check"></i></span><span>Etiam porta euismod malesuada mollis.</span></li>
                                <li class="mt-3"><span><i class="uil uil-check"></i></span><span>Vivamus sagittis lacus vel augue rutrum.</span></li>
                            </ul>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="row gx-lg-8 gx-xl-12 gy-10">
                <div class="col-lg-7 order-lg-2">
                    <figure><img class="w-auto" src="<?= get_template_directory_uri() ?>/assets/img/concept/concept17.png" srcset="<?= get_template_directory_uri() ?>/assets/img/concept/concept17@2x.png 2x" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <h3 class="display-4 mt-xxl-8 mb-3">Why Choose Us?</h3>
                    <p class="lead fs-lg lh-sm mb-6">Find out everything you need to know about creating a business process model.</p>
                    <div class="accordion accordion-wrapper" id="accordionExample">
                        <div class="card plain accordion-item">
                            <div class="card-header" id="headingOne">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Professional Design </button>
                            </div>
                            <!--/.card-header -->
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel.</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.accordion-collapse -->
                        </div>
                        <!--/.accordion-item -->
                        <div class="card plain accordion-item">
                            <div class="card-header" id="headingTwo">
                                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Top-Notch Support </button>
                            </div>
                            <!--/.card-header -->
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel.</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.accordion-collapse -->
                        </div>
                        <!--/.accordion-item -->
                        <div class="card plain accordion-item">
                            <div class="card-header" id="headingThree">
                                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Header and Slider Options </button>
                            </div>
                            <!--/.card-header -->
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel.</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.accordion-collapse -->
                        </div>
                        <!--/.accordion-item -->
                    </div>
                    <!--/.accordion -->
                </div>
                <!--/column -->
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section id="contact" class="wrapper bg-light">
        <div class="wrapper bg-light">
            <div class="container py-5 mb-lg-15 pb-md-12 mb-12 mb-md-5">
                <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                    <div class="col-lg-7">
                        <figure><img class="w-auto" src="<?= get_template_directory_uri() ?>/assets/img/concept/concept5.png" srcset="<?= get_template_directory_uri() ?>/assets/img/concept/concept5@2x.png 2x" alt="" /></figure>
                    </div>
                    <!--/column -->
                    <div class="col-lg-5">
                        <h2 class="fs-15 text-uppercase text-line text-primary text-center mb-3">Get In Touch</h2>
                        <h3 class="display-5 mb-7">Got any questions? Don't hesitate to get in touch.</h3>
                        <div class="d-flex flex-row">
                            <div>
                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Address</h5>
                                <address>Moonshine St. 14/05 Light City, London</address>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div>
                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Phone</h5>
                                <p>00 (123) 456 78 90</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div>
                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                            </div>
                            <div>
                                <h5 class="mb-1">E-mail</h5>
                                <p class="mb-0"><a href="mailto:sandbox@email.com" class="link-body">sandbox@email.com</a></p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /section -->

<?php
get_footer();
