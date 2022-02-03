<?php
/*
Plugin Name: EHW Random Bible Verse
Plugin URI: https://erichepperle.com/software/wp
Description: Display random Bible verse
Version: 1.0.0
Author: Eric Hepperle
Author URI: https://erichepperle.com
Date Created: 02/03/22
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
   exit;
}

$plug_abbr = 'ehw-rbv';
$textdomain = 'ehw-randverse';

// Load Scripts
require_once(plugin_dir_path(__FILE__)."/includes/$textdomain-scripts.php");

// Load Class
require_once(plugin_dir_path(__FILE__)."/includes/$textdomain.class.php");

// Register Widget
function register_youtubesubs() {
    register_widget('YouTube_Subs_Widget');
}

// Hook in function
add_action ('widgets_init', 'register_youtubesubs');

/* FINAL VERSION -- WORKS PERFECT */