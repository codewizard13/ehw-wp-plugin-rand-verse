<?php /* youtubesubs-scripts.php */

  // Add Scripts
  function rbv_add_scripts() {
      // Add Main CSS
      wp_enqueue_style('rbv-main-style', plugins_url() . "/$textdomain/css/style.css");
      
      // Add Main JS
      wp_enqueue_script('rbv-main-script', plugins_url() . "/$textdomain/js/main.js");
      
      // Add Google Scripts
      wp_register_script('google', 'https://apis.google.com/js/platform.js');
      wp_enqueue_script('google');
  }
  
  add_action('wp_enqueue_scripts', 'rbv_add_scripts');