<?php

get_header();
?>
<?php if (has_post_thumbnail(get_the_ID())) { ?>
    <section class="breadcrumb-sec"
        style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <?php } else { ?>
        <section class="breadcrumb-sec"
            style="background-image: url('<?php echo esc_url(site_url('/wp-content/uploads/2024/08/inner-banner.png')); ?>');">
        <?php } ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrap">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-sec contact-page-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-page-infp">
                        <div class="sc-heading-area ">
                            <span class="sub-title"><i class="icon-line"></i> Get in touch</span>
                            <h2 class="title">Send <span class="primary-color italic">a </span> Message</h2>
                            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                            </p>
                        </div>
                        <div class="sc-contact-info">
                            <ul class="list-gap">
                                <?php if (get_field('phone', 'option')) { ?>
                                <li><i class="fas fa-phone-alt"></i>
                                    <p><a href="tel:<?php echo get_field('phone', 'option'); ?>"> <?php echo get_field('phone', 'option'); ?> </a></p>
                                </li>
                                <?php } ?>
                                <?php if (get_field('email', 'option')) { ?>
                                <li>
                                    <i class="far fa-envelope"></i>
                                    <a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a>
                                </li>
                                <?php } ?>
                                <?php if (get_field('address', 'option')) { ?>
                                <li><i class="fas fa-map-marker-alt"></i> <span><?php echo get_field('address', 'option'); ?> </span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="contact-social-icon">
                            <ul class="topba-list-social ">
                                <span>Follow us on</span>
                                 <?php if (get_field('instagram', 'option')) { ?>
                                    <li> <a href="<?php echo get_field('instagram', 'option'); ?>" target="_blank"><i
                                                class="fab fa-instagram"></i></a> </li>
                                <?php } ?>
                                <?php if (get_field('youtube', 'option')) { ?>
                                    <li> <a href="<?php echo get_field('youtube', 'option'); ?>" target="_blank"><i
                                                class="fab fa-youtube"></i></a> </li>
                                <?php } ?>
                                <?php if (get_field('twitter', 'option')) { ?>
                                    <li> <a href="<?php echo get_field('twitter', 'option'); ?>" target="_blank"><i
                                                class="fa-brands fa-x-twitter"></i></a> </li>
                                <?php } ?>
                                <?php if (get_field('facebook', 'option')) { ?>
                                    <li> <a href="<?php echo get_field('facebook', 'option'); ?>" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a> </li>
                                <?php } ?>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="form-wrap">
                            <h2>Contact Us</h2>
                            <?php echo do_shortcode('[contact-form-7 id="7bfe920" title="Contact form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="google-map-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="google-map-">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448196.52633258584!2d76.76357436215979!3d28.64368462633545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sDelhi!5e0!3m2!1sen!2sin!4v1725176221107!5m2!1sen!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    //get_sidebar();
    get_footer();
