<?php

// enqueue parent styles

// function ns_enqueue_styles() {
//     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
// }

// add_action( 'wp_enqueue_scripts', 'ns_enqueue_styles' );


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'menus' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    //add_theme_support( 'wc-product-gallery-slider' );
}
function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'my-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar that appears on the right.', 'my-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Custom Sidebar', 'my-theme' ),
        'id'            => 'custom-sidebar',
        'description'   => __( 'A custom sidebar for specific pages.', 'my-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );

add_filter ( 'nav_menu_css_class', 'so_37823371_menu_item_class', 10, 4 );
function so_37823371_menu_item_class ( $classes, $item, $args, $depth ){
     if($args->menu == 'Header Menu') {
        $classes[] = 'nav-item';
     }
  return $classes;
}

add_filter( 'nav_menu_link_attributes', function($atts) {
    if($atts['aria-current']){
          $atts['class'] = "nav-link active";
    }else{
        $atts['class'] = "nav-link";
    }
        
    return $atts;
}, 100, 1 );

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span> 
	<?php

	// Use the correct selector here; match it with your HTML element
	$fragments['.cart-count'] = ob_get_clean();
	
	return $fragments;
}


// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// function special_nav_class ($classes, $item) {
//   if (in_array('current-menu-item', $classes) ){
//     $classes[] = 'active ';
//   }
//   return $classes;
// }

// // BEGIN: Custom shortcode to display the Woocommerce catalog orderby options

// add_action( 'wp_ajax_get_sublocation', 'get_sublocation' );   
// add_action( 'wp_ajax_nopriv_get_sublocation', 'get_sublocation' ); 

// function get_filter_product() {

//     $cat_id=$_POST['cat_id'];
//     $product=$_POST['product'];
//     $location=$_POST['location'];
//     $sublocation=$_POST['sublocation'];
//     $minprice=$_POST['min-price'];
//     $maxprice=$_POST['max-price'];
//     $orderby=$_POST['orderby'];
    
//     $args = array(
//             'posts_per_page' => -1,
//             'post_type' => 'product',
//           // 'orderby' => $orderby, // Assuming this is a custom field storing date information
//           // 'order' => 'ASC',
//         );
//     if($orderby=='price-desc'){
//         $args['orderby']  = 'meta_value_num';
//         $args['order']    = 'DESC';
//         $args['meta_key'] = '_price'; 
//     }elseif($orderby=='price-asc'){
//         $args['orderby']  = 'meta_value_num';
//         $args['order']    = 'DESC';
//         $args['meta_key'] = '_price'; 
//     }elseif($orderby=='rating'){
//         $args['orderby']  = 'meta_value_num';
//         $args['order']    = 'DESC';
//         $args['meta_key'] = 'rating'; 
//     }elseif($orderby=='popularity'){
//         $args['orderby']  = 'meta_value_num';
//         $args['order']    = 'DESC';
//         $args['meta_key'] = 'total_sales'; 
//     }elseif($orderby=='date'){
//         $args['orderby']  = 'post_date';
//         $args['order']    = 'DESC';
//     }else{
//         $args['orderby']  = 'menu_order';
//         $args['order']    = 'ACS';
        
//     }    
        
//     if ($cat_id != "" && $location != "") {
//         $args['tax_query'] = array(
//             'relation' => 'AND',
//             array(
//                 'taxonomy' => 'location',
//                 'field' => 'id',
//                 'terms' => array($location)
//             ),
//             array(
//                 'taxonomy' => 'product_cat',
//                 'field' => 'id',
//                 'terms' => array($cat_id) // This should be removed as $cat_id is empty here
//             )
//         );
//     } elseif ($cat_id == "" && $location != "") {
//         $args['tax_query'] = array(
//             'relation' => 'AND',
//             array(
//                 'taxonomy' => 'location',
//                 'field' => 'id',
//                 'terms' => array($location)
//             ),
            
//         );
//     } elseif ($cat_id != "" && $location == "") {
//         $args['tax_query'] = array(
//             'relation' => 'AND',
//             array(
//                 'taxonomy' => 'product_cat',
//                 'field' => 'id',
//                 'terms' => array($cat_id)
//             )
//         );
//     }
    
