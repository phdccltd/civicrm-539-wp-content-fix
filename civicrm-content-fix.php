<?php

/*
Plugin Name: CiviCRM 5.39 content fix
Plugin URI: 
Description: Plugin to fix CiviCRM 5.39+ WordPress content issue
Author: PHDCC
Version: 1.0
Author URI: https://www.phdcc.com/
License: GPL2
*/

// This file must not accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

//error_log(' FIX ');
add_action('wp', 'civicrm_539_wp_content_fix_basepage_handler', 20, 1);

function civicrm_539_wp_content_fix_basepage_handler($wp) {

  try{
    error_log(' FIXBP ');
    remove_filter('the_content', [civi_wp()->basepage, 'basepage_render']);
    add_filter('the_content', 'civicrm_539_wp_content_fix_basepage_render');
  } catch(Exception $e){ }
}

function civicrm_539_wp_content_fix_basepage_render($html) {

  error_log(' FIX_RENDER ');

  try{
    $html = civi_wp()->basepage->basepage_render($html);
  } catch(Exception $e){ }
  error_log(' FEX '.substr($html,0,15));

  return $html;

}
