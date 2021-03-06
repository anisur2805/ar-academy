<?php
namespace AR\Academy\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode {
	/**
	 * Initializes the class
	 */
    public function __construct() {
        add_shortcode( 'ar-academy', [$this, 'render_shortcode'] );
    }

	/**
	 * Render shortcode
	 *
	 * @param array $atts
	 * @param string $content
	 * 
	 * @return string
	 */
    public function render_shortcode( $atts, $content = '' ) {
        return "Hello from Shortcode";
    }
}