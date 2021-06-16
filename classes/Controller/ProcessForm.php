<?php
declare(strict_types=1);
/**
 * Enqueue and localize script
 *
 * @package   NGFEEDBACKFORMS
 * @author    Nikita Menshutin
 * @copyright Copyright © 2021, nikitaGlobal
 */

namespace NGFeedBackForms\Controller;

use Masterminds\HTML5 as HTML5;

class ProcessForm {

    function __construct( $form ) {
        $this->form = [
            'html'       => $form,
            'attributes' => [],
        ];
        $this->makeDom();
        foreach ( get_class_methods( $this ) as $method ) {
            if ( 0 !== strpos( $method, 'form' ) ) {
                continue;
            }
            $this->{$method}();
        }
    }

    private function makeDom() {
        $html5              = new HTML5( [ 'disable_html_ns' => true ] );
        $this->dom          = $html5->loadHTML( $this->form['html'] );
        $this->form['node'] = $this->dom->getElementsByTagName( 'form' )[0];
        $this->form['id']   = (string) crc32( $this->form['html'] );
    }

    private function formAddNonce() {

        $this->createTag(
            [
                'tag'   => 'input',
                'name'  => NGFEEDBACKFORMS__SLUG . '[nonce]',
                'type'  => 'hidden',
                'value' => wp_create_nonce( NGFEEDBACKFORMS__SLUG . $this->form['id'] ),
            ]
        );
    }

    private function createTag( $tag ) {
        $element = $this->dom->createElement( $tag['tag'] );
        unset( $tag['tag'] );
        foreach ( $tag as $attr => $value ) {
            $element->setAttribute( $attr, $value );
        }
        $this->form['node']->appendChild( $element );
    }

    private function formAddMethod() {
        $this->form['node']->setAttribute( 'method', 'get' );
        $this->createTag(
            [
                'tag'  => 'input',
                'type' => 'hidden',
                'name' => NGFEEDBACKFORMS__SLUG . '[id]',
            ]
        );
    }

    private function formAddId() {
        $this->form['node']->setAttribute( 'data-' . NGFEEDBACKFORMS__SLUG . '-id', $this->form['id'] );
    }

    public function printForm() {
        return $this->form['node']->C14N();
    }
}


