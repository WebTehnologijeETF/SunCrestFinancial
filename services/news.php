<?php

require("dataAccess.php");

function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
	if (isset($data['id']))
		echo json_encode(getNewsItem($data['id']));
	else {
	    $toReturn = getNewsItems();
		echo json_encode($toReturn);
	}
}
function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
		parse_str(file_get_contents('php://input'), $post_vars);
        zag(); $data = $post_vars; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}



function getNewsItem($id) {
	 
	return fetchNewsItemWithComments($id);
}

function getNewsItems() {
	$toReturn = fetchNewsWithComments();
	return $toReturn;
}



