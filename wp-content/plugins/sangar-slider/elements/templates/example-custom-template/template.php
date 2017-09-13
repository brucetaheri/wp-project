<?php
	/** 
	 * load ssliderGenerate class
	 */
	$post_type = get_post_type($id);
	$sslider_addons = apply_filters('sangar_slider_addons',array());
	$class = $sslider_addons[$post_type]['class-name'];

	$slider = new $class($id,$data,$config,$args,$post_type);
	$slider_id = $slider->slider_id;
	$template_dir = plugins_url('/',__FILE__);
?>

<link href="<?php echo $template_dir ?>style.css" media="all" rel="stylesheet">

<script type="text/javascript">
	function sangar_custom_onInit() {
		// your functions goes here
	}

	function sangar_custom_onReset(width,height) {
		jQuery('#<?php echo $slider_id ?>-content-container .sangar-custom-content').hide();
		
		jQuery('#<?php echo $slider_id ?>-content-container').width(width).show();
		jQuery('#<?php echo $slider_id ?>-content-container .sangar-custom-content-0').show();
	}

	function sangar_custom_beforeLoading() {
		// your functions goes here
	}

	function sangar_custom_afterLoading() {
		// your functions goes here
	}

	function sangar_custom_beforeChange(activeSlide) {
		jQuery('#<?php echo $slider_id ?>-content-container .sangar-custom-content').hide();
	}

	function sangar_custom_afterChange(activeSlide) {
		jQuery('#<?php echo $slider_id ?>-content-container .sangar-custom-content-' + activeSlide).show();
	}
</script>

<?php echo $slider->javascript(); ?>
<?php echo $slider->html(); ?>

<div id='<?php echo $slider_id ?>-content-container' class='sangar-custom-content-container'>

	<?php
		// content textbox
		$content = $slider->slide_content();

		foreach ($content as $key => $value) 
		{
			echo "<div class='sangar-custom-content sangar-custom-content-$key'>";
			echo "<h1>{$value['title']}</h1>";
			echo "<div>{$value['description']}</div>";
			echo "</div>";
		}

		// pagination
		echo '<ul>';
		foreach ($content as $key => $value) 
		{
			$page = $key + 1;
			echo "<li><a href='javascript:;' class='exPagination'>$page</a></li>";
		}
		echo '</ul>';
	?>

	<!-- navigation -->
	<a href="javascript:;" class="exNext">Next</a>
	<a href="javascript:;" class="exPrev">Preview</a>

</div>