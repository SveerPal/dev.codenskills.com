<?php
/**
 * Plugin Name: View Count
 * Description: Keeps track of the number of times a product has been viewed on a website.
 * Plugin URI:  https://codenskills.com/
 * Author:      Yashvir Pal
 * Author URI:  https://yashvirpal.com/
 * Version: 1.0
 * Text Domain: view-count
 
 *
 * View_Count is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Product_View_Count is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */


add_action('wp', 'product_view_counter');
function product_view_counter() {
global $post;
    $userip = $_SERVER['REMOTE_ADDR'];
    if ( is_product() ){  
     $meta = get_post_meta( $post->ID, '_total_views_count', TRUE );
    
         $meta = (!$meta) ? array() : explode( ',', $meta );
    
         $meta = array_filter( array_unique( $meta ) );
    
         if( ! in_array( $userip, $meta ) ) {
    
               array_push( $meta, $userip );
               update_post_meta( $post->ID, '_total_views_count', implode(',', $meta) );
    
         }
    }
}

add_action( 'woocommerce_before_add_to_cart_button', 'view_counter_on_product_page', 10);
function view_counter_on_product_page() {
    global $product;
    $id = $product->id;         
    $meta = get_post_meta( $id, '_total_views_count', true);
    if(!$meta) {
        $count = 0;
    } else {        
        $count = count(explode(',',$meta));
    }       
    return $count;
    //echo '<div class="custom-visitor-count"><i class="fa fa-eye"></i><span class="counter-value">'.$count.' Views</span></div>';
}

add_action( 'woocommerce_after_shop_loop_item', 'view_counter_on_product_page2', 10);
function view_counter_on_product_page2() {
    global $product;
    $id = $product->id;         
    $meta = get_post_meta( $id, '_total_views_count', true);
    if(!$meta) {
        $count = 0;
    } else {        
        $count = count(explode(',',$meta));
    }
    return $count;
    //echo '<div class="custom-visitor-count"><i class="fa fa-eye"></i><span class="counter-value">'.$count.' Views</span></div>';
}

?>