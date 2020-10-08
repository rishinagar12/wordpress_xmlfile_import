<?php 

function convertPHPSizeToBytes($sSize)
{
    //
    $sSuffix = strtoupper(substr($sSize, -1));
    if (!in_array($sSuffix,array('P','T','G','M','K'))){
        return (int)$sSize;  
    } 
    $iValue = substr($sSize, 0, -1);
    switch ($sSuffix) {
        case 'P':
            $iValue *= 1024;
        case 'T':
            $iValue *= 1024;
        case 'G':
            $iValue *= 1024;
        case 'M':
            $iValue *= 1024;
        case 'K':
            $iValue *= 1024;
            break;
    }
    return (int)$iValue;
} 

$maxuploadfilesize = convertPHPSizeToBytes(ini_get("upload_max_filesize"));

$row_count=0;
    
    

   

    $error_messages = array();
    $file_path='';
    if(isset($_FILES['xmlfile']['name'])) {
        $xmlfilename = $_FILES['xmlfile']['name'];
        $xmlfiletemname = $_FILES['xmlfile']['tmp_name'];
        if(function_exists('wp_upload_dir')) {
            $upload_dir = wp_upload_dir();
            $upload_dir = $upload_dir['basedir'].'/xml_productfile';
        } else {
            $upload_dir = dirname(__FILE__).'/uploads';
        }

        if(!file_exists($upload_dir)) {
            $old_umask = umask(0);
            mkdir($upload_dir, 0755, true);
            umask($old_umask);
        }
        if(!file_exists($upload_dir)) {
            $error_messages[] = sprintf( __( 'Could not create upload directory %s.', 'erp-connect' ), $upload_dir );
        }

        $uploaded_file_ext = strtolower(pathinfo($xmlfilename, PATHINFO_EXTENSION));
        $filesize = $_FILES['xmlfile']['size'];
        $uploaded_file_path = $upload_dir.'/'.sanitize_title(basename($xmlfilename,'.'.$uploaded_file_ext)).'.'.$uploaded_file_ext;
        if ($maxuploadfilesize > $filesize) {
            
            if($uploaded_file_ext == 'xml') {

                if(move_uploaded_file($xmlfiletemname, $uploaded_file_path)) {
                    $file_path = $uploaded_file_path;
                } else {
                    $error_messages[] = sprintf( __( '%s returned false.', 'erp-connect' ), '<code>' . move_uploaded_file() . '</code>' );
                }

            } else {
                $error_messages[] = sprintf( __( 'The file extension %s is not allowed.', 'erp-connect' ), $uploaded_file_ext );
                
            }
        }else{
             $error_messages[] = sprintf( __( 'Max File Size Required.', 'erp-connect' ), ini_get("upload_max_filesize") );
        }
        
        
    }else{
        wp_redirect( 'admin.php?page=erp-connect' );
    }

    if($file_path) {
        //now that we have the file, grab contents
        $handle = fopen($file_path, 'r' );
        $import_data = array();
        $xmlStr = file_get_contents($file_path);
              $xml = new SimpleXMLElement($xmlStr);
              $xmlobject = get_object_vars($xml);
              $firstarrakey = array_keys($xmlobject)[0];
              $productdataarray = array();
              foreach($xml->$firstarrakey as $key=>$item){
                // $productdata[] = $item;
                $filedata = get_object_vars($item);
                $itemkey =  array_keys($filedata);
                $import_data[] = $filedata;
                //   $wpdb->query($sql_prep);
              }
              $header_row = $itemkey;
              $row_count = sizeof($import_data);
        

    }

    //'mapping_hints' should be all lower case
    //(a strtolower is performed on header_row when checking)
    $col_mapping_options = array(

        'do_not_import' => array(
            'label' =>'Do Not Import',
            'mapping_hints' => array()),
        
        'optgroup_general' => array(
            'optgroup' => true,
            'label' => 'General'),
        'id' => array(
            'mapping_hints' => array('id','_id','ID'),
            'label' => 'ID'),
        'post_title' => array(
            'label' =>'Name',
            'mapping_hints' => array('title', 'product name','vad_description')),
        '_sku' => array(
            'label' =>'SKU',
            'mapping_hints' => array('sku','vad_variant_code')),
        'post_content' => array(
            'label' =>'Description',
            'mapping_hints' => array('desc', 'content')),
        'post_excerpt' => array(
            'label' => 'Short Description',
            'mapping_hints' => array('short desc', 'excerpt')),

        'optgroup_status' => array(
            'optgroup' => true,
            'label' => 'Status and Visibility'),

        'post_status' => array(
            'label' =>'Status',
            'mapping_hints' => array('status', 'product status', 'post status')),
        'menu_order' => array(
            'label' => 'Menu Order',
            'mapping_hints' => array('menu order')),
        'visibility' => array(
            'label' => 'Visibility',
            'mapping_hints' => array('visibility', 'visible')),
        'featured' => array(
            'label' => 'Featured',
            'mapping_hints' => array('featured')),
        'stock' => array(
            'label' =>'Stock',
            'mapping_hints' => array('qty', 'quantity')),
        'stock_status' => array(
            'label' =>'Stock Status',
            'mapping_hints' => array('stock status', 'in stock')),
        'backorders' => array(
            'label' => 'Backorders',
            'mapping_hints' => array('backorders')),
        'manage_stock' => array(
            'label' => 'Manage Stock',
            'mapping_hints' => array('manage stock')),
        'comment_status' => array(
            'label' => 'Comment/Review Status',
            'mapping_hints' => array('comment status')),
        'ping_status' => array(
            'label' =>'Pingback/Trackback Status',
            'mapping_hints' => array('ping status', 'pingback status', 'pingbacks', 'trackbacks', 'trackback status')),

        'optgroup_pricing' => array(
            'optgroup' => true,
            'label' => 'Pricing, Tax, and Shipping'),

        'regular_price' => array(
            'label' => 'Regular Price',
            'mapping_hints' => array('price', '_price', 'msrp')),
        'sale_price' => array(
            'label' => 'Sale Price',
            'mapping_hints' => array()),
        'tax_status' => array(
            'label' => 'Tax Status',
            'mapping_hints' => array('tax status', 'taxable')),
        'tax_class' => array(
            'label' =>'Tax Class',
            'mapping_hints' => array()),
        'product_shipping_class_by_id' => array(
            'label' => 'Shipping Class By ID',
            'mapping_hints' => array()),
        'product_shipping_class_by_name' => array(
            'label' => 'Shipping Class By Name',
            'mapping_hints' => array('product_shipping_class', 'shipping_class', 'product shipping class', 'shipping class')),
        'weight' => array(
            'label' => 'Weight',
            'mapping_hints' => array('wt')),
        'length' => array(
            'label' => 'Length',
            'mapping_hints' =>array('1')),
        'width' => array(
            'label' =>'Width',
            'mapping_hints' => array('w')),
        'height' => array(
            'label' => 'Height',
            'mapping_hints' => array('h')),

        'optgroup_product_types' => array(
            'optgroup' => true,
            'label' => 'Special Product Types'),

        'downloadable' => array(
            'label' => 'Downloadable',
            'mapping_hints' => array('downloadable')),
        'virtual' => array(
            'label' => 'Virtual',
            'mapping_hints' => array('virtual')),
        'product_type' => array(
            'label' => 'Product Type',
            'mapping_hints' => array('product type', 'type')),
        'button_text' => array(
            'label' => 'Button Text',
            'mapping_hints' => array('button text')),
        'product_url' => array(
            'label' => 'Product URL',
            'mapping_hints' => array('product url', 'url')),
        'download_expiry' => array(
            'label' => 'Download Expiration',
            'mapping_hints' => array('download expiration', 'download expiry')),
        'download_limit' => array(
            'label' => 'Download Limit',
            'mapping_hints' => array('download limit', 'number of downloads')),

        'optgroup_taxonomies' => array(
            'optgroup' => true,
            'label' => 'Categories and Tags'),

        'product_cat_by_id' => array(
            'label' => 'Categories',
            'mapping_hints' => array('category', 'categories', 'product category', 'product categories', 'product_cat')),
        'product_tag_by_id' => array(
            'label' => 'Tags',
            'mapping_hints' => array('tag', 'tags', 'product tag', 'product tags', 'product_tag')),

        'optgroup_custom' => array(
            'optgroup' => true,
            'label' => 'Custom Attributes and Post Meta'),

        'custom_field' => array(
            'label' => 'Product Attribute',
            'mapping_hints' => array('custom field', 'custom')),

        'optgroup_images' => array(
            'optgroup' => true,
            'label' => 'Product Images'),

        'product_image_by_url' => array(
            'label' => 'Images',
            'mapping_hints' => array('image', 'images', 'image url', 'image urls', 'product image url', 'product image urls', 'product images')),
        'product_image_by_path' => array(
            'label' =>'Images Path',
            'mapping_hints' => array('image path', 'image paths', 'product image path', 'product image paths'))
    );

