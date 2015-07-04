<?php
/*
Plugin Name: RT-THEME NEWS WIDGET
Plugin URI: http://themeforest.net/user/stmcan?ref=stmcan
Description: This widget developed for RT- Wordpress Themes. Adds latest blog posts.
Version: 1.0
Author: Tolga can
Author URI: http://themeforest.net/user/stmcan?ref=stmcan
*/

/* RT_THEME_NEWS_WIDGET Class */
class RT_THEME_NEWS_WIDGET extends WP_Widget {
    function RT_THEME_NEWS_WIDGET() {
        $widget_ops = array( 'classname' => 'rt-theme-news-widget', 'description' => 'Adds a latest blog posts.' );
        parent::WP_Widget( 'css-rt-theme-news-widget', 'RT-THEME NEWS WIDGET', $widget_ops );
    }


    function widget($args, $instance) {

        extract( $args );
	
	$title = apply_filters('title', $instance['title']);
	$rt_news_id= apply_filters('rt_news_id', $instance['rt_news_id']);
	$rt_news_number= apply_filters('rt_news_number', $instance['rt_news_number']);
	$full_size= apply_filters('full_size', $instance['full_size']);
	$hide_date= apply_filters('hide_date', $instance['hide_date']);

	if (apply_filters('link_text', $instance['link_text'])!=''){
	    $link_text =apply_filters('link_text', $instance['link_text']);
	}else{
	    $link_text ="read more";    
	}
	
	if ($id=="Home Page Widget"){$home_page=1;}
 

	$sub_page_class="small";
	$box_image_width="220";		

    
	if(!$rt_news_number){
	    $rt_news_number="10";		
	}	
	?>
 
 
	<!-- news box -->
 
		<div class="box <?php if($home_page && $full_size && $which_home==1):?>single<?php elseif($home_page && $full_size && $which_home==2):?>single fullbox<?php else:?><?php echo $sub_page_class;?><?php endif;?>">

			<!-- box title-->
			<?php if($home_page && $full_size):?>
			<h3><?php echo $title;?></h3>
			<?php else:?>
			<h4><?php echo $title;?></h4>						
			<?php endif;?>

			<div class="textarea"><br />
				<!-- box title-->
 
				<?php if($home_page):?>
				    <?php if($title): ?>
					    <!-- box title-->
					   <h3 class="news shadow"><?php echo $title;?></h3>
				    <?php endif;?>
				<?php endif;?>

		<?php
		$more = 0;
		$query_string = "showposts=".$rt_news_number."&cat=".$rt_news_id."&paged=$paged";
		query_posts($query_string);
		?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			$title=get_the_title();
			$link=get_permalink();
			$date=get_the_time('F jS, Y');
			$more = 0;			
		?>
			    <!-- text-->
			    <?php if(!$hide_date):?><span class="news_date"><?php echo $date;?></span><br /><?php endif;?>
			    <?php echo $title; ?> 
			    <a href="<?php echo $link;?>" class="read_more" title="" <?php echo $open_page;?>><?php echo $link_text;?></a>
			    <br />
			    <div class="news_line"></div>
		<?php endwhile; endif;wp_reset_query();?>
		
		</div>
		</div>
	<!-- /news box -->
		



 


		
	<?php
	}

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    function form($instance) {
	global $rt_getcat;
	$title = esc_attr($instance['title']);
	$rt_news_number= esc_attr($instance['rt_news_number']);
	$rt_news_id = esc_attr($instance['rt_news_id']);
	$full_size= esc_attr($instance['full_size']);
	$hide_date= esc_attr($instance['hide_date']);
	$link_text = esc_attr($instance['link_text']);	
    ?>
	<div class="rt-theme-widget">

 	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
 
	Choose a category<br />
	<p>	
		<select name="<?php echo $this->get_field_name('rt_news_id'); ?>">  id="<?php echo $this->get_field_id('rt_news_id'); ?>" >
			<?php foreach ($rt_getcat as $op_val=>$option) { ?>
		<option value="<?php echo $op_val;?>" <?php if ( $rt_news_id  == $op_val) { echo ' selected="selected" '; }?>><?php _e($option); ?></option>
		<?php } ?>
		</select>
		
		</label>
	</p>
 

	<p> <label for="<?php echo $this->get_field_id('hide_date'); ?>"><?php _e('Hide Dates:'); ?></label> <input  id="<?php echo $this->get_field_id('hide_date'); ?>"   <?php if($hide_date=='on') echo "checked";?> name="<?php echo $this->get_field_name('hide_date'); ?>" type="checkbox"></p>

	<p><label for="<?php echo $this->get_field_id('rt_news_number'); ?>"><?php _e('Number Posts (default: \'10\'):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('rt_news_number'); ?>" name="<?php echo $this->get_field_name('rt_news_number'); ?>" type="text" value="<?php echo $rt_news_number; ?>" /></label></p>
	 
	<p><label for="<?php echo $this->get_field_id('link_text'); ?>"><?php _e('Link text (default: \'read more\'):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" type="text" value="<?php echo $link_text; ?>" /></label></p>
	   
	 <hr />
	 <small>You can use this box in single line if you are using for home page!</small>
	 <p> <label for="<?php echo $this->get_field_id('full_size'); ?>"><?php _e('Full Width Box:'); ?></label> <input  id="<?php echo $this->get_field_id('full_size'); ?>"   <?php if($full_size=='on') echo "checked";?> name="<?php echo $this->get_field_name('full_size'); ?>" type="checkbox"></p>
	 <hr />
 
	</div>

<?php // end class
}
}
?>
<?php // register RT_THEME_NEWS_WIDGET widget
add_action('widgets_init', create_function('', 'return register_widget("RT_THEME_NEWS_WIDGET");'));
?>