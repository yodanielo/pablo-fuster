<?php
include(TEMPLATEPATH.'/rttheme_options/includes.php');
include(TEMPLATEPATH.'/widgets_functions.php');
/*
WP 3.0  menu support
*/

if (function_exists('wp_nav_menu')){
	add_action( 'init', 'rt_theme_navigations' );
	
	function rt_theme_navigations() {
		register_nav_menu( 'rt-theme-main-navigation', __( 'RT Theme Main Navigation' ) ); 
		register_nav_menu( 'rt-theme-footer-navigation', __( 'RT Theme Footer Navigation' ) );
	}
	
	wp_create_nav_menu( 'RT Theme Main Navigation Menu', array( 'slug' => 'rt-theme-main-menu' ) ); 
	wp_create_nav_menu( 'RT Theme Footer Navigation Menu', array( 'slug' => 'rt-theme-footer-menu') );
}
 
 

/* RT-Theme Custom Paging for portfolio and products */
function rt_custom_post_limits( $limits )
{
	if(is_category()){
		
		$cat=get_query_var('cat');
		
		$porfolio_gallery_categories=split(',',get_option('rttheme_portf_ex_cat[]'));
		foreach ($porfolio_gallery_categories as $p_cat){
			if ($p_cat==$cat){
				$post_per_page=get_option('rttheme_portf_pager');
			}
		}
		
		$product_gallery_categories=split(',',get_option('rttheme_product_list_ex_cat[]'));
		foreach ($product_gallery_categories as $p_cat){
			if ($p_cat==$cat){
				$post_per_page=get_option('rttheme_product_list_pager');
			}
		}
	
		$blogtem_categories=split(',',get_option('rttheme_blog_ex_cat[]'));
		foreach ($blogtem_categories as $p_cat){
			if ($p_cat==$cat){
				$post_per_page=get_option('rttheme_blog_pager');
			}
		}
		
		if($post_per_page>0){	
			$page=get_query_var('paged');
			
			if($page==0 || $page<0)  $page = 1; 
			$start=0;
			$end=0;
	 
			if($page=="" || $page<0){
				$start=0;
				$end=$post_per_page;
			}
			
			elseif($page && $page>1){
				$start=$post_per_page*$page-1;
				$end=$start;
			}else{
				$start=0;
				$end=1;
			}
			
			//  offset
			$offset = ($page - 1) * $post_per_page;
			//new limits
			$limits = " LIMIT $offset, $post_per_page"; 			
		}
	}
	
	return $limits; 
}

add_filter('post_limits', 'rt_custom_post_limits' );
 

