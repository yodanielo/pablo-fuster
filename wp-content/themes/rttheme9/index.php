<?php 
get_header(); 
//home page layout
if (get_option('rttheme_homepage_style')){
	$which_home=get_option('rttheme_homepage_style');
}else{
	$which_home="1";		
}
?>
        <!-- slider area -->	
        <div id="slider_con">
                <div id="slider_area">

			<?php 	if (function_exists('dynamic_sidebar') && dynamic_sidebar('Slider Widget')){}?>   

                </div>
                
                <!-- slider on/off icons -->
                <div id="numbers"></div>
                <div class="slider_curv png"></div>
        </div>
        <!-- / slider -->
	
	
        <div class="content_con2<?php if(dwhich_home==2):?> three_column<?php endif;?>">
            <!-- left side content -->
            <?php if($which_home==1):?><div class="content"><?php endif;?>
                
		<?php 
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Page Widget')){}
		?>
  
            <?php if($which_home==1):?></div><?php endif;?>
            <!-- / left side content -->
            
	    <?php if($which_home==1):?>
            <!-- side bar -->
            <div class="sidebar"><div class="sidebars1"><div class="sidebars2">
	   
	   
		<?php 
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar For Home Page')){}
		?>
		
		<div class="clear"></div>
            </div></div></div>
            <!-- / side bar -->
	    <?php endif;?>
	    
            <div class="clear"></div>
        </div>	

<?php get_footer(); ?>
