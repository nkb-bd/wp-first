<?php
/**
* Plugin Name: Form Styles For Contact Form 7 
* Plugin URI: http://core37.com/
* Description: Add styles for contact form 7 forms. Make your contact forms look better and more professional
* Version: 1.0.2
* Author: Core37
* Author URI: http://core37.com/
**/


include_once( plugin_dir_path( __FILE__ ) . 'config.php' );



add_action('admin_enqueue_scripts', 'core37_ctf7_register_scripts');

function core37_ctf7_register_scripts($hook)
{
	if (strpos($hook, "form-styles-for-contact-form-7/index") === false)
		return;
	
	wp_enqueue_script('fancy-box', plugins_url('/js/jquery.fancybox-1.3.4.js', __FILE__));
	wp_enqueue_script('core37-cf7-script', plugins_url('/js/scripts.js', __FILE__));
	wp_enqueue_style('fancy-style', plugins_url('/css/jquery.fancybox-1.3.4.css', __FILE__));
	wp_enqueue_style('skeleton-style', plugins_url('/css/skeleton.css', __FILE__));
	wp_enqueue_style('custom-style', plugins_url('/css/styles.css', __FILE__));
	
	
}



// for frontend
add_action('wp_head','core37_ctf7_load_style');
function core37_ctf7_load_style() {
	global $wpdb;
	$table_name = STYLE_TABLE_NAME;
	$active_style = $wpdb->get_row( "SELECT * FROM $table_name WHERE is_active = 'Y'" );
	if($active_style){
		$path = '/styles/'.$active_style->STYLE_ID.'/';
		if( file_exists(plugin_dir_path(__FILE__) . 'styles/'.$active_style->STYLE_ID.'/style.css') ) {
			wp_enqueue_style('active-style-css', plugins_url($path.'style.css', __FILE__));

		}
		if( file_exists(plugin_dir_path(__FILE__) . 'styles/'.$active_style->STYLE_ID.'/style.js') ) {
			wp_enqueue_script('active-style-script', plugins_url($path.'style.js', __FILE__));

		}
	}
	
}
// end for frontend


// cai dat DB
global $jal_db_version;
$jal_db_version = '1.0';

function core37_ctf7_init_db() {
	global $wpdb;
	global $jal_db_version;
	$table_name = STYLE_TABLE_NAME;
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			  `ID` int(5) NOT NULL AUTO_INCREMENT,
			  `STYLE_ID` varchar(8) NOT NULL,
			  `VERSION_CODE` int(3) NOT NULL,
			  `VERSION_NAME` varchar(20) NOT NULL,
			  `STYLE_NAME` varchar(200) NOT NULL,
			  `STYLE_DES` varchar(1000) NOT NULL,
			  `THUM_NAME` varchar(50) NOT NULL,
			  `PREVIEW_NAME` varchar(50) NOT NULL,
			  `IS_ACTIVE` varchar(1) NOT NULL COMMENT 'Y = ACTIVE, N = INACTIVE',
			  `NOTE` varchar(200) NOT NULL,
			  PRIMARY KEY (`ID`)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'core37_ctf7_init_db' );

function core37_ctf7_init_data() {
	global $wpdb;
	$table_name = STYLE_TABLE_NAME;	
	// xoa du lieu cu
	$wpdb->query("DELETE FROM $table_name;");
	// them du lieu moi
	$wpdb->insert( 
		$table_name, 
		array( 
			'STYLE_ID' => 'ST001', 
			'VERSION_CODE' => 1, 
			'VERSION_NAME' => '1.0.0', 
			'STYLE_NAME' => 'Style 1', 
			'STYLE_DES' => 'Style 1 Desc', 
			'THUM_NAME' => 'thum.jpg', 
			'PREVIEW_NAME' => 'preview.jpg', 
			'IS_ACTIVE' => 'Y', 
		) 
	);
	$wpdb->insert( 
		$table_name, 
		array( 
			'STYLE_ID' => 'ST002', 
			'VERSION_CODE' => 1, 
			'VERSION_NAME' => '1.0.0', 
			'STYLE_NAME' => 'Style 2', 
			'STYLE_DES' => 'Style 2 Desc', 
			'THUM_NAME' => 'thum.jpg', 
			'PREVIEW_NAME' => 'preview.jpg', 
			'IS_ACTIVE' => 'N', 
		) 
	);
}  

register_activation_hook( __FILE__, 'core37_ctf7_init_data' );

// end caidat db

// create admin menu
add_action('admin_menu', 'contact_style_admin_menu');

function contact_style_admin_menu() {

	//create new top-level menu
	add_menu_page('CF7 Styles', 'CF7 Styles', 'manage_options', __FILE__, 'contact_style_manager' , plugins_url('/images/icon.png', __FILE__) );
	
	add_submenu_page(__FILE__, 'Add New Style', 'Add Styles', 'manage_options', __FILE__.'/update', 'contact_style_update');

}

function contact_style_update(){
	include_once( plugin_dir_path( __FILE__ ) . 'update.php' );
}

function contact_style_manager() {
	include_once( plugin_dir_path( __FILE__ ) . 'manager.php' );
} 

// end create admin menu

// for ajax admin

add_action( 'admin_footer', 'core37_ctf7_action_javascript' ); // Write our JS below here
function  core37_ctf7_action_javascript(){
	include_once( plugin_dir_path( __FILE__ ) . 'ajax-js.php' );
}

