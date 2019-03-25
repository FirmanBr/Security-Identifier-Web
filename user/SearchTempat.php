<?php

include "../koneksi.php";
$id = $_GET['query'];
$sql = "SELECT PLACE_OF_BIRTH FROM dbo.DEMOGRAPHICS WHERE PLACE_OF_BIRTH LIKE '%".$id."%'group by PLACE_OF_BIRTH"; 
$result    = sqlsrv_query($conn,$sql);
	
$json = [];
while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) 
{
  $json[] = $row['PLACE_OF_BIRTH'];
}

echo json_encode($json);

?>