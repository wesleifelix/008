<?php
header("application/json");
	
	var_dump($_POST); die;
	$rawData = file_get_contents("php://input");
	
	$rawData = ((object)$rawData);
	

        $json = json_encode($rawData);


        $hash = hash_hmac('sha256', $json, '1234567890');

            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://144.217.158.124:8888/gerencial/ecommerce/v1/transaction",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
              "auter : ".$hash."",
              "Authorization: Basic ".base64_encode($rawData->usuario.":".$rawData->senha) ,
              "Cache-Control: no-cache",
              "Connection: keep-alive",
              "Content-Type: application/json",
              "cache-control: no-cache"
            ),
          ));

        
		$retorno = curl_exec($curl);
        if($retorno === false)
		{
		    echo 'Curl error: ' . curl_error($curl);
		}
		else
		{
		    var_dump($retorno);
		}

        curl_close($curl);
      
        $retorno = json_decode($retorno);

        echo $retorno;