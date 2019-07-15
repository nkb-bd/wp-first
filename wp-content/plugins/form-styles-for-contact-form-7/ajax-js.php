<script type="text/javascript" >

jQuery(document).ready(function() {
	jQuery('.core37-ctf7-add').on("click",function(){	
	  var style_id =  jQuery(this).attr("id");
	  //var style_title = jQuery('div[id="title-' + style_id + '"]').html();
	  jQuery('img[id="img-' + style_id + '"]').css( 'display', 'inline' );
	  jQuery('#core37-alert-message').html('Please wait...');
	  var data = {
		'action': 'action_download_style',
		'style_id': style_id
		};
		jQuery.post(ajaxurl, data, function(response) {
			//alert(response);
			jQuery('img[id="img-' + style_id + '"]').css( 'display', 'none' );
			var res = response.trim();
			// them moi that bai
			if(res != 0){
				jQuery('#core37-alert-message').html('Update error. Please send this code ('+res+') to the developer');
			}else{
				jQuery('#core37-alert-message').html('Style <b>'+style_id+'</b> added successfully. <a href=\"javascript:void(0);\" onClick=\"core37_active_style_single(\''+style_id+'\',\'Y\')\">Set enabled now!</a>');
				jQuery('div[id="par-' + style_id + '"]').css( 'display', 'none' );
			}
		});
	});


	jQuery('.core37-ctf7-update').on("click",function(){	
	  var style_id =  jQuery(this).attr("id");
	  var style_version = jQuery('span[id="ver-' + style_id + '"]').html();
	  jQuery('#core37-alert-message').html('Please wait...');
	  jQuery('img[id="img-' + style_id + '"]').css( 'display', 'inline' );
	  var data = {
		'action': 'action_update_style',
		'style_id': style_id
		};
		jQuery.post(ajaxurl, data, function(response) {
			jQuery('img[id="img-' + style_id + '"]').css( 'display', 'none' );
			var res = response.trim();
			// them moi that bai
			if(res != 0){
				jQuery('#core37-alert-message').html('Update error. Please send this code ('+res+') to the developer');
			}else{
				jQuery('#core37-alert-message').html('Update success!');
				jQuery('div[id="par-' + style_id + '"]').html(style_version);
			}
		});
	});
	
});

function core37_active_style(style_id,status) {
	var data = {
		'action': 'action_active_style',
		'style_id': style_id,
		'status': status
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	});
}

function core37_active_style_single(style_id,status) {
	var data = {
		'action': 'action_active_style',
		'style_id': style_id,
		'status': status
	};
	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#core37-alert-message').html('Style <b>' + style_id +'</b> was successfully activated!');
	});
}



</script>
