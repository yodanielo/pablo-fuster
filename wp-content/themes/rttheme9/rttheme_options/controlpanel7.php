<?php

$options7 = array (
		/*for pages*/
		array(
		"name" => "sidebar name",
		"id" => $shortname."_ud_sidebars",
		"type" => "text"),
		
		array(
		"name" => "Sidebar Name",
		"id" => $shortname."_sidebar_name",
		"type" => "text"),

		array(
		"name" => "Choose Pages",
		"desc" => "Please select pages which you want to place the new sidebar",
		"id" => $shortname."_sidebar_pages[]",
		"options" => $rt_getpages ,
		"type" => "selectmultiple_pages")
);


$options8 = array (
		/*for posts*/
		array(
		"name" => "sidebar name",
		"id" => $shortname."_ud_sidebars",
		"type" => "text"),
		
		array(
		"name" => "Sidebar Name",
		"id" => $shortname."_sidebar_name",
		"type" => "text"),

		array(
		"name" => "Choose Posts",
		"desc" => "Please select posts which you want to place the new sidebar",
		"id" => $shortname."_sidebar_posts[]",
		"options" => $rt_getposts ,
		"type" => "selectmultiple_pages")
);


$options9 = array (
		/*for cats*/
		array(
		"name" => "sidebar name",
		"id" => $shortname."_ud_sidebars",	
		"type" => "text"),
		
		array(
		"name" => "Sidebar Name",
		"id" => $shortname."_sidebar_name",		
		"type" => "text"),

		array(
		"name" => "Choose Categories",
		"desc" => "Please select categories which you want to place the new sidebar",
		"id" => $shortname."_sidebar_cats[]",
		"options" => $rt_getcat ,
		"type" => "selectmultiple_pages")
);

if ( 'save' == $_REQUEST['action'] & 'controlpanel7.php' == $_REQUEST['page'] ) {
 
		foreach ($options7 as $value) {

		if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); }}

				

				

				//UD sidebar pages
				if($_REQUEST['rttheme_sidebar_pages']!=""){

				$selected_elements_ids="";
				foreach($_REQUEST['rttheme_sidebar_pages']  as $element_ids) {
						$selected_elements_ids .= $element_ids ."-";
				}

				$rttheme_ud_sidebars  = get_settings('rttheme_ud_sidebars');

				//sidebar names
				$sidebar_name = str_replace("\"", "" , $_REQUEST['rttheme_sidebar_name']);
				$sidebar_name = str_replace("'", "" , $sidebar_name);
				$sidebar_name = str_replace("-", "" , $sidebar_name);
				$sidebar_name = str_replace("&", "" , $sidebar_name);
				$sidebar_name = str_replace("/", "" , $sidebar_name);
				$sidebar_name = str_replace("$", "" , $sidebar_name);
				$sidebar_name = str_replace("_", "" , $sidebar_name);
				
				$rttheme_ud_sidebars .=$selected_elements_ids.',page,'.stripslashes($sidebar_name) ;
				$rttheme_ud_sidebars .=";";
				
				update_option( "rttheme_ud_sidebars", $rttheme_ud_sidebars);
				}

				//UD sidebar posts
				if($_REQUEST['rttheme_sidebar_posts']!=""){

				$selected_elements_ids="";
				foreach($_REQUEST['rttheme_sidebar_posts']  as $element_ids) {
						$selected_elements_ids .= $element_ids ."-";
				}

				$rttheme_ud_sidebars  = get_settings('rttheme_ud_sidebars');

				//sidebar names
				$sidebar_name = str_replace("\"", "" , $_REQUEST['rttheme_sidebar_name']);
				$sidebar_name = str_replace("'", "" , $sidebar_name);
				$sidebar_name = str_replace("-", "" , $sidebar_name);
				$sidebar_name = str_replace("&", "" , $sidebar_name);
				$sidebar_name = str_replace("/", "" , $sidebar_name);
				$sidebar_name = str_replace("$", "" , $sidebar_name);
				$sidebar_name = str_replace("_", "" , $sidebar_name);
				
				$rttheme_ud_sidebars .=$selected_elements_ids.',post,'.stripslashes($sidebar_name) ;
				
				$rttheme_ud_sidebars .=";";
				
				update_option( "rttheme_ud_sidebars", $rttheme_ud_sidebars);
				}
				

				//UD sidebar cats
				if($_REQUEST['rttheme_sidebar_cats']!=""){

				$selected_elements_ids="";
				foreach($_REQUEST['rttheme_sidebar_cats']  as $element_ids) {
						$selected_elements_ids .= $element_ids ."-";
				}

				$rttheme_ud_sidebars  = get_settings('rttheme_ud_sidebars');

				//sidebar names
				$sidebar_name = str_replace("\"", "" , $_REQUEST['rttheme_sidebar_name']);
				$sidebar_name = str_replace("'", "" , $sidebar_name);
				$sidebar_name = str_replace("-", "" , $sidebar_name);
				$sidebar_name = str_replace("&", "" , $sidebar_name);
				$sidebar_name = str_replace("/", "" , $sidebar_name);
				$sidebar_name = str_replace("$", "" , $sidebar_name);
				$sidebar_name = str_replace("_", "" , $sidebar_name);
				
				$rttheme_ud_sidebars .=$selected_elements_ids.',cat,'.stripslashes($sidebar_name) ;

				$rttheme_ud_sidebars .=";";

				
				update_option( "rttheme_ud_sidebars", $rttheme_ud_sidebars);
				}

				header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;
}

		if($_REQUEST['sidebar']=="delete"){


				$rttheme_ud_sidebars  = get_settings('rttheme_ud_sidebars');
				
				$new_rttheme_ud_sidebars = str_replace($_REQUEST['sidebar_id'].";", "" , $rttheme_ud_sidebars);
				
		
				
				update_option( "rttheme_ud_sidebars", $new_rttheme_ud_sidebars);
			
				
				header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;				
		}
				

		if($_REQUEST['sidebar']=="deleteall"){

				update_option( "rttheme_ud_sidebars", "");
				header("Location:?page=".$_REQUEST['page'] ."&saved=true");

		die;				
		}
		
				
?>