<?php
get_header();
?>
    
    <!-- content home section start here -->
    <section class="content-home-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-9 order-md-2">
                    <div class="tabs-wrap">
                          <ul class="nav nav-pills mb-3 border-2" id="pills-tab" role="tablist">
							 <?php
							$terms = get_terms( array(
							'taxonomy' => 'product_cat',
							'hide_empty' => false,
							'parent' => 0,
							'exclude' => array(15)						
							) );
							?> 
							<?php 
							  $n = 1;
							  foreach($terms as $term): 
							  //print_r($term);
							  if($n == 1){
								 $aria="true";
							  }else{
								 $aria="false"; 
							  }
							?>
							
                            <li class="nav-item" role="presentation">
                              <button class="nav-link text-primary fw-semibold <?php if($n == 1){ ?>active<?php } ?> position-relative" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $term->slug; ?>" type="button" role="tab" aria-controls="pills-taxi" aria-selected="<?php echo $aria; ?>">
                              <h4><?php echo $term->name; ?></h4>
                              <i class="<?php the_field('category_icon', $term) ?>"></i>
                            </button>
                            </li>
							<?php $n++; endforeach; ?>
                           
                          </ul>
                            <div class="tab-content border-primary p-3 text-danger" id="pills-tabContent">								
								<?php 
							  $n2 = 1;
							  foreach($terms as $term): 
							 	$termID = $term->term_id;
							?>
                                <div class="tab-pane fade <?php if($n2==1){?> show active <?php } ?>" id="pills-<?php echo $term->slug; ?>" role="tabpanel" aria-labelledby="pills-taxi-tab">
                                 <div class="tab-head">
                                     <div class="tab-head-left">
                                        <a href="#"><h2><?php echo $term->name; ?></h2></a>
                                        <span> - browse in <?php echo $term->count; ?> listings</span>
                                     </div>
                                     <div class="tab-head-right">
                                       <a href="#">
                                           <i class="fa fa-plus-square"></i>
                                           Add listing
                                       </a>
                                     </div>
                                 </div>
                                 <div class="row">
									 <?php
									 $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
        							 $image_url = wp_get_attachment_url( $thumbnail_id );
									 //print_r($image_url);
									 ?>
                                    <div class="col-md-2">
                                        <div class="img-wrap-left">
                                            <a href="#">
                                                <figure>
                                                    <img src="<?php echo $image_url; ?>">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
									 <?php
									 // Retrieve child categories of current parent category
									 $child_cat = get_terms(array(
										 'taxonomy' => 'product_cat',
										 'hide_empty' => false,
										 'orderby' => 'name',
										 'order' => 'ASC',
										 'parent' => $term->term_id,
									 ));	
									 if (!empty($child_cat) && !is_wp_error($child_cat)) {
									 ?>
                                    <div class="col-md-4">
                                        <div class="img-wrap-middle">
                                            <ul>
												<?php
												foreach ($child_cat as $child_cats) {
												?>
                                                <li><a href="<?php echo get_term_link($child_cats->slug, 'product_cat') ; ?>"><?php echo $child_cats->name; ?></a></li>
												<?php } ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
									 <?php } ?>
                                    <div class="col-md-5">
                                        <div class="img-wrap-right">
                                            <div class="owl-carousel silder-carousel owl-theme" >
												<?php
												$product_args = array(
												'post_type' => 'product', 
												'tax_query' => array(
													array(
														'taxonomy' => 'product_cat',
														'field'    => 'term_id', 
														'terms'    => $termID,
													),
													),   
												);
												
												$product_query = new WP_Query($product_args); 
    											while ($product_query->have_posts()) :
												$product_query->the_post();
												global $product;
												?>
                                                <div class="item">
                                                    <div class="cat-items">
                                                        <div class="simple-prod">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <figure>
                                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="car-thumbnail">
                                                                </figure>
                                                            </a>
                                                            <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
															<?php 
            												if ($product) {
																$sale_price = $product->get_sale_price();
																if ($sale_price) {
															?>
                                                            <div class="car-price">
                                                                <span>Now <?php echo wc_price($sale_price); ?> ₹</span>
                                                            </div>
															<?php }} ?>
                                                        </div>
                                                    </div>
                                                </div>
												<?php endwhile; ?>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="go-to-cat-wrap">
                                            <a class="go-to-cat" href="#"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                 </div>
                                   <div class="bottom">
                                       <div class="b-head">Hot listings</div>
                                       <a href="#" class="prod round2">Taxi Services in Goa...</a>
                                       <a href="#" class="prod round2">Cab Service in Goa -...</a>
                                       <a href="#" class="prod round2">Airport Pickup Drop ...</a>
                                       <a href="#" class="prod round2">Nearmetaxitravels Ca...</a>
                                       <a href="#" class="prod round2">Cab Service in Goa |...</a>
                                       <a href="#" class="prod round2">Book Your Trusted Ca...</a>
                                       <a href="#" class="prod round2">Cheapest Cab Service...</a>
                                       <a href="#" class="prod round2">Cab service in Goa |...</a>
                                       <a href="#" class="prod round2">Goa Cab Services - T...</a>
                                       <a href="#" class="prod round2">Taxi Service in Goa ...</a>
                                    </div>
                                </div>
                            <?php $n2++;endforeach; ?>    
								                          
                          </div>
                    </div>
                </div>
                <div class="col-md-3 order-md-1">
                    <div class="sidebar">
                        <div class="title_block">
                            <h2>
                                <span>Location</span>
                                 selector        
                            </h2>
                            <div class="accordion" id="accordionExample">
								<?php
								// Retrieve all categories
								$categories = get_terms(array(
									'taxonomy' => 'location',
									'hide_empty' => false,
									'orderby' => 'name',
									'order' => 'ASC',
									'parent' => 0, // Only retrieve parent categories
								));
								$cat_num = 1;
								foreach ($categories as $category) {
								?>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $cat_num; ?>">
                                  <button class="accordion-button <?php if($cat_num > 1){ ?>collapsed<?php } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $cat_num; ?>" aria-expanded="true" aria-controls="collapse<?php echo $cat_num; ?>">
                                    <h3> <a href="#"><?php echo $category->name; ?></a> </h3>
                                  </button>
                                </h2>
								 <?php
								// Retrieve child categories of current parent category
								$child_categories = get_terms(array(
									'taxonomy' => 'location',
									'hide_empty' => false,
									'orderby' => 'name',
									'order' => 'ASC',
									'parent' => $category->term_id,
								));	
								if (!empty($child_categories) && !is_wp_error($child_categories)) {
								?>
                                <div id="collapse<?php echo $cat_num; ?>" class="accordion-collapse collapse <?php if($cat_num == 1){ ?>show<?php } ?>" aria-labelledby="heading<?php echo $cat_num; ?>" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <ul>
										<?php
										foreach ($child_categories as $child_category) {
										?>
                                        <li>
                                            <a href="<?php echo get_term_link($child_category->slug, 'location') ; ?>"><?php echo $child_category->name; ?></a>
                                        </li>
										<?php } ?>
                                    </ul>
                                  </div>
                                </div>
								  <?php } ?>
                              </div>
							  <?php $cat_num++; } ?>
                               
                              
                            </div>
                        </div>
                        <div class="mobile-friendly">
                            <h3>Available also on your mobile device</h3>
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mobile.png" alt="mobile-friendly">
                            </figure>
                        </div>
                        <div class="mobile-friendly">
                            <h3>Share us and become our fan</h3>
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social.png" alt="social-link">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content home section end here -->

    <!-- Latest listings section start here -->
    <section class="latest-listings-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="latest-listings-wrap">
                    <div class="heading-title">
                         <h2>
                             <span>Latest</span>
                              listings      
                         </h2>
                    </div>
                    <ul class="latest-listings-box">
						<?php
						$latest_prod = array(
						'post_type' => 'product', 
						'post_status' => 'publish',  
						'numberposts' => 10
						);

						$latestprod_query = new WP_Query($latest_prod); 
						while ($latestprod_query->have_posts()) :
						$latestprod_query->the_post();
						//global $product;
						
						 $pcategories = get_the_terms(get_the_ID(), 'product_cat');
						$locat = get_the_terms(get_the_ID(), 'location');
						//print_r($locat);
						?>
                        <li>
                            <div class="simple-wrap">
                                <div class="loc" bis_skin_checked="1"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $locat[0]->name; ?>

                                </div>
                                <div class="item-img-wrap" bis_skin_checked="1">
                                   <a class="img-link" href="#">
                                    <img src="<?php echo  get_the_post_thumbnail_url();?>"  alt="">
                                   </a>    
                                   <a class="orange-but" title="Quick view" href="#"><i class="far fa-hand-pointer"></i>
                                   </a>
                                </div>
                                <div class="status">
                                    <div class="green"><?php echo $pcategories[0]->name; ?></div>
                                    <div class="normal">yesterday</div>
                                </div>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php 
								if ($product) {
									$sale_price = $product->get_sale_price();
									if ($sale_price) {
								?>
                                <div class="price"><span><?php echo wc_price($sale_price); ?> </span></div>
								<?php }} ?>
                            </div>
                        </li>
						<?php endwhile; ?>
                       
                    </ul>
                </div>
            </div>
        </div>
		</div>
    </section>
    <!-- Latest listings section end here -->

    <!-- Popular Listings section start here -->
    <section class="popular-listings-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-title">
                         <h2>
                             <span>Latest</span>
                              listings      
                         </h2>
                    </div>
                    <ul class="latest-listings-box popular-listings-wrap">
                      <li>
                            <div class="simple-wrap">
                                <div class="top">
                                  <div class="left">1</div>
                                  <div class="right">visited <span>919x</span></div>
                                </div>
                                <div class="item-img-wrap" bis_skin_checked="1">
                                   <a class="img-link" href="#">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pop-img.jpg"  alt="">
                                   </a>    
                                </div>
                                <div class="status">
                                    <div class="green">Cheapest Cab Service in Goa | Goa Taxi Services</div>
                                </div>
                                <div class="price"><span>now  800.00 ₹</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="simple-wrap">
                                <div class="top">
                                  <div class="left">2</div>
                                  <div class="right">visited <span>465x</span></div>
                                </div>
                                <div class="item-img-wrap" bis_skin_checked="1">
                                   <a class="img-link" href="#">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gril1.jpg"  alt="">
                                   </a>    
                                </div>
                                <div class="status">
                                    <div class="green">Cash Call Girls in Ranipur Mod | KajalVermas</div>
                                </div>
                                <div class="price"><span>now  3000.00 ₹</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="simple-wrap">
                                <div class="top">
                                  <div class="left">3</div>
                                  <div class="right">visited <span>413x</span></div>
                                </div>
                                <div class="item-img-wrap" bis_skin_checked="1">
                                   <a class="img-link" href="#">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/199_thumbnail.jpg"  alt="">
                                   </a>    
                                </div>
                                <div class="status">
                                    <div class="green">Easy and Cheap going by flight to Chardham From Haridwar City</div>
                                </div>
                                <div class="price"><span>Check with seller</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="simple-wrap">
                                <div class="top">
                                  <div class="left">4</div>
                                  <div class="right">visited <span>404x</span></div>
                                </div>
                                <div class="item-img-wrap" bis_skin_checked="1">
                                   <a class="img-link" href="#">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/399_thumbnail.jpg"  alt="">
                                   </a>    
                                </div>
                                <div class="status">
                                    <div class="green">Upto 80% off on DSLR Cameras</div>
                                </div>
                                <div class="price"><span>Check with seller</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="simple-wrap">
                                <div class="top">
                                  <div class="left">5</div>
                                  <div class="right">visited <span>401x</span></div>
                                </div>
                                <div class="item-img-wrap" bis_skin_checked="1">
                                   <a class="img-link" href="#">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/352_thumbnail.jpg"  alt="">
                                   </a>    
                                </div>
                                <div class="status">
                                    <div class="green">Bareilly to Kotdwar Taxi One Way Outstation Cab</div>
                                </div>
                                <div class="price"><span>Check with seller</span></div>
                            </div>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Listings section end here -->		
	
    <!-- footer start here -->
    <?php
		get_footer();
	?>
