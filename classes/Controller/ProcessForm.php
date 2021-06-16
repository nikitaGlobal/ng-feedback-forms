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

class ProcessForm {
    function __construct( $form ) {

        $this->form = $form;
    }

    public function printForm() {
        return '123';
    }
}


