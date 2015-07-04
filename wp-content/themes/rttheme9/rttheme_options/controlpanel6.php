<?php
$options6 = array (
		/*contact*/
		array(
				"name" => "Select Your Contact Page",
				"id" => $shortname."_contact_page",
				"options" => $rt_getpages,
				"type" => "select"),

		array(
				"name" => "Contact Form Mail",
				"desc" => "Please write an email to deliver the contact form submissions.",
				"id" => $shortname."_form_mail",
				"type" => "text"),
);

$this_file6="controlpanel6.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel6.php' == $_REQUEST['page'] ) {
 
		foreach ($options6 as $value) {

				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }
				 header("Location:?page=".$_REQUEST['page'] ."&saved=true");

					update_option( "rttheme_blog_ex_cat[]", $slider_category_final);
		die;
}


?>