?>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $("select.map_to").change(function(){

            if($(this).val() == 'custom_field') {
                $(this).closest('th').find('.custom_field_settings').show(400);
            } else {
                $(this).closest('th').find('.custom_field_settings').hide(400);
            }

            if($(this).val() == 'product_image_by_url' || $(this).val() == 'product_image_by_path') {
                $(this).closest('th').find('.product_image_settings').show(400);
            } else {
                $(this).closest('th').find('.product_image_settings').hide(400);
            }

            if($(this).val() == 'post_meta') {
                $(this).closest('th').find('.post_meta_settings').show(400);
            } else {
                $(this).closest('th').find('.post_meta_settings').hide(400);
            }
        });

        //to show the appropriate settings boxes.
        $("select.map_to").trigger('change');

        $(window).resize(function(){
            $("#import_data_preview").addClass("fixed").removeClass("super_wide");
            $("#import_data_preview").css("width", "100%");

            var cell_width = $("#import_data_preview tbody tr:first td:last").width();
            if(cell_width < 60) {
                $("#import_data_preview").removeClass("fixed").addClass("super_wide");
                $("#import_data_preview").css("width", "auto");
            }
        });

        //set table layout
        $(window).trigger('resize');
    });
</script>

<div class="erpconnect_wrapper wrap">
    <div id="icon-tools" class="icon32"><br /></div>
    <h2><?php _e( 'ERP Connect &raquo; Preview', 'erp-connect' ); ?></h2>

    <?php if(sizeof($error_messages) > 0): ?>
        <ul class="import_error_messages">
            <?php foreach($error_messages as $message):?>
                <li><?php echo $message; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if($row_count > 0): ?>
        <form enctype="multipart/form-data" method="post" action="<?php echo get_admin_url().'admin.php?page=erp-connect&action=result'; ?>">
            <input type="hidden" name="uploaded_file_path" value="<?php echo htmlspecialchars($file_path); ?>">
            <input type="hidden" name="row_count" value="<?php echo $row_count; ?>">
            <input type="hidden" name="uploaded_file_ext" value="<?php echo $uploaded_file_ext; ?>">

            <p>
                <button class="button-primary" type="submit">Import</button>
            </p>

            <table id="import_data_preview" class="wp-list-table widefat fixed pages" cellspacing="0">
                <thead>
                        <tr class="header_row">
                            <th colspan="<?php echo sizeof($header_row); ?>"><?php _e( 'XML Header Row', 'erp-connect' ); ?></th>
                        </tr>
                        <tr class="header_row">
                            <?php foreach($header_row as $col): ?>
                                <th><?php echo htmlspecialchars($col); ?></th>
                            <?php endforeach; ?>
                        </tr>
                   
                    <tr>
                        <?php
                        $i = -1;
                            reset($import_data);
                            $first_row = current($import_data);
                            foreach($first_row as $key => $col):
                            $i++;
                        ?>
                            <th>
                                <div class="map_to_settings">Map to <select name="map_to[<?php echo $i; ?>]" class="map_to">
                                        <optgroup>
                                        <?php foreach($col_mapping_options as $value => $meta): ?>
                                            <?php if(array_key_exists('optgroup', $meta) && $meta['optgroup'] === true): ?>
                                                </optgroup>
                                                <optgroup label="<?php echo $meta['label']; ?>">
                                            <?php else: ?>
                                                <option value="<?php echo $value; ?>" <?php
                                                    
                                                        $header_value = strtolower($header_row[$i]);
                                                        if( $header_value == strtolower($value) ||
                                                            $header_value == strtolower($meta['label']) ||
                                                            in_array($header_value, $meta['mapping_hints']) ) {

                                                            echo 'selected="selected"';
                                                        }
                                                    
                                                ?>><?php echo $meta['label']; ?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="custom_field_settings field_settings">
                                    <h4>Custom Field Settings</h4>                                    <p>
                                        <label for="custom_field_name_<?php echo $i; ?>">Name</label>
                                        <input type="text" name="custom_field_name[<?php echo $i; ?>]" id="custom_field_name_<?php echo $i; ?>" value="<?php echo $header_row[$i]; ?>" />
                                    </p>
                                    <p>
                                        <input type="checkbox" name="custom_field_visible[<?php echo $i; ?>]" id="custom_field_visible_<?php echo $i; ?>" value="1" checked="checked" />
                                        <label for="custom_field_visible_<?php echo $i; ?>">Visible</label>
                                    </p>
                                </div>
                                <div class="product_image_settings field_settings">
                                    <h4>Image Settings</h4>
                                    <p>
                                        <input type="checkbox" name="product_image_set_featured[<?php echo $i; ?>]" id="product_image_set_featured_<?php echo $i; ?>" value="1" checked="checked" />
                                        <label for="product_image_set_featured_<?php echo $i; ?>"><?php _e( 'Set First Image as Featured', 'erp-connect' ); ?></label>
                                    </p>
                                    <p>
                                        <input type="checkbox" name="product_image_skip_duplicates[<?php echo $i; ?>]" id="product_image_skip_duplicates_<?php echo $i; ?>" value="1" checked="checked" />
                                        <label for="product_image_skip_duplicates_<?php echo $i; ?>"><?php _e( 'Skip Duplicate Images', 'erp-connect' ); ?></label>
                                    </p>
                                </div>
                                <div class="post_meta_settings field_settings">
                                    <h4>Post Meta Settings</h4>
                                    <p>
                                        <label for="post_meta_key_<?php echo $i; ?>">'Meta Key'</label>
                                        <input type="text" name="post_meta_key[<?php echo $i; ?>]" id="post_meta_key_<?php echo $i; ?>" value="<?php echo $header_row[$i]; ?>" />
                                    </p>
                                </div>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($import_data as $row_id => $row): ?>
                        <tr>
                            <?php foreach($row as $col): ?>
                                <td><?php echo htmlspecialchars($col); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    <?php endif; ?>
</div>