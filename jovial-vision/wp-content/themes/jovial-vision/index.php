<?php get_header(); ?>
<!-- banner section start here -->
<section class="banner-sec">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">


            <?php
            $args = array(
                'post_type' => 'slider',
                'posts_per_page' => 5,
                'order' => 'DESC',
                'orderby' => 'id'
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                $s = 0;
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="carousel-item <?php if ($s == 0) { ?>active<?php } ?>">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="d-block w-100"
                                alt="<?php echo get_the_title(); ?>">
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.webp" class="d-block w-100"
                                alt="<?php echo get_the_title(); ?>">
                        <?php } ?>
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 col-offset-5">
                                        <div class="banner-content">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $s++;
                endwhile;
                wp_reset_postdata(); // Reset post data
            else:
                echo 'No posts found';
            endif;

            ?>



        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- banner section end here -->

<section class="stats-sec"
    style="background:url(<?php echo get_template_directory_uri(); ?>/assets/images/bg1.webp) no-repeat center;">
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-4 mb-5">
            <div class="col">
                <div class="feate text-center">
                    <h2>99 <span>+</span></h2>
                    <p> Trusted by
                        Many Clients</p>
                </div>
            </div>
            <div class="col">
                <div class="feate text-center">
                    <h2>50 <span>+</span></h2>
                    <p> Types of

                        Horoscopes</p>
                </div>
            </div>

            <div class="col">
                <div class="feate text-center">
                    <h2>99 <span>+</span></h2>
                    <p> Qualified
                        Astrologers</p>
                </div>
            </div>
            <div class="col">
                <div class="feate text-center">
                    <h2>99 <span>+</span></h2>
                    <p> Success
                        Horoscope</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- bg img section start here -->
<section class="bg-img-sec">
    <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg1.webp" alt=""></figure>
</section>
<!-- bg img section end here -->

<!-- about1 us section start here -->
<section class="about1-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about1-img">
                    <figure>
                        <?php if (has_post_thumbnail(2)) { ?>
                            <img src="<?php echo get_the_post_thumbnail_url(2); ?>" alt="<?php echo get_the_title(2); ?>">
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-img1.webp"
                                alt="<?php echo get_the_title(2); ?>">
                        <?php } ?>

                    </figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about1-wrap">
                    <div class="section-title">
                        <h2><?php echo get_the_title(2); ?></h2>
                        <div class="about1-dis">
                            <p> <?php
                            $content_post = get_post(2);
                            $content = $content_post->post_content;
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            echo substr($content, 0, 1300);
                            ?>...</p>
                        </div>


                        <a class="btn-style-1 text-left" href="<?php the_permalink(2) ?>">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us section end here -->

<!-- astrology section start here -->
<section class="astrology-sec pt-b">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Our Service</h2>
                </div>
                <div class="astrology-slider">
                    <div class="owl-carousel owl-theme" id="astrology">
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
                                <div class="item">
                                    <div class="astrology-wrap">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                        alt="<?php echo get_the_title(); ?>">
                                                <?php } else { ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ser1.png"
                                                        alt="<?php echo get_the_title(); ?>">
                                                <?php } ?>
                                            </a>
                                        </figure>
                                        <div class="ser-wrap">
                                            <h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a> </h3>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                            <a href="<?php the_permalink(); ?>"> Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            endwhile;
                            wp_reset_postdata(); // Reset post data
                        else:
                            echo 'No posts found';
                        endif;

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- astrology section end here -->




<!-- insta feed section start here -->
<section class="insta-feed-sec"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg7.webp) no-repeat center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Success Stories</h2>
                </div>
                <div class="section-padding">
                    <div class="screenshot_slider owl-carousel">
                        <?php
                        $args = array(
                            'post_type' => 'testimonial',
                            'posts_per_page' => 4,
                            'order' => 'DESC',
                            'orderby' => 'id'
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>

                                <div class="item">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                                    <?php } else { ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story1.webp"
                                            alt="<?php echo get_the_title(); ?>">
                                    <?php } ?>

                                    <div class="achv-content text-center">
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                </div>
                                <?php

                            endwhile;
                            wp_reset_postdata(); // Reset post data
                        else:
                            echo 'No posts found';
                        endif;

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- insta feed section end here -->







