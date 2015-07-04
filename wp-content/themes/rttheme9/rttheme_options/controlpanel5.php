<?php
$options5 = array (
		/*blog*/
		array(
				"name" => "Select Blog Categories",
				"id" => $shortname."_blog_ex_cat[]",
				"options" => $rt_getcat,
				"type" => "selectmultiple"),

		array(
				"name" => "Select Your Blog Page",
				"id" => $shortname."_blog_page",
				"options" => $rt_getpages,
				"type" => "select"),

		array(  "name" => "Show Blog Categories As Drop Down Menu?",
				"desc" => "Check this box if you would like to show all blog categories as drop down menus under blog page",
				"id" => $shortname."_blog_drop_down_menu",
				"type" => "checkbox",
				"std" => "false"),


 		array(
				"name" => "How many posts do you want to display per page?",
				"id" => $shortname."_blog_pager",
				"type" => "text"),

 		array(
				"name" => "Disable autoresize post images",
				"id" => $shortname."_blog_resize",
				"type" => "checkbox"),
);

$this_file5="controlpanel5.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel5.php' == $_REQUEST['page'] ) {
 
		foreach ($options5 as $value) {

				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }
				 header("Location:?page=".$_REQUEST['page'] ."&saved=true");

						//rttheme_blog_ex_cat[]
						if($_REQUEST['rttheme_blog_ex_cat']!=""){
							$slider_category_final="";
							foreach($_REQUEST['rttheme_blog_ex_cat']  as $slider_category) {
									$slider_category_final .= $slider_category .",";
							}
							update_option( "rttheme_blog_ex_cat[]", $slider_category_final);
						}
		die;
}
?>