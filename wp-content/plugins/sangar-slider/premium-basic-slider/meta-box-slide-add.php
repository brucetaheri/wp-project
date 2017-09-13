<?php

/** 
 * Prints the box content 
 */
function sslider_slide_add_callback($post) 
{
    ?>

    <div class="updated sangar-slider-notice"><p>The changes has been made, please <b>Save or Update</b> Your Slideshow.</p></div>
    
    <a href="javascript:;" sslider-add-layer-slide class="button button-primary">Add New Slide</a>
    <a href="javascript:;" sslider-add-youtube-slide class="button">Add Youtube / Vimeo Slide</a>
    <a href="javascript:;" sslider-custom-css class="button">Custom CSS</a>

    <!-- Ajax Progress Loader -->
	<div id="sangar_ajax_on_progress">On Progress..</div>

    <?php
}