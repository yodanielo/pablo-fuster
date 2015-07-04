<?php
function rttheme_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-jquery.asmselect', get_bloginfo('template_url').'/rttheme_options/jquery.asmselect.js', array());
	wp_enqueue_script('my-jquery.asmselect');
	wp_register_script('rttheme_upload', get_bloginfo('template_url').'/rttheme_options/script.js', array());
	wp_enqueue_script('rttheme_upload');
}

function admin_head_addition() {	
	$admin_stylesheet_url = get_bloginfo('template_url').'/rttheme_options/admin.css';
	echo '<link rel="stylesheet" href="'. $admin_stylesheet_url . '" type="text/css" />';
	wp_enqueue_style('thickbox');
}

function rt_theme_option_menu(){
	$rttheme_option_name = "RT-Theme";
	$rttheme_page1="General Options";
	$rttheme_page1_file="controlpanel.php";
	$rttheme_page2="Slider Options";
	$rttheme_page2_file="controlpanel2.php";
	$rttheme_page3="Portfolio Options";
	$rttheme_page3_file="controlpanel3.php";
	$rttheme_page4="Product Options";
	$rttheme_page4_file="controlpanel4.php";	
	$rttheme_page5="Blog Options";
	$rttheme_page5_file="controlpanel5.php";
	$rttheme_page6="Contact Page Options";
	$rttheme_page6_file="controlpanel6.php";
	$rttheme_page7="Dynamic Sidebars";
	$rttheme_page7_file="controlpanel7.php";	
	
	add_menu_page($rttheme_option_name, $rttheme_option_name, 7,$rttheme_page1_file, 'rtgeneral');
  	add_submenu_page($rttheme_page1_file, $rttheme_page1, $rttheme_page1, 7, $rttheme_page1_file, 'rtgeneral');
  	add_submenu_page($rttheme_page1_file, $rttheme_page2, $rttheme_page2, 7, $rttheme_page2_file, 'rtslider');
  	add_submenu_page($rttheme_page1_file, $rttheme_page3, $rttheme_page3, 7, $rttheme_page3_file, 'rtportfolio');
  	add_submenu_page($rttheme_page1_file, $rttheme_page4, $rttheme_page4, 7, $rttheme_page4_file, 'rtproduct');	
  	add_submenu_page($rttheme_page1_file, $rttheme_page5, $rttheme_page5, 7, $rttheme_page5_file, 'rtblog');
  	add_submenu_page($rttheme_page1_file, $rttheme_page6, $rttheme_page6, 7, $rttheme_page6_file, 'rtcontactpage');
  	add_submenu_page($rttheme_page1_file, $rttheme_page7, $rttheme_page7, 7, $rttheme_page7_file, 'rtdynamicsidebars');	
}

function rt_generate_welcome() {?>
<table width="100%">
    <tr align="left" > 
    <td style="-moz-border-radius: 6px;-khtml-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;border:1px solid #FFFFFF;padding:3px;background:#F4F4F4;font-size:11px;">
		<h2 style="color:#BA3F42;font-size:19px;margin-left:10px;font-weight:normal;"><i>Welcome to RT-Theme Settings</i></h2>
		<p style="color:#919191; font-size:11px;margin-left:10px;margin-top:5px;" >Please fill out all options. For further information & support please send me an email via my themeforest <a href="http://themeforest.net/user/stmcan">user page</a></p>
    </td>
</tr> 
</table>
<?php
}

