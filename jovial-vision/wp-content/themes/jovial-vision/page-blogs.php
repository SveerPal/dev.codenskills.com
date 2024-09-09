<?php

get_header();
?>

<?php if (has_post_thumbnail(get_the_ID())) { ?>
    <section class="breadcrumb-sec" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
<?php } else { ?>
    <section class="breadcrumb-sec" style="background-image: url('<?php echo esc_url(site_url('/wp-content/uploads/2024/08/inner-banner.png')); ?>');">
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

<section class="content-sec">
    <div class="container">
        <div class="row">
            <main id="primary" class="site-main">
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 9,
                        'order' => 'DESC',
                        'orderby' => 'id'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="col-md-4 mt-4">
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

                        endwhile;?>
                        <div class="col-md-12 mt-3">
                        <?php
                        echo wp_pagenavi(array('query'=>$query));
                        ?>
                        </div>
                        <?php
                        wp_reset_query();
                        wp_reset_postdata(); // Reset post data
                    else:
                        echo 'No posts found';
                    endif;

                    ?>
                </div>

            </main>
        </div>
    </div>
</section>

<?php
//get_sidebar();
get_footer();
