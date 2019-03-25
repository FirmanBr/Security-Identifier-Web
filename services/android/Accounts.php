<?php

$serverName = "192.168.88.59"; 
$connectionInfo = array( "Database"=>"LEN_SID_REGISTRASI_ONLINE", "UID"=>"sa", "PWD"=>"Sa1234567890");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$products_arr=array();
$products_arr["Data"]=array();
//$response_data = null;

$Status = "SELECT * FROM dbo.ACCOUNTS";
$sql = sqlsrv_query($conn, $Status);

$rows = array();
while($r= sqlsrv_fetch_array($sql)) {
	$temp = array (
		"USERNAME"  =>$r['USERNAME'],	
        "NAME"      =>$r['NAME'],
        "PASSWORD"  =>$r['PASSWORD'],
        "EMAIL"     =>$r['EMAIL_ADDRESS'],
        "ROLE_ID"   =>$r['ROLE_ID']	
	);
    $response_data[] =$r ;
    array_push($products_arr["Data"], $temp);
    
}

//if (is_null($response_data)) {
//    $hasil = false;
//   } else {
//    $hasil = true;
//}

header("Content-type:application/json");
$data=json_encode($products_arr);
//$data1=json_encode($hasil);

//echo $data1 ;
echo $data;

?>