<?php
/**
 * Product taxonomy archive header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$taxnomy = get_queried_object();
	$taxnomy_name = $taxnomy->name;
	$taxnomy_slug = $taxnomy->slug;
	$taxnomy_id = $taxnomy->term_id;
	global $catalog_orderby_options;
?>
<h2>
                          <!--<span class="lead">Cab &amp; Taxi Chandīgarh</span>-->
                          <span class="lead"><?php echo $taxnomy_name; ?></span>
                          <?php
                         
                          ?>
                          <span class="follow">Browse in 10 listings</span>
                          
                        </h2>
                        <div class="subcats-wrap">
                            <h3>Subcategories</h3>
                            <ul class="list big">
                                <?php
                                $args = array(
                                       
                                       'hide_empty' => 0,
                                       'parent'    => $taxnomy->term_id,
                                ); 
                            
                                $subcategories = get_terms( "$taxnomy->taxonomy", $args );
                                foreach($subcategories as $subcat){
                                ?>
                                <li><a href="<?php echo get_term_link($subcat->slug, "$taxnomy->taxonomy"); ?>"><i class="fa fa-arrow-right"></i><?php echo $subcat->name; ?></a></li>
                                <?php } ?>
                                
                            </ul>
                          <a href="#" class="more open" rel="Less">More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="clear"></div>
                        <div class="search-sort">
                            <div class="search-sort-left">
                                <div class="user-company-change">
                                    <button>All results</button>
                                    <button> <i class="fas fa-filter"></i> Personal</button>
                                    <button>Company</button>
                                </div>
                                <div class="list-grid">
                                    <button class="listView" onclick="listView()"><i class="fas fa-list"></i></button>
                                    <button class="gridView" onclick="gridView()"><i class="fas fa-th"></i></button>
                                </div>
                                <div class="counter">
                                    <span>
                                    <?php woocommerce_result_count(); ?>
                                    
                                    </span>
                                </div>
                            </div>
                            <div class="sort-it-wrap">
                                <button class="title-keep"><i class="fas fa-sort-amount-down"></i> <span>Newly listed</span> </button>
                                
                                <?php echo do_shortcode('[web357_woo_sortby]');?>
                                <!--<ul class="listed">-->
                                <!--    <li class="active"> <a href="#">Newly listed</a> </li>-->
                                <!--    <li> <a href="#">Lower price first</a> </li>-->
                                <!--    <li> <a href="#">Lower price first</a> </li>-->
                                <!--</ul>-->
                            </div>
                        </div>
<!--<header class="woocommerce-products-header">-->
	<?php
	/**
	 * Hook: woocommerce_show_page_title.
	 *
	 * Allow developers to remove the product taxonomy archive page title.
	 *
	 * @since 2.0.6.
	 */
	if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
		?>
		<!--<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>-->
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @since 1.6.2.
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
//	do_action( 'woocommerce_archive_description' );
	?>
<!--</header>-->
