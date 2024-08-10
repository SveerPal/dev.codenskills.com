<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php wp_title(); ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/fevicion.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <link rel="stylesheet" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.0/css/hover-min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" as="style" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="all" />
    <link rel="stylesheet" as="style" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css" media="all" />
    <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
	<?php wp_body_open(); ?>  



    <!-- top header section start here -->
    <section class="top-header-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-header-wrap">
                        <div class="top-left">
                            <ul>
                                <?php if(get_field('phone','option') ) { ?>
                                <li> <span>Talk to Astrologers :</span> <a href="tel:<?php echo get_field('phone','option');?>"><?php echo get_field('phone','option');?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="right-left">
                            <ul class="top-bar-content">
                                <?php if(get_field('email','option') ) { ?>
                                <li> <a href="mailto:<?php echo get_field('email','option');?>"><?php echo get_field('email','option');?></a> </li>
                                <?php } ?>
                            </ul>
                            <ul class="topba-list-social ">
                                <span>Follow us on</span>
                                <?php if(get_field('instagram','option') ) { ?>
                                <li> <a href="<?php echo get_field('instagram','option');?>" target="_blank"><i class="fab fa-instagram"></i></a> </li>
                                <?php } ?>
                                <?php if(get_field('youtube','option') ) { ?>
                                <li> <a href="<?php echo get_field('youtube','option');?>" target="_blank"><i class="fab fa-youtube"></i></a> </li>
                                <?php } ?>
                                <?php if(get_field('twitter','option') ) { ?>
                                <li> <a href="<?php echo get_field('twitter','option');?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a> </li>
                                <?php } ?>
                                <?php if(get_field('facebook','option') ) { ?>
                                <li> <a href="<?php echo get_field('facebook','option');?>" target="_blank"><i class="fab fa-facebook-f"></i></a> </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top header section end here -->

    <!-- navbaar section start here -->
    <section class="navbaar-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbaar-wrap">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="<?php echo site_url(); ?>"><img alt="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                
                                    <?php 
                                    $args = array(
                                        'menu_class' => 'navbar-nav me-auto ms-auto mb-2 mb-lg-0',        
                                        'menu' => 'Header Menu',
                                        'container'=>false
                                    );
                                    wp_nav_menu( $args ); 
                                    ?>
                                
                              
                                <div class="right-menu">
                                    <ul>
                                        <li>
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <path
                                                        d="M13.75 23.75C19.2728 23.75 23.75 19.2728 23.75 13.75C23.75 8.22715 19.2728 3.75 13.75 3.75C8.22715 3.75 3.75 8.22715 3.75 13.75C3.75 19.2728 8.22715 23.75 13.75 23.75Z"
                                                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M26.25 26.25L20.8125 20.8125" stroke="#1E1E1E"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg></span>
                                        </li>
                                        <li><a href="<?php echo site_url();?>/my-account"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <path
                                                        d="M25 26.25V23.75C25 22.4239 24.4732 21.1521 23.5355 20.2145C22.5979 19.2768 21.3261 18.75 20 18.75H10C8.67392 18.75 7.40215 19.2768 6.46447 20.2145C5.52678 21.1521 5 22.4239 5 23.75V26.25"
                                                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path
                                                        d="M15 13.75C17.7614 13.75 20 11.5114 20 8.75C20 5.98858 17.7614 3.75 15 3.75C12.2386 3.75 10 5.98858 10 8.75C10 11.5114 12.2386 13.75 15 13.75Z"
                                                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></a></li>
                                        <li>
                                            <a href="<?php echo site_url();?>/cart"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <path
                                                        d="M11.25 27.5C11.9404 27.5 12.5 26.9404 12.5 26.25C12.5 25.5596 11.9404 25 11.25 25C10.5596 25 10 25.5596 10 26.25C10 26.9404 10.5596 27.5 11.25 27.5Z"
                                                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path
                                                        d="M25 27.5C25.6904 27.5 26.25 26.9404 26.25 26.25C26.25 25.5596 25.6904 25 25 25C24.3096 25 23.75 25.5596 23.75 26.25C23.75 26.9404 24.3096 27.5 25 27.5Z"
                                                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path
                                                        d="M1.25 1.25H6.25L9.6 17.9875C9.71431 18.563 10.0274 19.0799 10.4844 19.4479C10.9415 19.8158 11.5134 20.0112 12.1 20H24.25C24.8366 20.0112 25.4085 19.8158 25.8656 19.4479C26.3226 19.0799 26.6357 18.563 26.75 17.9875L28.75 7.5H7.5"
                                                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg> <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- navbaar section end here -->