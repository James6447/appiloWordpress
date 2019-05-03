<?php
/**
 * Perform WooCommerce function with Ajax
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
add_action( 'wp_ajax_bevro_product_remove', 'bevro_product_remove' );
add_action( 'wp_ajax_nopriv_bevro_product_remove', 'bevro_product_remove' );
function bevro_product_remove(){
    global $woocommerce;
    $cart = $woocommerce->cart;
    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item){
    if($cart_item['product_id'] == $_POST['product_id'] ){
        // Remove product in the cart using  cart_item_key.
        $cart->remove_cart_item($cart_item_key);
        woocommerce_mini_cart();
        exit();
      }
    }
  die();
}
function bevro_product_count_update(){
   global $woocommerce; 
   $bevro_woo_cart_disable = get_theme_mod('bevro_woo_cart_disable','icon'); 
   $ordertotal            = wp_kses_data( $woocommerce->cart->get_total() );
   $productadd            = wp_kses_data($woocommerce->cart->cart_contents_count);
  ?>
  <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-contents" >
    <?php if($bevro_woo_cart_disable=='icon'){?>
    <i class="fa fa-shopping-basket"></i>
    <?php } elseif($bevro_woo_cart_disable=='icon+cartcount'){?>
    <i class="fa fa-shopping-basket"></i>
    <span class="cart-crl"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span>
    <?php } elseif($bevro_woo_cart_disable=='icon+total'){?>
    <i class="fa fa-shopping-basket"></i>
    <span class="cart-total"><?php echo esc_attr($ordertotal);?></span>  
    <?php } else { ?>
     <i class="fa fa-shopping-basket"></i>
    <span class="cart-crl"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span>
    <span class="cart-total"><?php echo esc_attr($ordertotal);?></span>
    <?php } ?>
  </a>  
<?php 
  die();
}

add_action( 'wp_ajax_bevro_product_count_update', 'bevro_product_count_update' );
add_action( 'wp_ajax_nopriv_bevro_product_count_update', 'bevro_product_count_update' );