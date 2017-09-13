<?php

add_filter('sangar_slider_presets','sangar_slider_presets');
function sangar_slider_presets($args)
{
	$preset_path = plugin_dir_path( __FILE__ ) . "presets/";
	$preset_url = plugin_dir_url( __FILE__ ) . "presets/";
	
	$args['1_1'] = array(
		'name' => '1_1',
		'cover' => $preset_url . '1_1/cover.jpg',
		'preset' => $preset_path . '1_1/preset.txt'
	);

	$args['1_2'] = array(
		'name' => '1_2',
		'cover' => $preset_url . '1_2/cover.jpg',
		'preset' => $preset_path . '1_2/preset.txt'
	);

	$args['1_3'] = array(
		'name' => '1_3',
		'cover' => $preset_url . '1_3/cover.jpg',
		'preset' => $preset_path . '1_3/preset.txt'
	);

	$args['1_4'] = array(
		'name' => '1_4',
		'cover' => $preset_url . '1_4/cover.jpg',
		'preset' => $preset_path . '1_4/preset.txt'
	);

	$args['2_1'] = array(
		'name' => '2_1',
		'cover' => $preset_url . '2_1/cover.jpg',
		'preset' => $preset_path . '2_1/preset.txt'
	);

	$args['2_2'] = array(
		'name' => '2_2',
		'cover' => $preset_url . '2_2/cover.jpg',
		'preset' => $preset_path . '2_2/preset.txt'
	);

	$args['2_3'] = array(
		'name' => '2_3',
		'cover' => $preset_url . '2_3/cover.jpg',
		'preset' => $preset_path . '2_3/preset.txt'
	);

	$args['3_1'] = array(
		'name' => '3_1',
		'cover' => $preset_url . '3_1/cover.jpg',
		'preset' => $preset_path . '3_1/preset.txt'
	);

	$args['3_2'] = array(
		'name' => '3_2',
		'cover' => $preset_url . '3_2/cover.jpg',
		'preset' => $preset_path . '3_2/preset.txt'
	);

	$args['3_3'] = array(
		'name' => '3_3',
		'cover' => $preset_url . '3_3/cover.jpg',
		'preset' => $preset_path . '3_3/preset.txt'
	);

	$args['4_1'] = array(
		'name' => '4_1',
		'cover' => $preset_url . '4_1/cover.jpg',
		'preset' => $preset_path . '4_1/preset.txt'
	);

	$args['4_2'] = array(
		'name' => '4_2',
		'cover' => $preset_url . '4_2/cover.jpg',
		'preset' => $preset_path . '4_2/preset.txt'
	);

	return $args;
}