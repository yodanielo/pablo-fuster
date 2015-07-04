<?php

class WidgetPublicidades4 extends WP_Widget {

    function WidgetPublicidades4() {
        parent::WP_Widget(false, $name = 'Foo Pubs');
    }

    function form($instance) {
        $url1 = esc_attr($instance['url1']);
        $url2 = esc_attr($instance['url2']);
        $url3 = esc_attr($instance['url3']);
        $url4 = esc_attr($instance['url4']);
        $image1 = esc_attr($instance['image1']);
        $image2 = esc_attr($instance['image2']);
        $image3 = esc_attr($instance['image3']);
        $image4 = esc_attr($instance['image4']);
?>
        <p>
            <label for="<?php echo $this->get_field_id('image1'); ?>"><?php _e('image1:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo $image1; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('url1:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('url1'); ?>" name="<?php echo $this->get_field_name('url1'); ?>" type="text" value="<?php echo $url1; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image2'); ?>"><?php _e('image2:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo $image2; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('url2:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('url2'); ?>" name="<?php echo $this->get_field_name('url2'); ?>" type="text" value="<?php echo $url2; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image3'); ?>"><?php _e('image3:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" type="text" value="<?php echo $image3; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url3'); ?>"><?php _e('url3:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('url3'); ?>" name="<?php echo $this->get_field_name('url3'); ?>" type="text" value="<?php echo $url3; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image4'); ?>"><?php _e('image4:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image4'); ?>" name="<?php echo $this->get_field_name('image4'); ?>" type="text" value="<?php echo $image4; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url4'); ?>"><?php _e('url4:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('url4'); ?>" name="<?php echo $this->get_field_name('url4'); ?>" type="text" value="<?php echo $url4; ?>" />
        </p>  
<?php
    }

    function update($new_instance, $old_instance) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['url1'] = ($new_instance['url1']);
        $instance['url2'] = ($new_instance['url2']);
        $instance['url3'] = ($new_instance['url3']);
        $instance['url4'] = ($new_instance['url4']);
        $instance['image1'] = ($new_instance['image1']);
        $instance['image2'] = ($new_instance['image2']);
        $instance['image3'] = ($new_instance['image3']);
        $instance['image4'] = ($new_instance['image4']);
        return $instance;
    }

    function widget($args, $instance) {
        extract( $args );
        $url1 = apply_filters('widget_url1', $instance['url1']);
        $url2 = apply_filters('widget_url2', $instance['url2']);
        $url3 = apply_filters('widget_url3', $instance['url3']);
        $url4 = apply_filters('widget_url4', $instance['url4']);
        $image1 = apply_filters('widget_image1', $instance['image1']);
        $image2 = apply_filters('widget_image2', $instance['image2']);
        $image3 = apply_filters('widget_image3', $instance['image3']);
        $image4 = apply_filters('widget_image4', $instance['image4']);
        echo $before_widget;
        ?>
        <ul class="brands">
            <?php
            for($i=1;$i<=4;$i++){
                $url = apply_filters('widget_url'+$i, $instance['url'.$i]);
                $image = apply_filters('widget_image'+$i, $instance['image'.$i]);
            ?>
                <li><a href="<?=$url?>" title=""><img src="<?=$image?>" alt="" class="preload" style="opacity: 1; "></a></li>
            <?php
            }
            ?>
        </ul>
        <?php
        echo $after_widget;
    }

}

register_widget("WidgetPublicidades4");
?>
