<?php
/*
Plugin Name: Hide price and cart until login by PappZ
Description: Don't show prices to visitors, until they log in. By PappZ
Version: 14.0
Author: Papp Zoltán
 */
  
add_action( 'init', 'bbloomer_hide_price_add_cart_not_logged_in' );
  
function bbloomer_hide_price_add_cart_not_logged_in() {   
if ( ! is_user_logged_in() ) {      
 remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
 remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );   
 add_action( 'woocommerce_single_product_summary', 'bbloomer_print_login_to_see', 31 );
 add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_print_login_to_see', 11 );
}
}
  
function bbloomer_print_login_to_see() {
echo '<a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __('Log in to see prices.', 'theme_name') . '</a>';
}