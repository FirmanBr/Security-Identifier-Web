<?php

include '../function/tanggal.php';
include '../../koneksi.php';
error_reporting(0);


$requestData= $_REQUEST;	

$columns = array( 
    0 => 'REGISTRATION_NUMBER',
    1 => 'SEAFARER_CODE' ,
    2 => 'LAST_NAME',
    3 => 'FIRST_NAME',
    4 => 'GENDER_ID',
    5 => 'DOB',
    6 => 'ENROLLMENT_LOCATION',
    7 => 'ENROLLMENT_SCHEDULE',
    8 => 'STATUS_ID',
    9 => 'REASON_FOR_ISSUANCE'     
);

$sql = "SELECT REGISTRATION_NUMBER, SEAFARER_CODE, LAST_NAME, FIRST_NAME, GENDER_ID, DOB, ENROLLMENT_LOCATION, ENROLLMENT_SCHEDULE , STATUS_ID, REASON_FOR_ISSUANCE ";
$sql.="from dbo.DEMOGRAPHICS";
$query=sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' )) or die("employee-grid-data.php: get employees");
$totalData = sqlsrv_num_rows($query);
$totalFiltered = $totalData;   

$sql = "SELECT REGISTRATION_NUMBER, SEAFARER_CODE, LAST_NAME, FIRST_NAME, GENDER_ID, DOB, ENROLLMENT_LOCATION, ENROLLMENT_SCHEDULE , STATUS_ID, REASON_FOR_ISSUANCE  ";
$sql.=" FROM dbo.DEMOGRAPHICS WHERE 1 = 1";

if( !empty($requestData['columns'][8]['search']['value']) ){   
	$sql.=" AND STATUS_ID LIKE '".$requestData['columns'][8]['search']['value']."%' ";
}
if( !empty($requestData['columns'][9]['search']['value']) ){  
	$sql.=" AND REASON_FOR_ISSUANCE LIKE '".$requestData['columns'][9]['search']['value']."%' ";
}

$query=sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' )) or die("employee-grid-data.php: get employees");
$totalFiltered = sqlsrv_num_rows($query); 
$start = $requestData['start'];
$akhir = $requestData['length'];
$sql.="   ORDER BY [REGISTRATION_NUMBER] OFFSET $start rows FETCH NEXT $akhir rows ONLY "; 
//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
$query=sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' )) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=sqlsrv_fetch_array($query) ) {  
    $nestedData=array(); 

    $nestedData[]   = $row["REGISTRATION_NUMBER"];	
    $nestedData[]   = $row["SEAFARER_CODE"];	
    $nestedData[]   = strtoupper($row["LAST_NAME"]);
    $nestedData[]   = strtoupper($row["FIRST_NAME"]);
    if($row["GENDER_ID"]=='1'){
    $gender = 'Pria';    
    } 
    else if($row["GENDER_ID"]=='2'){
    $gender = 'Wanita';    
    }
    else{
    $gender = 'X';    
    }  
    $nestedData[]   = strtoupper($gender);
    $nestedData[]   = strtoupper(tanggal_indo($row["DOB"]));
    if($row["ENROLLMENT_LOCATION"]=='1'){
    $lokasi = 'Jakarta';    
    } 
    else {
    $lokasi = 'Tanjung Benoa';    
    }
    $nestedData[]   = strtoupper($lokasi);
    
    if (is_null($row["ENROLLMENT_SCHEDULE"]))
    {
    $schedule = $row["ENROLLMENT_SCHEDULE"];    
    }
    else
    {
        $schedule = tanggal_indo($row["ENROLLMENT_SCHEDULE"]);    
    }
    
    $nestedData[]   = strtoupper($schedule);
    
    $nestedData[]   = strtoupper($row["STATUS_ID"]);

    if($row["REASON_FOR_ISSUANCE"]=='1'){
    $reason = 'Permohonan Baru';    
    } 
    else if($row["REASON_FOR_ISSUANCE"]=='2')
    {
    $reason = 'Perpanjangan';    
    }
    else{
    $reason = 'Penggantian';    
    }      
    $nestedData[]   = strtoupper($reason);

    if ($row["STATUS_ID"]=='ENROLLED')
    {
        
    $nestedData[] = '<td><center>
                    <a href="#"  data-toggle="tooltip" title="You Can Not Enroll" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
                    </center></td>';       
    }
    else
    {
    $nestedData[] = '<td><center>
                    <a href="#" onclick="show_enroll('.urlencode($row['REGISTRATION_NUMBER']).')" data-toggle="tooltip" title="Enrollment" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-off"></i> </a>
                    </center></td>';
    }     
    $data[] = $nestedData;    
}

$json_data = array(
    "draw"            => intval( $requestData['draw'] ),   
    "recordsTotal"    => intval( $totalData ),  
    "recordsFiltered" => intval( $totalFiltered ), 
    "data"            => $data   
    );

echo json_encode($json_data);  

?>