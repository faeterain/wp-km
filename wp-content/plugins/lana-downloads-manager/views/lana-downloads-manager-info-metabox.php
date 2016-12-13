<div class="lana-downloads-manager-info">
	<label for="id">ID:</label>
	<?php echo $post->ID; ?>
	<hr/>
	<label for="download-count">Download count:</label>
	<?php echo lana_downloads_manager_get_download_count(); ?>
	<hr/>
	<label for="lana-download-url">URL:</label>
	<input type="text" id="lana-download-url"
	       value="<?php echo esc_attr( lana_downloads_manager_get_download_url() ); ?>" readonly>
	<hr/>
	<label for="lana-download-shortcode">Shortcode:</label>
	<input type="text" id="lana-download-shortcode"
	       value="<?php echo esc_attr( lana_downloads_manager_get_download_shortcode() ); ?>" readonly>
</div>