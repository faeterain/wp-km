<table class="lana-downloads-manager" width="100%">
	<tr>
		<td width="15%">
			<label for="upload-file-url">File (URL):</label>
		</td>
		<td width="70%">
			<input type="text" name="lana_download_file_url" id="upload-file-url" class="upload-file-url"
			       value="<?php echo esc_attr( get_post_meta( $post->ID, '_lana_download_file_url', true ) ); ?>">
			<input type="hidden" name="lana_download_file_id" id="upload-file-id" class="upload-file-id"
			       value="<?php echo esc_attr( get_post_meta( $post->ID, '_lana_download_file_id', true ) ); ?>">
		</td>
		<td width="15%">
			<a href="#" class="button upload-file-button" data-dialog-title="Choose a file"
			   data-dialog-button="Insert file URL">
				Upload File
			</a>
		</td>
	</tr>
</table>

<?php wp_nonce_field( 'save', 'lana_downloads_manager_nonce_field' ); ?>