
<!DOCTYPE html>
<html>
<head>
    <title>008 Cards</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">
    
     
    
    <meta name="theme-color" content="#563d7c">
    
    
        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
        <!-- Custom styles for this template -->

      <style type="text/css">/* Chart.js */
    @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
    </head>

  <body>
  

<div class="container-fluid">
  <div class="row">
        <?= date('h:i:s A');?>
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom row">
        <h1 class="h2">PHP</h1>

        <section id="#table-php">
        <?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
 $curl = curl_init();
$retorno = [];
$hash = "";
      $orderid = rand();
      $price = random_int(2000,99999);
			$day = str_pad(date("d"),2,0,STR_PAD_LEFT);
			$mounth = str_pad(date("m"), 2,0,STR_PAD_LEFT);
	        $data = array(
	        	'returnurl'		=> 'http://mercado8.dyndns.org/008/retorno/',
	            'date'   => $day.'/'.$mounth.'/'.date('Y'),
	            'amount'        => $price,
	            'orderid'     => $orderid,
	            'time'        => date('h:i:s A')
	        );
        

        $json = json_encode($data);


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
              "Authorization: Basic MjI4NzQ2MTUwMDAxODA6ZXprMU4wVTJRa05ETFVORE16SXRORFl5UXkxQlJFVTJMVEF6TlVRMk1FUXhRelZFUlgw",
              "Cache-Control: no-cache",
              "Connection: keep-alive",
              "Content-Type: application/json",
              "cache-control: no-cache"
            ),
          ));

        $retorno = curl_exec($curl);

        curl_close($curl);
      
        $retorno = json_decode($retorno);
        ?>
        
        </section>
      </div>

      <div class="content col-12">
	        <iframe class="card row col-12" src="<?= $retorno->url ?>" width="100%" height="600" frameBorder="0"></iframe>
	  </div>
    </main>

<h1>retorno transacao</h1>
    <!-- pre><code>
    	
{
    "message_response": {
        "message": "success"
    },
    "data_response": {
        "transaction": {
            "order_number": "489337",
            "free": "Campo Livre",
            "transaction_id": 489337,
            "status_name": "Aguardando Pagamento",
            "status_id": 4,
            "token_transaction": "b4cb4b68439b048503f3787ec63c9156",
            "payment": {
                "price_payment": "42.0",
                "price_original": "42.0",
                "payment_response": "",
                "url_payment": "https://intermediador-sandbox.yapay.com.br/orders/billet/b4cb4b68439b048503f3787ec63c9156",
                "tid": null,
                "split": 1,
                "payment_method_id": 6,
                "payment_method_name": "Boleto Bancario",
                "linha_digitavel": "123123123123123131232131232131313211231321321"
            },
            "customer": {
                "name": "Stephen Strange",
                "company_name": "",
                "trade_name": "",
                "cpf": "35502074846",
                "cnpj": ""
            }
        }
    }
}

    </code></pre-->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom row col-12">
        <h1 class="h2">Dashboard <?= $hash; ?></h1>

        <section id="table-entrada" class="col-12">

        </section>
      </div>

      
    </main>
  </div>
</div>


<form action="#" class="row col-12 card">
	<label>Usuario</label>
	<input class="form-control" type="text" name="usuario" id="usuario" value="22874615000180">
	<br/>
	<label>Senha</label>
	<input class="form-control" type="text" name="senha" id="senha" value="ezk1N0U2QkNDLUNDMzItNDYyQy1BREU2LTAzNUQ2MEQxQzVERX0">
	<textarea class="form-control col-8" type="text" name="corpo" id="corpo" rows="5">
		{
		  "orderid": 123456,
		  "date": "09/09/2020",
		  "time": "11:25:00",
		  "amount": 4,
		  "returnurl": "http://mercado8.dyndns.org/008/retorno/"
		}

	</textarea>
	<br/>
	<div id="sendform" class="btn btn-danger col-12">Enviar</div>
</form>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- jQuery library -->

        <script>
            $(function(){

            	$("#sendform").click(function(envent){
            		event.preventDefault();
            		senderForm();
            	});

            	function senderForm(){
            	user = $("#usuario").val();
            	senha = $("#senha").val();
            	corpo = $("#corpo").val();

                $url = "request.php";


               

                $.ajax({
                    method: "POST",
                    url: $url,
                    crossDomain: true,
                    headers: {"Access-Control-Allow-Origin": "http://144.217.158.124"},
                    data: $.parseJSON(corpo),
                    headers: {
                    	"auther" : '<?= $hash ?>',
				    	"Authorization": make_base_auth(user, senha)
				  },
                    success: function(ret){
                    	console.log(ret);
                    	alert(ret);
                    	data = $.parseJSON(ret);
                    	console.warn(data);
                    	$html = '<iframe src="'+data.url+'" width="100%" height="300" frameBorder="0"></iframe>';
                        $("#table-entrada").html($html);
                    },
                    dataType: 'json'
                });
             }

            function make_base_auth(user, password) {
			  var tok = user + ':' + password;
			  var hash = btoa(tok);
			  return "Basic " + hash;
			}

          });
        </script>

</body></html>