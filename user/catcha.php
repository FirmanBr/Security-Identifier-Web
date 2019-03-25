<?php

include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] === "POST")
{

  $recaptcha_secret = "6LdZsXQUAAAAABQg8DKy_LEwNWKh7IzWEzDkJXqG";
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
  $response = json_decode($response, true);

  if($response["success"] === true)
  {
    if( $conn ) 
    {
      session_start();
      date_default_timezone_set('Asia/Jakarta');
			$date3          = date('m-d-Y H:i:s');
			$dateregis      = date('dmYHis');
			$RegisNum       = $date3;
			$RegisAwal      = $dateregis;
      $Seafarers      = $_POST["Seafarers"];
      $NamaBelakang   = $_POST["NamaBelakang"];
      $NamaDepan      = $_POST["NamaDepan"];
      $NamaTengah     = $_POST["NamaTengah"];
      $USERNAME       = $_SESSION['USERNAME'];
          
      if ($_POST["JenisKelamin"] =='PRIA')
      {           
				$Gender = '1' ;    
      }
      else if ($_POST["JenisKelamin"] =='WANITA')
      {
      	$Gender = '2' ;    
      }
      else
      {
        $Gender = '3' ;     
      }
			
			$date           = $_POST["date"];
      $Tempat         = $_POST["Tempat"];

      if ($_POST["Kewarnegaraan"] == 'INDONESIA')
      {
        $Kewarnegaraan ='1';    
      }
			else
			{
        $Kewarnegaraan ='0';
      }

      if ($_POST["Reason"] == 'PERMOHONAN BARU')
      {
         $Reason ='1';    
      }
      else if ($_POST["Reason"] == 'PERPANJANGAN')
      {
        $Reason ='2';
      }
      else 
      {
      	$Reason ='3';
			}
			
			$Jalan  = $_POST["Jalan"];
			$Kota   = $_POST["Kota"];

      if ($_POST["Negara"] == 'INDONESIA')
      {
      	$Negara ='1';    
      }
			else
			{
        $Negara ='0';
      }

      $KodePos        = $_POST["KodePos"];
      $JalanSrt       = $_POST["JalanSrt"];           
      $KotaSrt        = $_POST["KotaSrt"];
            
      if ($_POST["NegaraSrt"] == 'INDONESIA')
      {
        $NegaraSrt ='1';    
      }
			else
			{
        $NegaraSrt ='0';
      }

      $KodePosSrt     = $_POST["KodePosSrt"];
      $telprumah      = $_POST["telprumah"];
      $telpkantor     = $_POST["telpkantor"];
      $HP             = $_POST["HP"];
      $StatusID       = 'REGISTERED';

      if ($_POST["LokasiRekam"] == 'JAKARTA')
      {
        $LokasiRekam ='1';    
      }
			else
			{
        $LokasiRekam ='2';
      }

			$sql = "INSERT INTO dbo.DEMOGRAPHICS (REGISTRATION_NUMBER, SEAFARER_CODE, LAST_NAME, FIRST_NAME, MIDDLE_NAME
            , APPLICANT_USERNAME, GENDER_ID, DOB, PLACE_OF_BIRTH, NATIONALITY, REASON_FOR_ISSUANCE, P_STREET, P_CITY
            , P_COUNTRY, P_POSTAL_CODE, M_STREET, M_CITY, M_COUNTRY, M_POSTAL_CODE, HOME_PHONE_NO, WORK_PHONE_NO
            , CELL_PHONE_NO, STATUS_ID, ENROLLMENT_LOCATION, USERNAME, CREATED, LAST_UPDATED, LAST_UPDATED_USERNAME) 
            VALUES ($RegisAwal ,Cast('$Seafarers' AS Numeric ), '$NamaBelakang', '$NamaDepan', '$NamaTengah' ,'$USERNAME', '$Gender' 
            , '$date', '$Tempat', '$Negara', '$Reason', '$Jalan', '$Kota', '$Negara', Cast('$KodePos' AS Numeric ), '$JalanSrt', '$KotaSrt'
            , '$NegaraSrt',Cast('$KodePosSrt' AS Numeric ), '$telprumah', '$telpkantor', '$HP', '$StatusID', '$LokasiRekam'
            , '$USERNAME', ' $RegisNum', ' $RegisNum', '$USERNAME')";
            
      $stmt = sqlsrv_query( $conn, $sql);
		}
		
		if( $stmt === false ) 
		{
			echo 'GAGAL MENGAJUKAN';
    }
    else
    {
      echo 'APLIKASI SUDAH DIAJUKAN';
    }
      sqlsrv_close($conn);    
		}
		else
		{
			echo 'VERIFIKASI GAGAL';
		}
}