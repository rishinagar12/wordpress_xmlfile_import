<?php 

$col_mapping_options = array(

        'do_not_import' => array(
            'label' =>'Do Not Import',
            'mapping_hints' => array()),
        'id' => array(
            'mapping_hints' => array('id','_id','ID'),
            'label' => 'ID'),
        'post_title' => array(
            'label' =>'Name',
            'mapping_hints' => array('title', 'product name','vad_description')),
        '_sku' => array(
            'label' =>'SKU',
            'mapping_hints' => array('SKU','sku','vad_variant_code')),
        'post_content' => array(
            'label' =>'Description',
            'mapping_hints' => array('desc', 'content')),
        'post_excerpt' => array(
            'label' => 'Short Description',
            'mapping_hints' => array('short desc', 'excerpt')),
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
        'regular_price' => array(
            'label' => 'Regular Price',
            'mapping_hints' => array('price', '_price', 'msrp','vafp_price_per')),
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
        'product_cat_by_id' => array(
            'label' => 'Categories',
            'mapping_hints' => array('category', 'categories', 'product category', 'product categories', 'product_cat')),
        'product_tag_by_id' => array(
            'label' => 'Tags',
            'mapping_hints' => array('tag', 'tags', 'product tag', 'product tags', 'product_tag')),
        'custom_field' => array(
            'label' => 'Product Attribute',
            'mapping_hints' => array('custom field', 'custom')),
        'product_image_by_url' => array(
            'label' => 'Images',
            'mapping_hints' => array('image', 'images', 'image url', 'image urls', 'product image url', 'product image urls', 'product images')),
        'product_image_by_path' => array(
            'label' =>'Images Path',
            'mapping_hints' => array('image path', 'image paths', 'product image path', 'product image paths'))
    );
	$new_post = array();
    $new_post_defaults = array();
    $new_post_terms = array();
	$new_post_custom_fields = array();
	$new_post_custom_field_count = 0;
	$new_post_image_urls = array();
	$new_post_image_paths = array();
	$new_post_errors = array();
	$new_post_messages = array();
	$new_post_insert_success = false;
    $new_post_defaults['post_type'] = 'product';
    $new_post_defaults['post_status'] = 'publish';
    $new_post_defaults['post_title'] = '';
    $new_post_defaults['post_content'] = '';
    $new_post_defaults['menu_order'] = 0;
 	$new_post_meta = array();
 	$post_metadata_defaults = array();
 	$post_metadata_defaults['visibility'] = 'visible';
 	$post_metadata_defaults['featured'] = 'no';
 	$post_metadata_defaults['weight'] = 0;
 	$post_metadata_defaults['length'] = 0;
 	$post_metadata_defaults['width'] = 0;
 	$post_metadata_defaults['height'] = 0;
 	$post_metadata_defaults['_sku'] = '';
 	$post_metadata_defaults['stock'] = '';
 	$post_metadata_defaults['sale_price'] = '';
 	$post_metadata_defaults['sale_price_dates_from'] = '';
 	$post_metadata_defaults['sale_price_dates_to'] = '';
 	$post_metadata_defaults['tax_status'] = 'taxable';
 	$post_metadata_defaults['tax_class'] = '';
 	$post_metadata_defaults['purchase_note'] = '';
 	$post_metadata_defaults['downloadable'] = 'no';
 	$post_metadata_defaults['virtual'] = 'no';
 	$post_metadata_defaults['backorders'] = 'no';
	$error_messages = array();
	$temp_file_path = '/var/www/vhosts/devportal.guzzbury.com/httpdocs/wordpress/wp-content/uploads/xml_productfile/data_detail.xml';
	$importxmlfile_data = array();
    $xmlStr = file_get_contents($temp_file_path);
    $xml = new SimpleXMLElement($xmlStr);
    $xmlobject = get_object_vars($xml);
    $firstarrakey = array_keys($xmlobject)[0];
    $productdataarray = array();
    foreach($xml->$firstarrakey as $key=>$item){
    $filedata = get_object_vars($item);
    $headerdata =  array_keys($filedata);
    $importxmlfile_data[] = $filedata;
    }
    if(sizeof($importxmlfile_data) == 0) {
        $error_messages[] ='No data found in XML file.';
    }else{
    
	    // print_r($map_to);
	    $j=-1;
	    foreach($importxmlfile_data as $key => $xmlfile_data) {
	    	 $j++;
            foreach($xmlfile_data as $xmkey => $col) {
               
                $movtovalue=array();
                foreach($col_mapping_options as $mapkey => $meta){

					if (count($meta['mapping_hints'])>0) {
						if ((strtolower($mapkey)==strtolower($xmkey))||(strtolower($meta['label'])==strtolower($xmkey))||(in_array(strtolower($xmkey), $meta['mapping_hints']))) {
				    	 	$movtovalue[] = $mapkey; 
				    	 }else{

				    	 }
					}else{
						if ((strtolower($mapkey)==strtolower($xmkey))||(strtolower($meta['label'])==strtolower($xmkey))) {
				    	 $movtovalue[] = $mapkey; 
				    	}
					}
		    }
		    if (count($movtovalue)!=0) {
		    	$map_to = $movtovalue[0];
		    }else{
		    	$map_to = 'do_not_import';
		    }
                
                switch($map_to) {
                    case 'downloadable':
                    case 'virtual':
                    case 'manage_stock':
                    case 'featured':
                        if(!in_array($col, array('yes', 'no'))) continue 2;
                        break;
                    case 'comment_status':
                    case 'ping_status':
                        if(!in_array($col, array('open', 'closed'))) continue 2;
                        break;
                    case 'visibility':
                        if(!in_array($col, array('visible', 'catalog', 'search', 'hidden'))) continue 2;
                        break;
                    case 'stock_status':
                        if(!in_array($col, array('instock', 'outofstock'))) continue 2;
                        break;
                    case 'backorders':
                        if(!in_array($col, array('yes', 'no', 'notify'))) continue 2;
                        break;
                    case 'tax_status':
                        if(!in_array($col, array('taxable', 'shipping', 'none'))) continue 2;
                        break;
                    case 'product_type':
                        if(!in_array($col, array('simple', 'variable', 'grouped', 'external'))) continue 2;
                        break;
                }
                switch($map_to) {

                    case 'post_title':
                    case 'post_content':
                    case 'post_excerpt':
                    case 'post_status':
                    case 'comment_status':
                    case 'ping_status':
                        $new_post[$map_to] = $col;
                        break;
                    case 'menu_order':
                        $col_value = preg_replace("/[^0-9]/", "", $col);
                        if($col_value == "") continue 2;
                        $new_post[$map_to] = $col_value;
                        break;
                    case 'stock':
                    case 'download_expiry':
                    case 'download_limit':
                        $col_value = preg_replace("/[^0-9]/", "", $col);
                        if($col_value == "") continue 2;
                        $new_post_meta[$map_to] = $col_value;
                        break;
                    case 'weight':
                    case 'length':
                    case 'width':
                    case 'height':
                    case 'regular_price':
                    case 'sale_price':
                    	$col_value = preg_replace("/[^0-9.]/", "", $col);
                        if($col_value == "") continue 2;
                        $new_post_meta[$map_to] = $col_value;
                        break;
                    case '_sku':
                        $col_value = trim($col);
                        if($col_value == "") continue 2;
                        $new_post_meta[$map_to] = $col_value;
                        break;
                    case 'file_path':
                    case 'file_paths':
                        if(!is_array($new_post_meta['file_paths'])) $new_post_meta['file_paths'] = array();
                        $new_post_meta['_file_paths'][md5($col)] = $col;
                        break;
                    case 'tax_status':
                    case 'tax_class':
                    case 'visibility':
                    case 'featured':
                    case 'downloadable':
                    case 'virtual':
                    case 'stock_status':
                    case 'backorders':
                    case 'manage_stock':
                    case 'button_text':
                    case 'product_url':
                    $new_post_meta[$map_to] = $col;
                        break;
                    case 'post_meta':
                        $new_post_meta[$post_data['post_meta_key'][$key]] = $col;
                        break;
                    case 'product_type':
                        $new_post_meta[$map_to] = $col;
                        $term_name = $col;
                        $tax = 'product_type';
                        $term = get_term_by('name', $term_name, $tax, 'ARRAY_A');
                        if(is_array($term)) {
                            $new_post_terms[$tax][] = intval($term['term_id']);
                        }
                        break;
                    case 'product_cat_by_name':
                    case 'product_tag_by_name':
                    case 'product_shipping_class_by_name':
                        $tax = str_replace('by_name', '', $map_to);
                        $term_paths = explode('|', $col);
                        foreach($term_paths as $term_path) {
                            $term_names = explode($post_data['import_xml_hierarchy_separator'], $term_path);
                            $term_ids = array();
                            for($depth = 0; $depth < count($term_names); $depth++) {
                                $term_parent = ($depth > 0) ? $term_ids[($depth - 1)] : '';
                                $term = term_exists($term_names[$depth], $tax, $term_parent);
                                if( $term === false || $term === 0 || $term === null) {
                                    $insert_term_args = ($depth > 0) ? array('parent' => $term_ids[($depth - 1)]) : array();
                                    $term = wp_insert_term($term_names[$depth], $tax, $insert_term_args);
                                    delete_option("{$tax}_children");
                                }
                                if(is_array($term)) {
                                    $term_ids[$depth] = intval($term['term_id']);
                                } else {
                                    $new_post_errors[] = "Couldn't find or create {$tax} with path {$term_path}.";
                                    break;
                                }
                            }
                            if(array_key_exists(count($term_names) - 1, $term_ids)) {
                                $new_post_terms[$tax][] = $term_ids[(count($term_names) - 1)];
                            }
                        }
                        break;
                    case 'product_cat_by_id':
                    case 'product_tag_by_id':
                    case 'product_shipping_class_by_id':
                        $tax = str_replace('by_id', '', $map_to);
                        $term_ids = explode('|', $col);
                        foreach($term_ids as $term_id) {
                            $term = term_exists($term_id, $tax);
                            if(is_array($term)) {
                                $new_post_terms[$tax][] = intval($term['term_id']);
                            } else {
                                $new_post_errors[] = "Couldn't find {$tax} with ID {$term_id}.";
                            }

                        }
                        break;

                    case 'custom_field':
                        $field_name = trim($post_data['custom_field_name'][$key]);
                        $visible = intval($post_data['custom_field_visible'][$key]);
                        $value = $col;
                        $product_attr = null;

                        foreach($attribute_taxonomies as $attr){
                            if (! is_object($attr)) continue;
                            if (strtolower($field_name) === strtolower($attr->attribute_name) &&
                                taxonomy_exists( $woocommerce->attribute_taxonomy_name( $attr->attribute_name))){
                                $product_attr = $attr;
                                break;
                            } 
                        }

                        if (! is_null($product_attr)){  
                            $field_name = $woocommerce->attribute_taxonomy_name($product_attr->attribute_name);
                            $value = '';
                            $terms = explode('|', $col); 
                            foreach($terms as $t) {
                                $term = term_exists($t, $field_name);
                                if( $term === false || $term === 0 || $term === null) {
                                    $t = $product_attr->attribute_type === 'select' ? sanitize_title($t) : stripslashes(strip_tags($t));
                                    $term = wp_insert_term($t, $field_name);
                                }

                                if(is_array($term)){
                                    $new_post_terms[$field_name][] = intval($term['term_id']);
                                }
                                else {
                                    $new_post_errors[] = "Couldn't find or create {$field_name} with path {$term_path}.";
                                    break;
                                }
                            }
                        }

                        $new_post_custom_fields[sanitize_title($field_name)] = array (
                            "name" => woocommerce_clean($field_name), 
                            "value" => $value, 
                            "position" => $new_post_custom_field_count++,
                            "is_visible" => $visible,
                            "is_variation" => 0,
                            "is_taxonomy" => ! is_null($product_attr) 
                        );
                        break;

                    case 'product_image_by_url':
                        $image_urls = explode('|', $col);
                        if(is_array($image_urls)) {
                            $new_post_image_urls = array_merge($new_post_image_urls, $image_urls);
                        }

                        break;

                    case 'product_image_by_path':
                        $image_paths = explode('|', $col);
                        if(is_array($image_paths)) {
                            foreach($image_paths as $image_path) {
                                $new_post_image_paths[] = array(
                                    'path' => $image_path,
                                    'source' => $image_path
                                );
                            }
                        }

                        break;
                }

            }
            $new_post_meta['price'] = array_key_exists('sale_price', $new_post_meta) ? $new_post_meta['sale_price'] : $new_post_meta['regular_price'];

            if(array_key_exists('stock', $new_post_meta)) {
                if(!array_key_exists('manage_stock', $new_post_meta)) {
                    $new_post_meta['manage_stock'] = 'yes';
                }
                if(!array_key_exists('stock_status', $new_post_meta)) {
                    $new_post_meta['stock_status'] = (intval($new_post_meta['stock']) > 0) ? 'instock' : 'outofstock';
                }

            } else {
                if(!array_key_exists('manage_stock', $new_post_meta)) $new_post_meta['manage_stock'] = 'no';
            }
            $existing_product = null;
            if(array_key_exists('_sku', $new_post_meta) && !empty($new_post_meta['_sku']) > 0) {
                $existing_post_query = array(
                    'numberposts' => 1,
                    'meta_key' => '_sku',
                    'meta_query' => array(
                        array(
                            'key'=>'_sku',
                            'value'=> $new_post_meta['_sku'],
                            'compare' => '='
                        )
                    ),
                    'post_type' => 'product');
                
                $existing_posts = get_posts($existing_post_query);
                if(is_array($existing_posts) && sizeof($existing_posts) > 0) {
                    $existing_product = array_shift($existing_posts);
                }
            }
            if(strlen($new_post['post_title']) > 0 || $existing_product !== null) {

                //insert/update product
                if($existing_product !== null) {
                    $new_post_messages[] = sprintf('Updating product with ID %s.', $existing_product->ID );
                    $new_post['ID'] = $existing_product->ID;
                    $new_post_id = wp_update_post($new_post);
                } else {
                    $new_post = array_merge($new_post_defaults, $new_post);
                    $new_post_meta = array_merge($post_metadata_defaults, $new_post_meta);

                    $new_post_id = wp_insert_post($new_post, true);
                }

                if(is_wp_error($new_post_id)) {
                    $new_post_errors[] = sprintf('Couldn\'t insert product with name %s.', $new_post['post_title'] );
                } elseif($new_post_id == 0) {
                    $new_post_errors[] = sprintf('Couldn\'t update product with ID %s.', $new_post['ID'] );
                } else {
                    $new_post_insert_success = true;
                    foreach($new_post_meta as $meta_key => $meta_value) {
                        add_post_meta($new_post_id, $meta_key, $meta_value, true) or
                            update_post_meta($new_post_id, $meta_key, $meta_value);
                    }
                    if($existing_product !== null) {
                        $existing_product_attributes = get_post_meta($new_post_id, '_product_attributes', true);
                        if(is_array($existing_product_attributes)) {
                            //set the 'position' value for all *new* attributes.
                            $max_position = 0;
                            foreach($existing_product_attributes as $field_slug => $field_data) {
                                $max_position = max(intval($field_data['position']), $max_position);
                            }
                            foreach($new_post_custom_fields as $field_slug => $field_data) {
                                if(!array_key_exists($field_slug, $existing_product_attributes)) {
                                    $new_post_custom_fields[$field_slug]['position'] = ++$max_position;
                                }
                            }
                            $new_post_custom_fields = array_merge($existing_product_attributes, $new_post_custom_fields);
                        }
                    }
                    add_post_meta($new_post_id, 'product_attributes', $new_post_custom_fields, true) or
                        update_post_meta($new_post_id, 'product_attributes', $new_post_custom_fields);
                    foreach($new_post_terms as $tax => $term_ids) {
                        wp_set_object_terms($new_post_id, $term_ids, $tax);
                    }
                    $wp_upload_dir = wp_upload_dir();
                    foreach($new_post_image_urls as $image_index => $image_url) {
                        $image_url = str_replace(' ', '%20', trim($image_url));
                        $parsed_url = parse_url($image_url);
                        $pathinfo = pathinfo($parsed_url['path']);
                        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
                        $image_ext = strtolower($pathinfo['extension']);
                        if(!in_array($image_ext, $allowed_extensions)) {
                            $new_post_errors[] = sprintf('jpg,jpeg,gif,png Extension Allowed', $image_url, $image_ext, implode( ',', $allowed_extensions ) );
                        }
                        $dest_filename = wp_unique_filename( $wp_upload_dir['path'], $pathinfo['basename'] );
                        $dest_path = $wp_upload_dir['path'] . '/' . $dest_filename;
                        $dest_url = $wp_upload_dir['url'] . '/' . $dest_filename;

                        if(ini_get('allow_url_fopen')) {
                            if( ! @copy($image_url, $dest_path)) {
                                $http_status = $http_response_header[0];
                                $new_post_errors[] = sprintf( __( '%s encountered while attempting to download %s', 'erpconnect' ), $http_status, $image_url );
                            }

                        } elseif(function_exists('curl_init')) {
                            $ch = curl_init($image_url);
                            $fp = fopen($dest_path, "wb");

                            $options = array(
                                CURLOPT_FILE => $fp,
                                CURLOPT_HEADER => 0,
                                CURLOPT_FOLLOWLOCATION => 1,
                                CURLOPT_TIMEOUT => 60); // in seconds

                            curl_setopt_array($ch, $options);
                            curl_exec($ch);
                            $http_status = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
                            curl_close($ch);
                            fclose($fp);

                            //delete the file if the download was unsuccessful
                            if($http_status != 200) {
                                unlink($dest_path);
                                $new_post_errors[] = sprintf('HTTP status %s encountered while attempting to download %s', $http_status, $image_url );
                            }
                        } else {
                            $error_messages[] = sprintf( 'Looks like %s is off and %s is not enabled. No images were imported.', '<code>allow_url_fopen</code>', '<code>cURL</code>'  );
                            break;
                        }
                        if(!file_exists($dest_path)) {
                            $new_post_errors[] = sprintf('Couldn\'t download file %s.', $image_url );
                            continue;
                        }
                        $new_post_image_paths[] = array(
                            'path' => $dest_path,
                            'source' => $image_url
                        );
                    }

                    $image_gallery_ids = array();

                    foreach($new_post_image_paths as $image_index => $dest_path_info) {
                        if($existing_product !== null && intval($post_data['product_image_skip_duplicates'][$key]) == 1) {
                            $existing_attachment_query = array(
                                'numberposts' => 1,
                                'meta_key' => 'import_source',
                                'post_status' => 'inherit',
                                'post_parent' => $existing_product->ID,
                                'meta_query' => array(
                                    array(
                                        'key'=>'import_source',
                                        'value'=> $dest_path_info['source'],
                                        'compare' => '='
                                    )
                                ),
                                'post_type' => 'attachment');
                            $existing_attachments = get_posts($existing_attachment_query);
                            if(is_array($existing_attachments) && sizeof($existing_attachments) > 0) {
                                $new_post_messages[] = sprintf('Skipping import of duplicate image %s.', 'erpconnect', $dest_path_info['source'] );
                                continue;
                            }
                        }
                        if(!file_exists($dest_path_info['path'])) {
                            $new_post_errors[] = sprintf( 'Couldn\'t find local file %s.', $dest_path_info['path'] );
                            continue;
                        }

                        $dest_url = str_ireplace(ABSPATH, home_url('/'), $dest_path_info['path']);
                        $path_parts = pathinfo($dest_path_info['path']);
                        $wp_filetype = wp_check_filetype($dest_path_info['path']);
                        $attachment = array(
                            'guid' => $dest_url,
                            'post_mime_type' => $wp_filetype['type'],
                            'post_title' => preg_replace('/\.[^.]+$/', '', $path_parts['filename']),
                            'post_content' => '',
                            'post_status' => 'inherit'
                        );
                        $attachment_id = wp_insert_attachment( $attachment, $dest_path_info['path'], $new_post_id );
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attach_data = wp_generate_attachment_metadata( $attachment_id, $dest_path_info['path'] );
                        wp_update_attachment_metadata( $attachment_id, $attach_data );
                        add_post_meta($attachment_id, 'import_source', $dest_path_info['source'], true) or
                            update_post_meta($attachment_id, 'import_source', $dest_path_info['source']);
                        if($image_index == 0 && intval($post_data['product_image_set_featured'][$key]) == 1) {
                            update_post_meta($new_post_id, 'thumbnail_id', $attachment_id);
                        } else {
                            $image_gallery_ids[] = $attachment_id;
                        }
                    }

                    if(count($image_gallery_ids) > 0) {
                        update_post_meta($new_post_id, 'product_image_gallery', implode(',', $image_gallery_ids));
                    }
                }

            } else {
                $new_post_errors[] = 'Skipped import of product without a name';
            }
            $inserted_rows[] = array(
                'row_id' => $j,
                'post_id' => $new_post_id ? $new_post_id : '',
                'name' => $new_post['post_title'] ? $new_post['post_title'] : '',
                'sku' => $new_post_meta['_sku'] ? $new_post_meta['_sku'] : '',
                'price' => $new_post_meta['price'] ? $new_post_meta['price'] : '',
                'has_errors' => (sizeof($new_post_errors) > 0),
                'errors' => $new_post_errors,
                'has_messages' => (sizeof($new_post_messages) > 0),
                'messages' => $new_post_messages,
                'success' => $new_post_insert_success
            );
	    }
    }


    
    echo json_encode(array(
        'inserted_rows' => $inserted_rows,
        'error_messages' => $error_messages
    ));


?>