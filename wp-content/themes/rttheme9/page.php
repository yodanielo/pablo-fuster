<?php
if($post->ID  == get_option('rttheme_blog_page'))
{
	$this_is_blog=true;
	include(TEMPLATEPATH."/template_blog.php");
}
elseif($post->ID == get_option('rttheme_portf_page'))
{
	include(TEMPLATEPATH."/template_portfolio.php");
}
elseif($post->ID == get_option('rttheme_product_list'))
{
	include(TEMPLATEPATH."/template_product_list.php");
}	
elseif($post->ID  == get_option('rttheme_contact_page'))
{
	$this_is_page=true;
	include(TEMPLATEPATH."/template_contact_us.php");
}else{

get_header();
$this_is_page=true;
?>


<div class="sub_header">
    <!-- Page navigation-->
	<div class="breadcrumb">
		<!-- [rt-breadcrumb] -->
			Usted está en: <a href="<?php bloginfo('url'); ?>" title="<?php echo bloginfo('name');?>">Inicio</a> \
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
<div class="content sub">
 
	<h2><?php the_title(); ?></h2>
	<?php if (have_posts()) : while (have_posts()) : the_post();
		
		//id for dynamic sidebars		
		$sidebar_id = $post->ID;
		
		if(!get_option('rttheme_same_lavel')){
			$current_post=$post->ID;
		}else{
			$current_post=$post->post_parent;
		}
		
	?>
	<?php the_content(); ?>
	
	<?php endwhile; else: ?>
		<p>Sorry, no page found</p>
	<?php endif; ?>

</div>
<!-- / left side content -->

<!-- side bar -->
<div class="sidebar"><div class="sidebars1"><div class="sidebars2">
		<?php
		/*
		* displaying sup pages
		*/
		$children = wp_list_pages("title_li=&child_of=".$current_post."&echo=0&depth=1");
		if ($children) { 
		?>

		<!-- sub link-->
		<div class="box small">
			<ul id="sub_menu">
			<?php echo $children; ?>
			</ul>
		</div>
		<!-- /sub link-->

		<?php } ?>
		
		<?php 
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar For Pages'));
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Common Sidebar'));
			include(TEMPLATEPATH."/sidebar.php");
			rt_ud_sidebars('page',$sidebar_id);
		?>

</div></div></div>
<div class="clear"></div>
<!-- / side bar -->
 </div>
<?php get_footer();
}
?>