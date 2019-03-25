<?php

include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] === "POST")
{
  $recaptcha_secret = "6LeY8HEUAAAAAMg5dEM_xV8-pTUlL6IpHDcEK46D";
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
  $response = json_decode($response, true);

  if($response["success"] === true)
  {
    if( $conn ) 
    {
      $Email          = $_POST["Email"];
      $Sandi          = $_POST["password"];
      $SandiKonfirm   = $_POST["confirm-password"];
      $Nama           = $_POST["Nama"];
      $Role           = '2';    
      $sql = "INSERT INTO dbo.ACCOUNTS (USERNAME, NAME, PASSWORD, EMAIL_ADDRESS, ROLE_ID) VALUES ('$Email', '$Nama', cast('$SandiKonfirm' AS Varbinary (MAX)), '$Email', '$Role')";
      $stmt = sqlsrv_query( $conn, $sql);

      if( $stmt === false ) 
      {
        echo 'Gagal';
        //document.location 
 
      }
      else
      {
        echo 'Berhasil';
        
      }
    }
  sqlsrv_close($conn);    
	}
	else
	{
		echo 'Gagal Verifikasi';
  }
}
?>