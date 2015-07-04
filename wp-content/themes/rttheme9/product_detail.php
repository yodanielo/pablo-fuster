<?php
//product fileds
$product_temp = "true";
get_header();
$this_is_product = true;
if (get_option('rttheme_style')) {
    $which_theme = get_option('rttheme_style');
} else {
    $which_theme = "1";
}
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#menu-rt-theme-main-navigation-menu li a:contains(<?= $post->post_title ?>)").parent().addClass("current_page_item");
    });
</script>
<div class="sub_header">
    <!-- Page navigation-->
    <div class="breadcrumb">
        <!-- [rt-breadcrumb] -->
			Usted está en: <a href="<?php bloginfo('url'); ?>" title="<?php echo bloginfo('name'); ?>">Inicio</a> \
        <?php rt_breadcrumb($post->ID); ?>
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
    <div class="content sub product_left_side">

        <?php if (have_posts ()): the_post();
            $current_post = $post->ID; ?>
            <!-- product spot information  -->
            <h3><?php the_title(); ?></h3>

            <!-- text-->
            <p><?php echo get_post_meta($post->ID, 'rt_long_description', true) ?></p>

            <!-- info -->
            <ul class="nobullet">
            <?php if (get_post_meta($post->ID, 'rt_product_price', true)): ?> <li><strong>Price:</strong><?php echo get_post_meta($post->ID, 'rt_product_price', true); ?></li><?php endif; ?>
            <?php if (get_post_meta($post->ID, 'rt_product_stock_code', true)): ?> <li><strong>Stock Code:</strong> <?php echo get_post_meta($post->ID, 'rt_product_stock_code', true); ?></li><?php endif; ?>
            <?php if (get_post_meta($post->ID, 'rt_product_shipping', true)): ?> <li><strong>Shipping Time:</strong> <?php echo get_post_meta($post->ID, 'rt_product_shipping', true); ?></li><?php endif; ?>
                    </ul>

                    <!-- / product spot information  -->


                    <!-- product tabs-->
                    <div id="tabs">
                        <!-- tabs-->
                        <ul class="tabnav">
                <?php if (!empty($post->post_content)): ?>
                            <li class="active" title="details"><a href="#details"><span>Detalles</span></a></li>
                <?php endif; ?>

                <?php if (trim(get_post_meta($post->ID, 'rt_other_images', true))): ?>
                                <li title="photos"><a href="#photos"><span>Fotos</span></a></li>
                <?php endif; ?>

                <?php if (trim(get_post_meta($post->ID, 'rt_other_images', true))): ?>
                                    <li title="technical_details"><a href="#technical_details"><span>Detalles Técnicos</span></a></li>
                <?php endif; ?>

                <?php if (trim(get_post_meta($post->ID, 'rt_related_products', true))): ?>
                                        <li title="technical_details"><a href="#related_products"><span>Related Products</span></a></li>
                <?php endif; ?>

                                    </ul>
                                    <!-- tabs-->
                                    <div class="clear"></div>

                                    <!-- tab content-->
                                    <div class="box full">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme; ?>/full_box_top.jpg" alt="" class="box_curv" />


                                        <!-- tab content-->
                                        <div id="content">

                    <?php if (!empty($post->post_content)): ?>
                                            <!-- details-->
                                            <div id="details" class="tabdiv ui-tabs-hide">
                        <?php the_content(); ?>
                                        </div>
                                        <!-- / details-->
                    <?php endif; ?>

                    <?php if (trim(get_post_meta($post->ID, 'rt_other_images', true))): ?>
                                                <!-- photos -->
                                                <div id="photos" class="tabdiv">
                                                    <div id="photos_cont">
                        <?php
                                                //Other Product Photos
                                                if (trim(get_post_meta($post->ID, 'rt_other_images', true))) {
                                                    $product_photos = split("\n", get_post_meta($post->ID, 'rt_other_images', true));
                                                    echo '<div class="fila">';
                                                    $i=1;
                                                    foreach ($product_photos as $k => $photo_url) {
                                                        if (trim($photo_url)) {
                        ?>
                                                            <a href="<?php echo $photo_url; ?>" title="" rel="prettyPhoto[gallery1]">
                                                                <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $photo_url; ?>&amp;w=160&amp;h=159&amp;zc=1" alt="" class="image product_image" />
                                                            </a>
                        <?php
                                                        }
                                                        if($i%3==0)
                                                            echo '</div><div class="fila">';
                                                        $i++;
                                                    }
                                                    echo '</div>';
                                                }
                        ?>
                                                        </div>
                                            </div>
                                            <!-- / photos -->
                    <?php endif; ?>

                    <?php if (trim(get_post_meta($post->ID, 'rt_other_images', true))): ?>
                                                    <!-- technical details -->
                                                    <div id="technical_details">
                                                        <ul class="doc_icons" style="border:none">
                <?php if (get_post_meta($post->ID, 'rt_chart_file_url', true)): ?><li style="border:none"><a href="<?php echo get_post_meta($post->ID, 'rt_chart_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download Charts" class="png" /></a></li><?php endif; ?>
                <?php if (get_post_meta($post->ID, 'rt_excel_file_url', true)): ?><li style="border:none"><a href="<?php echo get_post_meta($post->ID, 'rt_excel_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download Excel File" class="png" /></a></li><?php endif; ?>
                <?php if (get_post_meta($post->ID, 'rt_pdf_file_url', true)): ?><li style="border:none"><a href="<?php echo get_post_meta($post->ID, 'rt_pdf_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download PDF File" class="png" /></a></li><?php endif; ?>
                <?php if (get_post_meta($post->ID, 'rt_word_file_url', true)): ?><li style="border:none"><a href="<?php echo get_post_meta($post->ID, 'rt_word_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download Word File" class="png" /></a></li><?php endif; ?>
                                                                                                        </ul>
                                                            </div>
                                                            <!-- / technical details -->
                    <?php endif; ?>

                    <?php if (trim(get_post_meta($post->ID, 'rt_related_products', true))): ?>
                                                                        <!-- Related Products -->
                                                                        <div id="related_products">
                        <?php
                                                                        if (trim(get_post_meta($post->ID, 'rt_related_products', true))) {
                                                                            $product_ids = split("\n", get_post_meta($post->ID, 'rt_related_products', true));
                                                                            foreach ($product_ids as $k => $product_id) {
                                                                                if (trim($product_id)):
                        ?>
                        <?php $p_id_list.=$product_id . ","; ?>
                        <?php
                                                                                    endif;
                                                                                }
                                                                            }

                                                                            related_products($p_id_list);
                        ?>
                                                                            <div class="clear"></div>
                                                                        </div>
                                                                        <!-- / Related Products -->
                    <?php endif; ?>

                                                                        </div>
                                                                        <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme; ?>/full_box_bottom.jpg" alt=""  class="box_curv" />
                                                                    </div>
                                                                    <!-- /tab content-->
                                                                </div>
                                                                <!-- /product tabs-->
        <?php else: ?>
                                                                                <p>Sorry, no page found</p>
        <?php endif; ?>
                                                                            </div>
                                                                            <!-- / product content left side -->



                                                                            <!-- product content right side -->


                                                                            <div class="product_right_side">

        <?php if (get_post_meta($post->ID, 'rt_product_image_url', true)): ?>
                                                                                    <!-- box -->
                                                                                    <div class="box big_box">
                                                                                        <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme; ?>/big_box_top.jpg" alt="" class="p_image_top" />
                                                                                        <!-- portfolio image for images -->
                                                                                        <div class="imgarea magnifier">


                <?php if (get_post_meta($post->ID, 'rt_product_image_url', true)): ?>
                                                                                        <a href="<?php echo get_post_meta($post->ID, 'rt_product_image_url', true); ?>" title="<?php the_title(); ?>" rel="prettyPhoto[gallery1]">
                                                                                            <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'rt_product_image_url', true) ?>&amp;w=260&amp;zc=1" alt="" class="image portfolio" />
                                                                                        </a>
                <?php endif; ?>

                                                                                    </div>
                                                                                    <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme; ?>/big_box_bottom.jpg" alt="" class="p_image_bottom" />
                                                                                </div>
                                                                                <!-- /box -->
        <?php endif; ?>

        <?php if (get_post_meta($post->ID, 'rt_chart_file_url', true) || get_post_meta($post->ID, 'rt_excel_file_url', true) || get_post_meta($post->ID, 'rt_pdf_file_url', true) || get_post_meta($post->ID, 'rt_word_file_url', true)): ?>
                                                                                            <!-- box -->
                                                                                            <div class="box big_box">
                                                                                                <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme; ?>/big_box_top.jpg" alt="" class="p_image_top" />
                                                                                                <!-- document icons -->
                                                                                                <ul class="doc_icons">
                <?php if (get_post_meta($post->ID, 'rt_chart_file_url', true)): ?><li><a href="<?php echo get_post_meta($post->ID, 'rt_chart_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download Charts" class="png" /></a></li><?php endif; ?>
                <?php if (get_post_meta($post->ID, 'rt_excel_file_url', true)): ?><li><a href="<?php echo get_post_meta($post->ID, 'rt_excel_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download Excel File" class="png" /></a></li><?php endif; ?>
                <?php if (get_post_meta($post->ID, 'rt_pdf_file_url', true)): ?><li><a href="<?php echo get_post_meta($post->ID, 'rt_pdf_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download PDF File" class="png" /></a></li><?php endif; ?>
                <?php if (get_post_meta($post->ID, 'rt_word_file_url', true)): ?><li><a href="<?php echo get_post_meta($post->ID, 'rt_word_file_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icons/File_Pdf.png" alt="Download Word File" class="png" /></a></li><?php endif; ?>
                                                                                                        </ul>
                                                                                                        <div class="clear"></div>
                                                                                                        <img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $which_theme; ?>/big_box_bottom.jpg" alt="" class="p_image_bottom" />
                                                                                                    </div>
                                                                                                    <!-- /box -->
        <?php endif; ?>

                                                                                                            <!-- sidebar navigation for product details -->

        <?php
                                                                                                            //sidebar navigation for product details
                                                                                                            if (get_option('rttheme_pdetail_side_pages[]'))
                                                                                                                $footer_pages = get_pages(array('sort_column' => 'menu_order', 'include' => get_option('rttheme_pdetail_side_pages[]'), 'child_of' => 0));
                                                                                                            if ($footer_pages):
        ?>
                                                                                                                <div class="box small">
                                                                                                                    <!-- sub link-->
                                                                                                                    <ul id="sub_menu">
                <?php
                                                                                                                $my_i = "1";
                                                                                                                foreach ($footer_pages as $footer_page_list) {
                ?>
                                                                                                                    <li><a  href="<?php echo get_permalink($footer_page_list->ID); ?>" title="<?php echo $footer_page_list->post_title ?>"><?php echo ucwords(strtolower($footer_page_list->post_title)) ?></a></li>
                <?php $my_i++;
                                                                                                                } ?>
                                                                                                            </ul>
                                                                                                            <!-- /sub link-->
                                                                                                        </div>
