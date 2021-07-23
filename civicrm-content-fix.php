<?php

/*
Plugin Name: CiviCRM 5.39 content fix
Plugin URI: https://github.com/phdccltd/civicrm-539-wp-content-fix
GitHub Plugin URI: phdccltd/civicrm-539-wp-content-fix
Description: Plugin to fix CiviCRM 5.39+ WordPress content issue
Author: Chris Cant, PHDCC
Version: 1.1
Author URI: https://www.phdcc.com/
License: GPL2
*/

// This file must not accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('wp', 'civicrm_539_wp_content_fix_basepage_handler', 20, 1); // >10 so executed after CiviCRM

function civicrm_539_wp_content_fix_basepage_handler($wp) {

  try{
    remove_filter('the_content', [civi_wp()->basepage, 'basepage_render']);
    add_filter('the_content', 'civicrm_539_wp_content_fix_basepage_render');
  } catch(Exception $e){ }
}

function civicrm_539_wp_content_fix_basepage_render($html) {

  try{
    $html = civi_wp()->basepage->basepage_render($html);
  } catch(Exception $e){ }

  return $html;
}
