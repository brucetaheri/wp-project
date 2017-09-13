<?php
	$form_lib = new tonjooFormLibrary(); 
?>

<!-- Add Image -->
<div id="layer-modal-image" style="display:none;">
	<div class="media-frame-router">
		<div class="media-router sslider-layer-tabs">
			<a href='#opt-layer-image-1' class="media-menu-item active">Image</a>
            <a href='#opt-layer-image-2' class="media-menu-item">Image Settings</a>
			<a href='#opt-layer-image-3' class="media-menu-item">Youtube and Vimeo Popup</a>
		</div>
	</div>
	
	<div id='opt-layer-image-1' class="media-frame-content group-layer">	
		<?php $wpMediaUploader = new wpMediaUploader('add-layer-image','image') ?>
	</div>

	<div id='opt-layer-image-2' class="media-frame-content group-layer">	
		<table>
			<tr valign="top">
		        <th scope="row">Size</th>
		        <td id="add-layer-image-size"><i>Please select an image first</i></td>
		    </tr>
		    <tr valign="top">
		        <th scope="row">Hyperlink</th>
		        <td>
		            <input class="regular-text" type="text" id="add-layer-image-hyperlink" value="" placeholder="Type this image hyperlink, optional" />
		        </td>
		    </tr>
		    <tr valign="top">
		        <th scope="row">Hyperlink Target</th>
		        <td>
		            <select id="add-layer-image-hyperlink-target">
		            	<option value="_self">Open on the same page</option>
                        <option value="_blank">Open on new page</option>
                        <option value="_parent">Open in parent frame</option>
                        <option value="_top">Open in main frame</option>
		            </select>
		        </td>
		    </tr>
            <tr valign="top">
                <th scope="row">Animation</th>
                <td>
                    <select id="add-layer-single-animation">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </td>
            </tr>
		</table>
	</div>

    <div id='opt-layer-image-3' class="media-frame-content group-layer">    
        <table>
            <tr valign="top">
                <td scope="row" colspan="2" style="padding-left:0px;">
                    <input type="checkbox" id="add-layer-image-youtube-popup" value="true">
                    <label><strong>Set Enable?</strong> &nbsp;&nbsp; This will override the hyperlink settings</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Embed Source</th>
                <td>
                    <input type="text" id="add-layer-image-youtube-source" placeholder="Put your source url here" value="" style="width:350px;">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">&nbsp;</th>
                <td id="add-layer-image-video-iframe-preview" width="300" height="180" style="padding-bottom:0px;"></td>
            </tr>
        </table>
    </div>
</div>


