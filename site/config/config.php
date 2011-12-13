<?php
/*
 * SQL
 */
/*
 * sqlite
 * mysql
 */

@define('ROOT','../../');

require_once ROOT.'site/config/ConfigInstance.php';

$ci = ConfigInstance::getInstance();

/**
 * ROOT
 */
$ci->config['site']['root'] = '/mvc-spooky/';
$ci->config['site']['url'] = 'http://localhost/mvc-spooky/';
/**
 * DATABASE
 */
$ci->config['db']['type'] = 'mysql';
$ci->config['db']['host'] = '127.0.0.1';
$ci->config['db']['port'] = '3306';
$ci->config['db']['database'] = 'mvc';
$ci->config['db']['usr'] = 'root';
$ci->config['db']['password'] = '';
$ci->config['db']['prefix'] = '';
/*
 * THEME
 */
$ci->config['theme']['theme'] = 'default';
?>