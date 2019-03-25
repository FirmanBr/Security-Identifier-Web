
<?php

require 'nusoap/src/nusoap.php';

ini_set("display_errors", 0);
error_reporting(E_ALL);

$wsdl="https://pelaut.dephub.go.id/service.php?wsdl";
$username = "seafare";
$password  = "kepelautan";

$client =new nusoap_client($wsdl,'wsdl');
$client->setCredentials($username,$password);
//$proxy = $client->getProxy();
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = FALSE;
$error  = $client->getError();
$test = $client[ID];

if ($error) 
{
	echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	echo $test; 
}

//GetSOAPLPelaut
//6200518370

$result = $client->call($client);


if ($client->fault) 
{
//  echo "<h2>Fault</h2><pre>";
  //print_r($result);
//	echo "</pre>";
//	echo $test;
} 
else 
{
	$error = $client->getError();
	echo $test;
	echo 'a';

  if ($error) 
  {
//			echo "<h2>Error</h2><pre>" . $error . "</pre>";
				echo $test;
				echo 'b';
  } 
  else 
  {
//      echo "<h2>Main</h2>";
//      echo $result;
				echo 'c';
  }
}

//echo "<h2>Request</h2>";
//echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
//echo "<h2>Response</h2>";
//echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";


/*

  $wsdl="https://pelaut.dephub.go.id/service.php?wsdl";
	$client =new nusoap_client($wsdl,true);
	$username = "seafare";
	$password  = "kepelautan";
	$err = $client->getError();
	if ($err) 
	{
	  echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	}
	$result = $client->call('GetSOAPLPelaut', array('user' => $username, 'password' => $password));
	if ($client->fault) {
	    echo '<h2>Fault</h2><pre>';
	    print_r($result);
	    echo '</pre>';
	} 
	
	else {
	    $err = $client->getError();
	    if ($err) {
	        echo '<h2>Error</h2><pre>' . $err . '</pre>';
			} 
			else {
	        print_r($result);
	    }
	}
*/

?>
