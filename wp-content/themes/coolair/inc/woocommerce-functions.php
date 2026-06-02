<?php
/* All Functions for WooCommerce
-----------------------------------------*/

/*-------------------------------------
#. Theme supports for WooCommerce
---------------------------------------*/
function coolair_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
}
add_action('after_setup_theme', 'coolair_add_woocommerce_support');

/* Hide default shop page title */
function coolair_wc_hide_page_title() {
    return false;
}
add_filter('woocommerce_show_page_title', 'coolair_wc_hide_page_title');

/* Loop: products per page */
if (!function_exists('coolair_wc_loop_shop_per_page')) {
    function coolair_wc_loop_shop_per_page() {
        global $coolair_option;
        $layout = !empty($coolair_option['wc_num_product']) ? $coolair_option['wc_num_product'] : 9;
        return $layout;
    }
}
add_filter('loop_shop_per_page', 'coolair_wc_loop_shop_per_page');

/* Loop: products per row */
if (!function_exists('coolair_loop_columns')) {
    function coolair_loop_columns() {
        global $coolair_option;
        $layout_col = !empty($coolair_option['wc_num_product_per_row']) ? $coolair_option['wc_num_product_per_row'] : 3;
        return $layout_col;
    }
}
add_filter('loop_shop_columns', 'coolair_loop_columns');

/* Related products */
add_filter('woocommerce_output_related_products_args', 'coolair_related_products_args', 20);
function coolair_related_products_args($args) {
    $args['posts_per_page'] = 3; // number of related products
    $args['columns'] = 3;
    return $args;
}

/* Breadcrumb Remove */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


/* Woocommerce checkout fields */
add_filter('woocommerce_checkout_fields', 'coolair_override_checkout_fields');
function coolair_override_checkout_fields($fields) {
    $fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('First Name', 'coolair');
    $fields['shipping']['shipping_last_name']['placeholder']  = esc_html__('Last Name', 'coolair');
    $fields['billing']['billing_first_name']['placeholder']   = esc_html__('First Name', 'coolair');
    $fields['billing']['billing_last_name']['placeholder']    = esc_html__('Last Name', 'coolair');
    $fields['billing']['billing_company']['placeholder']      = esc_html__('Business Name', 'coolair');
    $fields['billing']['billing_company']['label']            = esc_html__('Business Name', 'coolair');
    $fields['shipping']['shipping_company']['placeholder']    = esc_html__('Company Name', 'coolair');
    $fields['billing']['billing_email']['placeholder']        = esc_html__('Email Address', 'coolair');
    $fields['billing']['billing_phone']['placeholder']        = esc_html__('Phone', 'coolair');
    $fields['billing']['billing_state']['placeholder']        = esc_html__('State', 'coolair');
    $fields['billing']['billing_city']['placeholder']         = esc_html__('City', 'coolair');
    $fields['billing']['billing_postcode']['placeholder']     = esc_html__('Post Code', 'coolair');
    return $fields;
}

/* Sale badge with percentage */
add_filter('woocommerce_sale_flash', 'coolair_add_percentage_to_sale_badge', 20, 3);
function coolair_add_percentage_to_sale_badge($html, $post, $product) {
    $percentage = '';
    if ($product->is_type('variable')) {
        $percentages = [];
        $prices = $product->get_variation_prices();
        foreach ($prices['price'] as $key => $price) {
            if ($prices['regular_price'][$key] != $price) {
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        $percentage = max($percentages) . '%';
    } elseif ($product->is_type('grouped')) {
        $percentages = [];
        $children_ids = $product->get_children();
        foreach ($children_ids as $child_id) {
            $child_product = wc_get_product($child_id);
            $regular_price = (float) $child_product->get_regular_price();
            $sale_price    = (float) $child_product->get_sale_price();
            if ($sale_price != 0) {
                $percentages[] = round(100 - ($sale_price / $regular_price * 100));
            }
        }
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();
        if ($sale_price != 0) {
            $percentage = round(100 - ($sale_price / $regular_price * 100)) . '%';
        } else {
            return $html;
        }
    }

    return '<span class="onsale sale-rs">' . esc_html__('-', 'coolair') . $percentage . '</span>';
}
