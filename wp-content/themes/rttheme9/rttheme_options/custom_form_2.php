<?php
if ( !class_exists('rt_custom_fields_2') ) {

	class rt_custom_fields_2 {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = 'rt_';
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/
		var $customFields =	array(

			array(
				"name"			=> "product_image_url",
				"title"			=> "Product Image Url",
				"description"	=> "",
				"type"			=> "rttheme_upload",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "short_description",
				"title"			=> "Short Description",
				"description"	=> "Short description for product listing pages.",
				"type"			=> "textarea",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "long_description",
				"title"			=> "Long description",
				"description"	=> "Long description for product detail page.",
				"type"			=> "textarea",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "product_price",
				"title"			=> "Product Price",
				"description"	=> "i.e. 20 USD",
				"type"			=> "text",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),


			array(
				"name"			=> "other_images",
				"title"			=> "Other images for this product",
				"description"	=> "You can put unlimited image for this product. Please put all the image links line by line. All these images will be resize to 90*90 automaticly. Leave blank if you don't need to product photos tab. ",
				"type"			=> "textarea",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "technical_details",
				"title"			=> "Technical Details",
				"description"	=> "You can put everyting you want as content for technical details tab. Leave blank if you don't need to this tab.",
				"type"			=> "textarea",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "related_products",
				"title"			=> "Related products with this product",
				"description"	=> "You can add unlimited product for this field. Please put all the product ID's line by line. Leave blank if you don't need to this tab. ",
				"type"			=> "textarea",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "pdf_file_url",
				"title"			=> "Pdf File Url",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "word_file_url",
				"title"			=> "Word File Url",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),

			array(
				"name"			=> "excel_file_url",
				"title"			=> "Excel File Url",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			),
			
			array(
				"name"			=> "chart_file_url",
				"title"			=> "Chart File Url",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	 array( "post" ), 
				"capability"	=> "edit_post"
			)			
			

		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function rt_custom_fields_2() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				remove_meta_box( 'postcustom', 'post', $context );
				remove_meta_box( 'pagecustomdiv', 'page', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'rt_custom_fields_2', 'RT-Theme Product Custom Fields', array( &$this, 'displayCustomFields' ), 'post', 'side', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomFields() {
			global $post;
			?>
			<div class="form-wrap">
				<?php
				wp_nonce_field( 'rt_custom_fields_2', 'rt_custom_fields_2_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							case "post": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
									$output = true;
								break;
							}
							case "page": {
								// Output on any page screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
									$output = true;
								break;
							}
						}
						if ( $output ) break;
					}
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
						<div class="form-field form-required">
							<?php
							switch ( $customField[ 'type' ] ) {
								case "checkbox": {
									// Checkbox
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									break;
								}
								case "textarea": {
									// Text area
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . ( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									break;
								}
								case "rttheme_upload": {
									// rt-upload button
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									echo '<input type="text" style="width:185px;" size="6" class="newtag form-input-tip" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . ( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" /><input type="button" style="width:45px;outline:none;padding:2px 0;" class="rttheme_upload_button '. $this->prefix . $customField[ 'name' ] .' button tagadd" value="upload" tabindex="3" />';
									break;
								}								
								default: {
									// Plain text field
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . ( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;
								}
							}
							?>						
						</div>
					<?php
					}
				} ?>
			</div>
			<?php
		}

		/**
		* Save the new Custom Fields values
		*/
		function saveCustomFields( $post_id ) {
			global $post;
			if ( !wp_verify_nonce( $_POST[ 'rt_custom_fields_2_wpnonce' ], 'rt_custom_fields_2' ) )
				return $post_id;
			foreach ( $this->customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}
				}
			}
		}

	} // End Class

} // End if class exists statement

$rt_custom_fields_2_var = new rt_custom_fields_2();