<!-- Add Text -->
<div id="layer-modal-text" style="display:none;">
    <div class="media-frame-router">
        <div class="media-router sslider-layer-tabs">
            <a href='#opt-layer-text-1' class="media-menu-item active">Text Content</a>
            <a href='#opt-layer-text-2' class="media-menu-item">Text Settings</a>
        </div>
    </div>
    
    <div id='opt-layer-text-1' class="media-frame-content group-layer"> 
        <?php 
            $settings = array(
                'textarea_rows' => '10',
                'media_buttons' => false,
                'quicktags' => false,
                'editor_height' => 150
            );

            wp_editor('','add-layer-text',$settings);
        ?>
    </div>

    <div id='opt-layer-text-2' class="media-frame-content group-layer">
    	<table class="table-content" style="width:100%;">	
    		<tr valign="top" id='textbox_color'>
                <th scope="row">Text Align</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'left',
                                'label' =>  'Left'
                            ),
                            '1' => array(
                                'value' =>  'center',
                                'label' =>  'Center' 
                            ),
                            '2' => array(
                                'value' =>  'right',
                                'label' =>  'Right' 
                            )
                        );
    					
                        $form_lib->print_select($arr_data,'add-layer-text-align');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row">Text Size</th>
                <td>
                    <input class="regular-text" type="number" step="0.1" style="width:100px;" id="add-layer-text-size" value="" />
                    <label class="description" >The size is in em, in this case 1em = 10px</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Text Color</th>
                <td>
                    <input class="regular-text minicolors" type="text" id="add-layer-text-color" value="" />
                    <label class="description" ></label>
                </td>
            </tr>

            <tr>
                <th scope="row">Text Shadow</th>
                <td>
                    <input class="regular-text minicolors" type="text" id="add-layer-text-shadow" value="" />
                    <label class="description" ></label>
                </td>
            </tr>

            <tr>
                <th scope="row">Line Height</th>
                <td>
                    <input class="regular-text" type="number" step="1" style="width:100px;" id="add-layer-text-line-height" value="" />
                    <label class="description" >Leave this blank will set to 'normal'</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Letter Spacing</th>
                <td>
                    <input class="regular-text" type="number" step="0.1" style="width:100px;" id="add-layer-text-letter-spacing" value="" />
                    <label class="description" >The size is in em, in this case 1em = 10px</label>
                </td>
            </tr>

            <tr valign="top" id='textbox_color'>
                <th scope="row">Text Weight</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'normal',
                                'label' =>  'Normal'
                            ),
                            '1' => array(
                                'value' =>  'bold',
                                'label' =>  'Bold' 
                            ),
                            '2' => array(
                                'value' =>  'bolder',
                                'label' =>  'Bolder' 
                            ),
                            '3' => array(
                                'value' =>  'lighter',
                                'label' =>  'Lighter' 
                            )
                        );
                        
                        $form_lib->print_select($arr_data,'add-layer-text-font-weight');
                    ?>
                </td>
            </tr>

            <tr valign="top" id='textbox_color'>
                <th scope="row">Text Transform</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'none',
                                'label' =>  'None'
                            ),
                            '1' => array(
                                'value' =>  'capitalize',
                                'label' =>  'Capitalize' 
                            ),
                            '2' => array(
                                'value' =>  'uppercase',
                                'label' =>  'Uppercase' 
                            ),
                            '3' => array(
                                'value' =>  'lowercase',
                                'label' =>  'Lowercase' 
                            )
                        );
                        
                        $form_lib->print_select($arr_data,'add-layer-text-transform');
                    ?>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Text Decoration</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'none',
                                'label' =>  'None'
                            ),
                            '1' => array(
                                'value' =>  'underline',
                                'label' =>  'Underline' 
                            ),
                            '2' => array(
                                'value' =>  'overline',
                                'label' =>  'Overline'
                            ),
                            '3' => array(
                                'value' =>  'line-through',
                                'label' =>  'Line Through' 
                            )
                        );
                        
                        $form_lib->print_select($arr_data,'add-layer-text-decoration');
                    ?>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Text Style</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'normal',
                                'label' =>  'Normal'
                            ),
                            '1' => array(
                                'value' =>  'italic',
                                'label' =>  'Italic' 
                            ),
                            '2' => array(
                                'value' =>  'oblique',
                                'label' =>  'Oblique'
                            )
                        );
                        
                        $form_lib->print_select($arr_data,'add-layer-text-font-style');
                    ?>
                </td>
            </tr>
            
            <tr>
                <th scope="row">Text Font</th>
                <td>
                    <?php $form_lib->print_select(tonjooGoogleFonts::select(),'add-layer-text-font-type','','class="select2"'); ?>
                </td>
            </tr>
    		
    		<tr>
                <th scope="row">Background Color</th>
                <td>
                    <input class="regular-text minicolors_opacify" type="text" id="add-layer-text-background-color" value="" />
                    <label class="description" >Transparency option is available</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Border</th>
                <td>
                	<input class="regular-text" type="number" step="1" style="width:60px;float:left;margin-right:10px;" id="add-layer-text-border-size" value="" />
                    <input class="regular-text minicolors" type="text" id="add-layer-text-border-color" value="" />
                    <label class="description" ></label>
                </td>
            </tr>

            <tr>
                <th scope="row">Border Position</th>
                <td>
                <?php
                    $arr_data = array(
                        '0' => array(
                            'value' =>  'border',
                            'label' =>  'All'
                        ),
                        '1' => array(
                            'value' =>  'border-top',
                            'label' =>  'Top'
                        ),
                        '3' => array(
                            'value' =>  'border-right',
                            'label' =>  'Right'
                        ),
                        '4' => array(
                            'value' =>  'border-bottom',
                            'label' =>  'Bottom'
                        ),
                        '5' => array(
                            'value' =>  'border-left',
                            'label' =>  'Left'
                        )
                    );

                    $form_lib->print_select($arr_data,"add-layer-text-border-position");
                ?>
                </td>
            </tr>

            <tr>
                <th scope="row">Border Radius</th>
                <td>
                    <input class="regular-text" type="number" step="1" style="width:100px;" id="add-layer-text-border-radius" value="" />
                </td>
            </tr>

            <tr>
                <th scope="row">Padding</th>
                <td>
                    <?php
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'small',
                                'label' =>  'Small'
                            ),
                            '1' => array(
                                'value' =>  'medium',
                                'label' =>  'Medium'
                            ),
                            '3' => array(
                                'value' =>  'large',
                                'label' =>  'Large'
                            ),
                            '4' => array(
                                'value' =>  'x-large',
                                'label' =>  'Extra Large'
                            ),
                            '5' => array(
                                'value' =>  'custom',
                                'label' =>  'Custom'
                            )
                        );

                        $form_lib->print_select($arr_data,"add-layer-text-padding");
                    ?>

                    <label class="description">Select <b>"Custom"</b> to use <b>Custom Padding</b> below.</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Custom Padding</th>
                <td>
                    <input type="text" class="regular-text" id="add-layer-text-padding-custom" value="" />
                    <label class="description">[top]em [right]em [bottom]em [left]em</label>
                </td>
            </tr>

            <tr valign="top">
    	        <th scope="row">Hyperlink</th>
    	        <td>
    	            <input class="regular-text" type="text" id="add-layer-text-hyperlink" value="" placeholder="Type your hyperlink, optional" />
    	        </td>
    	    </tr>
    	    
    	    <tr valign="top">
    	        <th scope="row">Hyperlink Target</th>
    	        <td>
    	            <select id="add-layer-text-hyperlink-target">
    	            	<option value="_self">Open on the same page</option>
    	            	<option value="_blank">Open on new page</option>
    	            	<option value="_parent">Open in parent frame</option>
    	            	<option value="_top">Open in main frame</option>
    	            </select>
    	        </td>
    	    </tr>

            <tr valign="top">
                <th scope="row">Animation</th>
                <td>
                    <select id="add-layer-single-animation">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </td>
            </tr>
    	</table>
    </div>
