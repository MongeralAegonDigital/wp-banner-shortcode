<?php

/**
 * Plugin Name: Banner Shortcode
 * Description: Add shortcode in post
 * Author: Alan Gomes<alanhr2@gmail.com>
 * Author URI: *
 * Version: 1.0.0
 * Plugin URI:https://github.com/MongeralAegonDigital/wp-banner-shortcode.
 */;

define('WBSDIR', __DIR__);

require_once WBSDIR.'/vendor/autoload.php';
require_once WBSDIR.'/config/db.php';

$controllers = [
  MAD\Controller\BannerController::class,
];

foreach ($controllers as $controller) {
    $rf = new \ReflectionClass($controller);
    $rf->newInstanceArgs();
}
