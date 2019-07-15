<!-- Add js for ajax -->
<?php 
	//echo "<script src='".plugins_url('/js/form_style_ajax.js', __FILE__) ."' type='text/javascript' ></script>";
	 //lay danh sach
	 $table_name = STYLE_TABLE_NAME;
	$query_all_style = "SELECT * FROM $table_name ORDER BY ID DESC;";
	global $wpdb;
	$all_style_result = $wpdb->get_results($query_all_style);
	$listId = '';
	$len = count($all_style_result);
	for($i=0;$i<$len;$i++){
		$listId .= $all_style_result[$i]->STYLE_ID;
		if($i != ($len-1)){
			$listId.=';';
		}
	}
	$data = base64_encode($listId);
	$url = BASE_SERVICE_URL.'checkupdate.php?data='.$data;
//	$res = @file_get_contents($url);

	$re = @wp_remote_get($url,array());
	$res = '';
	if($re){
		$res = $re['body'];
	}
	
	$allstyle = @json_decode($res, true);
	$loading_img = plugins_url('/images/ajax-loader.gif', __FILE__);
?>
<div class="wrap">
<h2>Manage Style</h2>
<p class="notice notice-success is-dismissible" id="core37-alert-message"></p>
	<div class="row style-head">
		<div class="two columns format-status">Style ID</div>
<!--		<div class="two columns">Name</div>-->
<!--		<div class="three columns">Description</div>-->
		<div class="four columns">Version</div>
		<div class="three columns">Preview</div>
		<div class="three columns">Status</div>
	</div>
	<?php 
		$style_no = 1;
		foreach ($all_style_result as $style){
			echo '<div class="row">';
			echo "<div class='two columns'>".$style->STYLE_ID."</div>";
//			echo "<div class='two columns'>$style->STYLE_NAME</div>";
//			echo "<div class='three columns'>$style->STYLE_DES</div>";
			echo "<div class='four columns' id='par-".$style->STYLE_ID."'>";
			echo $style->VERSION_NAME;
			if(isset($allstyle[$style->STYLE_ID])){
				if($allstyle[$style->STYLE_ID][0]>(int)$style->VERSION_CODE){
					echo "<a href='javascript:void(0);' class='core37-ctf7-update' id='".$style->STYLE_ID."'> - Update</a>";
					echo "<br><img id='img-".$style->STYLE_ID."' src = '".$loading_img."' style='display:none;'/>";
				}
			}
			echo '</div>';
			$preview_url = plugins_url('/styles/'.$style->STYLE_ID.'/preview.jpg', __FILE__);
			echo "<div class='three columns'><a href='".$preview_url."' class='core37-ctf7-preview'>Preview</a></div>";
			echo "<div class='three columns'>";
			if($style->IS_ACTIVE == 'N'){
				echo '<a href = "javascript:void(0);" onClick="core37_active_style(\''.trim($style->STYLE_ID).'\',\'Y\')">Inactive</a>';
			}else{
				echo '<a href = "javascript:void(0);" onClick="core37_active_style(\''.trim($style->STYLE_ID).'\',\'N\')">Active</a>';
			}
			echo "</div>";
			echo '</div>';
			$style_no++;
		}
	?>

</div>