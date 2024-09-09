<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package JV
 */

get_header(); ?>
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
            <?php //woocommerce_breadcrumb();?>

                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e('Oops! That page can’t be found.', 'jv'); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jv'); ?>
                        </p>

                        <?php get_search_form(); ?>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->

            </main><!-- #main -->
        </div>
    </div>
</section>
<?php
get_footer();
