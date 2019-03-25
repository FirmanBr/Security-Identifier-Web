<!doctype html>
<html lang="en">

<head>
	<meta charset='UTF-8'>
	<title>SID</title>
	<style>
		body{
			margin: 0px auto;
		}
		#loading {
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 999;
			position: fixed;
			background: url(http://preloaders.net/preloaders/477/Intersection.gif) 50% 50% no-repeat #fff;
		}
	</style>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$("#loading").fadeOut("slow");
		});
	</script>

</head>

<body>

	<?php	

error_reporting();

session_start();

	if(empty($_SESSION['ROLE_ID']))
	{
		?>
	<div id="loading"></div>
	<iframe src="http://127.0.0.1/sid/index/login.php" , frameborder="0" width="100%" height="100%" style="position:fixed;"></iframe>
	<?php
	}

	else if (!empty($_SESSION['ROLE_ID']))
	{
		if ($_SESSION['ROLE_ID'] == 1)
		{
			?>
	<div id="loading"></div>
	<iframe src="../admin/index.php" , frameborder="0" width="100%" height="100%" style="position:fixed;"></iframe>
	<?php
		}
		else if($_SESSION['ROLE_ID'] == 2)
		{
			?>
	<div id="loading"></div>
	<iframe src="../user/index.php" , frameborder="0" width="100%" height="100%" style="position:fixed;"></iframe>
	<?php
		}
		else 
		{
			?>
	<div id="loading"></div>
	<iframe src="http://127.0.0.1/sid/index/login.php" , frameborder="0" width="100%" height="100%" style="position:fixed;"></iframe>
	<?php
		}
}

else 
{
	?>
	<div id="loading"></div>
	<iframe src="http://127.0.0.1/sid/index/login.php" , frameborder="0" width="100%" height="100%" style="position:fixed;"></iframe>
	<?php
}
?>

</body>

</html>