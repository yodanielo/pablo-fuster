<?php
$options2 = array (
		/*Home Page Slider*/

		array(
				"name" => "Slider Timeout (seconds)",
				"id" => $shortname."_slider_time_out",
				"type" => "text"),

		array(  "name" => "Show Slider Icons?",
				"desc" => "Check this box if you would like to show paging buttons on slider",
				"id" => $shortname."_slider_numbers",
				"type" => "checkbox",
				"std" => "false")

);

$this_file2="controlpanel2.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel2.php' == $_REQUEST['page'] ) {
 
		foreach ($options2 as $value) {

				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

				 header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}
?>