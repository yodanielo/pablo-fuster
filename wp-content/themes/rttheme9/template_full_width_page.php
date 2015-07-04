<?php 
/*
Template Name: Full Width Page
*/
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

<!-- content -->
<div class="content sub fullwidth">
        <h2><?php the_title(); ?></h2>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	
	<?php endwhile; else: ?>
		<p>Sorry, no page found</p>
	<?php endif; ?>

</div>
<!-- / content -->
<div class="clear"></div>
<?php get_footer();?> 