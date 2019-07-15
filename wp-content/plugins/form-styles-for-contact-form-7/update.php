<?php 
	//lay danh sach style da co gui len server
	$table_name = STYLE_TABLE_NAME;
	$query_all_style = "SELECT * FROM $table_name;";
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
	$url = BASE_SERVICE_URL.'checknew.php?data='.$data;
	
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
<h2>Add New Style</h2>
<p class="notice notice-success is-dismissible" id="core37-alert-message"></p>
<?php 
	if($allstyle && count($allstyle)>0){
		?>
		<div class="row style-head">
			<div class="two columns">Style ID</div>
<!--			<div class="two columns">Name</div>-->
<!--			<div class="three columns">Description</div>-->
			<div class="four columns">Version</div>
			<div class="three columns">Preview</div>
			<div class="three columns">Action</div>
		</div>
		<?php 
		$style_no = 1;
		foreach ($allstyle as $style){
			echo "<div class='row' id='par-".$style['style_id']."'>";
			echo "<div class='two columns'>".$style['style_id']."</div>";
//			echo "<div class='two columns' id='title-".$style['style_id']."'>".$style['style_name']."</div>";
//			echo "<div class='three columns'>".$style['style_des']."</div>";
			echo "<div class='four columns'>".$style['version_name']."</div>";
			echo "<div class='three columns'><a href='".$style['preview_url']."' class='core37-ctf7-preview'>Preview</a></div>";
			echo "<div class='three columns'><a href='javascript:void(0);' class='core37-ctf7-add' id='".$style['style_id']."'>Add</a>";
			echo "<br><img id='img-".$style['style_id']."' src = '".$loading_img."' style='display:none;'/>";
			echo "</div>";
			echo '</div>';
			$style_no++;
		}
	}else{
		echo 'No new style';
	}
?>

</div>