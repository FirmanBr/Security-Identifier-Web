<?php

session_start();
error_reporting(0);

?>

<html>

<head>
  <title>home</title>
</head>

<body>

  <?php
  include '../koneksi.php';

  $params = array();
  $options = array(
  "Scrollable" => SQLSRV_CURSOR_KEYSET
  );
  $sql = "SELECT * from dbo.ACCOUNTS where USERNAME = '$username' and PASSWORD = '$password' ";
  $login = sqlsrv_query($conn, $sql, $params, $options);

  while ($data = sqlsrv_fetch_array($sql))
  {
    $Role = $data['ROLE_ID'];
  }
?>
  <?php

// mengecek session yang dipakai

if ($_SESSION[ROLE_ID] == "1")
{
  echo "<script language=\"JavaScript\">document.location='../admin/index.php'</script>";
}
else
if ($_SESSION[ROLE_ID] == "2")
{
  echo "<script language=\"JavaScript\">document.location='../user/index.php'</script>";
}
else
{
  echo "<script language=\"JavaScript\">document.location='../404.php'</script>";
}

?>
</body>

</html>