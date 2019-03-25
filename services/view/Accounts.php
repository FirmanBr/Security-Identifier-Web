<?php

$serverName = "192.168.88.59"; 
$connectionInfo = array( "Database"=>"LEN_SID_REGISTRASI_ONLINE", "UID"=>"sa", "PWD"=>"Sa1234567890");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$Status = "SELECT * FROM dbo.ACCOUNTS";
$sql = sqlsrv_query($conn, $Status);

$rows = array();
while($r= sqlsrv_fetch_array($sql)) {
	$temp = array (
		"USERNAME"  =>$r['USERNAME'],	
        "NAME"      =>$r['NAME'],
        "PASSWORD"  =>md5($r['PASSWORD']),
        "EMAIL"     =>$r['EMAIL_ADDRESS'],
        "ROLE_ID"   =>$r['ROLE_ID']	
	);
 
	array_push($rows, $temp);
}

header("Content-type:application/json");
$data=json_encode($rows);
echo $data ;

?>