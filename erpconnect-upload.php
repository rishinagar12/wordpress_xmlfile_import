

<div class="woo_product_importer_wrapper wrap">
    <div id="icon-tools" class="icon32"><br /></div>
    <h2><?php _e( 'ERP Connect &raquo; Upload', 'erp-connect' ); ?></h2>

    <form enctype="multipart/form-data" method="post" action="<?php echo get_admin_url().'admin.php?page=erp-connect&action=preview'; ?>">
        <h4>Import products from a XML file</h4>
        <table class="form-table">
            <tbody>
                <tr>
                    <th><label for="import_csv"><?php _e( 'File to Import', 'erp-connect' ); ?></label></th>
                    <td><input type="file" name="xmlfile" id="xmlfile"></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button class="button-primary" type="submit">Upload</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
