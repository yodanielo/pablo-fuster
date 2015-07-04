<?php
/*
Template Name: Product List
*/
$product_temp="true";
get_header();
$this_is_product=true;
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
			<?php if($cat):?> <a href="<?php echo get_permalink(get_option('rttheme_product_list'));?>" title="<?php echo bloginfo('name');?>"><?php echo get_the_title($id=get_option('rttheme_product_list'));?></a> \<?php endif;?>
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

<!-- left side content -->
<div class="content productlist">

	    <!-- box -->
	    <div class="box single">
			<?php
			if (is_category()) {
				$page_title=single_cat_title("", false);
			}else{
				$page_title=single_post_title("", false);
			}
			?>



			<!-- box title-->
			<h3><?php echo $page_title; ?></h3>

			<?php
			if(!$cat){
			if (have_posts()) : while (have_posts()) : the_post();$current_post=$post->ID;

			?>
			<?php the_content(); ?>

			<?php endwhile; endif; }?>


	    </div>
	    <!-- /box -->

	    <?php if ($cat || !get_option("rttheme_products_first_page_hide")):?>

		<?php
		$more = 0;

		//paging
		if (get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;}


		if(is_category()){//category
			$query_string='cat='.get_query_var('cat').'&paged='.$paged.'&posts_per_page='.get_option("rttheme_product_list_pager").'&post_status=publish&orderby=date&order=DESC';
		}elseif(get_option('rttheme_portf_start_cat')){//start page with start category
			$query_string='cat='.get_option('rttheme_product_start_cat').'&paged='.$paged.'&posts_per_page='.get_option("rttheme_product_list_pager").'&post_status=publish&orderby=date&order=DESC';
		}else{//start page with all categories

			$query_string='cat='.get_option('rttheme_product_list_ex_cat[]').'&paged='.$paged.'&posts_per_page='.get_option("rttheme_product_list_pager").'&post_status=publish&orderby=date&order=DESC';
		}
		query_posts($query_string);
		?>


            <?php if (have_posts()) : while (have_posts()) : the_post();?>

				<!-- box -->
					<div class="box product">
					      <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/small_box_top.jpg" alt="" class="p_image_top" />
						<div class="imgarea product_image preload">

							    <!-- product image -->
	    
							    <?php if(get_post_meta($post->ID, 'rt_product_image_url', true)):?>
									     <a href="<?php echo get_permalink() ?>" title="<?php the_title(); ?>">
										    <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'rt_product_image_url', true)?>&amp;w=160&amp;h=142&amp;zc=1" alt="<?php the_title(); ?>" class="image product_image preload" />
									     </a>
							    <?php endif;?>

							    <!-- / product image -->

						</div>
						<div class="textarea">
							<!-- box title-->
							<h5><a href="<?php echo get_permalink() ?>" title=""><?php the_title(); ?></a></h5>
							    <!-- text-->
							    <?php echo get_post_meta($post->ID, 'rt_short_description', true);?>

							    <?php if(get_post_meta($post->ID, 'rt_product_price', true)):?>
							    <br />
							    <span class="price"><?php echo get_post_meta($post->ID, 'rt_product_price', true);?></span>
							    <?php endif;?>
						</div>
						<img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme;?>/small_box_bottom.jpg" alt=""  class="p_image_bottom" />
					</div>
				<!-- /box -->

			<?php
				$box_counter++;
				if ($box_counter==3){
					echo "<div class=\"clear\"></div>";
					$box_counter=0;
				}
			?>

			<?php endwhile; ?>
			<!-- /product boxes -->


			<div class="clear"></div>
			<!-- paging-->
			<div class="paging portfolio">
				<ul>
					<?php get_pagination(); ?>
				</ul>
			</div>
			<!-- / paging-->


			<?php else: ?>
				<p>no product found</p>
			<?php endif; ?>

		<?php endif;?>
 </div>
<!-- / left side content -->


<!-- side bar -->
<div class="sidebar"><div class="sidebars1"><div class="sidebars2">

		<?php
			include(TEMPLATEPATH."/sidebar.php");
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar For Products'));
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Common Sidebar'));

			if($cat){
				rt_ud_sidebars('cat',$cat);
			}else{
				rt_ud_sidebars('page',$current_post);
			}

		?>

</div></div></div>
<div class="clear"></div>
<!-- / side bar -->
</div>
<?php get_footer();?>