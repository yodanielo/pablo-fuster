<?php
 
if (!function_exists('wp_nav_menu') || get_option("rttheme_wp_menu")) :

$options = array (

		array("name" => "Stlye Options",
				"desc" => "Please choose a style for your theme.",
				"id" => $shortname."_style",
				"options" =>  array(
												1 => "Style 1",
												2 => "Style 2",
												3 => "Style 3",
												4 => "Style 4",
												5 => "Style 5"
											),
				"type" => "select"),

		array("name" => "Home Page Layout",
				"desc" => "Please choose your home page layout",
				"id" => $shortname."_homepage_style",
				"options" =>  array(
												1 => "With Sidebar",
												2 => "Without Sidebar"
											),
				"type" => "select"),
                
		array(
				"name" => "Logo",
				"desc" => "Please enter file URL of your logo",
				"id" => $shortname."_logo_url",
				"type" => "rttheme_upload"),

		array(
				"name" => "Navigation Bar Settings",
				"type" => "heading"),


		array(  "name" => "Enable RT-Theme default menu tools? (since Wordpress 3.0)",
				"desc" => "If don't want to use new WP 3.0 menu tools, you can use RT-Theme menu tools.",
				"id" => $shortname."_wp_menu",
				"type" => "checkbox",
				"std" => "false"),
                
		array(
				"name" => "Choose navigation bar pages ",
				"desc" => "Please select pages which you want display on navigation bar. ",
				"id" => $shortname."_pages[]",
				"options" => $rt_gettoplevelpages,
				"type" => "selectmultiple_pages"),

		array(  "name" => "Show drop down menu?",
				"desc" => "Check this box if you would like to use show related sub pages as drop down menus on the navigation bar",
				"id" => $shortname."_drop_down_menu",
				"type" => "checkbox",
				"std" => "false"),

		array(
				"name" => "Footer Settings",
				"type" => "heading"),

		array(
				"name" => "Choose footer pages",
				"desc" => "Please select pages which you want display on middle column of the footer.",
				"id" => $shortname."_footer_pages[]",
				"options" => $rt_getpages,
				"type" => "selectmultiple_pages"),
 
 		array(
				"name" => "Footer Left Area",
				"desc" => "
						<blockquote style=\"font-size:11px;\"><u>example</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
									Copyright &copy; 2009 Company Name, Inc.
						</blockquote>
				",
 				"id" => $shortname."_footer_copy",
				"type" => "textarea"),

		array(
				"name" => "Social Media Icons",
				"desc" => "To use social media icons you must add a line like below;<br />
						social media name|your url ,<br />

						<blockquote style=\"font-size:11px;\"><u>example</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
										<span style=\"color:#33CC00;\">twitter</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_twitter_url</span><span style=\"color:#FF0000;\">,	 </span>			<br />
										<span style=\"color:#33CC00;\">rss</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_rss_url</span><span style=\"color:#FF0000;\">,
										</span>			<br />
										<span style=\"color:#33CC00;\">flickr</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_flickr_url</span><span style=\"color:#FF0000;\">,		 </span>			<br />
										<span style=\"color:#33CC00;\">facebook</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_facebook_url</span><span style=\"color:#FF0000;\">,	 </span>		<br />
						</blockquote>
						<blockquote style=\"font-size:11px;\"><u>available names for social media icons</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
							<ul class=\"key_list\">
							<li>youtube</li>
							<li>blogger</li>
							<li>delicious</li>
							<li>digg</li>
							<li>facebook </li>
							<li>feedburner</li>
							<li>flickr</li>
							<li>furl </span>&nbsp;  
							<li>google</li>
							<li>lastfm</li>
							<li>linkedin</li>
							<li>netvibes</li>
							<li>newsvine</li>
							<li>rss </span>&nbsp; 
							<li>stumbleupon</li>
							<li>technorati</li>
							<li>twitter</li>
							<li>wordpress</li>
							<li>yahoo</li>
							</ul>
						<br style=\"display:block;clear:both;\" />
						</blockquote>
						please do not forget to put comma at the end of each line!
				",
 				"id" => $shortname."_social_media_icons",
				"type" => "textarea"),

                
		array(
				"name" => "Auto Resizing",
				"type" => "heading"),

		array(  "name" => "Disable auto resize function for box, slider and portfolio images?",
				"id" => $shortname."_auto_disable_box",
				"type" => "checkbox",
				"std" => "false"),

 		array(
				"name" => "Miscellaneous",
				"type" => "heading"),

		array(  "name" => "Same Lavel Sub Pages",
				"desc" => "Show same lavel pages on sub page sidebar menu.",
				"id" => $shortname."_same_lavel",
				"type" => "checkbox",
				"std" => "false"),
                
                
		array(  "name" => "Disable Cufon?",
				"desc" => "Check this box if you want to disable the Cufon Font Replacement Plugin",
				"id" => $shortname."_disable_cufon",
				"type" => "checkbox",
				"std" => "false"),
                                

		array("name" => "Google Analytics Tracking Code",
				"id" => $shortname."_anayltics",
				"type" => "textarea")
                
);
else:


