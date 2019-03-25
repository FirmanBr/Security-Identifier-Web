<?php $serverName="192.168.88.59";
$connectionInfo=array("Database"=>"LEN_SID_REGISTRASI_ONLINE", "UID"=>"sa", "PWD"=>"Sa1234567890");
$conn=sqlsrv_connect($serverName, $connectionInfo);

$Status="SELECT * FROM dbo.APPLICATION_STATUS_MASTER";
$sql=sqlsrv_query($conn, $Status);

$rows=array();

while($r=sqlsrv_fetch_array($sql)) {
	$temp=array ("STATUS ID"=>$r[0],
	"STATUS DESCRIPTION"=>$r[1]);

	array_push($rows, $temp);
}

header("Content-type:application/json");
$data=json_encode($rows);
echo $data;

?>