// active style
add_action( 'wp_ajax_action_active_style', 'action_active_style_callback' );
function action_active_style_callback() {
	global $wpdb; 
	$table_name = STYLE_TABLE_NAME;
	$style_id = $_POST['style_id'];
	$status = $_POST['status'];
	//active thi fai inactive tat ca nhung cai con lai
	if($status == 'Y'){
    	$wpdb->query("UPDATE $table_name SET IS_ACTIVE='N';");	
	}
	$wpdb->query("UPDATE $table_name SET IS_ACTIVE='$status' WHERE STYLE_ID='$style_id';");
    echo 'Updated';
	wp_die();
}

add_action( 'wp_ajax_action_download_style', 'action_download_style_callback' );
function action_download_style_callback() {
	global $wpdb; 
	$table_name = STYLE_TABLE_NAME;
	$style_id = $_POST['style_id'];
	$url = BASE_SERVICE_URL.'getstyle.php?data='.$style_id;
	$re = @wp_remote_get($url,array());
	$res = '';
	if($re){
		$res = $re['body'];
	}
	$style = @json_decode($res, true);
	if($style){
		$file_name =  $style['style_id'].'.zip';
		// xoa file zip cu neu co
		if(file_exists(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name)){
			@unlink(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name);
		}
		$timeout_seconds = 300;
		// download file to temp dir
		$temp_file = @download_url( $style['download_url'], $timeout_seconds );
		$download_res = TRUE;
		if (!is_wp_error( $temp_file )) {
			$download_res = @copy( $temp_file, plugin_dir_path( __FILE__ ) . 'styles/'.$file_name );
			@unlink( $tmpfile );
		}
		if($download_res){
			// xoa folder cu
			$style_folder = plugin_dir_path( __FILE__ ).'styles/'.$style['style_id'];
			if(is_dir($style_folder)){
				@rmdir($style_folder);
			}
			WP_Filesystem();
			$extract_res = @unzip_file( plugin_dir_path( __FILE__ ) . 'styles/'.$file_name, plugin_dir_path( __FILE__ ).'styles/');
		    //xoa file zip
		    if(file_exists(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name)){
		    	@unlink(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name);
		    }
		    if(!is_wp_error($extract_res)){
		    	$insert_res = $wpdb->insert( 
					$table_name, array( 
						'STYLE_ID' => $style['style_id'], 
						'VERSION_CODE' => (int)$style['version_code'], 
						'VERSION_NAME' => $style['version_name'], 
						'STYLE_NAME' => $style['style_name'], 
						'STYLE_DES' => $style['style_des'], 
						'THUM_NAME' => 'thum.jpg', 
						'PREVIEW_NAME' => 'preview.jpg', 
						'IS_ACTIVE' => 'N', 
						'NOTE' => 'Add new', 
					)
				);
				if($insert_res){
					// thanh cong
					echo '0';
				}else {
					echo '1';
				}
		    }else{
		    	echo '2';
		    }
		}else{
			echo '3';
		}
	}else{
		echo '4';
	}
	wp_die();
}

add_action( 'wp_ajax_action_update_style', 'action_update_style_callback' );
function action_update_style_callback() {
	global $wpdb; 
	$table_name = STYLE_TABLE_NAME;
	$style_id = $_POST['style_id'];
	$url = BASE_SERVICE_URL.'getstyle.php?data='.$style_id;
	$re = @wp_remote_get($url,array());
	$res = '';
	if($re){
		$res = $re['body'];
	}
	$style = @json_decode($res, true);
	if($style){
		$file_name =  $style['style_id'].'.zip';
		// xoa file zip cu neu co
		if(file_exists(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name)){
			@unlink(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name);
		}
		$timeout_seconds = 300;
		// download file to temp dir
		$temp_file = download_url( $style['download_url'], $timeout_seconds );
		$download_res = TRUE;
		if (!is_wp_error( $temp_file )) {
			//var_dump($temp_file);
			$download_res = @copy( $temp_file, plugin_dir_path( __FILE__ ) . 'styles/'.$file_name );
			@unlink( $tmpfile );
		}
		if($download_res){
			// xoa folder cu
			$style_folder = plugin_dir_path( __FILE__ ).'styles/'.$style['style_id'];
			if(is_dir($style_folder)){
				@rmdir($style_folder);
			}
			WP_Filesystem();
			$extract_res = @unzip_file( plugin_dir_path( __FILE__ ) . 'styles/'.$file_name, plugin_dir_path( __FILE__ ).'styles/');
		    //xoa file zip
		    if(file_exists(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name)){
		    	@unlink(plugin_dir_path( __FILE__ ) . 'styles/'.$file_name);
		    }
		    if($extract_res){
		    	$note = 'Update at '.date( 'Y-m-d H:i:s' );
		    	$insert_res = $wpdb->update( 
					$table_name, 
					array('VERSION_CODE' => (int)$style['version_code'], 
						 'VERSION_NAME' => $style['version_name'], 
						 'STYLE_NAME' => $style['style_name'], 
						 'STYLE_DES' => $style['style_des'],
					     'NOTE' => $note),
					array('STYLE_ID' => $style['style_id'])
				);
				//var_dump( $wpdb->last_query );
				if($insert_res){
					// thanh cong
					echo '0';
				}else {
					echo '1';
				}
		    }else{
		    	echo '2';
		    }
		}else{
			echo '3';
		}
	}else{
		echo '4';
	}
	wp_die();
}


