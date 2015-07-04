<?php 
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
		<form action="#" method="get" id="search_form">
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
		
		if(!get_option('rttheme_same_lavel')){
			$current_post=$post->ID;
		}else{
			$current_post=$post->post_parent;
		}
		
	?>
	<?php the_content(); ?>

	<!-- contact form -->
		<div id="result"></div>
		<div id="contact_form">
			<form action="<?php bloginfo('template_directory'); ?>/contact_form.php" name="contact_form" id="validate_form" method="post">
					<ul>
						<li><label for="name">Your name: (*)</label><input id="name" type="text" name="name" value="" class="required" /> </li>
						<li><label for="email">Your Email: (*)</label><input id="email" type="text" name="email" value="" class="required"	 /> </li>
						<li><label for="phone">Phone Number: (*) </label><input id="phone" type="text" name="phone" value="" class="required" /> </li>
						<li><label for="company_name">Company Name: </label><input id="company_name" type="text" name="company_name" value="" /> </li>
						<li><label for="company_url">Company URL: </label><input id="company_url" type="text" name="company_url" value="" /> </li>
						<li><label for="message">Your message: (*)</label><textarea  id="message" name="message" rows="8" cols="40"	class="required"></textarea></li>
						<li>
							<input type="hidden" name="your_email" value="<?php echo get_option('rttheme_form_mail');?>">
							<input type="hidden" name="your_web_site_name" value="<?php echo get_bloginfo('name');?>">
							
							<input type="submit" class="button" value="Send"  /><span class="loading"></span></li>
					</ul>
			</form>
		</div>
	<!-- /contact form -->
	
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
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar For Contact Us'));
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Common Sidebar'));
			include(TEMPLATEPATH."/sidebar.php");
			rt_ud_sidebars('page',$current_post);
		?>

</div></div></div>
<div class="clear"></div>
<!-- / side bar -->

<?php get_footer();?>