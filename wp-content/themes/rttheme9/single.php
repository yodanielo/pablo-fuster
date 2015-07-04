<?php 

//product fileds
$is_product=get_post_meta($post->ID, 'rt_product_image_url', true);
$is_product.=get_post_meta($post->ID, 'rt_short_description', true);
$is_product.=get_post_meta($post->ID, 'rt_long_description', true);
$is_product.=get_post_meta($post->ID, 'rt_product_price', true);
$is_product.=get_post_meta($post->ID, 'rt_other_images', true);
$is_product.=get_post_meta($post->ID, 'rt_technical_details', true);

if (trim($is_product)){
	include(TEMPLATEPATH."/product_detail.php");
}else{

get_header();
$this_is_blog=true;
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

		<?php if (have_posts()) : while (have_posts()) : the_post();
		$current_post=$post->ID;
		?>


				<!-- blog box-->
					<div class="box blog">
						<!-- blog headline-->
							<h3><a href="<?php echo get_permalink() ?>" title=""><?php the_title(); ?></a></h3> 
						<!-- / blog headline-->
						
							<?php if(get_post_meta($post->ID, 'rt_post_image', true)):?>
							<!-- blog image-->
								<?php if(!get_option('rttheme_blog_resize')):?>
									<a href="<?php echo get_post_meta($post->ID, 'rt_post_image', true);?>" title="" rel="prettyPhoto[rt_theme_blog]" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'rt_post_image', true)?>&amp;w=615&amp;h=120&amp;zc=1" alt=""  class="aligncenter post_image preload" /></a>
								<?php else:?>
									<img src="<?php echo get_post_meta($post->ID, 'rt_post_image', true);?>" alt="" class="aligncenter post_image preload" />
								<?php endif;?>
							<!-- / blog image -->
							<?php endif;?>
						
						<!-- blog text-->									
						<p>
							<?php the_content(""); ?>
						</p>
						<!-- /blog text-->

						<!-- date and cathegory bar -->
						<div class="dateandcategories">
							On <?php the_time('F jS, Y') ?>, <b>posted in:</b> <?php the_category(', ') ?> by <?php the_author_posts_link(); ?> <?php echo the_tags( '<p class="meta">Tags: ', ', ', '</p>');?>
							<?php $comment_count = get_comment_count($post->ID); ?>
							<?php if ($comment_count['approved'] > 0) : ?><div class="comment"><?php comments_popup_link('', '1 Comment', '% Comment'); ?></div><?php endif; ?>
							
						</div>
						<!-- / date and cathegory bar -->
					</div>
				<!-- blog box-->
			     
			     
		     <?php endwhile; ?>
		     <?php else: ?>
			     <p>Sorry, no posts matched your criteria.</p>
		     <?php endif; ?>

	<div class='entry commententry'>
		<?php comments_template(); ?>
	</div>
     <div class="emptyspace"></div>
</div>
<!-- / left side content -->

<!-- side bar -->
<div class="sidebar"><div class="sidebars1"><div class="sidebars2">
		
		<?php include(TEMPLATEPATH."/sidebar.php");?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar For Blog')){} ?>  
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Common Sidebar')){} ?>  
		<?php
		       rt_ud_sidebars('post',$current_post);
		?>

</div></div></div>
<div class="clear"></div>
<!-- / side bar -->
  
<?php get_footer();
}
?>