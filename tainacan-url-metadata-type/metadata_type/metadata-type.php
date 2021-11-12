<?php

/**
 * Class TAINACAN_URL_Plugin_Metadata_Type
 * This is inside "metadata_type/metadata-type.php"
 */
class TAINACAN_URL_Plugin_Metadata_Type extends \Tainacan\Metadata_Types\Metadata_Type {
	use \Tainacan\Traits\Formatter_Text;

	function __construct() {

		parent::__construct();

        // Basic options
        $this->set_name( __('URL', 'tainacan-metadata-type-url') );
        $this->set_description( __('An URL link, possibly with an embed content.', 'tainacan-metadata-type-url') );
        $this->set_primitive_type(['text']);
        $this->set_component('tainacan-metadata-type-url');
        $this->set_form_component('tainacan-metadata-form-type-url');
        $this->set_default_options([
			'force-iframe' => 'no',
			'iframe-min-height' => '',
			'iframe-allowfullscreen' => 'no'
		]);
		$this->set_preview_template('
			<div>
				<div class="control is-clearfix">
					<input type="url" placeholder="https://youtube.com/?v=abc123456" class="input">
				</div>
			</div>
		');
	}
	
	public function get_form_labels(){
		return [
			'force-iframe' => [
				'title' 	  => __( 'Force iframe', 'tainacan-metadata-type-url' ),
				'description' => __( 'Force the URL to be displayed in an iframe in case the content is not embeddable by WordPress.', 'tainacan-metadata-type-url' ),
			],
			'iframe-min-height' => [
				'title' 	  => __( 'Forced iframe minimum height', 'tainacan-metadata-type-url' ),
				'description' => __( 'If forcing the use of an iframe, sets the height attribute, in pixels. Leave it empty to be 100% of the container.', 'tainacan-metadata-type-url' ),
			],
			'iframe-allowfullscreen' => [
				'title' 	  => __( 'Allow fullscreen on forced iframe', 'tainacan-metadata-type-url' ),
				'description' => __( 'If forcing the use of an iframe, allows it to request fullscreen to the browser.', 'tainacan-metadata-type-url' ),
			]
		];
	}

	/**
	 * Get the value as a HTML string with links
	 * @return string
	 */
	public function get_value_as_html(\Tainacan\Entities\Item_Metadata_Entity $item_metadata) {
		global $wp_embed;
		$value = $item_metadata->get_value();
		$return = '';
		
		if ( is_array($value) && $item_metadata->is_multiple() ) {
			$total = sizeof($value);
			$count = 0;
			$prefix = $item_metadata->get_multivalue_prefix();
			$suffix = $item_metadata->get_multivalue_suffix();
			$separator = $item_metadata->get_multivalue_separator();
			foreach ( $value as $el ) {
				$return .= $prefix;
				
				$embed = $wp_embed->autoembed($el);
				
				if ( $embed == $el ) {
					if ($this->get_option('force-iframe') == 'yes') {
						$iframeMininumHeight = '100%';
						if (!empty($this->get_option('iframe-min-height')))
							$iframeMininumHeight = $this->get_option('iframe-min-height');

						$return .= '<iframe src="' . $el . '" width="100%" height="' . $iframeMininumHeight  . '" style="border:none;" allowfullscreen="' . ($this->get_option('iframe-allowfullscreen') == 'yes' ? 'true' : 'false') . '"></iframe>';
					} else {
						$mkstr = preg_replace('/\[([^\]]+)\]\(([^\)]+)\)/', '<a href="\2" target="_blank" title="\1">\1</a>', $el);
						$return .= $this->make_clickable_links($mkstr);
					}
				} else {
					$return .= $embed;
				}

				$return .= $suffix;
				
				$count ++;
				if ($count < $total)
					$return .= $separator;
			}
			
		} else {

			$embed = $wp_embed->autoembed($value);
			
			if ( $embed == $value ) {
				if ($this->get_option('force-iframe') == 'yes') {
					$iframeMininumHeight = '100%';
					if (!empty($this->get_option('iframe-min-height')))
						$iframeMininumHeight = $this->get_option('iframe-min-height');

					$return = '<iframe src="' . $value . '" width="100%" height="' . $iframeMininumHeight  . '" style="border:none;" allowfullscreen="' . ($this->get_option('iframe-allowfullscreen') == 'yes' ? 'true' : 'false') . '"></iframe>';
				} else {
					$value = preg_replace('/\[([^\]]+)\]\(([^\)]+)\)/', '<a href="\2" target="_blank" title="\1">\1</a>', $value);
					$return = $this->make_clickable_links($value);
				}
			} else {
				$return = $embed;
			}
		}
		
		return $return;
	}

	/**
	 * Checks if the value passed is a valid URL or markdown link
	 * @return boolean
	 */
	public function validate(Tainacan\Entities\Item_Metadata_Entity $item_metadata) {
		$value = $item_metadata->get_value();
		$reg_mrkd = '~\[(.+)\]\(([^ ]+)?\)~i';
		$reg_url = '~((www\.|http:\/\/www\.|http:\/\/|https:\/\/www\.|https:\/\/|ftp:\/\/www\.|ftp:\/\/|ftps:\/\/www\.|ftps:\/\/)[^"<\s]+)(?![^<>]*>|[^"]*?<\/a)~i';
		$reg_full = '~\[(.+)\]\((((www\.|http:\/\/www\.|http:\/\/|https:\/\/www\.|https:\/\/|ftp:\/\/www\.|ftp:\/\/|ftps:\/\/www\.|ftps:\/\/)[^"<\s]+)(?![^<>]*>|[^"]*?<\/a))?\)~i';

		// Multivalued metadata --------------
		if ( is_array($value) ) {
			foreach ($value as $url_value) {

				// Empty strings are valid
				if ( !empty($url_value) ) {

					// If this seems to be a markdown link, we check if the url inside it is ok as well
					if ( preg_match($reg_mrkd, $url_value) && !preg_match($reg_full, $url_value) ) {
						$this->add_error( __('Invalid Markdown Link. Please provide a Markdown link in the form of [label](url).', 'tainacan-metadata-type-url') );
						return false;

					// But if is suposed to be just a link, we check if the url valid
					} else if ( !preg_match($reg_mrkd, $url_value) && !preg_match($reg_url, $url_value) ) {
						$this->add_error( __('Invalid URL. Please provide a valid link.', 'tainacan-metadata-type-url') );
						return false;
					}
				}
			}
			return true;
		}

		// Single valued metadata --------------
		// Empty strings are valid
		if ( !empty($value) ) {

			// If this seems to be a markdown link, we check if the url inside it is ok as well
			if ( preg_match($reg_mrkd, $value) && !preg_match($reg_full, $value) ) {
				$this->add_error( __('Invalid Markdown Link. Please provide a Markdown link in the form of [label](url).', 'tainacan-metadata-type-url') );
				return false;

			// But if is suposed to be just a link, we check if the url valid
			} else if ( !preg_match($reg_mrkd, $value) && !preg_match($reg_url, $value) ) {
				$this->add_error( __('Invalid URL. Please provide a valid link.', 'tainacan-metadata-type-url') );
				return false;
			}
		}
		return true;
	}

}
?>