</div>


<!-- Add HTML -->
<div id="layer-modal-html" style="display:none;">
	<div class="media-frame-router">
		<div class="media-router sslider-layer-tabs">
			<a href='#opt-layer-html-1' class="media-menu-item active">HTML Content</a>
			<a href='#opt-layer-html-2' class="media-menu-item">HTML Settings</a>
		</div>
	</div>
	
	<div id='opt-layer-html-1' class="media-frame-content group-layer">	
		<textarea id="add-layer-html" style="width:100%;height:305px;"></textarea>
	</div>

	<div id='opt-layer-html-2' class="media-frame-content group-layer">	
		<table>			
			<tr>
                <th scope="row">Background Color</th>
                <td>
                    <input class="regular-text minicolors_opacify" type="text" id="add-layer-html-background-color" value="" />
                    <label class="description" >Transparency option is available</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Padding</th>
                <td>
                    <?php
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'small',
                                'label' =>  'Small'
                            ),
                            '1' => array(
                                'value' =>  'medium',
                                'label' =>  'Medium'
                            ),
                            '3' => array(
                                'value' =>  'large',
                                'label' =>  'Large'
                            ),
                            '4' => array(
                                'value' =>  'x-large',
                                'label' =>  'Extra Large'
                            ),
                            '5' => array(
                                'value' =>  'custom',
                                'label' =>  'Custom'
                            )
                        );

                        $form_lib->print_select($arr_data,"add-layer-html-padding");
                    ?>

                    <label class="description">Select <b>"Custom"</b> to use <b>Custom Padding</b> below.</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Custom Padding</th>
                <td>
                    <input type="text" class="regular-text" id="add-layer-html-padding-custom" value="" />
                    <label class="description">[top]em [right]em [bottom]em [left]em</label>
                </td>
            </tr>

            <tr valign="top">
		        <th scope="row">Hyperlink</th>
		        <td>
		            <input class="regular-text" type="text" id="add-layer-html-hyperlink" value="" placeholder="Type your hyperlink, optional" />
		        </td>
		    </tr>
		    
		    <tr valign="top">
		        <th scope="row">Hyperlink Target</th>
		        <td>
		            <select id="add-layer-html-hyperlink-target">
		            	<option value="_self">Open on the same page</option>
                        <option value="_blank">Open on new page</option>
                        <option value="_parent">Open in parent frame</option>
                        <option value="_top">Open in main frame</option>
		            </select>
		        </td>
		    </tr>

            <tr valign="top">
                <th scope="row">Animation</th>
                <td>
                    <select id="add-layer-single-animation">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </td>
            </tr>
		</table>
	</div>
