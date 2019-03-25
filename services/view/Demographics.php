<?php

$serverName = "192.168.88.59"; 
$connectionInfo = array( "Database"=>"LEN_SID_REGISTRASI_ONLINE", "UID"=>"sa", "PWD"=>"Sa1234567890");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$Status = "SELECT * FROM dbo.DEMOGRAPHICS";
$sql = sqlsrv_query($conn, $Status);

$rows = array();
while($r= sqlsrv_fetch_array($sql)) {
	$temp = array (
		"REGISTRATION NUMBER"   =>$r[0],	
        "SEAFARER CODE"         =>$r[1],
        "LAST NAME"             =>$r[2],
        "FIRST NAME"            =>$r[3],
        "MIDDLE NAME"           =>$r[4],	
        "APPLICANT NAME"        =>$r[5],	
        "GENDER ID"             =>$r[6],
        "DOB"                   =>$r[7],
        "PLACE OF BIRTH"        =>$r[8],
        "NATIONALITY"           =>$r[9],	
		"PYSHCAL CHARACTERISTIC"=>$r[10],	
        "REASON FOR ISSUANCE"   =>$r[11],
        "P STREET"              =>$r[12],
        "P CITY"                =>$r[13],
        "P COUNTRY"             =>$r[14],	
        "P POSTAL CODE"         =>$r[15],	
        "M STREET"              =>$r[16],
        "M CITY"                =>$r[17],
        "M COUNTRY"             =>$r[18],
        "M POSTAL CODE"         =>$r[19],	
        "HOME PHONE"            =>$r[20],	
        "WORK PHONE"            =>$r[21],
        "CELL PHONE"            =>$r[22],
        "STATUS ID"             =>$r[23],
        "ENROLLMENT LOCATION"   =>$r[24],	
        "ENROLLMENT SCHEDULE"   =>$r[25],	
        "USERNAME"              =>$r[26],
        "CREATED"               =>$r[27],
        "LAST UPDATE"           =>$r[28],
        "LAST USERNAME"         =>$r[29]	
	);

	array_push($rows, $temp);
}

header("Content-type:application/json");
$data=json_encode($rows);
echo $data ;

?>