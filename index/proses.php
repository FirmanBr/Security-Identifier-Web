<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>

	<?php

error_reporting(0);
$username = $_POST['email'];
$password = md5($_POST['pass']);

$ch = curl_init('http://localhost/sid/services/view/Accounts.php');
$jsonData = array( 'USERNAME' => $username, 'PASSWORD' => $password );
$jsonDataEncoded = json_encode($jsonData);

// echo "<script language=\"JavaScript\">document.location='../500.html'</script>";	

curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
$sess_arr = json_decode($result, true);

if(empty($sess_arr)) 
{ 
	echo "<script language=\"JavaScript\">document.location='../500.html'</script>";
}
else 
{
	foreach ($sess_arr as $sess) 
	{
		if( ($sess['USERNAME']!=$username) and ($sess['PASSWORD']!=$password) )
		{
			$message="<script type='text/javascript'>
			toastr.success('GAGAL LOGIN', {positionClass: 'toast-top-right', timeOut: '10000'})
			</script>";
			echo $message;
			echo "<script language=\"JavaScript\">document.location='index.php'</script>";
		}
    else if( ($sess['USERNAME']==$username) and ($sess['PASSWORD']==$password) )
    {
      session_start();
      $_SESSION['USERNAME']  = $sess['USERNAME'];
			$_SESSION['ROLE_ID']  = $sess['ROLE_ID'];
					
      if ($_SESSION['ROLE_ID'] == "1") 
      {
				$message="<script type='text/javascript'>
				toastr.success('BERHASIL LOGIN', {positionClass: 'toast-top-right', timeOut: '10000'})
				</script>";
				echo $message;
				echo "<script language=\"JavaScript\">document.location='index1.php'</script>";
        //echo "<script language=\"JavaScript\">document.location='../admin/index.php'</script>";
			}
			else if ($_SESSION['ROLE_ID'] =="2") 
			{
				$message="<script type='text/javascript'>
				toastr.success('BERHASIL LOGIN', {positionClass: 'toast-top-right', timeOut: '10000'})
				</script>";
				echo $message;
				echo "<script language=\"JavaScript\">document.location='index1.php'</script>";
				//echo "<script language=\"JavaScript\">document.location='../user/index.php'</script>";
			} 
			else 
			{
				$message="<script type='text/javascript'>
				toastr.success('GAGAL LOGIN', {positionClass: 'toast-top-right', timeOut: '10000'})
				</script>";
				echo $message;
				echo "<script language=\"JavaScript\">document.location='../index.php'</script>";
			} 
		}

	}
	echo "<script language=\"JavaScript\">document.location='index.php'</script>";	
}

?>

</body>

</html>