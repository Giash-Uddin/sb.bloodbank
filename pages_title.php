<?php
$root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$config['base_url'] = $root;
if ( !isset($_REQUEST['term']) )
 
 error_reporting(E_ALL ^ E_DEPRECATED);
$dblink = mysql_connect('localhost', 'root', 'admin321') or die( mysql_error() );
mysql_select_db('webadmin');

$rs = mysql_query('select newsid,news_title from top_stories where news_title like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by newsid asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {   
        $data[] = array(
            'label' => $row['news_title'],
            'value' =>$row['news_title']
        );
    }
}

echo json_encode($data);
flush();

