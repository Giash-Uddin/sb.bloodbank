<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dblink = mysql_connect('localhost', 'pingbd', 'pqy6PM8xYDMc7adE') or die( mysql_error() );
$db='webadmin';
mysql_select_db($db,$dblink);