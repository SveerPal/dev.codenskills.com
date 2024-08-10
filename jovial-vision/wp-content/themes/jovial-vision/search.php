<?php
/**
 * The template for displaying search pages 
 *
 * @package JV
 */

get_header(); ?>
<section class="content-sec">
    <div class="container">
        <div class="row">
            <main id="primary" class="site-main"></main>
            <?php woocommerce_breadcrumb();?>


            <?php if (is_search() && have_posts()): ?>

                <header class="page-header">
                    <h2 class="page-title">
                        <?php
                        /* translators: %s: search query. */
                        printf(__('Search Results for: %s', 'jv'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h2>
                </header><!-- .page-header -->

                <?php
                // Start the loop for search results
                while (have_posts()):
                    the_post();

                    // Display each search result
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                        </header><!-- .entry-header -->

                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                endwhile;

                // Pagination for search results
                wp_pagenavi();

            elseif (is_search()):

                // If no results are found
                ?>
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing Found', 'jv'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'jv'); ?>
                    </p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->

            <?php else: ?>

                <!-- Your regular page content goes here -->
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <?php
                    // Display the page content
                    while (have_posts()):
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div><!-- .page-content -->

            <?php endif; ?>
            </main><!-- #main -->
        </div>
    </div>
</section>
<?php
get_footer();