<?php
//product categories
if($this_is_product){
$show_product_categories=true;
}

//blog categories
if($this_is_blog){
$show_blog_categories=true;
}

?>


<?php if($show_blog_categories):?>
	<div class="box small">
	<ul id="sub_menu">
		<?php								
			wp_list_categories('include='.get_option('rttheme_blog_ex_cat[]').'&title_li=&orderby=slug'); 
		?>			
	</ul>
	</div>
<?php endif;?>


<?php if($show_product_categories):?>
	<div class="box small">
	<ul id="sub_menu">
		<?php								
			wp_list_categories('include='.get_option('rttheme_product_list_ex_cat[]').'&title_li=&orderby=slug'); 
		?>			
	</ul>
	</div>
<?php endif;?>