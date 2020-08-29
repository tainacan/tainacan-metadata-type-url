<?php

/**
 * Class URL_Metadata_Type
 * This is inside "metadata_type/metadata-type.php"
 */
class URL_Metadata_Type extends \Tainacan\Metadata_Types\Metadata_Type {
    use \Tainacan\Traits\Formatter_Text;

    function __construct() {

        parent::__construct();

        // Basic options
        $this->set_name( __('URL Metadata Type', 'tainacan-url-metadata-type') );
        $this->set_description( __('An URL link, possibly with an embed content.', 'tainacan-url-metadata-type') );
        $this->set_primitive_type(['text']);
        $this->set_component('tainacan-metadata-type-url');
        $this->set_preview_template('
            <div>
                <div class="control is-clearfix">
                    <input type="url" placeholder="https://youtube.com/?v=abc123456" class="input">
                </div>
            </div>
        ');

        // For URL Metadata Type Options
        $this->set_form_component('tainacan-metadata-form-type-url');
        $this->set_default_options([
            'step' => 1
        ]);
    }
    
    public function get_form_labels(){
        return [
            'step' => [
                'title' => __( 'Step', 'tainacan' ),
                'description' => __( 'The amount to be increased or decreased when clicking on filter control buttons.', 'tainacan' ),
            ]
        ];
    }
    
    public function validate_options( \Tainacan\Entities\Metadatum $metadatum ) {

        $option = $this->get_option('step');

        if (is_numeric($option)) { // Or any other validation condition
            return true; // validated!
        } else {
            return ['step' => __('The option "step" is invald. Must be a number!', 'tainacan-url-metadata-type')];
        }
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
					$return .= $this->make_clickable_links($el);
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
				$return = $this->make_clickable_links($value);
			} else {
				$return = $embed;
			}
		}
		return $return;
	}
}
?>
