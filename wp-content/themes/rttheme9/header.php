<?php
global $portfolio_temp,$blog_temp,$product_temp;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<?php if(get_option('rttheme_slider_time_out')){?>
<meta name="rttheme_slider_time_out" content="<?php echo get_option('rttheme_slider_time_out')*1000;?>" />
<?php }else{?>
<meta name="rttheme_slider_time_out" content="5110" />
<?php }?>
<?php if(get_option('rttheme_slider_numbers')){?>
<meta name="rttheme_slider_numbers" content="<?php echo get_option('rttheme_slider_numbers');?>" />
<?php }else{?>
<meta name="rttheme_slider_numbers" content="" />
<?php }?>
<meta name="rttheme_template_dir" content="<?php bloginfo('template_directory'); ?>" />
<?php if(get_option('rttheme_disable_cufon')){?>
<meta name="rttheme_disable_cufon" content="<?php echo get_option('rttheme_disable_cufon');?>" />
<?php }?>

<title><?php if (is_home()) { bloginfo('name'); ?><?php } elseif (is_category() || is_page() ||is_single()) { ?> <?php } ?><?php wp_title(''); ?></title>


<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php 
if (get_option('rttheme_style')){
	$which_theme=get_option('rttheme_style');
}else{
	$which_theme="1";		
}
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/<?php echo $which_theme;?>/style_cf.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" media="screen" />

<?php 
wp_enqueue_script('jquery', '1.3.2');
?> 
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-ui-1.5.2.packed.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.1.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon.js"></script>   
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/anivers_400.font.js"></script>   
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6.css" />
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/dd_belated_png.js'></script>
<script>DD_belatedPNG.fix('.png,#numbers a,.first_ul');</script>
<![endif]-->

</head>
<body>

 
<div id="container">
<!-- header -->
<div id="header">
    <!-- logo -->
            <div id="logo">
		<a href="<?php bloginfo('url'); ?>" title="<?php echo bloginfo('name');?>"><img src="<?php if(get_option('rttheme_logo_url')): echo get_option('rttheme_logo_url'); else:?><?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/logo.jpg<?php endif;?>" alt="<?php echo bloginfo('name');?>" class="png" /></a>		
	    </div>
    <!-- /logo -->

    <!-- header right -->
            <div id="header_right">
		<!-- navigation -->
			<div id="navigation">
				
                                    
					
					<?php					
					if (!function_exists('wp_nav_menu') || get_option("rttheme_wp_menu")):?>
					

					<div id="dropdown_menu" class="navigation">
					<ul class="navigation">
						<li  <?php if (is_home()):?>class="current_page_item" <?php endif;?>><a href="<?php echo get_settings('home'); ?>" title="Home">HOME</a></li> 
			
						<?php
						 
						/*
							NAVIGATION
						*/
							function arayin_degerleri($bak){
								if($bak){
								$hangisi=get_pages('child_of='.$bak);
									foreach($hangisi as $bunlar) {
										$bulunan_alt_sayfalar .= ',' . $bunlar->ID;
								   }
								}
								return ($bulunan_alt_sayfalar); 
							}
			
							// drop down menus
							if (get_option('rttheme_drop_down_menu')){
								$depth=3;
								$sub_depth=2;
							}else{
								$depth=1; 
								$sub_depth=0;
							}					
			
							// blog page
							if(get_option('rttheme_blog_drop_down_menu')){
								$blog_page=get_option('rttheme_blog_page');
							}
			
							// portfolio page
							if(get_option('rttheme_portfolio_drop_down_menu')){
								$portfolio_page=get_option('rttheme_portf_page');
							}
			
							// products page
							if(get_option('rttheme_product_list_drop_down_menu')){
								$product_page=get_option('rttheme_product_list');
							}
			
							//once secilmisleri listeleyelim sirasiyla
							
							$secilen_sayfalar = split(',', get_option('rttheme_pages[]') );
							$toplam_secilen_sayfa = count($secilen_sayfalar);
							for ($i = 0; $i < $toplam_secilen_sayfa -1; $i++) {
								$sayfa =get_pages('include='.$secilen_sayfalar[$i].'');
								$sayfa_link=get_permalink( $sayfa[0]->ID ); 
			
								if ($sayfa[0]->ID == $blog_page || $sayfa[0]->ID == $product_page || $sayfa[0]->ID == $portfolio_page){
								?>
			
								<li  <?php if ($post->ID ==$sayfa[0]->ID):?>class="current_page_item" <?php endif;?> <?php if ($sayfa[0]->ID == $portfolio_page  && $portfolio_temp=="true" && $cat):?>class="current_page_item" <?php endif;?> <?php if ($sayfa[0]->ID == $product_page  && $product_temp=="true" && $cat):?>class="current_page_item" <?php endif;?> <?php if ($sayfa[0]->ID == $blog_page  && $blog_temp=="true" && $cat):?>class="current_page_item" <?php endif;?>><a href="<?php echo $sayfa_link; ?>" title="<?php echo $sayfa[0]->post_title; ?>"><?php echo $sayfa[0]->post_title; ?></a>
									<ul>
										<?php								
											if ($sayfa[0]->ID ==	$blog_page){
												wp_list_categories('include='.get_option('rttheme_blog_ex_cat[]').'&title_li=&orderby=slug&depth='.$sub_depth.''); 
											}
											elseif($sayfa[0]->ID ==	$portfolio_page){
												wp_list_categories('include='.get_option('rttheme_portf_ex_cat[]').'&title_li=&orderby=slug&depth='.$sub_depth.''); 
											}
											elseif($sayfa[0]->ID ==	$product_page){
												wp_list_categories('include='.get_option('rttheme_product_list_ex_cat[]').'&title_li=&orderby=slug&depth='.$sub_depth.''); 
											}
										?>			
									
									</ul>
								</li>
								<?php
								}else{
										wp_list_pages('include='.$sayfa[0]->ID.','.arayin_degerleri($sayfa[0]->ID).'&title_li=&sort_column=menu_order&depth='.$depth.'' ); 
								}
							}
						?>
					 </ul>
					</div>

					<?php else://if wp version supports wp menus - since WP 3.0 ?>
						<?php
							$menuVars = array(
								'menu'            => 'RT Theme Main Navigation Menu',  
								'menu_class'      => 'navigation', 
								'menu_id'         => '',
								'container'       => 'div', 
								'container_class' => 'navigation', 
								'container_id'    => 'dropdown_menu', 
								'echo'            => false, 
								'theme_location'  => 'rt-theme-main-menu'
							);
							
							echo wp_nav_menu($menuVars);
						?>
						
					<?php endif;?>	
                                   
				
			</div>
		<!-- / navigation  -->
            </div>
    <!-- /header right -->
</div>
<!-- /header -->


<div id="container1">
<div id="container2">
<div id="container3">    
    <div class="page_curv_top png"></div>
    <div class="content_con png">

