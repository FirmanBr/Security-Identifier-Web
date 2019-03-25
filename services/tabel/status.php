<?php

include '../../koneksi.php';
include '../function/tanggal.php';

session_start();
$id = $_SESSION['USERNAME'];

$requestData= $_REQUEST;
$columns = array( 
  0 => 'REGISTRATION_NUMBER',
  1 => 'SEAFARER_CODE' ,
  2 => 'REASON' 
);  

$requestData= $_REQUEST;	
$sql = "SELECT REGISTRATION_NUMBER, SEAFARER_CODE, LAST_NAME, FIRST_NAME, GENDER_ID, DOB, ENROLLMENT_LOCATION, ENROLLMENT_SCHEDULE , STATUS_ID, REASON_FOR_ISSUANCE ";
$sql.="from dbo.DEMOGRAPHICS where APPLICANT_USERNAME = '$id'";
$query=sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' )) or die("status.php: get InventoryItems");
$totalData = sqlsrv_num_rows($query);
$totalFiltered = $totalData;   

$sql = "SELECT REGISTRATION_NUMBER, SEAFARER_CODE, LAST_NAME, FIRST_NAME, GENDER_ID, DOB, ENROLLMENT_LOCATION, ENROLLMENT_SCHEDULE , STATUS_ID, REASON_FOR_ISSUANCE  ";
$sql.=" FROM dbo.DEMOGRAPHICS WHERE 1 = 1 and APPLICANT_USERNAME = '$id'";

$query=sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' )) or die("status.php: get InventoryItems");
$totalFiltered = sqlsrv_num_rows($query); 
$start = $requestData['start'];
$akhir = $requestData['length'];
$sql.="   ORDER BY [REGISTRATION_NUMBER] OFFSET $start rows FETCH NEXT $akhir rows ONLY "; 
//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
$query=sqlsrv_query($conn, $sql,array(), array( "Scrollable" => 'static' )) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=sqlsrv_fetch_array($query) ) 
{  
  $nestedData=array(); 
  $nestedData[]   = $row["REGISTRATION_NUMBER"];	
  $nestedData[]   = $row["SEAFARER_CODE"];

  if ($row["REASON_FOR_ISSUANCE"] =='1')
  {
    $reason = 'Permohonan Baru';    
  }
  else if ($row["REASON_FOR_ISSUANCE"] =='2')
	{
  	$reason = 'Perpanjangan'; 
  }	
  else 
  {
    $reason = 'Penggantian'; 
  }

	$nestedData[] = strtoupper($reason);

  if($row["STATUS_ID"]=='ENROLLED')
  {
    $nestedData[] = '<td><center>
    <a href="#"  data-toggle="tooltip" title="You Can Not Enroll" class="btn btn-xs btn-success">ENROLLED</i></a>
    </center></td>'; 
        }
  else
    {
      $nestedData[] = '<td><center>
      <a href="#"  data-toggle="tooltip" title="You Can Not Enroll" class="btn btn-xs btn-danger">REGISTERED</i></a>
      </center></td>'; 
    }
        
	if ($row["ENROLLMENT_LOCATION"] =='1')
    {
      $lokasi = 'Jakarta';    
    }
  else 
		{
      $lokasi = 'Tanjung Benoa'; 
    }	

    $nestedData[]   = strtoupper($lokasi);
        
    if (is_null($row["ENROLLMENT_SCHEDULE"]))
    {
      $jadwal = 'Jadwal Belum Tersedia';    
    }
      else 
		{
      $jadwal = strtoupper(tanggal_indo($row["ENROLLMENT_SCHEDULE"])); 
    }
    $nestedData[]   = $jadwal;
		$data[] 				= $nestedData; 

		}
		
    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),  
        "recordsTotal"    => intval( $totalData ),  
        "recordsFiltered" => intval( $totalFiltered ), 
        "data"            => $data   
        );

echo json_encode($json_data);        
?>