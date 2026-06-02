<?php
get_header();
global $coolair_option;

if (isset($_GET['shop_page_layout'])) {
	if ($_GET['shop_page_layout'] == 'full') {
		$coolair_option['shop_page_layout'] = 'full';
	}elseif ($_GET['shop_page_layout'] == 'right-col') {
		$coolair_option['shop_page_layout'] = 'right-col';
	}elseif ($_GET['shop_page_layout'] == 'left-col') {
		$coolair_option['shop_page_layout'] = 'left-col';
	}
}
// Layout class
$coolair_layout_class = 'col-sm-12 col-xs-12';
if(!empty($coolair_option['shop_page_layout']) ) {
	if( is_product('product')){
		$coolair_layout_class = 'col-sm-12 col-xs-12';
	}
	elseif (  $coolair_option['shop_page_layout'] == 'full' ) {
		$coolair_layout_class = 'col-sm-12 col-xs-12';
	}
	elseif( $coolair_option['shop_page_layout'] == 'left-col' || $coolair_option['shop_page_layout'] == 'right-col'){
		$coolair_layout_class = 'col-lg-9 col-xs-12';
	}
	else{
		$coolair_layout_class = 'col-sm-12 col-xs-12';
	}
}
?>
<div class="row rt-woocommerce-content">
	<?php	
		if ( !empty($coolair_option['shop_page_layout']) && $coolair_option['shop_page_layout'] == 'left-col' ) {
			get_sidebar('woocommerce');
		}
		?>    			
		<div class="<?php echo esc_attr($coolair_layout_class);?>">
			<?php					
				woocommerce_content();
			?>
		</div>
		<?php
		if (!empty($coolair_option['shop_page_layout']) &&  $coolair_option['shop_page_layout'] == 'right-col' ) {
			get_sidebar('woocommerce');
		}
	?>
</div>
<?php
get_footer();