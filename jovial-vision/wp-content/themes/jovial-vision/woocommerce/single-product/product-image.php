<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	
	<div class="list-details-left">
	<div class="pictures-box">
				
		
	<div class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
		</div>
		
		<div class="listing-share">
			<span>Share</span>
			<ul>
				<li> <a href="#"> <i class="fab fa-facebook-f"></i></a> </li>
				<li> <a href="#"> <i class="fab fa-twitter"></i></a> </li>
				<li> <a href="#"> <i class="fab fa-pinterest-square"></i></a> </li>
			</ul>
		</div>
		<div class="tools">
			<a href="#"> <i class="fas fa-paper-plane"></i>  Send to friend</a>
			<a href="#"> <i class="fas fa-barcode"></i>   Listing #281</a>
		</div>
		<div class="protect">
			<h4><i class="fas fa-umbrella"></i> <span>Buyer's protection</span></h4>
			<ul>
				<li> <i class="far fa-check-circle"></i> <span class="bold">Act locally</span>  to avoid scam</li>
				<li> <i class="far fa-check-circle"></i> <span class="bold">Anonymous payment gateways</span>   are very unsafe</li>
				<li> <i class="far fa-check-circle"></i> <span class="bold">Cheques payments</span>   are not recommended</li>
			</ul>
		</div>
		
		
		</div>
</div>
	