function rt_generate_form($options,$form_id) { ?>
	<form method="post" id="<?php echo $form_id;?>">
	<table class="optiontable">
	<?php foreach ($options as $value) { ?>

		<!-- text box -->
		<?php if ($value['type'] == "text") { ?>
		<table  id="table_<?php echo $value['id']; ?>">
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?></small></th>
			<td  class="rt_panel_td_right">
			 <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo htmlentities(get_settings( $value['id'] )); } else { echo htmlentities($value['std']); } ?>" size="40" />
			</td>
		</tr> 
		</table>
		<!--/ text box -->

		<!-- upload box -->
		<?php } elseif ($value['type'] == "rttheme_upload") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?></small></th>
			<td class="rt_panel_td_right">
			 <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo htmlentities(get_settings( $value['id'] )); } else { echo htmlentities($value['std']); } ?>" size="40" /><input  class="rttheme_upload_button <?php echo $value['id']; ?> button"  type="button" value="Upload" />
			</td>
		</tr> 
		</table>
		<!--/ upload box -->

		<!-- textarea-->
		<?php } elseif ($value['type'] == "textarea") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td class="rt_panel_td_right">
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="50" rows="8"/><?php if ( get_settings( $value['id'] ) != "") { echo  (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea>
			</td>
		</tr> 
		</table>
		<!--/ textarea-->

		<!-- select-->
		<?php } elseif ($value['type'] == "select") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td class="rt_panel_td_right">
					<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<option <?php if ( get_settings( $value['id'] ) == 0) { echo ' selected="selected"'; } ?> value="0">Please Select</option>

					<?php foreach ($value['options'] as $op_val=>$option) { ?><option<?php if ( get_settings( $value['id'] ) == $op_val) { echo ' selected="selected"'; } elseif ($op_val == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo $op_val; ?>"><?php echo $option; ?></option><?php } ?></select>
			</td>
		</tr> 
		</table>
		<!--/ select -->

		<!-- select multiple-->
		<?php } elseif ($value['type'] == "selectmultiple_pages") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small>
			</th>
			<td class="rt_panel_td_right">
					<select style="width:240px;height:200px;" size="2"  multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" title="Please Select">

					<?php 
					//once secilmisleri listeleyelim sirasiyla
								$secilen_sayfalar = split(',', get_settings($value['id']) );
								$toplam_secilen_sayfa = count($secilen_sayfalar);
								for ($i = 0; $i < $toplam_secilen_sayfa -1; $i++) {
									$sayfa =get_pages('include='.$secilen_sayfalar[$i].'');
					?>
					<option value="<?php echo $sayfa[0]->ID; ?>" selected><?php echo $sayfa[0]->post_title; ?></option>
					<?php } ?>


					<?php
					//daha onceden secilmisleri yazmiyoruz	
					foreach ($value['options'] as $op_val=>$option) { ?>
					
							<?php  
							if (get_settings($value['id']) != "" ) {			
								$bol=split(',',get_settings($value['id']));
								foreach ($bol as $ddd){
										if ($ddd == $op_val && $ddd != 0) {  
											$atla=1;
										}
									}
							}?>
							<?php
								if (!$atla){
							?>
							<option   value="<?php echo $op_val; ?>" <?php echo $atla;?>>
							<?php
							}	
							$atla="";
							?>
					<?php echo $option; ?>
					</option><?php } ?>
					</select>

			</td>
		</tr> 
		</table>
		<!--/ select -->


		<!-- select multiple-->
		<?php } elseif ($value['type'] == "selectmultiple") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td class="rt_panel_td_right">
					<select style="width:240px;height:200px;" size="2"  multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" title="Please Select">
					<?php foreach ($value['options'] as $op_val=>$option) { ?><option <?php  if (get_settings($value['id']) != "" ) {$bol=split(',',get_settings($value['id']));foreach ($bol as $ddd){if ($ddd == $op_val && $ddd != 0) { echo ' selected="selected"';}}}?>  value="<?php echo $op_val; ?>"><?php echo $option; ?></option><?php } ?></select>
			</td>
		</tr> 
		</table>
		<!--/ select -->

		<!-- check box-->
		<?php } elseif ($value['type'] == "checkbox") { ?>
		<table >
			<tr align="left" > 
			<th scope="row" class="rt_panel_td_left"><b><?php echo $value['name']; ?></b>:<br /><small><?php echo $value['desc']; ?> </small></th>
			<td  class="rt_panel_td_right">
				<input type="checkbox" id="<?php echo $value['id']; ?>" style="margin-left:10px;" name="<?php echo $value['id']; ?>" value="true"   <?php if(get_settings($value['id'])) echo "checked"; ?> 		/>
			</td>
		</tr> 
		</table>
		<!--/ check box -->

		<!--headings-->
		<?php } elseif ($value['type'] == "heading") { ?>
		<table width="750">
			<tr align="left" > 
			<td class="headings">
				<h2><span class="headings"><?php echo $value['name']; ?></span></h2>
				<p><?php echo $value['desc']; ?> </p>
			</td>
		</tr> 
		</table>
		<!--/ headings-->

	<?php } ?>
	<?php 
	}
	?>
	</table>
	<p class="submit">
	<input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>">
	<input name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
	</p>
	</form>
