<?php
if (!function_exists('wp_nav_menu') || get_option("rttheme_wp_menu")) :
$options4 = array (
		/*gallery*/
		array(
				"name" => "Select Product Showcase Categories",
				"id" => $shortname."_product_list_ex_cat[]",
				"options" => $rt_getcat,
				"type" => "selectmultiple"),

		array(
				"name" => "Select Your Product List Page",
				"id" => $shortname."_product_list",
				"options" => $rt_getpages,
				"type" => "select"),

		/*portfolio start category*/
		array(
				"name" => "Select Product Page Start Category",
				"id" => $shortname."_product_start_cat",
				"options" => $rt_getcat,
				"type" => "select"),
		
		array(  "name" => "Don't Show Products On Start Page",
				"desc" => "Check this box if you don't want to show products when clicked your products page on navigation bar.",
				"id" => $shortname."_products_first_page_hide",
				"type" => "checkbox",
				"std" => "false"),
		

		array(  "name" => "Show Product Showcase Categories As Drop Down Menu?",
				"desc" => "Check this box if you would like to show first-level product showcase categories as drop down menus under product page on the navigation bar.",
				"id" => $shortname."_product_list_drop_down_menu",
				"type" => "checkbox",
				"std" => "false"),

 		array(
				"name" => "How many products do you want to display per page?",
				"id" => $shortname."_product_list_pager",
				"type" => "text"),


		array(
				"name" => "Select Pages For Product Detail Side Navigation ",
				"id" => $shortname."_pdetail_side_pages[]",
				"options" => $rt_getpages,
				"type" => "selectmultiple"),
		

);
else:
$options4 = array (
		/*gallery*/
		array(
				"name" => "Select Product Showcase Categories",
				"id" => $shortname."_product_list_ex_cat[]",
				"options" => $rt_getcat,
				"type" => "selectmultiple"),

		array(
				"name" => "Select Your Product List Page",
				"id" => $shortname."_product_list",
				"options" => $rt_getpages,
				"type" => "select"),

		/*portfolio start category*/
		array(
				"name" => "Select Product Page Start Category",
				"id" => $shortname."_product_start_cat",
				"options" => $rt_getcat,
				"type" => "select"),
		
		array(  "name" => "Don't Show Products On Start Page",
				"desc" => "Check this box if you don't want to show products when clicked your products page on navigation bar.",
				"id" => $shortname."_products_first_page_hide",
				"type" => "checkbox",
				"std" => "false"),

 		array(
				"name" => "How many products do you want to display per page?",
				"id" => $shortname."_product_list_pager",
				"type" => "text"),


		array(
				"name" => "Select Pages For Product Detail Side Navigation ",
				"id" => $shortname."_pdetail_side_pages[]",
				"options" => $rt_getpages,
				"type" => "selectmultiple"),
		

);
endif;
$this_file4="controlpanel4.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel4.php' == $_REQUEST['page'] ) {
 
		foreach ($options4 as $value) {

				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

							//coklu secim 
							if($_REQUEST['rttheme_product_list_ex_cat']!=""){
								foreach($_REQUEST['rttheme_product_list_ex_cat']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_product_list_ex_cat[]", $slider_category_final);
							}

						
							if($_REQUEST['rttheme_pdetail_side_pages']!=""){
								foreach($_REQUEST['rttheme_pdetail_side_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_pdetail_side_pages[]", $slider_category_final);
							}
							
		
			 header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}

?>