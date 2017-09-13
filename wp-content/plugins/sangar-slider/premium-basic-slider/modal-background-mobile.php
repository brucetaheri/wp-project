<thead>
    <tr valign="top">
        <th>Enable Mobile Background ?</th>
        <td>
            <?php 
                $boolean_arr_data = array(
                    '0' => array(
                        'value' =>  'false',
                        'label' =>  'Disable'
                    ),
                    '1' => array(
                        'value' =>  'true',
                        'label' =>  'Enable' 
                    )
                );

                $form_lib->print_select($boolean_arr_data,"tab-bg-mobile-enabled","false");
            ?>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr valign="top">
        <th>Background Image</th>
        <td>
            <?php $wpMediaUploader = new wpMediaUploader('tab-bg-mobile-image','image') ?>
        </td>
        <td>&nbsp;</td>
    </tr>
</thead>