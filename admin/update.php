<?php

session_start();
require '../mail/PHPMailerAutoload.php';
require '../koneksi.php';
require '../services/function/tanggal.php';

if($conn)
{

  $TanggalEnroll  = $_POST['Approv'];
  $UserMail       = $_POST['User'];
//  $Register       = $_POST['Register']; 
  $UserAdmin      = $_SESSION['USERNAME']; 
  $StatusID       = 'ENROLLED';
  $pengenal       = $_POST['pengenal']; 
  date_default_timezone_set('Asia/Jakarta');
  $date           = date('m-d-Y H:i:s');
  $TanggalUpdate  = $date;

  $mail = new PHPMailer;
	$mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'firmanbrilian@gmail.com';
  $mail->Password = 'sainsdanteknologi09';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->From = "from@example.com";
  $mail->FromName = "Mailer";
  $mail->addReplyTo('admin@len.co.id', 'Administrator');
  $mail->addAddress( $UserMail);
  $mail->isHTML(true);
  $mail->Subject = "PEMBERITAHUAN ENROLLMENT SCHEDULE";
  $mail->Body = "Perihal pengajuan  Seafarers Identity Document (SID) Sudah Dibuat. Silahkan datang ke kantor cabang terdekat pada tanggal".' '.tanggal_indo($TanggalEnroll);

  if(!$mail->send()) 
  {
  	echo "Pengiriman Email Gagal";
  } 
  else 
  {
    $sql = "UPDATE dbo.DEMOGRAPHICS SET LAST_UPDATED_USERNAME= '$UserAdmin', ENROLLMENT_SCHEDULE = '$TanggalEnroll', STATUS_ID ='$StatusID' , LAST_UPDATED ='$TanggalUpdate' where REGISTRATION_NUMBER = '$pengenal' ";
    $stmt = sqlsrv_query( $conn, $sql);

    if ($stmt==false) 
    {   
      header('Location: index.php')  ;
    }
    else 
    {     
      header('Location: load.php')  ;
      sqlsrv_close($conn);
    }
    header('Location: load.php')  ;
  }
}

?>