<!-- products section start here -->
<section class="products-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="products-wrap">
                    <div class="section-title">
                        <h2>Popular Products </h2>
                    </div>
                    <div class="products-box">
                        <div class="owl-carousel owl-theme" id="product">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'meta_key' => 'total_sales',
                                'orderby' => 'meta_value_num',
                                'order' => 'desc',
                                'posts_per_page' => 7
                            );

                            $popular_products = new WP_Query($args);

                            if ($popular_products->have_posts()):
                                while ($popular_products->have_posts()):
                                    $popular_products->the_post();
                                    $product = wc_get_product(get_the_ID());
                                    $product_type = $product->get_type();
                                    ?>

                                    <div class="item">
                                        <div class="card  products">
                                            <div class="al-product-image">
                                                <figure>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php if (has_post_thumbnail()) { ?>
                                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                                alt="<?php echo get_the_title(); ?>">
                                                        <?php } else { ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pro1.png"
                                                                alt="<?php echo get_the_title(); ?>">
                                                        <?php } ?>
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="card-body">
                                                <div class="pro-info">
                                                    <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                    </h2>
                                                </div>
                                                <div class="productitem-price">
                                                    <?php if ($product_type == 'simple') { ?>
                                                        <?php if ($product->get_sale_price()) { ?>
                                                            <span
                                                                class="price-compare-single"><?php echo get_woocommerce_currency_symbol() . ' ' . number_format($product->get_regular_price(), 2); ?></span>
                                                        <?php } ?>
                                                        <span class="money" data-price="">
                                                            <?php echo get_woocommerce_currency_symbol(); ?>
                                                            <?php echo $product->get_sale_price() ? number_format($product->get_sale_price(), 2) : number_format($product->get_regular_price(), 2); ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class=" card-footer cart-btn ">
                                                <!-- <button>Add To Cart</button> -->
                                                <?php woocommerce_template_loop_add_to_cart(); ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                endwhile;
                            endif;

                            wp_reset_postdata();
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- productssection end here -->
<script>
    function youTubeThumb(url, size) {
        if (url === null) {
            return '';
        }
        size = (size === null) ? 'big' : size;
        results = url.match('[\\?&]v=([^&#]*)');
        video = (results === null) ? url : results[1];
        console.log(video)
        if (size === 'small') {
            return 'http://img.youtube.com/vi/' + video + '/2.jpg';
        }
        return 'http://img.youtube.com/vi/' + video + '/0.jpg';
    }
</script>
<!-- Latest videos section start here -->
<section class="blog-sec latest-videos-sec"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg8.webp) no-repeat center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-wrap">
                    <div class="section-title">
                        <h2>Latest videos</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'video',
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        'orderby' => 'id'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="col-md-4" onclick="playVideo('yt-<?php echo get_the_id(); ?>','<?php echo get_the_excerpt(); ?>')" url="<?php echo get_the_excerpt(); ?>">

                                <!-- <iframe width="100%" height="300" src="https://www.youtube.com/embed/nyQAo2EFo-w"
                                        title="Vedic Switchwords for weight loss | Weight loss tips | Jovial vision"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                                
                                    <img id="yt-<?php echo get_the_id(); ?>" src="" />
                                
                            </div>

                            <script>
                                //Example of usage:
                                //small,big

                                var thumb = youTubeThumb('<?php echo get_the_excerpt(); ?>', '');
                                document.querySelector('#yt-<?php echo get_the_id(); ?>').setAttribute('src', thumb)
                                console.log(thumb);
                            </script>
                            <?php

                        endwhile;
                        wp_reset_postdata(); // Reset post data
                    else:
                        echo 'No posts found';
                    endif;

                    ?>

                </div>
                <a class="btn-style-1" target="_blank"
                    href="https://www.youtube.com/channel/UCzfoEOoxtmD1fPjLmiK0I7A">Watch More Video</a>
            </div>
        </div>
    </div>
</section>
<!-- Latest videos section end here -->



<!-- contact us section start here -->
<section class="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-img">
                    <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-img.webp"
                            alt=""></figure>
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
<!-- contact us section end here -->


<!-- blog section start here -->
<section class="blog-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-wrap">
                    <div class="section-title">
                        <h2>Blog</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        'orderby' => 'id'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="col-md-4">
                                <div class="blog">
                                    <figure>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                    alt="<?php echo get_the_title(); ?>">
                                            <?php } else { ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.webp"
                                                    alt="<?php echo get_the_title(); ?>">
                                            <?php } ?>
                                        </a>
                                    </figure>
                                    <div class="blog-info">
                                        <span>August 14, 2023 </span>
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="blog-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php

                        endwhile;
                        wp_reset_postdata(); // Reset post data
                    else:
                        echo 'No posts found';
                    endif;

                    ?>
                </div>
                <a class="btn-style-1" href="<?php echo site_url(); ?>/blogs">Read more Blogs</a>
            </div>
        </div>
    </div>
</section>
<!-- why me section end here -->
<?php get_footer(); ?>