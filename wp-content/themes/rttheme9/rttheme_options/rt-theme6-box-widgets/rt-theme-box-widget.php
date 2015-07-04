<?php
/*
Plugin Name: RT-THEME BOX WIDGET
Plugin URI: http://themeforest.net/user/stmcan?ref=stmcan
Description: This widget developed for RT- Wordpress Themes. Adds a box.
Version: 1.0
Author: Tolga can
Author URI: http://themeforest.net/user/stmcan?ref=stmcan
*/

/* RT_THEME_BOX_WIDGET Class */
class RT_THEME_BOX_WIDGET extends WP_Widget {
    function RT_THEME_BOX_WIDGET() {
        $widget_ops = array( 'classname' => 'rt-theme-box-widget', 'description' => 'Adds a box to home page or sidebars.' );
        parent::WP_Widget( 'css-rt-theme-box-widget', 'RT-THEME BOX WIDGET', $widget_ops );
    }


    function widget($args, $instance) {
	global $more,$post,$which_home;
        extract( $args );
	$linkto = apply_filters('title', $instance['linkto']);
	$rt_post_id = apply_filters('rt_post_id', $instance['rt_post_id']);
	$rt_page_id = apply_filters('rt_page_id', $instance['rt_page_id']);
	$image=apply_filters('image', $instance['image']); 
        
	if (apply_filters('link_text', $instance['link_text'])!=''){
	    $link_text =apply_filters('link_text', $instance['link_text']);
	}else{
	    $link_text ="read more";    
	}
	
	$full_size= apply_filters('full_size', $instance['full_size']);
	
	if ($id=="Home Page Widget"){$home_page=1;}

        ?>
			    
	<?php
	if ($linkto == 'page'){//page
	    
	    $query_string = "page_id=$rt_page_id";
	    query_posts($query_string);
	    if (have_posts()) : 
		while (have_posts()) : the_post(); 
			$title=get_the_title();
			$link=get_permalink();
			$more = 0;
			$text =get_the_content('');
			$text = apply_filters('the_content', $text);
		endwhile; wp_reset_query();
	    endif;
    
	}elseif($linkto == 'post'){//post
	    
	    $query_string = "p=$rt_post_id";
	    query_posts($query_string);
	    if (have_posts()) : 
		while (have_posts()) : the_post(); 
			$title=get_the_title();
			$link=get_permalink();
			$more = 0;
			$text =get_the_excerpt();				
		endwhile; wp_reset_query();
	    endif;
		
	}else{//manual
	    
	    $title = apply_filters('title', $instance['title']); 
	    $link = apply_filters('link', $instance['link']);
	    $text = apply_filters('text',$instance['text']);	    
	}
	
	?>    

				<?php 
				    $sub_page_class="small";
				    $box_image_width="220";		
				?>
		
		

				<!-- box -->
					<div class="box <?php if($home_page && $full_size && $which_home==1):?>single<?php elseif($home_page && $full_size && $which_home==2):?>single fullbox<?php else:?><?php echo $sub_page_class;?><?php endif;?>">
					 
					    <?php if($title):?>
					    <!-- box title-->
					    <?php if($home_page && $full_size):?>
					    <h3><?php if($link): ?><a href="<?php echo $link;?>" title="" <?php echo $open_page;?>><?php endif;?><?php echo $title;?><?php if($link): ?></a><?php endif;?></h3>
					    <?php else:?>
					    <h4><?php if($link): ?><a href="<?php echo $link;?>" title="" <?php echo $open_page;?>><?php endif;?><?php echo $title;?><?php if($link): ?></a><?php endif;?></h4>						
					    <?php endif;?>
					    <?php endif;?>
					    
					    <?php if($text!="" || $link!="" || $title!="" || $link_text!=""): ?>					    
						    <?php if($image):?> 
						    <div class="imgarea"><?php if($link): ?><a href="<?php echo $link;?>" title="" <?php echo $open_page;?>><?php endif;?><img src="<?php echo $image;?>" alt="" class="<?php if($home_page && $full_size):?>alignleft <?php endif;?>featured_image preload png" /><?php if($link): ?></a><?php endif;?></div>
						    <?php endif;?>
					    <?php if($text): ?>    
						<?php if($linkto!="page"):?><p><?php endif;?><?php echo $text;?><?php if($linkto!="page"):?></p><?php endif;?><?php endif;?>	
						<?php if($link && $link_text): ?>		
						<a href="<?php echo $link;?>" class="read_more" title="" <?php echo $open_page;?>><?php echo $link_text;?></a>
						<?php endif;?>
					    <?php endif;?>
					</div>
					<?php if(!$home_page):?> <div class="clear"></div><?php endif;?>

				<!-- /box -->
	
	
	<?php
	}

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    function form($instance) {
	global $post;
	
		$full_size= esc_attr($instance['full_size']);
		
		/* link to */
		$linkto = esc_attr($instance['linkto']);
		
		/* slide title */
		$title = esc_attr($instance['title']);
		
		/* slide text */
		$text = esc_attr($instance['text']);
		
		/* manual link */
		$link = esc_attr($instance['link']);
		$link_text = esc_attr($instance['link_text']);		
		$target_page= esc_attr($instance['target_page']);
		
		/* slide backgroun image */
		$image=esc_attr($instance['image']); 
		
		
		/* pages */
		$pages = get_pages();
		$rt_getpages = array();
		foreach ($pages as $page_list ) {
		   $rt_getpages[$page_list ->ID] = $page_list ->post_title;
		}
		$rt_page_id = esc_attr($instance['rt_page_id']);
		
		/* posts */
		$rt_post_id = esc_attr($instance['rt_post_id']);
		$rt_getposts = get_posts('numberposts=-1');		

        ?>
	<div class="rt-theme-widget <?php echo $this->get_field_id('linkto'); ?>">
	Select an option to link your slide:
	<select name="<?php echo $this->get_field_name('linkto'); ?>" class="linkto" id="<?php echo $this->get_field_id('linkto'); ?>" >
	    <option value="page" <?php if ( $linkto  == "page") { echo ' selected="selected" '; }?> >   Page   </option>
	    <option value="post" <?php if ( $linkto  == "post") { echo ' selected="selected" '; }?> >   Post   </option>
	    <option value="manual" <?php if ( $linkto  == "manual") { echo ' selected="selected" '; }?> >   Manual   </option>    
	</select>
	
	<div class="page_related <?php if ( $linkto  == "page" || $linkto  == "" ) { echo 'show_true'; }?>">
	<br />Choose a page for link<br />
	<p>	
		<select name="<?php echo $this->get_field_name('rt_page_id'); ?>">  id="<?php echo $this->get_field_id('rt_page_id'); ?>" >
			<?php foreach ($rt_getpages as $op_val=>$option) { ?>
		<option value="<?php echo $op_val;?>" <?php if ( $rt_page_id  == $op_val) { echo ' selected="selected" '; }?>><?php _e($option); ?></option>
		<?php } ?>
		</select>
		
		</label>
	</p>
	</div>

	<div class="post_related <?php if ( $linkto  == "post") { echo 'show_true'; }?>">
	<br />Please choose a post for content!<br />
	<p>
		<label <?php echo $this->get_field_name('rt_post_id'); ?>>
		<select  name="<?php echo $this->get_field_name('rt_post_id'); ?>"  id="<?php echo $this->get_field_id('rt_post_id'); ?>" style="width:225px;" >
		    <?php foreach ($rt_getposts as $post) { ?>
			<option value="<?php echo $post->ID;?>" <?php if ( $rt_post_id  ==  $post->ID) { echo ' selected="selected" '; }?>><?php echo  the_title(); ?></option>
		    <?php } ?>
		</select>
		</label>
	</p>
	</div>


	
	<div class="manual_related <?php if ( $linkto  == "manual") { echo 'show_true'; }?>">
	<br />
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link (URL):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:'); ?> <br />
		<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		</label></p> 		
	</div>

	<div class="manual_rest show_true">
	   <label for="<?php echo $this->get_field_id('image'); ?>"> <?php _e('Image:'); ?></label><br /><input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $image; ?>"  style="width:158px;" /><input  class="rttheme_upload_button <?php echo $this->get_field_id('image'); ?> button"  type="button" value="Upload" /></p>
	</div>
	    
	<div class="manual_rest show_true">
	       <br />
	       <p><label for="<?php echo $this->get_field_id('link_text'); ?>"><?php _e('Link text (default: \'read more\'):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" type="text" value="<?php echo $link_text; ?>" /></label></p>
		<hr />
		<small>You can use this box in single line if you are using for home page!</small>
		<p> <label for="<?php echo $this->get_field_id('full_size'); ?>"><?php _e('Full Width Box:'); ?></label> <input  id="<?php echo $this->get_field_id('full_size'); ?>"   <?php if($full_size=='on') echo "checked";?> name="<?php echo $this->get_field_name('full_size'); ?>" type="checkbox"></p>
		<hr />
	</div>
	</div>

<?php // end class
}
}
?>
<?php // register RT_THEME_BOX_WIDGET widget
add_action('widgets_init', create_function('', 'return register_widget("RT_THEME_BOX_WIDGET");'));
?>