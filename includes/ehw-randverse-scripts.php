<?php /* ehw-randverse-scripts.php */

  // Add Scripts
  function rbv_add_scripts() {
      // Add Main CSS
      wp_enqueue_style('rbv-main-style', plugins_url('../css/style.css', __FILE__));
      
      // Add Main JS
      wp_enqueue_script('rbv-main-script', plugins_url('../js/main.js', __FILE__));
      
      // Add Google Scripts
      wp_register_script('google', 'https://apis.google.com/js/platform.js');
      wp_enqueue_script('google');
  }
  
  add_action('wp_enqueue_scripts', 'rbv_add_scripts');