<?php

/** 
 * Prints the box content 
 */
function sslider_configuration_callback( $post ) 
{
    $form_lib = new tonjooFormLibrary();
    
    // Use nonce for verification
    wp_nonce_field(SANGAR_SLIDER, 'sslider_noncename');

    $config = get_post_meta($post->ID, 'sslider_config',true);
    $config = unserialize(base64_decode($config));
    $config = ssliderDefault::config($config);

    $boolean = array(                                  
        '0' => array(
            'value' =>  'true',
            'label' =>  'Yes' 
        ),
        '1' => array(
            'value' =>  'false',
            'label' =>  'No'
        )
    );

    $mobileDimension = array(                                  
        '0' => array(
            'value' =>  'false',
            'label' =>  'Same as default base dimension' 
        ),
        '1' => array(
            'value' =>  'true',
            'label' =>  'Use custom size'
        )
    );

    $parallaxType = array(                                  
        '0' => array(
            'value' =>  'off',
            'label' =>  'Disable parallax'            
        ),
        '1' => array(
            'value' =>  'all',
            'label' =>  'Enable on both of desktop and mobile'
        ),
        '2' => array(
            'value' =>  'desktop',
            'label' =>  'Enable on desktop only' 
        )
    );

    $parallaxSpeed = array(                                  
        '0' => array(
            'value' =>  '1',
            'label' =>  'Fast' 
        ),
        '1' => array(
            'value' =>  '1.5',
            'label' =>  'Normal'
        ),
        '2' => array(
            'value' =>  '2',
            'label' =>  'Slow'
        ),
        '3' => array(
            'value' =>  '3',
            'label' =>  'Slower'
        )
    );

?>
    <!-- Default Config -->
    <span id="sslider-default-config" style="display:none;">
        <?php
            $default = ssliderDefault::config();
            $templates = apply_filters('sangar_slider_templates',array());

            $all_config['default'] = $default;
            $all_config['templates'] = $templates;

            echo json_encode($all_config);
        ?>
    </span>

    <!-- Is Preview -->
    <input style="display:none;" type="hidden" name="config[is_preview]" value="<?php echo $config['is_preview'] ?>" />
    <input style="display:none;" type="hidden" id="is_preview_saved" value="true" />
    
    <!-- Custom CSS -->
    <textarea id="temp_custom_css" style="display:none;"></textarea>
    <textarea name="config[custom_css]" style="display:none;"><?php echo stripslashes($config['custom_css']) ?></textarea>
    <div id="sslider-custom-css" class="sslider-full-modal" title="Custom CSS" style="display:none;">
        <div class="modal-footer-label">
            <p>
                <code>[ss-id]</code> will replaced with <code>.sangar-slider-<?php echo $post->ID ?>.sangar-slideshow-container</code>,
                <br/><code>[ss-dir]</code> will replaced with sangar slider plugin directory.
            </p>
        </div>
        <textarea id="sslider-custom-css-field"></textarea>
    </div>

    <!-- Dimension -->
    <div class="meta-box-sortables ui-sortable">
    <div class="settings-container" >
    <div class="widgets-holder-wrap accordion-config-one closed">
    <div class="sidebar-name">
        <div class="sidebar-name-arrow"></div>
        <h3>Slideshow Options</h3>
    </div>
    <div class="sidebar-content widgets-sortables no-padding clearfix">

        <div class="sslider_row">
            <p class="label"><label>Slider Base Width</label></p>
            <input type="number" name="config[width]" value="<?php echo $config['width'] ?>">
        </div>

        <div class="sslider_row">
            <p class="label"><label>Slider Base Height</label></p>
            <input type="number" name="config[height]" value="<?php echo $config['height'] ?>">
        </div>

        <div class="sslider_row">
            <p class="label"><label>Display Panel</label></p>
            <?php 
                $arr_data = array(                                  
                    '0' => array(
                        'value' =>  'autohide',
                        'label' =>  'Autohide' 
                    ),
                    '1' => array(
                        'value' =>  'show',
                        'label' =>  'Show'
                    ),
                    '2' => array(
                        'value' =>  'hide',
                        'label' =>  'Hide'
                    )
                );

                $form_lib->print_select($arr_data,"config[panelDisplay]",$config['panelDisplay'], "data-old='{$config['panelDisplay']}'");
            ?>
        </div>

        <div class="sslider_row" style="text-align:right;">
            <a href="javascript:;" sslider-advanced-config class="button">More Options</a>
        </div>

    </div>
    </div>
    </div>
    </div>


    <!-- Themes And Templates -->
    <div class="meta-box-sortables ui-sortable">
    <div class="settings-container" >
    <div class="widgets-holder-wrap accordion-config-one"> <!-- can be: exclude locked -->
    <div class="sidebar-name">
        <div class="sidebar-name-arrow"></div>
        <h3>Themes And Templates</h3>
    </div>
    <div class="sidebar-content widgets-sortables no-padding clearfix">
    
        <div class="sslider_row">
            <p class="label"><label>Themes</label></p>

            <span style="display:none;" id="onloaded_slider_theme"><?php echo $config['themeClass'] ?></span>
            
            <?php 
                $arr_data = array(                                  
                    '0' => array(
                        'value' =>  'default',
                        'label' =>  'Default' 
                    ),
                    '1' => array(
                        'value' =>  'dark',
                        'label' =>  'Dark'
                    ),
                    '2' => array(
                        'value' =>  'light',
                        'label' =>  'Light'
                    )
                );

                $form_lib->print_select($arr_data,"config[themeClass]",$config['themeClass'], "data-old='{$config['themeClass']}'");
            ?>
        </div>

        <div class="sslider_row">
            <p class="label"><label>Templates</label></p>
            <div id="sslider-thumb-templates-container">
                <div id="sslider-thumb-templates">
                    <?php 
                        $templates = apply_filters('sangar_slider_templates',array());
                        $arr_data = array();
                        
                        foreach ($templates as $key => $value) 
                        {
                            $thumbnail = str_replace('-', '_', $key);
                            $path = SANGAR_SLIDER_DIR_PATH."sangar-core/assets/images/template/$thumbnail.png";
                            $selected = $key == $config['template'] ? 'active' : '';

                            if(file_exists($path)) 
                            {
                                $thumbnail = SANGAR_SLIDER_DIR_URL."sangar-core/assets/images/template/$thumbnail.png";
                            }
                            else 
                            {
                                $thumbnail = SANGAR_SLIDER_DIR_URL."sangar-core/assets/images/template/no_thumb.png";
                            }

                            echo "<div class='sslider-template $selected'>";
                            echo "<a href='javascript:;' data-template='$key' title='{$value['name']}'><img src='$thumbnail'></a>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
                
            <?php 
                $templates = apply_filters('sangar_slider_templates',array());
                $arr_data = array();
                
                foreach ($templates as $key => $value) 
                {
                    $template['value'] = $key;
                    $template['label'] = $value['name'];

                    // theme
                    if(! empty($value['themesAvailable']) && is_array($value['themesAvailable']))
                    {
                        $theme = '';

                        foreach ($value['themesAvailable'] as $key_theme => $value_theme) 
                        {
                            $theme.= '"'. $value_theme .'"'. ',';
                        }

                        $theme = rtrim($theme, ",");
                        $template['attr'] = "data-theme=[".$theme."]";
                    }

                    $arr_data[] = $template;
                }

                $form_lib->print_select($arr_data,"config[template]",$config['template'], "data-old='{$config['template']}' style='display:none;'");
            ?>                
        </div>
    </div>
    </div>
    </div>
    </div>


    <!-- Advanced Settings Modal -->
    <div id='sslider-conf-settings-container'></div>

    <div id='sslider-conf-settings' title="More Options" style="display:none;">
        <div class="media-frame-router">
            <div class="media-router sslider-conf-tabs">
                <a href='#opt-conf-1' class="media-menu-item active">Slider Scaling</a>                
                <a href='#opt-conf-2' class="media-menu-item">Mobile</a>
                <a href='#opt-conf-3' class="media-menu-item">Animation</a>
                <a href='#opt-conf-4' class="media-menu-item">Timer</a>
                <a href='#opt-conf-5' class="media-menu-item">Navigation</a>
                <a href='#opt-conf-6' class="media-menu-item">Panel</a>
                <a href='#opt-conf-7' class="media-menu-item">Parallax</a>                                
                <a href='#opt-conf-8' class="media-menu-item">Behaviour & Others</a>                                
            </div>
        </div>

        <table class="table-content">

        <!-- Slider Scaling -->   
        <thead id="opt-conf-1" class="media-frame-content group-conf">

            <tr valign="top">
                <th scope="row">Full Width</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[fullWidth]",$config['fullWidth']); ?>
                    <label class="description">Resize the slideshow to full width based on container width</label>
                <td>
            </tr>

            <tr valign="top">
                <th scope="row">Full Height</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[fullHeight]",$config['fullHeight']); ?>
                    <label class="description">Resize the slideshow to full height based on web browser height, exclude the top position</label>                
                </td>
            </tr>

            <tr valign="top" class="attr-fullHeight-true">
                <th scope="row">Percentage Of Full Height</th>
                <td>
                    <input type="number" name="config[fullHeightPercentage]" value="<?php echo $config['fullHeightPercentage'] ?>">
                    <label class="description">Full height in percent, work if full height option is true</label>
                </td>
            </tr>

            <tr valign="top" class="attr-fullHeight-false">
                <th scope="row">Minimum Height</th>
                <td>
                    <input type="number" name="config[minHeight]" value="<?php echo $config['minHeight'] ?>">
                </td>
            </tr>

            <tr valign="top" class="attr-fullHeight-false">
                <th scope="row">Maximum Height</th>
                <td>                
                    <input type="number" name="config[maxHeight]" value="<?php echo $config['maxHeight'] ?>">
                    <label class="description">Set to 0 (zero) to make it unlimited max height</label>
                </td>
            </tr>

        </thead>


        <!-- Mobile Layer -->
        <thead id="opt-conf-2" class="media-frame-content group-conf">

            <tr valign="top">
                <th scope="row">Mobile Treshold</th>
                <td>
                    <input type="number" name="config[mobileTreshold]" value="<?php echo $config['mobileTreshold'] ?>">
                    <label class="description">Width dimension treshold between desktop and mobile mode</label>
                </td>
            </tr>

            <tr valign="top" class="mobileDimensionSelection">
                <th scope="row">Mobile Dimension</th>
                <td>
                    <?php $form_lib->print_select($mobileDimension,"config[mobileDimension]",$config['mobileDimension']); ?>
                </td>
            </tr>

            <tr valign="top" class="custom-mobile-size">
                <th scope="row">Mobile Width</th>
                <td>
                    <input type="number" name="config[mobileWidth]" value="<?php echo $config['mobileWidth'] ?>">
                </td>
            </tr>

            <tr valign="top" class="custom-mobile-size">
                <th scope="row">Mobile Height</th>
                <td>
                    <input type="number" name="config[mobileHeight]" value="<?php echo $config['mobileHeight'] ?>">
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Mobile Full Content Box</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[mobileFullContentBox]",$config['mobileFullContentBox']); ?>
                    <label class="description">Works on standart mode slide</label>
                </td>
            </tr>

        </thead>


        <!-- Animation -->
        <thead id="opt-conf-3" class="media-frame-content group-conf">

            <tr valign="top">
                <th scope="row">Fade Animation</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[fadeAnimation]",$config['fadeAnimation']); ?>
                    <label class="description">Use fade animation transition instead of slide animation</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Animation Speed</th>
                <td>
                    <input type="number" name="config[animationSpeed]" value="<?php echo $config['animationSpeed'] ?>">
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Time Between Transitions</th>
                <td>
                    <input type="number" name="config[advanceSpeed]" value="<?php echo $config['advanceSpeed'] ?>">
                </td>
            </tr>

        </thead>


        <!-- Auto Play a.k.a Timer -->
        <thead id="opt-conf-4" class="media-frame-content group-conf">

            <tr valign="top">
                <th scope="row">Auto Play</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[timer]",$config['timer']); ?>
                    <label class="description">
                        Activate this option will disable the panel's <b>pause button</b> behaviour.
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Pause on hover</th>                
                <td>
                    <?php $form_lib->print_select($boolean,"config[pauseOnHover]",$config['pauseOnHover']); ?>
                    <label class="description">
                        Work on Auto Play mode.
                    </label>
                </td>
            </tr>

            <tr valign="top" style="display:none;">
                <th scope="row">Start on mouse out</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[startClockOnMouseOut]",$config['startClockOnMouseOut']); ?>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Play Timer After Mouse Out</th>
                <td>
                    <input type="number" name="config[startClockOnMouseOutAfter]" value="<?php echo $config['startClockOnMouseOutAfter'] ?>">
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Timer Animation</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[timerAnimation]",$config['timerAnimation']); ?>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Timer Animation Color</th>
                <td>
                    <input type="text" class="regular-text minicolors" name="config[timerColor]" value="<?php echo $config['timerColor'] ?>">
                    <label class="description">
                        Located at the most top of slideshow <br />
                        Leave it blank will make it styled with theme
                    </label>
                </td>
            </tr>

        </thead>


        <!-- Directional Navigation -->
        <thead id="opt-conf-5" class="media-frame-content group-conf">

            <tr valign="top">
                <th scope="row">Navigation</th>
                <td>
                    <?php 
                        $arr_data = array(                                  
                            '0' => array(
                                'value' =>  'autohide',
                                'label' =>  'Autohide' 
                            ),
                            '1' => array(
                                'value' =>  'show',
                                'label' =>  'Always Show'
                            ),
                            '2' => array(
                                'value' =>  'none',
                                'label' =>  'Always Hide'
                            )
                        );

                        $form_lib->print_select($arr_data,"config[directionalNav]",$config['directionalNav']);
                    ?>
                </td>                
            </tr>

            <tr class="sslider_row nav-autohide-attr">
                <th scope="row">Show Opacity (0 to 1)</th>
                <td>
                    <input type="number" step="0.1" max='1' min='0' name="config[directionalNavShowOpacity]" value="<?php echo $config['directionalNavShowOpacity'] ?>">
                </td>
            </tr>

            <tr class="sslider_row nav-autohide-attr">
                <th scope="row">Hide Opacity (0 to 1)</th>
                <td>
                    <input type="number" step="0.1" max='1' min='0' name="config[directionalNavHideOpacity]" value="<?php echo $config['directionalNavHideOpacity'] ?>">
                </td>                
            </tr>

            <tr valign="top">
                <th scope="row">Pagination Width</th>
                <td>
                    <input type="number" name="config[paginationContentWidth]" value="<?php echo $config['paginationContentWidth'] ?>">
                    <label class="description">Only affect on text pagination templates</label>
                </td>
            </div>

            <tr valign="top">
                <th scope="row">Pagination Outside</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[paginationContentOutside]",$config['paginationContentOutside']); ?>
                    <label class="description">The pagination are inside or outside slideshow</label>
                    <label class="description">Only affect on text and image pagination templates</label>
                </td>
            </div>

        </thead>


        <!-- Panel -->
        <thead id="opt-conf-6" class="media-frame-content group-conf">
        
            <tr valign="top">
                <th scope="row">Display Number</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[panelNumber]",$config['panelNumber']); ?>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Content Pagination Autohide</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[panelContentPaginationAutohide]",$config['panelContentPaginationAutohide']); ?>
                    <label class="description">Image and text pagination will autohide on start</label>
                </td>
            </tr>

        </thead>


        <!-- Behaviour -->
        <thead id="opt-conf-7" class="media-frame-content group-conf">
        
            <tr valign="top">
                <th scope="row">Parallax</th>
                <td>
                    <?php $form_lib->print_select($parallaxType,"config[parallax]",$config['parallax']); ?>
                    <label class="description">Enable parallax effect for barckground images</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Parallax Speed</th>
                <td>
                    <?php $form_lib->print_select($parallaxSpeed,"config[parallaxSpeed]",$config['parallaxSpeed']); ?>
                </td>
            </tr>

        </thead>


        <!-- Colors -->
        <thead id="opt-conf-8" class="media-frame-content group-conf">
            
            <tr valign="top">
                <th scope="row">Loading Each Content</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[loadingEachContent]",$config['loadingEachContent']); ?>
                    <label class="description">Do loading each content after slide images is loaded</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Continous Sliding</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[continousSliding]",$config['continousSliding']); ?>
                    <label class="description">Not affect on carousel and fade templates</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Video Next On Ended</th>
                <td>
                    <?php $form_lib->print_select($boolean,"config[html5VideoNextOnEnded]",$config['html5VideoNextOnEnded']); ?>
                    <label class="description">Work on HTML5 video</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Background Color</th>
                <td>
                    <input type="text" class="regular-text minicolors" name="config[background]" value="<?php echo $config['background'] ?>">
                    <label class="description">Base background color, appear when slideshow is loading</label>
                </td>
            </tr>

        </thead>

        </table>

    </div>

<?php 

}