//     if ($minprice != "" && $maxprice != "") {
//         $args['meta_query'] = array(
//             'relation' => 'AND',
//             array(
//                 'key' => '_price',
//                 'value' => $minprice, // Removed reset() and end() as minprice and maxprice are single values
//                 'compare' => '>=',
//                 'type' => 'NUMERIC'
//             ),
//             array(
//                 'key' => '_price',
//                 'value' => $maxprice,
//                 'compare' => '<=',
//                 'type' => 'NUMERIC'
//             )
//         );
//     }

//     $html="";            
//     $loop = new WP_Query( $args );
//     $totalproduct= $loop->post_count;
//     while($loop->have_posts()) : $loop->the_post();
    
    
        
//     $html.='<li class="column simple-prod "><div class="simple-wrap">';
//             $locations = get_the_terms(get_the_ID(), 'location');
//             if($locations){
//                 $l=0;
//                 foreach ($locations as $location) {
//                   $locationname= $location->name;
                   
//                     if($l==0){ 
//                         $html.='<div class="loc" bis_skin_checked="1"><i class="fa fa-map-marker"></i>&nbsp;'. $location->name;
//                     }
//                     if($l!=0){ 
//                         $html.='<span class="loc-hide"><i class="fa fa-angle-right"></i>'.$location->name.'</span>';
//                     } 
//                     if($l==0){  
//                         $html.='</div>';
//                         $l++;
//                     } 
                    
//                 }
//             }
            
//     $html.='<div class="item-img-wrap" bis_skin_checked="1"><a class="img-link" href="'. get_the_permalink().'">
//                 <img src="'. get_the_post_thumbnail_url().'" alt=""></a>    
//                 <a class="orange-but" title="Quick view" href="#"><i class="far fa-hand-pointer"></i></a>
//             </div>
//             <div class="status">
//                 <div class="green">';
                     
//                 $produtcat = get_the_terms(get_the_ID(), 'product_cat');
//                 if($produtcat){
                    
//                     foreach ($produtcat as $produtcatnew) {
//                         $catname= $produtcatnew->name;
//                         $catid= $produtcatnew->term_id;
//                     }
//                     $html.= $catname;
//                 }
                    
//     $html.='</div>
//                 <div class="normal">'. get_the_date( 'd/m' ).'</div>
//             </div>
//             <a href="'.get_the_permalink().'">'. get_the_title().'</a>
//             <div class="price">
//                 <span>';
//                          $price = get_post_meta( get_the_ID(), '_price', true ); 
//                          $html.= wc_price( $price ); 
//     $html.='</span>
//             </div>
//         </div>
//         <div class="list-prod">
//             <div class="list-left">
//                 <figure>
//                     <a href="'. get_the_permalink().'"> <img src="'.  get_the_post_thumbnail_url().'"> </a>
//                 </figure>
//             </div>
//             <div class="list-middle">
//                 <h3> <a href="'. get_the_permalink().'"> '. get_the_title().'</a> </h3>
//                 <p>'. get_the_excerpt().'</p>
//                 <div class="loc"><i class="fa fa-map-marker"></i>'. $locationname.'</div>
//                 <div class="author">
//                   <i class="fas fa-pencil-alt"></i>Published by 
//                   <a href="'. get_author_posts_url(get_the_author_meta('ID')).'">'. get_the_author().'</a>
//                  </div>
//             </div>
//             <div class="list-right">
//                 <div class="price">Check with seller</div>
//                 <a class="view round2" href="#">view</a>
//                 <a class="category" href="'. get_term_link($catid, "product_cat").'">'.  $catname.'</a>
//                 <span class="date">
//                   published on <span>'. get_the_date( 'd/m' ).'</span>        
//                 </span>
//                 <span class="viewed">';
                            
//                         $meta = get_post_meta( get_the_ID(), '_total_views_count', true);
//                         if(!$meta) {
//                             $count = 0;
//                         } else {        
//                             $count = count(explode(',',$meta));
//                         }
                    
//     $html.='viewed <span>'. $count.'</span>        
//                 </span>
//             </div>
//         </div>
//     </li>';
    
//     endwhile; 
//     wp_reset_query(); 
            
   
//     if($html!=""){
//         echo json_encode(array('status'=>1,'data'=>$html,'totalproduct'=>'Showing all '.$totalproduct.' results'));
//     }else{
//         echo json_encode(array('status'=>0,'data'=>'','totalproduct'=>'Showing all 0 results'));
//     }
    
//     die;
// }
// add_action( 'wp_ajax_get_filter_product', 'get_filter_product' );   
// add_action( 'wp_ajax_nopriv_get_filter_product', 'get_filter_product' );  
