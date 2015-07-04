<?php
/*
Template Name: Portfolio
*/
$portfolio_temp="true";

get_header();

?>
<?php 
if (get_option('rttheme_style')){
	$which_theme=get_option('rttheme_style');
}else{
	$which_theme="1";		
}
?>
<div class="sub_header">
    <!-- Page navigation-->
	<div class="breadcrumb">
		<!-- [rt-breadcrumb] -->
		Usted está en: <a href="<?php bloginfo('url'); ?>" title="<?php echo bloginfo('name');?>">Inicio</a> \
		<?php if($cat):?> <a href="<?php echo get_permalink(get_option('rttheme_portf_page'));?>" title="<?php echo bloginfo('name');?>"><?php echo get_the_title($id=get_option('rttheme_portf_page'));?></a> \<?php endif;?>
		<?php  rt_breadcrumb($post->ID); ?>
		<!--/ [rt-breadcrumb] -->	
	</div>
    <!-- /Page navigation-->

    <!-- search -->
	    <div class="search_bar">
		<form action="<?php bloginfo('url'); ?>" method="get" id="search_form">
		    <input type="text" class="search_text" name="s" id="s" value="BUSCAR" /><input type="image" src="<?php bloginfo('template_directory'); ?>/images/pixel.gif" class="searchsubmit" alt="" />
		</form>
	    </div>
    <!-- / search-->		    
</div>

<div class="content_con2">

		<?php if (!get_option('rttheme_portfolio_slider_hide')):?>
		<!-- Porfolio Slider -->
		<div id="porfolio_slider">
		<img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/portfolio_curv_top.png" alt=""  class="portfolio_curv_top png" />
		    <div class="portfolio_slides">
				
				<?php 	if (function_exists('dynamic_sidebar') && dynamic_sidebar('Portfolio Slider Widget')){}?>
			
		    </div>
		
		<!-- slider arrows -->
		<div class="portfolio_slider_arrows">
		    <div class="left png"></div><div class="right png"></div>
		</div>
		
		<img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/portfolio_curv_bottom.png" class="portfolio_curv_bottom png" alt="" />    
		</div>
		<!-- Potfolio Slider-->
		
		
	    <div class="clear"></div>
	    <?php endif;?>	
	    
	    <?php if (!get_option('rttheme_portfolio_category_bar_hide')):?>
	    <!-- Porfolio Categories Bar -->
	    <div>
		<div class="portfolio_categories">
		    <h5>Portfolio Categories</h5>
		    <ul>
			<?php
				$portfolio_categories = get_categories(array('hide_empty'=>false,'include' => get_option('rttheme_portf_ex_cat[]'), 'orderby'=>'slug' ));
				foreach ($portfolio_categories as $pcats ) {
					if ($cat == $pcats->term_id){
						$cat_active="active";
					}elseif (!$cat && get_option('rttheme_portf_start_cat')==$pcats->term_id){
						$cat_active="active";						
					}else{
						$cat_active="";
					}
				?>	
					<li><a href="<?php echo get_category_link($pcats->term_id);?>" title="" class="<?php echo $cat_active;?>"><?php echo strtoupper($pcats->name);?></a></li>
				<?php }
			?>
			
		    </ul>
		</div>
	    </div>
	    <!-- / Porfolio Categories Bar -->
	    <?php endif;?>	    


		<?php
		$more = 0;

		//paging
		if (get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;}		
		 
 
		if(is_category()){//category
			$query_string='cat='.get_query_var('cat').'&paged='.$paged.'&posts_per_page='.get_option("rttheme_portf_pager").'&post_status=publish&orderby=date&order=DESC';
		}elseif(get_option('rttheme_portf_start_cat')){//start page with start category
			$query_string='cat='.get_option('rttheme_portf_start_cat').'&paged='.$paged.'&posts_per_page='.get_option("rttheme_portf_pager").'&post_status=publish&orderby=date&order=DESC';
		}else{//start page with all categories
			
			$query_string='cat='.get_option('rttheme_portf_ex_cat[]').'&paged='.$paged.'&posts_per_page='.get_option("rttheme_portf_pager").'&post_status=publish&orderby=date&order=DESC';
		}
		query_posts($query_string);
		?>

		<?php 
			$box_counter=0;
			if (have_posts()) : while (have_posts()) : the_post();?>
				



						<?php
						if (preg_match("/(png|jpg|gif)/", get_post_meta($post->ID, 'rt_portfolio_image', true))) {
							$button="magnifier";
						} else {
							$button="play";
						}
						?>
				    
						<!-- box -->
						<div class="box big_box">
						    <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/big_box_top.jpg" alt="" class="p_image_top" />
							
				    
							<!-- portfolio title-->
							<h5><a href="<?php echo get_permalink() ?>" title="" class="portfolio_title"><?php the_title(); ?></a></h5>
							
							
							
							<!-- portfolio image for images -->
							<div class="imgarea <?php if(get_post_meta($post->ID, 'rt_portfolio_image', true)):?><?php echo $button;?><?php endif;?>">

								<?php if(get_post_meta($post->ID, 'rt_portfolio_image', true)):?>
								<a href="<?php echo get_post_meta($post->ID, 'rt_portfolio_image', true);?>" title="<?php the_title(); ?>" rel="prettyPhoto[rt_theme_portfolio]" >								
								<?php if(get_post_meta($post->ID, 'rt_portfolio_thumb_image', true)):?>									
										<img src="<?php echo get_post_meta($post->ID, 'rt_portfolio_thumb_image', true);?>" alt="<?php the_title(); ?>" class="image portfolio preload" />
								<?php else:?>
										<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'rt_portfolio_image', true)?>&amp;w=259&amp;h=100&amp;zc=1" alt="<?php the_title(); ?>" class="image portfolio preload" />
								<?php endif;?>
								</a>
								<?php endif;?>

							</div>

							<p>
							<!-- text-->
							<?php echo get_post_meta($post->ID, 'rt_portfolio_desc', true);?><br />
							<a href="<?php echo get_permalink() ?>" class="read_more">leer más</a>
							</p>		
				    
						    <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/big_box_bottom.jpg" alt=""  class="p_image_bottom" />
						</div>
						<!-- /box -->
 
				
				

			<?php
				$box_counter++;
				if ($box_counter==3){echo "<div class=\"clear\"></div>";$box_counter=0;}
			?>

			<?php endwhile; ?>
			<!-- /portfolio boxes -->
		
				<div class="clear"></div>
				<!-- portfolio paging-->
				<div class="paging portfolio">
					<ul>
						<?php get_pagination(); ?>
					</ul>
				</div>
				<!-- /portfolio paging-->

			<?php else: ?>
				<p>No item found in this category.</p>
			<?php endif; ?>
	    
	    
	    
</div>
<!-- / content -->
<div class="clear"></div>
<?php get_footer();?>