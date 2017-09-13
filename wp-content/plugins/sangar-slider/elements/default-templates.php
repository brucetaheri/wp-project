<?php

add_filter('sangar_slider_templates','sangar_slider_default_templates');
function sangar_slider_default_templates($args)
{
	$dir_path = plugin_dir_path( __FILE__ );
	$themes = array('default','dark','light','royal','assertive','calm','balanced','positive','energized');

	// Horizontal No Pagination
	$args['horizontal-no-pagination'] = array(
		'name' => 'Horizontal No Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'pagination' => 'none'
		)
	);

	// Horizontal Bullet Pagination
	$args['horizontal-bullet-pagination'] = array(
		'name' => 'Horizontal Bullet Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'pagination' => 'bullet'
		)
	);

	// Horizontal Number Pagination
	$args['horizontal-number-pagination'] = array(
		'name' => 'Horizontal Number Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'pagination' => 'bullet',
			'paginationBulletNumber' => 'true'
		)
	);

	// Horizontal Text Pagination
	$args['horizontal-text-pagination'] = array(
		'name' => 'Horizontal Text Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'pagination' => 'content-horizontal',
			'paginationContentType' => 'text'
		)
	);

	// Horizontal Image Pagination
	$args['horizontal-image-pagination'] = array(
		'name' => 'Horizontal Image Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'pagination' => 'content-horizontal',
			'paginationContentType' => 'image',
			'paginationContentWidth' => 90, // pagination content width in pixel
			'paginationImageHeight' => 90, // pagination image height
		)
	);

	// Vertical No Pagination
	$args['vertical-no-pagination'] = array(
		'name' => 'Vertical No Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'vertical-slide',
			'pagination' => 'none'
		)
	);

	// Vertical Bullet Pagination
	$args['vertical-bullet-pagination'] = array(
		'name' => 'Vertical Bullet Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'vertical-slide',
			'pagination' => 'bullet'
		)
	);

	// Vertical Text Pagination
	$args['vertical-text-pagination'] = array(
		'name' => 'Vertical Text Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'vertical-slide',
			'pagination' => 'content-vertical',
			'paginationContentType' => 'text'
		)
	);

	// Carousel Bullet Pagination
	$args['carousel-bullet-pagination'] = array(
		'name' => 'Carousel Bullet Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'carousel' => 'true',
			'carouselWidth' => 75, // width in percent
        	'carouselOpacity' => 0.3, // opacity for non-active slide
			'pagination' => 'bullet',
			'fullWidth' => 'true',
			'maxHeight' => 500
		)
	);

	// Carousel Text Pagination
	$args['carousel-text-pagination'] = array(
		'name' => 'Carousel Text Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'carousel' => 'true',
			'carouselWidth' => 75, // width in percent
        	'carouselOpacity' => 0.3, // opacity for non-active slide
			'pagination' => 'content-horizontal',
			'paginationContentType' => 'text',
			'fullWidth' => 'true',
			'maxHeight' => 475
		)
	);

	// Carousel Image Pagination
	$args['carousel-image-pagination'] = array(
		'name' => 'Carousel Image Pagination',
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'carousel' => 'true',
			'carouselWidth' => 75, // width in percent
        	'carouselOpacity' => 0.3, // opacity for non-active slide
			'pagination' => 'content-horizontal',
			'paginationContentType' => 'image',
        	'fullWidth' => 'true',
			'maxHeight' => 475
		)
	);

	// Example Custom Template
	$args['example-custom-template'] = array(
		'name' => 'Example Custom Template',		
		'location' => $dir_path . 'templates/example-custom-template/template.php',
		'themesAvailable' => array('default','custom_theme'),
		'themesLocation' => $dir_path . 'templates/example-custom-template/themes',
		'hideTextbox' => true,
		'config' => array(
			'animation' => 'horizontal-slide',
			'directionalNav' => 'none',
			'pagination' => 'none',
			'paginationExternalClass' => 'exPagination',
			'directionalNavNextClass' => 'exNext',
			'directionalNavPrevClass' => 'exPrev',
			'onInit' => 'function(){ sangar_custom_onInit() }',
			'onReset' => 'function(width,height){ sangar_custom_onReset(width,height) }',
			'beforeLoading' => 'function(){ sangar_custom_beforeLoading() }',
			'afterLoading' => 'function(){ sangar_custom_afterLoading() }',
			'beforeChange' => 'function(activeSlide){ sangar_custom_beforeChange(activeSlide) }',
			'afterChange' => 'function(activeSlide){ sangar_custom_afterChange(activeSlide) }'
		)
	);

	// Carousel fixed width
	$args['carousel-fixed-width'] = array(
		'name' => 'Carousel Fixed Width',	
		'themesAvailable' => $themes,
		'config' => array(
			'animation' => 'horizontal-slide',
			'directionalNav' => 'none',
			'pagination' => 'none',
			'carouselFixedWidth' => 'true'
		)
	);


	return $args;
}