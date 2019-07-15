/**
 * 
 */

function active_style(style_id,status) {
	$.post(ajaxurl,{'action':'my_action'},function(response){
		alert(response);
	});
	//location.reload();
}

