<?php 
$form_lib = new tonjooFormLibrary(); 

// transparent color/images options
$dir = SANGAR_SLIDER_DIR_PATH."sangar-core/assets/images/transparent";
$backgrounds = scandir($dir);
$transparent_images =  array();

foreach ($backgrounds as $key => $value) 
{
    $extension = pathinfo($value, PATHINFO_EXTENSION); 
    $filename = ucwords(pathinfo($value, PATHINFO_FILENAME)); 
    $extension = strtolower($extension);
    $the_value = strtolower($filename);

    if($extension=='png'){
        $data = array(
            "label"=>"$filename",
            "value"=>"$the_value" 
        );

        array_push($transparent_images,$data);
    }
}
?> 

<!-- Modal add and edit -->
<div id='sslider-add-layer-slide-modal' class="fullscreen-modal-content" style="display:none;" title="Add / Edit Slide">
	<form id='sslider-modal-form'>
		<div class="media-frame-menu">
			<div class="media-menu sslider-tabs">
				<div class="switch">
					<a href="#" class="switch-on"></a>
				</div>
				<a class="media-menu-item active" id='opt-presets-tab' href='#opt-presets'><?php _e('Preset',SANGAR_SLIDER) ?></a>
				<a class="media-menu-item" id='opt-title-tab' href='#opt-title'><?php _e('Title',SANGAR_SLIDER) ?></a>
				<a class="media-menu-item" id='opt-desktop-tab' href='#opt-desktop'><?php _e('Desktop Editor',SANGAR_SLIDER) ?></a>
				<a class="media-menu-item" id='opt-mobile-tab' href='#opt-mobile'><?php _e('Mobile Editor',SANGAR_SLIDER) ?></a>
				<a class="media-menu-item opt-background-tab" id='opt-background-tab' href='#opt-background'><?php _e('Desktop<br>Background',SANGAR_SLIDER) ?></a>
				<a class="media-menu-item opt-background-tab" id='opt-background-tab' href='#opt-background-mobile'><?php _e('Mobile<br>Background',SANGAR_SLIDER) ?></a>
				<a class="media-menu-item" id='opt-content-animation-tab' href='#opt-content-animation'><?php _e('Animation',SANGAR_SLIDER) ?></a>
			</div>
		</div>
		<div class="sslider-modal-post">
			<div id='opt-presets' class="media-frame-content group">			
				<div class="settings-container" >			
		        <div class="sidebar-content widgets-sortables clearfix sslider-preset-container">
					<?php require( plugin_dir_path( __FILE__ ) . 'modal-presets.php'); ?>
				</div>			
				</div>			
			</div>

			<div id='opt-title' class="media-frame-content group">			
				<div class="settings-container" >			
		        <div class="sidebar-content widgets-sortables clearfix">
		            <input type="text" name="slide-title" id="sslider-title" placeholder="Slide Title" value="">
		        </div>			
				</div>			
			</div>

			<div id='opt-desktop' class="media-frame-content group">			
				<div class="settings-container" >			
		        <div class="sidebar-content widgets-sortables clearfix">
		            <table class="table-content">
		            	<?php require( plugin_dir_path( __FILE__ ) . 'modal-desktop.php'); ?>
		        	</table>
		        </div>			
				</div>			
			</div>

			<div id='opt-mobile' class="media-frame-content group">			
				<div class="settings-container" >			
		        <div class="sidebar-content widgets-sortables clearfix">
		            <table class="table-content">
		            	<?php require( plugin_dir_path( __FILE__ ) . 'modal-mobile.php'); ?>
		        	</table>
		        </div>			
				</div>			
			</div>

			<div id='opt-background' class="media-frame-content group">			
				<div class="settings-container" >			
		        <div class="sidebar-content widgets-sortables clearfix" style="padding-bottom: 150px;">
		            <table class="table-content">
						<?php require( plugin_dir_path( __FILE__ ) . 'modal-background.php'); ?>
					</table>
		        </div>
				</div>
			</div>

			<div id='opt-background-mobile' class="media-frame-content group">			
				<div class="settings-container" >			
		        <div class="sidebar-content widgets-sortables clearfix" style="padding-bottom: 150px;">
		            <table class="table-content">
						<?php require( plugin_dir_path( __FILE__ ) . 'modal-background-mobile.php'); ?>
					</table>
		        </div>
				</div>
			</div>

			<div id='opt-content-animation' class="media-frame-content group">				
		        <?php require( plugin_dir_path( __FILE__ ) . 'modal-content-animation.php'); ?>
			</div>

		</div>
		<div class="media-sidebar">
		<div class="modal-sidetips" id="sidetips-presets">
				<h3>Presets</h3>
				<p>
					Preset is a predefined layer content for your current slide.

					<br />
					<br />

					<strong>Gotcha</strong> :

					If you alredy put some content on your layer, your layer content will be replaced by the preset.
				</p>
			</div>

			<div class="modal-sidetips" id="sidetips-title">
				<h3>Title</h3>
				<p>
					Your slide title.
				</p>
			</div>
			
			<div class="modal-sidetips" id="sidetips-desktop">
				<h3>Desktop</h3>
				<strong>Desktop Layer</strong>
					<p>
						In this page, you can add a layers. There are 4 types of layer in Sangar Slider :
						<ul>
							<li><strong>Text</strong>:You can add texts in this type of layers.</li>
							<li><strong>HTML</strong>:You can add raw HTML tags in this type of layers</li>
							<li><strong>Image</strong>:You can add images in this type of layers.</li>
							<li><strong>Button</strong>:You can add clickable button over slider and link it or bind custom actions to it.</li>
						</ul> 

						<strong>Adding New Layer</strong> : 
						
						To add layer in slide first you need to choose the layer type from the dropdown menu then press "+" button, the new layer will add in timeline and you can select it by clicking on its name.

						<br />
						<br />

						<strong>Original Size</strong> :
						Original size is based on <strong>Slider Base Width</strong> and <strong>Slider Base Height</strong> in the slideshow options (On the sidebar). You can use custom desktop size to fit your need.
					</p>
			</div>

			<div class="modal-sidetips" id="sidetips-mobile">
				<h3>Mobile</h3>
				<strong>Mobile Layer</strong>
				<p>
					In this page, you can add a layers. There are 4 types of layer in Sangar Slider :
					<ul>
						<li><strong>Text</strong>:You can add texts in this type of layers.</li>
						<li><strong>HTML</strong>:You can add raw HTML tags in this type of layers</li>
						<li><strong>Image</strong>:You can add images in this type of layers.</li>
						<li><strong>Button</strong>:You can add clickable button over slider and link it or bind custom actions to it.</li>
					</ul> 

					<strong>Adding New Layer</strong> : 
					
					To add layer in slide first you need to choose the layer type from the dropdown menu then press "+" button, the new layer will add in timeline and you can select it by clicking on its name.

					<br />
					<br />

					<strong>Original Size</strong> :
					Original size is based on <strong>Mobile Width</strong> and <strong>Mobile Height</strong> in the <i>slideshow options (On the sidebar) >> Advance Options >> Mobile</i>. You can use custom mobile size to fit your need.
				</p>
			</div>

			<div class="modal-sidetips" id="sidetips-background">
				<h3>Background</h3>
				<p>
					<strong>Background Type</strong>
					<p>
						<ul>
							<li><strong>Image</strong>: Image type background will display static image as background. Bigger images is better.</li>
							<li><strong>Solid Color</strong>: Solid Color is for one static color as a background</li>
							<li><strong>Video</strong>: Using HTML5 video as a background</li>
							<li><strong>HTML</strong>: Using raw HTML as a background, if you need more controll for your slides.</li>
						</ul>
					</p>
					<p>
						<strong>Image Hyperlinks</strong>
					<p>
						The image hyperlink field is used when you click on an image in the slider.
					</p>
				</p>
			</div>

			<div class="modal-sidetips" id="sidetips-content">
				<h3>Content</h3>
				<strong>Content Description</strong>
				<p>
					Content Description is important for your SEO strategy.  Without SEO your content may be lost somewhere on page 50 of the search result. So be sure to have good, well-written, and unique content that will focus on your primary keyword or keyword phrase.
				</p>
			</div>

			<div class="modal-sidetips" id="sidetips-content-options">
				<h3>Content Options</h3>
				<strong>Content Position</strong>
				<p>
					Adjust content position and width to fits your needs. Just make sure the text readability is good, by using contrast background and text.
				</p>
			</div>

			<div class="modal-sidetips" id="sidetips-content-style">
				<h3>Content Style</h3>
				<strong>Title & Content Desc</strong>
				<p>
					Align left is common in text and web, but it's depends on your needs. Again, just make sure the text readability is good by using contrast background and text.
				</p>
			</div>

			<div class="modal-sidetips" id="sidetips-content-animation">
				<h3>Animation</h3>
				<strong>Animation Type</strong>
				<p>
					Enable animation for better user experience. Animation Type is for animation slide direction. Animation duration is in milisecond, and animation stagger is animation delay time beetwen items.
				</p>
			</div>
		</div>
	</form>
</div>