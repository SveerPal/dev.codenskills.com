<!-- footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-info">
                    <figure><a href="<?php echo site_url(); ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png"
                                alt=""></a></figure>
                    <p><?php echo get_field('footer_content', 'option'); ?></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h3 class="footer-heading">Services</h3>
                    <ul>
                        <?php
                        $args = array(
                            'post_type' => 'service',
                            'posts_per_page' => 7,
                            'order' => 'DESC',
                            'orderby' => 'id'
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                <?php

                            endwhile;
                            wp_reset_postdata(); // Reset post data
                        else:
                            echo 'No posts found';
                        endif;

                        ?>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu ">
                    <h3 class="footer-heading">Popular Products</h3>
                    <ul>
                        <?php
                        $args = array(
                            'post_type' => array('product'),
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'order' => 'desc',
                            'posts_per_page' => 7
                        );

                        $popular_products = new WP_Query($args);

                        if ($popular_products->have_posts()):
                            while ($popular_products->have_posts()):
                                $popular_products->the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                <?php

                            endwhile;
                        endif;

                        wp_reset_postdata();
                        ?>

                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-info">
                    <h3 class="footer-heading">Contact Us</h3>
                    <?php if (get_field('phone', 'option')) { ?>
                        <p><a
                                href="tel:<?php echo get_field('phone', 'option'); ?>"><?php echo get_field('phone', 'option'); ?></a>
                        </p>
                    <?php } ?>
                    <?php if (get_field('email', 'option')) { ?>
                        <p><a
                                href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a>
                        </p>
                    <?php } ?>
                    <?php if (get_field('address', 'option')) { ?>
                        <address><?php echo get_field('address', 'option'); ?></address>
                    <?php } ?>
                </div>
                <div class="footer-social-icon">
                    <ul>
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
    </div>
    </div>
</footer>
<!-- footer -->

<section class="copy-right-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copy-wrap">
                    <p>Copyright © <?php echo date('Y') ?>. <a href="<?php echo site_url(); ?>">Jovial Vision </a> All
                        rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>



</body>

</html>