<?php  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Custom settings / config specific to this app
 *
 * @author <joe.lipson@binu-inc.com>
 */

// the name of the site
$config['app_name'] =  'Dev apps';

// each app has it's own app id so it can be tracked in reporting
$config['app_id'] =  0;

// developer id
$config['dev_id'] =  1;


$config['img_dir'] =  '/apps/dev_apps/application/assets/images/';

$config['top_bar_color'] =  '#75B431';
$config['top_bar_text_color'] =  '#FFFFFF';

// in debug mode error files are saved
$config['debug'] = true;

// emails are sent from this address. ( must be verified with SES )
$config['system_email_from'] = 'email@binu.net';
// system warning messages are sent here
//$config['warning_email_to'] = 'research@binu-inc.com';
$config['warning_email_to'] = 'joe.lipson@binu-inc.com';

// memcache server pool
$config['mc_server_pool'] = array('127.0.0.1');
$config['mc_session_ttl'] = 86400;