<?php endif; ?>

                                                                                                                <!-- / sidebar navigation for product details -->


        <?php
                                                                                                                if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar For Product Detail Page')

                                                                                                                    );
                                                                                                                rt_ud_sidebars('post', $current_post);
        ?>

                                                                                                            </div>

                                                                                                            <div class="clear"></div>
                                                                                                            <!-- / product content right side -->



                                                                                                        </div>
                                                                                                        <!-- product content end -->
<?php
                                                                                                                get_footer();

// Related Products
                                                                                                                function related_products($p_id_list) {
                                                                                                                    $postslist = get_posts('numberposts=10&order=ASC&orderby=title&include=' . $p_id_list . '');
                                                                                                                    foreach ($postslist as $post) :
                                                                                                                        setup_postdata($post);
?>
                                                                                                                        <!-- box -->
                                                                                                                        <div class="box product">
                                                                                                                            <!-- product image -->
<?php if (get_post_meta($post->ID, 'rt_product_image_url', true)): ?>
                                                                                                                            <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>">
                                                                                                                                <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'rt_product_image_url', true) ?>&amp;w=160&amp;zc=1" alt="<?php the_title(); ?>" class="image product_image preload" />
                                                                                                                            </a>
<?php endif; ?>
                                                                                                                            <!-- / product image -->

                                                                                                                            <div class="textarea">
                                                                                                                                <!-- box title-->
                                                                                                                                <h5> <a href="<?php echo get_permalink($post->ID); ?>" title="><?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a></h5>
                                                                                                                                <!-- text-->
        <?php echo get_post_meta($post->ID, 'rt_short_description', true); ?>
<?php if (get_post_meta($post->ID, 'rt_product_price', true)): ?>
                                                                                                                                <br />
                                                                                                                                <span class="price"><?php echo get_post_meta($post->ID, 'rt_product_price', true); ?></span>
<?php endif; ?>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <!-- /box -->
<?php endforeach; ?>
<?php } ?>