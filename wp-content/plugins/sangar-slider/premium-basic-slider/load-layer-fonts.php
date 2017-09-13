<?php 

if(! class_exists('ssliderLoadLayerFonts')):

Class ssliderLoadLayerFonts 
{
	function __construct($id) {
		// data
		$data = get_post_meta($id,'sslider_data',true);
		$data = unserialize(base64_decode($data));

		$this->id = $id;
		$this->fonts = Array();
		$this->data = $data;
	}

	function print_fonts() {
		$this->get_from_layer();

		$webfont_string = $this->webfont_string();

		if($webfont_string != '') {
			$javascript = "jQuery(function($){ WebFont.load({
				google: {families: [". $webfont_string ."]}
			}); });";

			// add script and the inline script
			wp_enqueue_script('sslider-webfont-js',"https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js",array(), SANGAR_SLIDER_VERSION);
			wp_add_inline_script('sslider-webfont-js', $javascript);
		}
		
	}

	private function get_from_layer() {
		$layer_fonts = array();

		foreach ($this->data as $key => $value) {
			if($value['slide-type'] != 'layer') continue;

			// get all loaded font
			preg_match_all('/font_type":"(.*?)","font_weight/s', $value['slide-layer'], $text_font);
			preg_match_all('/text_font":"(.*?)","text_weight/s', $value['slide-layer'], $button_font);

			$layer_fonts = array_merge($layer_fonts,$text_font[1],$button_font[1]);
		}

		$layer_fonts = array_unique($layer_fonts);
		$this->fonts = array_merge($this->fonts,$layer_fonts);
	}

	private function webfont_string() {
		$this->fonts = array_unique($this->fonts);

		$webfont_string = '';

		foreach ($this->fonts as $key => $value) 
		{
			if($value == '') continue;

			$webfont_string.= "'".tonjooGoogleFonts::$fonts[$value]."',";
		}

		return $webfont_string;
	}
}

endif;