</div>


<!-- Add Button -->
<div id="layer-modal-button" style="display:none;">
	<div class="media-frame-router">
		<div class="media-router sslider-layer-tabs">
			<a href='#opt-layer-button-1' class="media-menu-item active">Button Content</a>
			<a href='#opt-layer-button-2' class="media-menu-item">Button Settings</a>
            <a href='#opt-layer-button-3' class="media-menu-item">Youtube and Vimeo Popup</a>
		</div>
	</div>
	
	<div id='opt-layer-button-1' class="media-frame-content group-layer">	
		
		<!-- Normal -->
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-full-rounded" ><span>BUTTON HERE</span></a>
			<span>Full Rounded</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-square" ><span>BUTTON HERE</span></a>
			<span>Square</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-rounded" ><span>BUTTON HERE</span></a>
			<span>Rounded</span>
		</div>
		
		<!-- Bevel -->
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-full-rounded-bevel" ><span>BUTTON HERE</span></a>
			<span>Full Rounded Bevel</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-square-bevel" ><span>BUTTON HERE</span></a>
			<span>Square Bevel</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-rounded-bevel" ><span>BUTTON HERE</span></a>
			<span>Rounded Bevel</span>
		</div>

		<!-- Border -->
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-full-rounded-border" ><span>BUTTON HERE</span></a>
			<span>Full Rounded Border</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-square-border" ><span>BUTTON HERE</span></a>
			<span>Square Border</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-rounded-border" ><span>BUTTON HERE</span></a>
			<span>Rounded Border</span>
		</div>
		

		<!-- Outline -->
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-full-rounded-outline" ><span>BUTTON HERE</span></a>
			<span>Full Rounded Outline</span>
		</div>
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-square-outline" ><span>BUTTON HERE</span></a>
			<span>Square Outline</span>
		</div>		
		<div class="add-layer-button-preview">
			<a href="javascript:;" class="sangar-btn-rounded-outline" ><span>BUTTON HERE</span></a>
			<span>Rounded Outline</span>
		</div>		

		<?php
            $arr_data = array(
                '0' => array(
                    'value' =>  'sangar-btn-full-rounded',
                    'label' =>  'sangar-btn-full-rounded'
                ),
                '1' => array(
                    'value' =>  'sangar-btn-square',
                    'label' =>  'sangar-btn-square'
                ),
                '3' => array(
                    'value' =>  'sangar-btn-rounded',
                    'label' =>  'sangar-btn-rounded'
                ),
                '4' => array(
                    'value' =>  'sangar-btn-full-rounded-bevel',
                    'label' =>  'sangar-btn-full-rounded-bevel'
                ),
                '5' => array(
                    'value' =>  'sangar-btn-square-bevel',
                    'label' =>  'sangar-btn-square-bevel'
                ),
                '6' => array(
                    'value' =>  'sangar-btn-rounded-bevel',
                    'label' =>  'sangar-btn-rounded-bevel'
                ),
                '7' => array(
                    'value' =>  'sangar-btn-full-rounded-border',
                    'label' =>  'sangar-btn-full-rounded-border'
                ),
                '8' => array(
                    'value' =>  'sangar-btn-square-border',
                    'label' =>  'sangar-btn-square-border'
                ),
                '9' => array(
                    'value' =>  'sangar-btn-rounded-border',
                    'label' =>  'sangar-btn-rounded-border'
                ),
                '10' => array(
                    'value' =>  'sangar-btn-full-rounded-outline',
                    'label' =>  'sangar-btn-full-rounded-outline'
                ),
                '11' => array(
                    'value' =>  'sangar-btn-square-outline',
                    'label' =>  'sangar-btn-square-outline'
                ),
                '12' => array(
                    'value' =>  'sangar-btn-rounded-outline',
                    'label' =>  'sangar-btn-rounded-outline'
                )
            );

            $form_lib->print_select($arr_data,"add-layer-button-class",'','style="display:none;"');
        ?>

	</div>

	<div id='opt-layer-button-2' class="media-frame-content group-layer">	
		<table>			
			<tr valign="top">
		        <th scope="row">Text</th>
		        <td>
		            <input class="regular-text" type="text" id="add-layer-button-text" value="" placeholder="Type the button text" />
		        </td>
		    </tr>

			<tr valign="top">
		        <th scope="row">Hyperlink</th>
		        <td>
		            <input class="regular-text" type="text" id="add-layer-button-hyperlink" value="" placeholder="Type the button hyperlink" />
		        </td>
		    </tr>
		    
		    <tr valign="top">
		        <th scope="row">Hyperlink Target</th>
		        <td>
		            <select id="add-layer-button-hyperlink-target">
		            	<option value="_self">Open on the same page</option>
                        <option value="_blank">Open on new page</option>
                        <option value="_parent">Open in parent frame</option>
                        <option value="_top">Open in main frame</option>
		            </select>
		        </td>
		    </tr>

		    <tr valign="top" id='textbox_color'>
                <th scope="row">Button Align</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'left',
                                'label' =>  'Left'
                            ),
                            '1' => array(
                                'value' =>  'center',
                                'label' =>  'Center' 
                            ),
                            '2' => array(
                                'value' =>  'right',
                                'label' =>  'Right' 
                            )
                        );
						
                        $form_lib->print_select($arr_data,'add-layer-button-align');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row">Text Font</th>
                <td>
                    <?php $form_lib->print_select(tonjooGoogleFonts::select(),'add-layer-button-font-type','','class="select2"'); ?>
                </td>
            </tr>

            <tr valign="top" id='textbox_color'>
                <th scope="row">Text Weight</th>
                <td>
                    <?php 
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'normal',
                                'label' =>  'Normal'
                            ),
                            '1' => array(
                                'value' =>  'bold',
                                'label' =>  'Bold' 
                            ),
                            '2' => array(
                                'value' =>  'bolder',
                                'label' =>  'Bolder' 
                            ),
                            '3' => array(
                                'value' =>  'lighter',
                                'label' =>  'Lighter' 
                            )
                        );
						
                        $form_lib->print_select($arr_data,'add-layer-button-text-weight');
                    ?>
                </td>
            </tr>

            <tr>
                <th scope="row">Text Size</th>
                <td>
                    <input class="regular-text" type="number" style="width:100px;" id="add-layer-button-text-size" value="" />
                    <label class="description" >The size is in em, in this case 1em = 10px</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Text Color</th>
                <td>
                    <input class="regular-text minicolors" type="text" id="add-layer-button-text-color" value="" />
                    <label class="description" ></label>
                </td>
            </tr>

			<tr>
                <th scope="row">Background Color</th>
                <td>
                    <input class="regular-text minicolors_opacify" type="text" id="add-layer-button-background-color" value="" />
                    <label class="description" >Transparency option is available</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Hover Text Color</th>
                <td>
                    <input class="regular-text minicolors" type="text" id="add-layer-button-text-color-hover" value="" />
                    <label class="description" ></label>
                </td>
            </tr>

			<tr>
                <th scope="row">Hover Background Color</th>
                <td>
                    <input class="regular-text minicolors_opacify" type="text" id="add-layer-button-background-color-hover" value="" />
                    <label class="description" >Transparency option is available</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Border Color</th>
                <td>
                    <input class="regular-text minicolors" type="text" id="add-layer-button-border-color" value="" />
                    <label class="description" >Only work for border type of button</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Padding</th>
                <td>
                    <?php
                        $arr_data = array(
                            '0' => array(
                                'value' =>  'small',
                                'label' =>  'Small'
                            ),
                            '1' => array(
                                'value' =>  'medium',
                                'label' =>  'Medium'
                            ),
                            '3' => array(
                                'value' =>  'large',
                                'label' =>  'Large'
                            ),
                            '4' => array(
                                'value' =>  'custom',
                                'label' =>  'Custom'
                            )
                        );

                        $form_lib->print_select($arr_data,"add-layer-button-padding");
                    ?>
                    </div>

                    <label class="description">Select <b>"Custom"</b> to use <b>Custom Padding</b> below.</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Custom Padding</th>
                <td>
                    <input type="text" class="regular-text" id="add-layer-button-padding-custom" value="" />
                    <label class="description">[top]em [right]em [bottom]em [left]em</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Animation</th>
                <td>
                    <select id="add-layer-single-animation">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </td>
            </tr>
		</table>
	</div>

    <div id='opt-layer-button-3' class="media-frame-content group-layer">    
        <table>
            <tr valign="top">
                <td scope="row" colspan="2" style="padding-left:0px;">
                    <input type="checkbox" id="add-layer-button-youtube-popup" value="true">
                    <label><strong>Set Enable?</strong> &nbsp;&nbsp; This will override the hyperlink settings</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Embed Source</th>
                <td>
                    <input type="text" id="add-layer-button-youtube-source" placeholder="Put your source url here" value="" style="width:350px;">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">&nbsp;</th>
                <td id="add-layer-button-video-iframe-preview" width="300" height="180" style="padding-bottom:0px;"></td>
            </tr>
        </table>
    </div>
