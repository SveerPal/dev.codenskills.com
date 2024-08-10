    <?php
	
	get_header( 'shop' );
	?>
	<?php
	do_action( 'woocommerce_before_main_content' );

	$taxnomy = get_queried_object();
	$taxnomy_name = $taxnomy->name;
	$taxnomy_slug = $taxnomy->slug;
	$taxnomy_id = $taxnomy->term_id;
//	print_r($taxnomy);
	//

	?>
	<style>
	    .woocommerce-notices-wrapper ~ .woocommerce-result-count{
	        display:none;
	    }
	    .woocommerce-notices-wrapper ~ .woocommerce-ordering{
	        display:none;
	    }
	</style>

     <section class="content-list-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-9 order-md-2">
                    <div class="content-list-main">
                        
                        <div class="search-items">
                            <div class="gallery-view-wrap">
                                    
                                    <?php 
                                    do_action( 'woocommerce_shop_loop_header' );

                                        if ( woocommerce_product_loop() ) {
                                        
                                        	do_action( 'woocommerce_before_shop_loop' );
                                        
                                        	woocommerce_product_loop_start();
                                        
                                        	if ( wc_get_loop_prop( 'total' ) ) {
                                        	    echo '<ul class="latest-listings-box">';
                                        		while ( have_posts() ) {
                                        			the_post();
                                        			$product = wc_get_product( get_the_ID() );
                                        			do_action( 'woocommerce_shop_loop' );
                                        			
                                            ?>
                                            <li class="column simple-prod ">
                                                <div class="simple-wrap">
                                                    <?php 
                                                    $locations = get_the_terms(get_the_ID(), 'location');
                                                    if($locations){
                                                        $l=0;
                                                        foreach ($locations as $location) {
                                                           $locationname= $location->name;
                                                        ?>    
                                                        <?php if($l==0){ ?> 
                                                        <div class="loc" bis_skin_checked="1"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $location->name; ?> 
                                                         <?php } ?>
                                                            <?php if($l!=0){ ?> 
                                                            <span class="loc-hide">
                                                                <i class="fa fa-angle-right"></i> 
                                                                <?php echo $location->name; ?>
                                                            </span>
                                                            <?php } ?>
                                                        <?php if($l==0){ ?> 
                                                        </div>
                                                        <?php $l++; } ?>
                                                        <?php     
                                                        }
                                                    }
                                                    ?>
                                                    <div class="item-img-wrap" bis_skin_checked="1">
                                                       <a class="img-link" href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo  get_the_post_thumbnail_url();?>" alt="">
                                                       </a>    
                                                       <a class="orange-but" title="Quick view" href="#"><i class="far fa-hand-pointer"></i>
                                                       </a>
                                                    </div>
                                                    <div class="status">
                                                        <div class="green">
                                                            <?php 
                                                                $produtcat = get_the_terms(get_the_ID(), 'product_cat');
                                                                if($produtcat){
                                                                    
                                                                    foreach ($produtcat as $produtcatnew) {
                                                                        $catname= $produtcatnew->name;
                                                                        $catid= $produtcatnew->term_id;
                                                                    }
                                                                    echo $catname;
                                                                }
                                                            ?> 
                                                        </div>
                                                        <div class="normal"><?php echo get_the_date( 'd/m' ); ?></div>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                    <div class="price">
                                                        <span>
                                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                                <?php echo wc_price( $price ); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="list-prod">
                                                    <div class="list-left">
                                                        <figure>
                                                            <a href="<?php the_permalink(); ?>"> <img src="<?php echo  get_the_post_thumbnail_url();?>"> </a>
                                                        </figure>
                                                    </div>
                                                    <div class="list-middle">
                                                        <h3> <a href="<?php the_permalink(); ?>"> <?php echo get_the_title(); ?></a> </h3>
                                                        <p><?php echo get_the_excerpt(); ?></p>
                                                        <div class="loc"><i class="fa fa-map-marker"></i> <?php echo $locationname; ?></div>
                                                        <div class="author">
                                                          <i class="fas fa-pencil-alt"></i>Published by 
                                                          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php echo get_the_author(); ?></a>
                                                         </div>
                                                    </div>
                                                    <div class="list-right">
                                                        <div class="price">Check with seller</div>
                                                        <a class="view round2" href="#">view</a>
                                                        <a class="category" href="<?php echo get_term_link($catid, "product_cat"); ?>"><?php echo  $catname; ?></a>
                                                        <span class="date">
                                                           published on <span><?php echo get_the_date( 'd/m' ); ?></span>        
                                                        </span>
                                                        <span class="viewed">
                                                            <?php 
                                                                    
                                                                $meta = get_post_meta( get_the_ID(), '_total_views_count', true);
                                                                if(!$meta) {
                                                                    $count = 0;
                                                                } else {        
                                                                    $count = count(explode(',',$meta));
                                                                }
                                                            ?>
                                                              viewed <span><?php echo $count; ?></span>        
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        			
                                        		//	wc_get_template_part( 'content', 'product' );
                                        		}
                                        		echo '</ul>';
                                        	}
                                        
                                        	woocommerce_product_loop_end();
                                        
                                        	do_action( 'woocommerce_after_shop_loop' );
                                        } else {
                                        	do_action( 'woocommerce_no_products_found' );
                                        }
                                    ?>
                                
                                   
                            </div>
                        <!--    <div class="pagination-wrap">-->
                        <!--    <nav aria-label="Page navigation example">-->
                        <!--      <ul class="pagination">-->
                        <!--        <li class="page-item">-->
                        <!--          <a class="page-link" href="#" aria-label="Previous">-->
                        <!--            <span aria-hidden="true">&laquo;</span>-->
                        <!--          </a>-->
                        <!--        </li>-->
                        <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
                        <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                        <!--        <li class="page-item">-->
                        <!--          <a class="page-link" href="#" aria-label="Next">-->
                        <!--            <span aria-hidden="true">&raquo;</span>-->
                        <!--          </a>-->
                        <!--        </li>-->
                        <!--      </ul>-->
                        <!--    </nav>-->
                        <!--</div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-3 order-md-1">
                    <div class="list-sidebaar">
                        <div class="sidebar-search">
                            <div class="top-seaech">
                                <h2><i class="fas fa-search"></i> Advanced Search </h2>
                            </div>
                            <form method="POST" id="filterForm" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="get_filter_product">
                                <input type="hidden" name="cat_id" value="<?php echo $taxnomy_id; ?>">
                                <div class="inner-search-wrap">
                                    <div class="input-group">
                                        <label>Search text</label>
                                        <input type="text" name="product">
                                    </div>
                                    <div class="input-group">
                                        <label>Search Location</label>
                                        
                                        <select name="location" id="location">
                                            <option value="">Select Location</option>
                                            <?php 
                                            $args = array(
                                                'taxonomy' => 'location',
                                                'parent' => 0
                                            );
                                            $locations = get_terms( $args );
                                            if($locations){
                                                foreach ($locations as $location) {
                                                ?>    
                                                <option value="<?php echo $location->term_id; ?>"><?php echo $location->name; ?></option>
                                            <?php    
                                                }
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label>Sub Location</label>
                                        <select  name="sublocation" id="sublocation">
                                            <option value="">Select Sub Location</option>
                                        </select>
                                    </div>
                                </div>
								
								
                         
                            
                            
                            	
                            <style>
 
                                .price-input {
                                  width: 100%;
                                  display: flex;
                                  margin: 30px 0 35px;
                                }
                                .price-input .field {
                                  display: flex;
                                  width: 100%;
                                  height: 45px;
                                  align-items: center;
                                }
                                .field input {
                                  width: 100%;
                                  height: 100%;
                                  outline: none;
                                  font-size: 19px;
                                  margin-left: 12px;
                                  border-radius: 5px;
                                  text-align: center;
                                  border: 1px solid #999;
                                  -moz-appearance: textfield;
                                }
                                input[type="number"]::-webkit-outer-spin-button,
                                input[type="number"]::-webkit-inner-spin-button {
                                  -webkit-appearance: none;
                                }
                                .price-input .separator {
                                  width: 130px;
                                  display: flex;
                                  font-size: 19px;
                                  align-items: center;
                                  justify-content: center;
                                }
                                .slider {
                                  height: 5px;
                                  position: relative;
                                  background: #ddd;
                                  border-radius: 5px;
                                }
                                .slider .progress {
                                  height: 100%;
                                  left: 25%;
                                  right: 25%;
                                  position: absolute;
                                  border-radius: 5px;
                                  background: #17a2b8;
                                }
                                .range-input {
                                  position: relative;
                                }
                                .range-input input {
                                  position: absolute;
                                  width: 100%;
                                  height: 5px;
                                  top: -5px;
                                  background: none;
                                  pointer-events: none;
                                  -webkit-appearance: none;
                                  -moz-appearance: none;
                                }
                                input[type="range"]::-webkit-slider-thumb {
                                  height: 17px;
                                  width: 17px;
                                  border-radius: 50%;
                                  background: #17a2b8;
                                  pointer-events: auto;
                                  -webkit-appearance: none;
                                  box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
                                }
                                input[type="range"]::-moz-range-thumb {
                                  height: 17px;
                                  width: 17px;
                                  border: none;
                                  border-radius: 50%;
                                  background: #17a2b8;
                                  pointer-events: auto;
                                  -moz-appearance: none;
                                  box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
                                }

                                
                                
                                </style>
                            
                            <?php
                                
                                $products = get_posts(array(
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'orderby' => 'meta_value_num',
                                    'meta_key'=> '_price',
                                    'posts_per_page' => -1,
                                ));
                                
                                $highest = $products[array_key_first($products)];
                                $lowest = $products[array_key_last($products)];
                                
                                $highest_price = get_post_meta( $highest->ID, '_price', true );
                                $lowest_price = get_post_meta( $lowest->ID, '_price', true );
                            ?>
                                
                            <div class="wrapper">
                              <div class="price-input">
                                <div class="field">
                                  <span>Min</span>
                                  <input type="number" class="input-min" name="min-price" value="<?php echo $lowest_price; ?>">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                  <span>Max</span>
                                  <input type="number" class="input-max" name="max-price" value="<?php echo $highest_price; ?>">
                                </div>
                              </div>
                              <div class="slider">
                                <div class="progress"></div>
                              </div>
                              <div class="range-input">
                                  <?php 
                                  $slidrprc=($highest_price*25)/100;
                                  ?>
                                <input type="range" class="range-min" min="0" max="<?php echo $highest_price; ?>" value="<?php echo $slidrprc ?>" step="100">
                                <input type="range" class="range-max" min="0" max="<?php echo $highest_price; ?>" value="<?php echo $highest_price-$slidrprc ?>" step="100">
                              </div>
                            </div>
                            <br/>
                            <!--<div class="checkboxes-wrap">-->
                            <!--    <input type="checkbox" name="" id="" value="">-->
                            <!--    <label  class="with-pic-label">Show only listings with photo</label>-->
                            <!--</div>-->
                            <button class="submit-btn">Search <i class="fas fa-search"></i></button>
                            </form>
                            <?php  //echo do_shortcode('[wpf-filters id=1]'); ?>
                        </div>
                        <div class="categories-menu">
                            <div class="heading-title">
                                 <h2>
                                     <span>Latest</span>
                                      listings      
                                 </h2>
                            </div>
                            <div class="category-inner">
                                <ul>
                                    <li> <a class="bold" href="javascript:void(0)">All categories </a> </li>
                                     <?php
                                   
                            
                                    $categories = get_terms( "product_cat",array('hide_empty' => 0,'exclude'=>15,'parent' => 0,) );
                                    if($categories){
                                    foreach($categories as $cat){
                                
                                        $subcategories = get_terms( "product_cat", array('hide_empty' => 0,'parent'=> $cat->term_id) );
                                        if($subcategories && ($cat->term_id==$taxnomy_id)){
                                        
                                        ?>
                                        <li class="is_child">
                                            <a  class="active" href="<?php echo get_term_link($cat->slug, "product_cat"); ?>"><?php echo $cat->name; ?></a>
                                            <ul>
                                            <?php foreach($subcategories as $subcat){ ?>
                                            <li>
                                                <a href="<?php echo get_term_link($subcat->slug, "product_cat"); ?>"><?php echo $subcat->name; ?></a>
                                            </li>    
                                            <?php } ?>
                                            </ul>
                                        </li>
                                        <?php 
                                        }else{
                                        ?>
                                    
                                        <li>
                                            <a href="<?php echo get_term_link($cat->slug, "product_cat"); ?>"><?php echo $cat->name; ?></a>
                                        </li>
                                    <?php }
                                            
                                        } 
                                    } 
                                    ?>
                                    
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
   
    const rangeInput = document.querySelectorAll(".range-input input"),
          priceInput = document.querySelectorAll(".price-input input"),
          range = document.querySelector(".slider .progress");
        let priceGap = 1000;
        
        priceInput.forEach((input) => {
          input.addEventListener("input", (e) => {
            let minPrice = parseInt(priceInput[0].value),
              maxPrice = parseInt(priceInput[1].value);
        
            if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
              if (e.target.className === "input-min") {
                rangeInput[0].value = minPrice;
                range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
              } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
              }
            }
          });
        });
        
        rangeInput.forEach((input) => {
          input.addEventListener("input", (e) => {
            let minVal = parseInt(rangeInput[0].value),
              maxVal = parseInt(rangeInput[1].value);
        
            if (maxVal - minVal < priceGap) {
              if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap;
              } else {
                rangeInput[1].value = minVal + priceGap;
              }
            } else {
              priceInput[0].value = minVal;
              priceInput[1].value = maxVal;
              range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
              range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
          });
        });
</script>
<?php
do_action( 'woocommerce_after_main_content' );
	get_footer( 'shop' );
?>
<?php







