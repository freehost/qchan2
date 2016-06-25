<?php
if (isset($_SERVER['HTTP_INCAP_CLIENT_IP'])) {
    file_put_contents('/opt/shell/log/ip.txt', date('[Y-m-d H:i:s] ').$_SERVER['HTTP_INCAP_CLIENT_IP'].PHP_EOL, FILE_APPEND);
}

define('API_RUN',true);

require 'engine.php';

if(!isset($_SERVER['HTTP_REFERER']) && !isset($_GET['apikey'])) {
	header('HTTP/1.1 403 Forbidden');
	exit('API cannot be direct accessed!');
}
if(isset($_GET['type']) && $_GET['type']=='url') {
	$result = url_handler();
}else if(isset($_GET['type']) && $_GET['type']=='file') {
	list($result) = file_handler();
}else {
	header('HTTP/1.1 400 Bad Request');
	exit('You must set "type" in the query string.');
}
header('Content-Type: application/json');
echo json_encode($result);