/*
RT-Theme Dynamic Sidebar Function 
*/
function rt_sidebar($sidebar_id,$sidebar_name,$place){
	
	if (!$sidebar_id=='Home_Page_Widget'){
	register_sidebar(array(
		'id'=> $sidebar_name,
		'name' => $sidebar_name,
		'before_widget' => '<div class="box small">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));
	}else{
	register_sidebar(array(
		'id'=> $sidebar_name,
		'name' => $sidebar_name,
		'before_widget' => '<div class="box small">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));		
	}
	
}

//pre defined sidebars
$rt_sidebars=array(
	"Slider_Widget" => "Slider Widget",
	"Portfolio_Slider_Widget" => "Portfolio Slider Widget",	
	"Home_Page_Widget" => "Home Page Widget" ,
	"Sidebar_Home_Page" => "Sidebar For Home Page" ,	
	"Sidebar_For_Pages" => "Sidebar For Pages" ,	
	"Sidebar_For_Blog" => "Sidebar For Blog", 
	"Sidebar_For_Contact_Us" => "Sidebar For Contact Us",
	"Sidebar_For_Products" => "Sidebar For Products",
	"Sidebar_For_Product_Detail_Page" => "Sidebar For Product Detail Page",	
	"Common_Sidebar" => "Common Sidebar",
);

foreach ($rt_sidebars as $k => $v) {
	rt_sidebar($rt_sidebars[$k],$v,$place);
} 



//user defined sidebars
if(get_option('rttheme_ud_sidebars')){
 
 
	$rt_ud_sidebars= split(';',substr(get_option('rttheme_ud_sidebars'), 0, -1));
	
	foreach ($rt_ud_sidebars as $k) {
		$parameters = split(',',$k);
		rt_sidebar($parameters[0],$parameters[2],'ud');		
	} 

}


function rt_ud_sidebars($type,$id){
	global $rt_ud_sidebars;
	if ($rt_ud_sidebars){
		foreach ($rt_ud_sidebars as $k) {
			$parameters = split(',',$k);
			$item_ids = split('-',$parameters[0]);
			
			foreach ($item_ids as $v){
				if (intval($v)==intval($id) && $parameters[1]==$type){
					if (function_exists('dynamic_sidebar') && dynamic_sidebar($parameters[2]));
				}
			}
		}
	}
	
}


/* Breadcrumb */
function rt_breadcrumb($gecerli_sayfa){
	
	if ( is_page() ){
				$ust_id=$gecerli_sayfa->post_parent;
				$yeni_sorgu = get_post($ust_id);			 
			   if($yeni_sorgu->post_parent) {
				 rt_breadcrumb($yeni_sorgu);
				 echo " \ ";
				}
				echo  "<a href=\"".get_permalink($yeni_sorgu->ID)."\" title=\"\" >". get_the_title($yeni_sorgu->ID) ."</a>";
	}
	elseif ( is_single() || is_category() && !is_archive()){
				$ust_id=$gecerli_sayfa->post_parent;
				$yeni_sorgu = get_post($ust_id);			 	
				$kategori= get_the_category($yeni_sorgu->ID);
				$ID = $kategori[0]->cat_ID;
				
				$ayrac=" &#92; ";

				echo get_category_parents($ID, TRUE, $ayrac , FALSE );

				   if($yeni_sorgu->post_parent) {
					 rt_breadcrumb($yeni_sorgu);
						if (! is_category() )  echo " \ ";
					}
				
				if ( is_single() ){
					echo  "<a href=\"".get_permalink($yeni_sorgu->ID)."\" title=\"\" >". get_the_title($yeni_sorgu->ID) ."</a>";
				}
	}else{
			 echo  wp_title('');
	}
}

/* Pagination */
function get_pagination($range = 7){
  global $paged, $wp_query;
  if ( !$max_page ) {
    $max_page = $wp_query->max_num_pages;
  }
  if($max_page > 1){
    if(!$paged){
      $paged = 1;
    }
	
	if ($paged > 1){
		echo "<li class=\"arrow\">";
			previous_posts_link('&laquo;');
		echo "</li>\n";
	}
    if($max_page > $range){
      if($paged < $range){
        for($i = 1; $i <= ($range + 1); $i++){
		  echo "<li";
		  if($i==$paged) echo " class='active'";
		  echo "><a href='" . get_pagenum_link($i) ."'>$i</a>";
          echo "</li>\n";
        }
      }
      elseif($paged >= ($max_page - ceil(($range/2)))){
        for($i = $max_page - $range; $i <= $max_page; $i++){
		  echo "<li";
		  if($i==$paged) echo " class='active'";
		  echo "><a href='" . get_pagenum_link($i) ."'>$i</a>";
          echo "</li>\n";
        }
      }
      elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){

		  echo "<li";
		  if($i==$paged) echo " class='active'";
		  echo "><a href='" . get_pagenum_link($i) ."'>$i</a>";
          echo "</li>\n";

        }
      }
    }
    else{
      for($i = 1; $i <= $max_page; $i++){
		  echo "<li";
		  if($i==$paged) echo " class=\"active\" ";
		  echo "><a href='" . get_pagenum_link($i) ."'>$i</a>";
          echo "</li>\n";
      }
    }
	if ($paged != $max_page){
		echo "<li class=\"arrow\">";
		 next_posts_link('&raquo;');
		echo "</li>\n";
	}

  }
}
?>