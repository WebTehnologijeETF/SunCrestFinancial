<?php

/* Mail Service */
require '../PHPMailer/PHPMailerAutoload.php';


function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
	echo $data;
}
function rest_post($request, $data) {
	/* Create Mailing Service */
	
	var_dump($data);
	$contract = json_decode(array_values($data)[0]);
	
	$email = $contract["email"];
	$name = $contract["fname"];
	$comment = $contract["comment"];
	
	$mail = new PHPMailer();    
	$mail->isSMTP();
	$mail->Host = 'smtp.live.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'suncrestfwt@gmail.com';
	$mail->Password = 'WTSC1234';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->From = 'ahmethodzic@gmail.com';
	$mail->FromName = 'SunCrestFinancials';
	$mail->addAddress('ahmethodzic@live.com', 'Adnan');    
	$mail->addReplyTo($email, $name);    
	$mail->WordWrap = 50;
	$mail->isHTML(false);    
	$mail->Subject = 'Kontakt poruka';
	$mail->Body  = $comment;
	
	
}
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
