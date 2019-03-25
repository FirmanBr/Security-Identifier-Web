<?php

$serverName = "192.168.88.59"; 
$connectionInfo = array( "Database"=>"LEN_SID_REGISTRASI_ONLINE", "UID"=>"sa", "PWD"=>"Sa1234567890", 'CharacterSet' => 'UTF-8', 'ReturnDatesAsStrings'=> true,);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>