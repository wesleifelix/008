<?php
	//header($_SERVER["SERVER_PROTOCOL"]." OK", true, 200);
	header('Content-Type: application/json');
	$rawData = file_get_contents("php://input");
	$met = ($_SERVER['REQUEST_METHOD']);

if($met == "POST"){
	header($_SERVER["SERVER_PROTOCOL"]." 200 Ok", true, 200);
    $req_dump = print_r($_REQUEST, TRUE);
	$fp = fopen('request.json', 'a');
	//fwrite($fp, json_encode($req_dump));
	fwrite($fp, json_encode($rawData));
	fclose($fp);
    echo $rawData;
}
else{
	header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
	$arr = array("erro" => "metodo nao permidito, somente POST");
	echo json_encode($arr);
}
