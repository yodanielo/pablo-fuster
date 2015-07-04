<?php
if (!function_exists('wp_nav_menu') || get_option("rttheme_wp_menu")) :
$options3 = array (
		/*portfolio*/
		array(
				"name" => "Select Portfolio Categories",
				"id" => $shortname."_portf_ex_cat[]",
				"options" => $rt_getcat,
				"type" => "selectmultiple"),

		array(
				"name" => "Select Your Portfolio Page",
				"id" => $shortname."_portf_page",
				"options" => $rt_getpages,
				"type" => "select"),

		/*portfolio start category*/
		array(
				"name" => "Select Portfolio Start Category",
				"id" => $shortname."_portf_start_cat",
				"options" => $rt_getcat,
				"type" => "select"),

		array(  "name" => "Hide Porfolio Category Bar",
				"desc" => "Check this box if you want to remove category bar from your portfolio pages",
				"id" => $shortname."_portfolio_category_bar_hide",
				"type" => "checkbox",
				"std" => "false"),
		
		array(  "name" => "Hide Porfolio Slider",
				"desc" => "Check this box if you want to remove slider from your portfolio pages",
				"id" => $shortname."_portfolio_slider_hide",
				"type" => "checkbox",
				"std" => "false"),
		
		
		array(  "name" => "Show Porfolio Categories As Drop Down Menu?",
				"desc" => "Check this box if you would like to show all portfolio categories as drop down menus under portfolio page",
				"id" => $shortname."_portfolio_drop_down_menu",
				"type" => "checkbox",
				"std" => "false"),

 		array(
				"name" => "How many posts do you want to display per page?",
				"id" => $shortname."_portf_pager",
				"type" => "text")
);

else:
$options3 = array (
		/*portfolio*/
		array(
				"name" => "Select Portfolio Categories",
				"id" => $shortname."_portf_ex_cat[]",
				"options" => $rt_getcat,
				"type" => "selectmultiple"),

		array(
				"name" => "Select Your Portfolio Page",
				"id" => $shortname."_portf_page",
				"options" => $rt_getpages,
				"type" => "select"),

		/*portfolio start category*/
		array(
				"name" => "Select Portfolio Start Category",
				"id" => $shortname."_portf_start_cat",
				"options" => $rt_getcat,
				"type" => "select"),

		array(  "name" => "Hide Porfolio Category Bar",
				"desc" => "Check this box if you want to remove category bar from your portfolio pages",
				"id" => $shortname."_portfolio_category_bar_hide",
				"type" => "checkbox",
				"std" => "false"),
		
		array(  "name" => "Hide Porfolio Slider",
				"desc" => "Check this box if you want to remove slider from your portfolio pages",
				"id" => $shortname."_portfolio_slider_hide",
				"type" => "checkbox",
				"std" => "false"),

 		array(
				"name" => "How many posts do you want to display per page?",
				"id" => $shortname."_portf_pager",
				"type" => "text")
);

endif;

$this_file3="controlpanel3.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel3.php' == $_REQUEST['page'] ) {
 
		foreach ($options3 as $value) {

				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

							//coklu secim 
							if($_REQUEST['rttheme_portf_ex_cat']!=""){
								foreach($_REQUEST['rttheme_portf_ex_cat']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_portf_ex_cat[]", $slider_category_final);
							}

		
			 header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}
?>