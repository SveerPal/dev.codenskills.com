<?php

get_header();
?>
<!--<?php if (has_post_thumbnail(get_the_ID())) { ?>-->
<!--    <section class="breadcrumb-sec" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">-->
<!--<?php } else { ?>-->
<!--    <section class="breadcrumb-sec" style="background-image: url('<?php echo esc_url(site_url('/wp-content/uploads/2024/08/inner-banner.png')); ?>');">-->
<!--<?php } ?>-->
 <section class="breadcrumb-sec" style="background-image: url('<?php echo esc_url(site_url('/wp-content/uploads/2024/08/inner-banner.png')); ?>');">

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
			<main id="primary" class="site-main col-md-8">
            <div class="right-side-wrap">
            <?php
            // Start the Loop
            while ( have_posts() ) : the_post();
        
                // Display the title
                the_title('<h1 class="entry-title">', '</h1>');
        
                // Display the post thumbnail
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('full');
                }
        
                // Display the post content
                the_content();
        
                // Display custom fields (if any)
                if ( function_exists('get_field') ) {
                    $custom_field = get_field('custom_field_name'); // ACF Example
                    if ( $custom_field ) {
                        echo '<div class="custom-field">' . esc_html( $custom_field ) . '</div>';
                    }
                }
        
                // Display meta information
                echo '<div class="post-meta">';
                echo '<p>Published on: ' . get_the_date() . '</p>';
                echo '<p>By: ' . get_the_author() . '</p>';
                echo '<p>Categories: ' . get_the_category_list(', ') . '</p>';
                echo '<p>Tags: ' . get_the_tag_list('', ', ') . '</p>';
                echo '</div>';
        
                // Display comments
                if ( comments_open() || get_comments_number() ) :
                   // comments_template();
                endif;
        
            endwhile; // End of the loop.
            ?>

				
				</div>
			</main><!-- #main -->
			<div class="col-md-4">
				<div class="sidebaar-wrap">
			    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<?php else : ?>
					<?php //get_sidebar(); ?>
				<?php endif; ?>
					<?php //get_sidebar(); ?>
				</div>
			</div>				
		</div>
	</div>
</section>

<?php
//get_sidebar();
get_footer();