<?php  } ?>
<?php function rt_response(){
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong> settings reset.</strong></p></div>';
}?>
<?php
//sidebar list
function rt_ud_sidebars_list(){
	
	if(get_option('rttheme_ud_sidebars')){
	
	echo "<fieldset class=\"rt_fieldset\"><lagend>Manually Created Sidebars</lagend>";
	
		$rt_ud_sidebars= split(';',get_option('rttheme_ud_sidebars'));
		for ($i=0;$i<count($rt_ud_sidebars)-1;$i++){
			$parameters = split(',',$rt_ud_sidebars[$i]);
			$parts= array(
				"page" => "Pages",
				"post" => "Posts",
				"cat" => "Categories"
			);
			echo "<div class=\"rt_ud_sidebars\">".$parameters[2]." <br /> <i>For ".$parts[$parameters[1]].": ".substr(str_replace('-',',',$parameters[0]), 0, -1)."</i> <a href=\"admin.php?page=controlpanel7.php&sidebar=delete&sidebar_id=".$rt_ud_sidebars[$i]."\"><img src=\"images/no.png\"></a></div>";		
		} ?>
	<div style="text-align:right;font-size:11px;" class="rt_ud_sidebars"><a href="admin.php?page=controlpanel7.php&sidebar=deleteall" style="text-decoration:none;"><img src="images/no.png">Delete All</a></div>	
	<?php	
	echo "</fieldset>";
	
	}   
?>


<div class="clearfix"></div>
<fieldset class="rt_fieldset"><lagend>Create New Sidebar</lagend>
<p>You can create unlimited sidebars related with pages, posts or categories. Please select an option to choose positions of the new sidebar.</p>	
<ul class="sidebar_form_selectors">
<li><label for="sidebarforpages">Sidebar For Pages</label>
<input type="radio" id="sidebarforpages" name="sidebar_form_selector">  </li>
<li><label for="sidebarforposts">Sidebar For  Posts</label>		
<input type="radio" id="sidebarforposts" name="sidebar_form_selector"> </li>
<li><label for="sidebarforcats">Sidebar For  Categories</label>		
<input type="radio" id="sidebarforcats" name="sidebar_form_selector"> </li>
</ul>
</fieldset>

<div class="clearfix"></div>
<?php

}

function rtgeneral(){	
	global $options;
	rt_generate_welcome();
	$ca=rttheme_menu('1');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options,'rtgeneral');
	echo "</div>";
}	

function rtslider(){	
	global $options2;
	rt_generate_welcome();
	$ca=rttheme_menu('2');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options2,'rtslider');
	echo "</div>";
}

function rtgallery(){	
	global $options4;
	rt_generate_welcome();
	$ca=rttheme_menu('4');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options4,'rtgallery');
	echo "</div>";
}

function rtportfolio(){	
	global $options3;
	rt_generate_welcome();
	$ca=rttheme_menu('3');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options3,'rtportfolio');
	echo "</div>";
}

function rtproduct(){	
	global $options4;
	rt_generate_welcome();
	$ca=rttheme_menu('4');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options4,'rtproduct');
	echo "</div>";
}


function rtblog(){	
	global $options5;
	rt_generate_welcome();
	$ca=rttheme_menu('5');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options5,'rtblog');
	echo "</div>";
}

function rtcontactpage(){	
	global $options6;
	rt_generate_welcome();
	$ca=rttheme_menu('6');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_generate_form($options6,'rtcontactpage');
	echo "</div>";
}

function rtdynamicsidebars(){	
	global $options7, $options8, $options9 ;
	rt_generate_welcome();
	$ca=rttheme_menu('7');
	echo $ca;
	echo '<div class="tabs_border"><br />';
	rt_response();
	rt_ud_sidebars_list();
	rt_generate_form($options7,'rtsiderbar_page');
	rt_generate_form($options8,'rtsiderbar_post');
	rt_generate_form($options9,'rtsiderbar_cat');	
	echo "</div>";
}


function rttheme_menu($page){?>
<div class="wrap">
<h2><?php echo $optionpage_top_level; ?></h2>
<ul id="tabnav">
	<li><a class="<?php if ($page=="1") echo "active";?>" href="?page=controlpanel.php"> General Options</a></li>
	<li><a class="<?php if ($page=="2") echo "active";?>" href="?page=controlpanel2.php" >Sliders</a></li>
	<li><a class="<?php if ($page=="3") echo "active";?>" href="?page=controlpanel3.php" >Portfolio</a></li>
	<li><a class="<?php if ($page=="4") echo "active";?>" href="?page=controlpanel4.php" >Products</a></li>	
	<li><a class="<?php if ($page=="5") echo "active";?>" href="?page=controlpanel5.php" >Blog</a></li>
	<li><a class="<?php if ($page=="6") echo "active";?>" href="?page=controlpanel6.php" >Contact Page</a></li>
	<li><a class="<?php if ($page=="7") echo "active";?>" href="?page=controlpanel7.php" >Dynamic Sidebars</a></li>	
</ul>
<?php }?>