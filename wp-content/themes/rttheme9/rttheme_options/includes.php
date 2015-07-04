<?php
$shortname="rttheme";
$categories = get_categories(array('hide_empty'=>false));
$rt_getcat = array();

foreach ($categories as $category_list ) {
       $rt_getcat[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages();
$rt_getpages = array();
foreach ($pages as $page_list ) {
       $rt_getpages[$page_list ->ID] = $page_list ->post_title;
}

$pages_top_level = get_pages('sort_column=menu_order&depth=0');
$rt_gettoplevelpages = array();
foreach ($pages_top_level as $page_list ) {
       if ($page_list->post_parent == "0") {
       $rt_gettoplevelpages[$page_list ->ID] = $page_list ->post_title;
       }
}

$posts=query_posts('posts_per_page=-1');
$rt_getposts = array();
foreach ($posts as $page_list ) {
       $rt_getposts[$page_list ->ID] = $page_list ->post_title;
}
wp_reset_query();


add_action('admin_print_scripts','rttheme_admin_scripts');
add_action('admin_print_styles', 'admin_head_addition');
add_action('admin_menu', 'rt_theme_option_menu');

require_once(TEMPLATEPATH . '/rttheme_options/rt_theme_functions.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/custom_form.php');
require_once(TEMPLATEPATH . '/rttheme_options/custom_form_2.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel2.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel3.php');
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel4.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel5.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel6.php');
require_once(TEMPLATEPATH . '/rttheme_options/controlpanel7.php'); 


//installing RT-THEME WIDGETS
require_once(TEMPLATEPATH . '/rttheme_options/rt-theme6-box-widgets/rt-theme-box-widget.php'); 
require_once(TEMPLATEPATH . '/rttheme_options/rt-theme6-box-widgets/rt-theme-slider-widget.php');
require_once(TEMPLATEPATH . '/rttheme_options/rt-theme6-box-widgets/rt-theme-news-widget.php');
?>