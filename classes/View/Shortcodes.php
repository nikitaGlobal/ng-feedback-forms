<?php
declare(strict_types=1);
/**
 * Enqueue and localize script
 *
 * @package   NGFEEDBACKFORMS
 * @author    Nikita Menshutin
 * @copyright Copyright © 2021, nikitaGlobal
 */

namespace NGFeedBackForms\View;

use NGFeedBackForms\Controller\ProcessForm as ProcessForm;

class Shortcodes {
    /**
     * Constructor
     */
    function __construct() {
        foreach ( get_class_methods( $this ) as $method ) {
            if ( 0 !== strpos( $method, 'sc' ) ) {
                continue;
            }
            add_shortcode( preg_replace( '/^sc/', NGFEEDBACKFORMS__SLUG, strtolower( $method ) ), [ $this, $method ] );
        }
    }

    /**
     * Short code for form processing.
     *
     * @param array  $atts attributes.
     * @param string $content content.
     *
     * @return string form updated.
     */
    public function scForm( string $atts, string $content ):string {
        $form = new ProcessForm( $content );
	return $form->printForm();
    }
}
