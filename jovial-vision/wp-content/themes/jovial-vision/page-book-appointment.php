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
					 <?php woocommerce_breadcrumb();?>
				 </div>
			 </div>
		</div>
	</div>
</section>

<section class="content-sec">
	<div class="container">
		<div class="row">
			<main id="primary" class="site-main">
				<?php
				while (have_posts()):
					the_post();
					the_content();
					//get_template_part( 'template-parts/content', 'page' );
				
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main>
		</div>
	</div>
</section>

<?php
//get_sidebar();
get_footer();
