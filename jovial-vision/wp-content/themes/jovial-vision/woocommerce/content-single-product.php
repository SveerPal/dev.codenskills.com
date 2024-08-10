<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php
$current_post_id = get_the_ID();
$catss = wp_get_post_terms( get_the_ID(), 'product_cat' );

//print_r($catss); 
//echo $term_id;
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
<section class="content-list-sec">
	<div class="container">
	<div class="row">
	<div class="col-md-9 order-md-2">
	<div class="row">
		
	<div class="col-md-6">
							
	
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
	</div>	
	<div class="col-md-6">
		
	<div class="list-details-right">
		
		
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
		<?php
		echo $product->post_excerpt;
		?>
		
		<a href="#" class="desc-more">Show more<i class="fa fa-chevron-circle-down"></i></a>
		<div class="status-box">
			<div class="status-left">
				<ul><li><?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( '', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?></li>
					
					<li>#281</li>
					<li><strong>15</strong> views</li>
				</ul>
			</div>
			<div class="status-right">
				<div class="report">
					<i class="fas fa-bullhorn"></i>
				</div>
				<ul class="cont-wrap">
					<li> <a href="#">spam</a> </li>
					<li> <a href="#">misclassified</a> </li>
					<li> <a href="#">duplicated</a> </li>
					<li> <a href="#">expired</a> </li>
					<li> <a href="#">offensive</a> </li>
				</ul>
			</div>
		</div>
		
		<div class="price-box">
			<span class="lead">Price</span>
			<?php
			//global $product;
			$price = $product->get_price_html();
			if($price){
			?>
			<span class="value"><?php echo $price; ?></span>
			<?php }else{ ?>
			<span class="value">Check with seller</span>
			<?php } ?>
		</div>
		
		<div class="gray-box">
			<div class="pub-date">
				<span><i class="far fa-check-square"></i> Published</span>
				<h4> April 11, 2024</h4>
			</div>
			<div class="phone-box">
				<a href="#"> <i class="fas fa-phone-alt"></i> Call Now</a>
				<a href="#"> <i class="fab fa-whatsapp"></i> WhatsApp</a>
			</div>
			<div class="seller">
				<h3><i class="fas fa-user"></i>  Seller</h3>
				<div class="name-wrap">
					<a href="#">Nama singh</a>
					<small> (reg. on March 26, 2024)</small>
					<h3>List all items from this seller <span>(289)</span> </h3>
				</div>
			</div>
			<div class="seller-contact">
				<a href="#">Contact seller</a>
				<a href="#"><i class="far fa-heart"></i> Add to watchlist</a>
			</div>
          </div>
		
		<div class="locations">
			<h3><i class="fas fa-truck-moving"></i> Location of item</h3>
			<ul>
				<li> 
					<span class="left">Region</span>
					<span class="right">Chandigarh</span>
				</li>
				<li> 
					<span class="left">City</span>
					<span class="right">Chandigarh</span>
				</li>
			</ul>
		</div>
		</div>	
	</div>
		
	<!--sidebar-->
	<div class="col-md-12">
		<div class="popular-listings-sec related-listings">
			<div class="heading-title">
				<h2>
					<span>Related</span>
					listings      
				</h2>
			</div>
			<ul class="latest-listings-box">
				<?php
				$product_args = array(
					'post_type' => 'product', 
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'term_id', 
							'terms'    => $catss[0]->term_id,
						),
					), 
					'post__not_in'   => array( $current_post_id ),
				);

				$product_query = new WP_Query($product_args); 
				while ($product_query->have_posts()) :
				$product_query->the_post();
				
				?>
				<li>					
					<div class="simple-wrap">
						<div class="loc" bis_skin_checked="1"><i class="fa fa-map-marker"></i>&nbsp;India

						</div>
						<div class="item-img-wrap" bis_skin_checked="1">
							<a class="img-link" href="#">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
							</a>    
							<a class="orange-but" title="Quick view" href="#"><i class="far fa-hand-pointer"></i>
							</a>
						</div>
						<div class="status">
							<div class="green">Women Looking For Men</div>
							<div class="normal">yesterday</div>
						</div>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php 
						if ($product) {
							$sale_price = $product->get_sale_price();
							if ($sale_price) {
						?>
						<div class="price"><span><?php echo wc_price($sale_price); ?> ₹</span></div>
						<?php }} ?>
					</div>
				</li>
				<?php endwhile; ?>			
								
			</ul>
		</div>
        <div class="more-info">
			<nav>
				<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
					<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
					<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" tabindex="-1">Comments</button>
					<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" tabindex="-1">Contact seller</button>
				</div>
			</nav>
      <div class="tab-content p-3 border bg-light" id="nav-tabContent">
		  <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  <div class="dis-wrap">
				  <?php the_content(); ?>
			  </div>
		  </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		  <div class="contact-form">
			  <h4 class="add-new title_block"><span>Add</span> your comment</h4>
			  <form>
				  <div class="row">
					  <div class="col-md-4">
						  <div class="input-group">
							  <label>Name</label>
							  <input type="text" name="">
							  <span>Real name or Username</span>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="input-group">
							  <label>E-mail<sup>*</sup></label>
							  <input type="text" name="">
							  <span>Will not be published</span>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="input-group">
							  <label>Title</label>
							  <input type="text" name="">
							  <span>Review, feedback or question</span>
						  </div>
					  </div>
					  <div class="col-md-12">
						  <div class="input-group">
							  <label>Message</label>
							  <textarea></textarea>
							  <span><sup>*</sup>This field is required</span>
						  </div>
					  </div>
					  <div class="col-md-12">
						  <div class="btn-wrap">
							  <button>Send comment</button>
							  <button>Clear</button>
						  </div>
					  </div>
				  </div>
			  </form>
		  </div>
		  </div>
		  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
			  <div class="contact-form">
				  <h3> <i class="far fa-envelope"></i> Send message to seller</h3>
				  <form>
					  <div class="row">
						  <div class="col-md-4">
							  <div class="input-group">
								  <label>Name</label>
								  <input type="text" name="">
								  <span>Real name or Username</span>
							  </div>
						  </div>
						  <div class="col-md-4">
							  <div class="input-group">
								  <label>E-mail<sup>*</sup></label>
								  <input type="text" name="">
								  <span>Will not be published</span>
							  </div>
						  </div>
						  <div class="col-md-4">
							  <div class="input-group">
								  <label>Title</label>
								  <input type="text" name="">
								  <span>Review, feedback or question</span>
							  </div>
						  </div>
						  <div class="col-md-12">
							  <div class="input-group">
								  <label>Message<sup></sup>*<sup></sup></label>
								  <textarea></textarea>
								  <span><sup>*</sup>This field is required</span>
							  </div>
						  </div>
						  <div class="col-md-12">
							  <div class="btn-wrap">
								  <button>Send comment</button>
								  <button>Clear</button>
							  </div>
						  </div>
					  </div>
				  </form>
			  </div>
		  </div>
		</div>
		</div>
		</div>	
	<!--sidebar end-->
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
		</div>
		</div>
		<!--sidebar-->
		<div class="col-md-3 order-md-1">
                    <div class="list-sidebaar">
                        <div class="sidebar-search">
                            <div class="top-seaech">
                                <h2><i class="fas fa-search"></i> Advanced Search </h2>
                            </div>
                            <form>
                                <div class="inner-search-wrap">
                                    <div class="input-group">
                                        <label>Search text</label>
                                        <input type="text" name="">
                                    </div>
                                    <div class="input-group">
                                        <label>Search text</label>
                                        <select>
                                            <option selected="">Chandigarh</option>
                                            <option selected="">Andaman and Nicobar</option>
                                            <option selected="">Andhra Pradesh</option>
                                            <option selected="">Arunachal Pradesh</option>
                                            <option selected="">Assam</option>
                                            <option selected="">Bihar</option>
                                            <option selected="">Chhattisgarh</option>
                                            <option selected="">Dadra and Nagar Haveli and Daman and Diu</option>
                                            <option selected="">Delhi</option>
                                            <option selected="">Goa</option>
                                            <option selected="">Gujarat</option>
                                            <option selected="">Haryana</option>
                                            <option selected="">Himachal Pradesh</option>
                                            <option selected="">Jammu and Kashmir</option>
                                            <option selected="">Jharkhand</option>
                                            <option selected="">Karnataka</option>
                                            <option selected="">Kerala</option>
                                            <option selected="">Laccadives</option>
                                            <option selected="">Ladakh</option>
                                            <option selected="">Madhya Pradesh</option>
                                            <option selected="">Maharashtra</option>
                                            <option selected="">Manipur</option>
                                            <option selected="">Meghalaya</option>
                                            <option selected="">Mizoram</option>
                                            <option selected="">Nagaland</option>
                                            <option selected="">Odisha</option>
                                            <option selected="">Puducherry</option>
                                            <option selected="">Punjab</option>
                                            <option selected="">Rajasthan</option>
                                            <option selected="">Sikkim</option>
                                            <option selected="">Tamil Nadu</option>
                                            <option selected="">Telangana</option>
                                            <option selected="">Tripura</option>
                                            <option selected="">Uttar Pradesh</option>
                                            <option selected="">Uttarakhand</option>
                                            <option selected="">West Bengal</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label>City</label>
                                        <select>
                                            <option selected="">Chandigarh</option>
                                            <option>Select a city</option>
                                        </select>
                                    </div>
                                </div>
								<?php echo do_shortcode('[wpf-filters id=1]'); ?>
                                <div class="list-price-box">
                                    <div class="list-price">
                                        <h4>Price:</h4>
                                        <div class="amount-min">Free</div>
                                        <div class="amount-del">-</div>
                                        <div class="amount-max">4000</div>
                                    </div>
                                </div>
                                <div class="middle">
                                <div class="multi-range-slider">
                                    <input type="range" id="input-left" min="0" max="100" value="25">
                                    <input type="range" id="input-right" min="0" max="100" value="75">

                                    <div class="slider">
                                        <div class="track"></div>
                                        <div class="range" style="left: 25%; right: 25%;"></div>
                                        <div class="thumb left" style="left: 25%;"></div>
                                        <div class="thumb right" style="right: 25%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkboxes-wrap">
                                <input type="checkbox" name="" id="" value="">
                                <label class="with-pic-label">Show only listings with photo</label>
                            </div>
                            <button class="submit-btn">Search <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="categories-menu">
                            <div class="heading-title">
                                 <h2>
                                     <span>Categories</span>
                                      list      
                                 </h2>
                            </div>
                            <div class="category-inner">
                                
                                <ul>
                                <?php
								$terms = get_terms( array(
								'taxonomy' => 'product_cat',
								'hide_empty' => false,
								'parent' => 0,
								'exclude' => array(15)						
								) );
								?> 
								<?php 								 
								  foreach($terms as $term): 
								  
								?>
									<li> <a href="#"><?php echo $term->name; ?></a> </li>
									<?php $n++; endforeach; ?>
									
                                </ul>
                            </div>
                        </div>
                        <div class="mobile-friendly">
                            <h3>Available also on your mobile device</h3>
                            <figure>
                                <img src="https://dev.codenskills.com/adposthub/wp-content/uploads/2024/05/mobile.png" alt="mobile-friendly">
                            </figure>
                        </div>
                        <div class="mobile-friendly">
                            <h3>Share us and become our fan</h3>
                            <figure>
                                <img src="https://dev.codenskills.com/adposthub/wp-content/uploads/2024/05/social.png" alt="social-link">
                            </figure>
                        </div>
                    </div>
                </div>
		<!--end sidebar-->
		</div>
		</div>
	</section>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
