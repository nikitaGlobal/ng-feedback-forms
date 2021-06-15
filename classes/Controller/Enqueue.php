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

class Enqueue {

    public static function enqueue() {

        wp_register_script( NGFEEDBACKFORMS__SLUG, NGFEEDBACKFORMS__JS, [], NGFEEDBACKFORMS__VERSION, true );
        wp_enqueue_script( NGFEEDBACKFORMS__SLUG );
    }
}
