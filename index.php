<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once(__DIR__.'/config.php');
require_once(__DIR__.'/options.php');
require_once(__DIR__.'/lib/class/Parsedown/Parsedown.php');
require_once(__DIR__.'/lib/class/Roark.php');
require_once(__DIR__.'/lib/category.php');
require_once(__DIR__.'/lib/image.php');
require_once(__DIR__.'/lib/functions.php');
require_once(__DIR__.'/lib/menus.php');
require_once(__DIR__.'/lib/parser.php');
require_once(__DIR__ .'/lib/page.php' );
require_once(__DIR__ .'/lib/post.php' );
require_once(__DIR__ .'/lib/template.php' );
require_once(__DIR__.'/lib/utility.php');
require_once(__DIR__.'/lib/widgets.php');


$roark = new Roark();

$roark->do_page();