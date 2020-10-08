<?php

    $post_data = array(
        'uploaded_file_path' => $_POST['uploaded_file_path'],
        'map_to' => $_POST['map_to'],
        'uploaded_file_ext' => $_POST['uploaded_file_ext'],
        'custom_field_name' => $_POST['custom_field_name'],
        'custom_field_visible' => $_POST['custom_field_visible'],
        'product_image_set_featured' => $_POST['product_image_set_featured'],
        'product_image_skip_duplicates' => $_POST['product_image_skip_duplicates'],
        'post_meta_key' => $_POST['post_meta_key']
    );
?>
<script type="text/javascript">
    jQuery(document).ready(function($){

        $("#show_debug").click(function(){
            $("#debug").show();
            $(this).hide();
        });

        doAjaxImport();

        function doAjaxImport(limit, offset) {
            var uploaded_file_ext = "<?php echo $post_data['uploaded_file_ext'] ?>";
            var data = {
                "action": "xmlajax",
                "uploaded_file_path": <?php echo json_encode($post_data['uploaded_file_path']); ?>,
                "map_to": '<?php echo (serialize($post_data['map_to'])); ?>',
                "custom_field_name": '<?php echo (serialize($post_data['custom_field_name'])); ?>',
                "custom_field_visible": '<?php echo (serialize($post_data['custom_field_visible'])); ?>',
                "product_image_set_featured": '<?php echo (serialize($post_data['product_image_set_featured'])); ?>',
                "product_image_skip_duplicates": '<?php echo (serialize($post_data['product_image_skip_duplicates'])); ?>',
                "post_meta_key": '<?php echo (serialize($post_data['post_meta_key'])); ?>'
            };
            
            // console.log(data);
            //ajaxurl is defined by WordPress
            var ajaxurl = "<?php echo wp_localize_script( 'ajax-js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) ); ?>";
            $.post(ajaxurl, data, function(response) {
                $("#import_in_progress").hide();
                $("#import_complete").show();
            alert('Got this from the server: ' + response);
            console.log(response);
        });
            
        }

        
    });
</script>

<div class="erpconnect_wrapper wrap">
    <div id="icon-tools" class="icon32"><br /></div>
    <h2><?php _e( 'erp-connect &raquo; Results', 'erpconnect' ); ?></h2>

    <ul class="import_error_messages">
    </ul>

    <div id="import_status">
        <div id="import_in_progress">
            <img src="<?php echo plugin_dir_url(__FILE__); ?>img/ajax-loader.gif" alt="Importing. Please do not close this window or click your browser's stop button." title="Importing. Please do not close this window or click your browser\'s stop button.">

            <strong>Importing. Please do not close this window or click your browser\'s stop button.'</strong>
        </div>
        <div id="import_complete">
            <img src="<?php echo plugin_dir_url(__FILE__); ?>img/complete.png" alt="Import complete!" title="Import complete!">
            <strong>'Import Complete! check your product'</strong>
        </div>
    </div>
</div>