$options = array (

		array("name" => "Stlye Options",
				"desc" => "Please choose a style for your theme.",
				"id" => $shortname."_style",
				"options" =>  array(
												1 => "Style 1",
												2 => "Style 2",
												3 => "Style 3",
												4 => "Style 4",
												5 => "Style 5"
											),
				"type" => "select"),

		array("name" => "Home Page Layout",
				"desc" => "Please choose your home page layout",
				"id" => $shortname."_homepage_style",
				"options" =>  array(
												1 => "With Sidebar",
												2 => "Without Sidebar"
											),
				"type" => "select"),
                
		array(
				"name" => "Logo",
				"desc" => "Please enter file URL of your logo",
				"id" => $shortname."_logo_url",
				"type" => "rttheme_upload"),
		array(
				"name" => "Navigation Bar Settings",
				"type" => "heading"),


		array(  "name" => "Enable RT-Theme default menu tools?",
				"desc" => "If don't want to use new WP 3.0 menu tools, you can use RT-Theme menu tools.",
				"id" => $shortname."_wp_menu",
				"type" => "checkbox",
				"std" => "false"),
		array(
				"name" => "Footer Settings",
				"type" => "heading"),
 
 		array(
				"name" => "Footer Left Area",
				"desc" => "
						<blockquote style=\"font-size:11px;\"><u>example</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
									Copyright &copy; 2009 Company Name, Inc.
						</blockquote>
				",
 				"id" => $shortname."_footer_copy",
				"type" => "textarea"),

		array(
				"name" => "Social Media Icons",
				"desc" => "To use social media icons you must add a line like below;<br />
						social media name|your url ,<br />

						<blockquote style=\"font-size:11px;\"><u>example</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
										<span style=\"color:#33CC00;\">twitter</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_twitter_url</span><span style=\"color:#FF0000;\">,	 </span>			<br />
										<span style=\"color:#33CC00;\">rss</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_rss_url</span><span style=\"color:#FF0000;\">,
										</span>			<br />
										<span style=\"color:#33CC00;\">flickr</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_flickr_url</span><span style=\"color:#FF0000;\">,		 </span>			<br />
										<span style=\"color:#33CC00;\">facebook</span><span style=\"color:#FF0000;\">|</span><span style=\"color:#ECBD5B;\">http://your_facebook_url</span><span style=\"color:#FF0000;\">,	 </span>		<br />
						</blockquote>
						<blockquote style=\"font-size:11px;\"><u>available names for social media icons</u></blockquote>
						<blockquote style=\"-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;background:#F8F8F8;font-size:11px;padding:10px;\">
							<ul class=\"key_list\">
							<li>youtube</li>
							<li>blogger</li>
							<li>delicious</li>
							<li>digg</li>
							<li>facebook </li>
							<li>feedburner</li>
							<li>flickr</li>
							<li>furl </span>&nbsp;  
							<li>google</li>
							<li>lastfm</li>
							<li>linkedin</li>
							<li>netvibes</li>
							<li>newsvine</li>
							<li>rss </span>&nbsp; 
							<li>stumbleupon</li>
							<li>technorati</li>
							<li>twitter</li>
							<li>wordpress</li>
							<li>yahoo</li>
							</ul>
						<br style=\"display:block;clear:both;\" />
						</blockquote>
						please do not forget to put comma at the end of each line!
				",
 				"id" => $shortname."_social_media_icons",
				"type" => "textarea"),

                
		array(
				"name" => "Auto Resizing",
				"type" => "heading"),

		array(  "name" => "Disable auto resize function for box, slider and portfolio images?",
				"id" => $shortname."_auto_disable_box",
				"type" => "checkbox",
				"std" => "false"),

 		array(
				"name" => "Miscellaneous",
				"type" => "heading"),

		array(  "name" => "Same Lavel Sub Pages",
				"desc" => "Show same lavel pages on sub page sidebar menu.",
				"id" => $shortname."_same_lavel",
				"type" => "checkbox",
				"std" => "false"),
                
                
		array(  "name" => "Disable Cufon?",
				"desc" => "Check this box if you want to disable the Cufon Font Replacement Plugin",
				"id" => $shortname."_disable_cufon",
				"type" => "checkbox",
				"std" => "false"),
                                

		array("name" => "Google Analytics Tracking Code",
				"id" => $shortname."_anayltics",
				"type" => "textarea")
                
);

endif;

$this_file="controlpanel.php";
if ( 'save' == $_REQUEST['action'] & 'controlpanel.php' == $_REQUEST['page'] ) {
		foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }

							//rttheme_pages[]
							if($_REQUEST['rttheme_pages']!=""){
								$slider_category_final="";
								foreach($_REQUEST['rttheme_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_pages[]", $slider_category_final);
							}

							if($_REQUEST['rttheme_footer_pages']!=""){
								//rttheme_footer_pages[]
								$slider_category_final="";
								foreach($_REQUEST['rttheme_footer_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_footer_pages[]", $slider_category_final);
							}
	

							if($_REQUEST['rttheme_blog_box_cat']!=""){
								//rttheme_blog_box_cat[]
								$slider_category_final="";
								foreach($_REQUEST['rttheme_blog_box_cat']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_blog_box_cat[]", $slider_category_final);
							}


							//rttheme_ex_pages[]
							if($_REQUEST['rttheme_top_pages']!=""){
								$slider_category_final="";
								foreach($_REQUEST['rttheme_top_pages']  as $slider_category) {
										$slider_category_final .= $slider_category .",";
								}
								update_option( "rttheme_top_pages[]", $slider_category_final);
							}

			header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}
?>