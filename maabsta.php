<?PHP
/*
Plugin Name: Maabsta
Plugin URI: http://takedownbreakdown.com
Description: TEST
Version: 0.1
Author: Maabsta
Author URI: http://frankiesanzica.com
License: GPL2
*/

# Block direct access to plugin PHP files
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

# Clean up wp_head
remove_action('wp_head', 'rsd_link'); // Remove Really simple discovery link
remove_action('wp_head', 'wlwmanifest_link'); // Remove Windows Live Writer link
remove_action('wp_head', 'wp_generator'); // Remove the version number

# Call extra_post_info_menu function to load plugin menu in dashboard
add_action( 'admin_menu', 'maabsta_plugin_menu' );

# Create WordPress admin menu
if( !function_exists("maabsta_plugin_menu") )
{
function maabsta_plugin_menu(){

  $page_title = 'WordPress Maabsta Plugin';
  $menu_title = 'Maabsta Plugin';
  $capability = 'manage_options';
  $menu_slug  = 'maabsta_plugin';
  $function   = 'maabsta_plugin_page';
  $icon_url   = 'dashicons-media-code';
  $position   = 4;

  add_menu_page( $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );
}
}

# Create WordPress plugin page
if( !function_exists("maabsta_plugin_page") )
{
function maabsta_plugin_page(){
?>
  <h1>Maabsta Plugin Page</h1>
	Testing
<?php
}
}

# Plugin logic for adding extra info to posts
if( !function_exists("maabsta_plugin") )
{
  function maabsta_plugin($content)
  {
    $extra_info = "TEST";
    return $content . $extra_info;
  }
}

# Apply the extra_post_info function on our content  
add_filter('the_content', 'maabsta_plugin');

?>
