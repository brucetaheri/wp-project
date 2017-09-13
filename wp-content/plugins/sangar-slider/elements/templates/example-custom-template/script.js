function sangar_custom_onInit() {
	// your functions goes here
}

function sangar_custom_onReset(width,height) {
	jQuery('.sangar-custom-content').hide();
	
	jQuery('.sangar-custom-content-container').width(width).show();
	jQuery('.sangar-custom-content-0').show();
}

function sangar_custom_beforeLoading() {
	// your functions goes here
}

function sangar_custom_afterLoading() {
	// your functions goes here
}

function sangar_custom_beforeChange(activeSlide) {
	jQuery('.sangar-custom-content').hide();
}

function sangar_custom_afterChange(activeSlide) {
	jQuery('.sangar-custom-content-' + activeSlide).show();
}