<?php
    /**
     * Plugin Name: nikitaGlobal feedback forms
     * Plugin URI: http://nikita.global
     * Description: Allows to use custom form code.
     * Just include file with your <form></form> with shortcode
     * Author: Nikita Menshutin
     * Version: 1.0
     * Author URI: http://nikita.global
     *
     * PHP version 5.5.9
     *
     * @category NikitaGlobal
     * @package  NikitaGlobal
     * @author   Nikita Menshutin <nikita@nikita.global>
     * @license  http://nikita.global commercial
     * @link     http://nikita.global
     * */
    defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

    /**
     * Our core class goes here
     *
     * @category NikitaGlobal
     * @package  NikitaGlobal
     * @author   Nikita Menshutin <nikita@nikita.global>
     * @license  http://nikita.global GPL
     * @link     http://nikita.global
     * */

require __DIR__ . '/vendor/autoload.php';
define( 'NGFEEDBACKFORMS__SLUG', 'ngfbf' );
define( 'NGFEEDBACKFORMS__VERSION', '1.0' );
define( 'NGFEEDBACKFORMS__JS', plugin_dir_url( __FILE__ ) . 'dist/main.js' );

$cpt = new NGFeedBackForms\Model\CPT();
$shortcodes=new \NGFeedBackForms\View\Shortcodes();
add_action( 'wp_enqueue_scripts', [ 'NGFeedBackForms\Controller\Enqueue', 'enqueue' ] );
