<?php
// Show sidebar only on WooCommerce shop, product category, or product tag archive pages
if ( function_exists('is_woocommerce') 
     && ( is_shop() || is_product_category() || is_product_tag() ) 
     && is_active_sidebar('sidebar-2') ) :
?>
<div class="col-lg-3 sidebar-gap wc-sidebar">
  <aside id="secondary" class="widget-area">
    <div class="react-sideabr dynamic-sidebar">
      <?php
        dynamic_sidebar( 'sidebar-2' );
      ?>
    </div>
  </aside>
</div>
<?php endif; ?>
