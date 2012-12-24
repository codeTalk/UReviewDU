<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');


/* Database config */

$db_host		= 'ureviewdu.db.6511651.hostedresource.com';
$db_user		= 'ureviewdu';
$db_pass		= 'Jacked.1988';
$db_database	= 'ureviewdu'; 

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>