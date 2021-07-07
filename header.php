<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sandbox
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('onepage'); ?> data-bs-spy="scroll" data-bs-target=".navbar">
<?php wp_body_open(); ?>

<div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
        <nav class="navbar fancy navbar-expand-lg navbar-light caret-none navbar-bg-light">
            <div class="container">
                <div class="navbar-collapse-wrapper bg-white d-flex flex-row flex-nowrap w-100 justify-content-between align-items-center">
                    <div class="navbar-brand w-100"><a href="index-2.html"><img src="<?= get_template_directory_uri() ?>/assets/img/logo-purple.png" srcset="<?= get_template_directory_uri() ?>/assets/img/logo-purple@2x.png 2x" alt="" /></a></div>
                    <div class="navbar-collapse offcanvas-nav d-lg-flex mx-lg-auto">
                        <div class="offcanvas-header d-lg-none d-xl-none">
                            <a href="index-2.html"><img src="<?= get_template_directory_uri() ?>/assets/img/logo-light.png" srcset="<?= get_template_directory_uri() ?>/assets/img/logo-light@2x.png 2x" alt="" /></a>
                            <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
                        </div>
                        <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu(
                                array(
                                    'theme_location'       => 'primary',
                                    'container'            => '',
                                    'menu_class'           => 'navbar-nav',
                                    'echo'                 => true,
                                    'depth'                => 0,
                                    'fallback_cb'          => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'               => new WP_Bootstrap_Navwalker(),
                                )
                            );
                        }

                        ?>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
                            <li class="nav-item d-none d-md-block">
                                <nav class="nav social social-muted justify-content-end text-end">
                                    <a href="#"><i class="uil uil-twitter"></i></a>
                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                    <a href="#"><i class="uil uil-dribbble"></i></a>
                                    <a href="#"><i class="uil uil-instagram"></i></a>
                                </nav>
                                <!-- /.social -->
                            </li>
                            <li class="nav-item d-lg-none">
                                <div class="navbar-hamburger"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.navbar-collapse-wrapper -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- /.navbar -->
        <div class="offcanvas-info text-inverse">
            <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-info-close" aria-label="Close"></button>
            <a href="index-2.html"><img src="<?= get_template_directory_uri() ?>/assets/img/logo-light.png" srcset="<?= get_template_directory_uri() ?>/assets/img/logo-light@2x.png 2x" alt="" /></a>
            <div class="mt-4 widget">
                <p>Sandbox is a multipurpose HTML5 template with various layouts which will be a great solution for your business.</p>
            </div>
            <!-- /.widget -->
            <div class="widget">
                <h4 class="widget-title text-white mb-3">Contact Info</h4>
                <address> Moonshine St. 14/05 <br /> Light City, London </address>
                <a href="mailto:first.last@email.com">info@email.com</a><br /> +00 (123) 456 78 90
            </div>
            <!-- /.widget -->
            <div class="widget">
                <h4 class="widget-title text-white mb-3">Learn More</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.widget -->
            <div class="widget">
                <h4 class="widget-title text-white mb-3">Follow Us</h4>
                <nav class="nav social social-white">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-dribbble"></i></a>
                    <a href="#"><i class="uil uil-instagram"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                </nav>
                <!-- /.social -->
            </div>
            <!-- /.widget -->
        </div>
        <!-- /.offcanvas-info -->
    </header>
    <!-- /header -->