</div>

<!-- Add youtube / vimeo video -->
<div id='layer-modal-youtube' style="display:none;">
    <div class="media-frame-router">
        <div class="media-router sslider-layer-tabs">
            <a href='#opt-layer-youtube-1' class="media-menu-item active">Source</a>
            <a href='#opt-layer-youtube-2' class="media-menu-item">Dimension</a>
        </div>
    </div>
    
    <div id='opt-layer-youtube-1' class="media-frame-content group-layer">   
        <table>
            <tr valign="top">
                <th scope="row">Embed Source</th>
                <td>
                    <input type="text" id="add-layer-youtube-source" placeholder="Put your source url here" value="" style="width:100%;">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">&nbsp;</th>
                <td id="video-iframe-preview" width="490" height="220" style="padding-bottom:0px;"></td>
            </tr>
        </table>
    </div>

    <div id='opt-layer-youtube-2' class="media-frame-content group-layer">   
        <table>
            <tr>
                <th scope="row">Width</th>
                <td>
                    <input class="regular-text" type="number" id="add-layer-youtube-width" value="" />
                    <label class="description">This pixel size will be convert to em</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Height</th>
                <td>
                    <input class="regular-text" type="number" id="add-layer-youtube-height" value="" />
                    <label class="description">This pixel size will be convert to em</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Animation</th>
                <td>
                    <select id="add-layer-single-animation">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
</div>