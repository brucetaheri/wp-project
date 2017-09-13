var tonjooWpEditor;

jQuery(function($){
	/* Open all metaboxes */
	$('#sslider_slide_core_meta').removeClass('closed');
	$('#sslider_slide_add').removeClass('closed');
	$('#sslider_configuration').removeClass('closed');
	$('#sslider_slide_management').removeClass('closed');

	// change move to trash link
	$('#submitpost #delete-action a').attr('href',post_delete_url);

	/**
	 * Modal Available Icons
	 */
	$('#layer-modal-available-icons').dialog({
        autoOpen: false,
        modal: true,
        draggable: false,
        resizable: false,
        hide: false,
        title: "Available Icons",
        dialogClass: "modal-without-tab",
        width: 665,
        height: 475
    }).parent('.ui-dialog').attr('id','sangar-slider-modal-dialog');

	/**
	 * WP Editor on modal
	 */
	tonjooWpEditor = {
		config: {
			loadingTime: 350,
			loadingText: 'Loading...'
		},
		notFirstLoad: new Array(),
		modalOpen: function(wp_editor_id) {			
			// remove tinymce on first load
			if(! this.notFirstLoad[wp_editor_id]) {
				tinymce.EditorManager.execCommand('mceRemoveEditor', true, wp_editor_id);
				this.notFirstLoad[wp_editor_id] = true;
			}
			// show loading
			$('#wp-' + wp_editor_id + '-wrap').css('visibility','hidden');
			$('<p id="wp-' + wp_editor_id + '-wrap-early-loading">' + this.config.loadingText + '</p>')
				.insertBefore('#wp-' + wp_editor_id + '-wrap');
			
			// reinit tinymce
			setTimeout(function(){
				tinymce.EditorManager.execCommand('mceAddEditor', true, wp_editor_id);
				$('#wp-' + wp_editor_id + '-wrap-early-loading').remove();
				$('#wp-' + wp_editor_id + '-wrap').css('visibility','visible');
			}, this.config.loadingTime);
		},
		modalClose: function(wp_editor_id) {
			if($("#" + wp_editor_id).length && this.notFirstLoad[wp_editor_id]){
				tinymce.EditorManager.execCommand('mceRemoveEditor', true, wp_editor_id);
			}
		},
		getContent: function(wp_editor_id) {
			var textContent = tinyMCE.get(wp_editor_id).getContent();
						
			return textContent;
		}
	}
});

