<?php

error_reporting(0);
session_start();

if ($_SESSION[ROLE_ID] != 1) 
{
	echo "<script language=\"JavaScript\">document.location='../404.php'</script>";  
}
else
{

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SID</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../plugin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../plugin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugin/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../plugin/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../plugin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../plugin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
	<style>
  div.container 
	{
		margin: 0 auto;
		max-width:760px;
	}
	div.header 
	{
		margin: 100px auto;
		line-height:30px;
		max-width:760px;
	}
	body 
	{
		background: #f7f7f7;
		color: #333;
		font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
	}
	</style>
</head>

<body class="hold-transition skin-black-light sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-lg"><b>Administrator</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../plugin/image/profile.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?php session_start(); echo $_SESSION['NAME']; ?>
								</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="../plugin/image/profile.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php session_start(); echo $_SESSION['NAME']; ?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../plugin/image/profile.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <?php session_start(); echo $_SESSION['username']; ?>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="active">
            <a href="index.php">
              <i class="fa fa-table"></i> <span>Enrollment</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <form class="form-horizontal" method="POST" Action="update.php">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <fieldset>

                  <?php 			
									include '../koneksi.php';
									include '../services/function/tanggal.php';	 	 
                  $catch = $_GET['kd']; 
                  
                   
                  if (is_null($catch))
                  {
                    echo "<script language=\"JavaScript\">document.location='index.php'</script>";  
                  }
									$sql = "SELECT * from dbo.DEMOGRAPHICS where REGISTRATION_NUMBER = '$catch' ";
									$query=sqlsrv_query($conn, $sql);
									while( $row=sqlsrv_fetch_array($query) ) 
									{  									 									 
									?>
                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Nama Belakang</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="NamaBelakang" id="NamaBelakang" value="<?php echo $row['LAST_NAME'];?>" required>
                        <input hidden type="text" name="Register" id="Register" value="<?php echo $catch;?>">
                        <input hidden type="text" name="User" id="User" value="<?php echo $row['APPLICANT_USERNAME'];?>">
                      </div>
                      <label for="tiga" class="col-sm-2 control-label">Tempat Lahir</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="Tempat" id="Tempat" value="<?php echo tanggal_indo($row['DOB']);?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Nama Depan</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="NamaDepan" id="NamaDepan" value="<?php echo $row['FIRST_NAME'];?>" required>
                      </div>
                      <label for="tiga" class="col-sm-2 control-label">Kewarnegaraan</label>
                      
											<?php
											if($row['NATIONALITY'] =='1')
											{
												$negara = 'WNI';	
											}
										
											else
											{
												$negara = 'WNA';	
											}
											?>
                      
											<div class="col-sm-4">
                        <select disabled name="combo" class="form-control">
                          <option value="<?php echo $row['NATIONALITY'];?>">
                            <?php echo $negara;?>
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Nama Tengah</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="NamaTengah" id="NamaTengah" value="<?php echo $row['MIDDLE_NAME'];?>" required>
                      </div>
                      <label for="tiga" class="col-sm-2 control-label">Jenis Permohonan</label>
                      <?php
											if($row['REASON_FOR_ISSUANCE'] =='1')
											{
												$reason = 'Permohonan Baru';	
											}
											else if ($row['REASON_FOR_ISSUANCE'] =='2')
											{
												$reason = 'Perpanjangan';	
											}
											else 
											{
												$reason = 'Penggantian';	
											}
											?>
                      <div class="col-sm-4">
                        <select disabled name="combo" class="form-control">
                          <option value="<?php echo $row['REASON_FOR_ISSUANCE'];?>">
                            <?php echo $reason ?>
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Jenis Kelamin</label>
                      <?php
											if($row['GENDER_ID'] =='1')
											{
												$gender = 'Pria';	
											}
											else if ($row['GENDER_ID'] =='2')
											{
												$gender = 'Wanita';	
											}
											else 
											{
												$gender = 'X';	
											}
											?>
                      <div class="col-sm-4">
                        <select disabled name="combo" class="form-control">
                          <option value="<?php echo $row['GENDER_ID'] ;?>">
                            <?php echo $gender; ?>
                          </option>
                        </select>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <fieldset>
                    <h5><B>Data Alamat </h5></B>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Jalan</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="Jalan" id="Jalan" value="<?php echo $row['P_STREET'] ;?>" required>
                      </div>

                      <label for="tiga" class="col-sm-2 control-label">Telepon Rumah</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="telprumah" id="telprumah" value="<?php echo $row['HOME_PHONE_NO'] ;?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Kota</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="Kota" id="Kota" value="<?php echo $row['P_CITY'] ;?>" required>
                      </div>
                      <label for="tiga" class="col-sm-2 control-label">Telepon Kantor</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="telpkantor" id="telpkantor" value="<?php echo $row['WORK_PHONE_NO'] ;?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Negara</label>
                      <?php
											if($row['P_COUNTRY'] =='1')
											{
												$countryp= 'INDONESIA';	
											}
											else 
											{
												$countryp = 'OTHERS';	
											}
											?>
                      <div class="col-sm-4">
                        <select disabled name="combo" class="form-control">
                          <option value="<?php echo $row['P_COUNTRY'] ;?>">
                            <?php echo $countryp ;?>
                          </option>
                        </select>
                      </div>

                      <label for="tiga" class="col-sm-2 control-label">Nomor Handphone</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="HP" id="HP" value="<?php echo $row['CELL_PHONE_NO'] ;?>" required>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tiga" class="col-sm-2 control-label">Kode Pos</label>
                      <div class="col-sm-4">
                        <input disabled type="text" class="form-control" name="KodePos" id="KodePos" value="<?php echo $row['P_POSTAL_CODE'] ;?>" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
              </div>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">

                  <fieldset>
                    <h5><B>Alamat Surat

                        <div class="form-group">
                          <label for="tiga" class="col-sm-2 control-label">Jalan</label>
                          <div class="col-sm-4">
                            <input disabled type="text" class="form-control" name="JalanSrt" id="JalanSrt" value="<?php echo $row['M_STREET'] ;?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tiga" class="col-sm-2 control-label">Kota</label>
                          <div class="col-sm-4">
                            <input disabled type="text" class="form-control" name="KotaSrt" id="KotaSrt" value="<?php echo $row['M_CITY'] ;?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tiga" class="col-sm-2 control-label">Negara</label>
                          <?php
													if($row['M_COUNTRY'] =='1')
													{
														$countrym= 'INDONESIA';	
													}
													else 
													{
														$countrym = 'OTHERS';	
													}
													?>

                          <div class="col-sm-4">
                            <select disabled name="combo" class="form-control">
                              <option value="<?php echo 	$$row['M_COUNTRY'] ; ?>">
                                <?php echo 	$countrym ; ?>
                              </option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tiga" class="col-sm-2 control-label">Kode Pos</label>
                          <div class="col-sm-4">
                            <input disabled type="text" class="form-control" name="KodePosSrt" id="KodePosSrt" value="<?php echo $row['M_POSTAL_CODE'] ;?>" required>
                          </div>
                        </div>

                        <h5><B>Lokasi Rekam Data</h5>
                      	</B>

                      <div class="form-group">
                        <label for="tiga" class="col-sm-2 control-label">Lokasi</label>
                        <?php
												if($row['ENROLLMENT_LOCATION'] =='1')
												{
													$enroll= 'Jakarta';	
												}
												else 
												{
													$enroll = 'Tanjung Benoa';	
												}
												?>
                        <div class="col-sm-4">
                          <input disabled type="text" class="form-control" name="Lokasi" id="Lokasi" value="<?php echo $enroll ;?>" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="tiga" class="col-sm-2 control-label">Tanggal Approval</label>
                        <div class="col-sm-4">
                          <input type="date" class="form-control" name="Approv" id="Approv" value="" required>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-4" style="float: center;">
                          <button id="send" name="send" class="btn btn-success">Send</button>
                        </div>
                      </div>

                  </fieldset>
                </div>
              </div>
        </section>		
      </form>
      <?php } ?>

    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2018
      </div>

      <strong>Copyright &copy; 2018 <a href="https://len.co.id">PT Len (PERSERO)</a>.</strong> All rights reserved.
    </footer>

  </div>
  <script src="../plugin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../plugin/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="../plugin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../plugin/bower_components/raphael/raphael.min.js"></script>
  <script src="../plugin/bower_components/morris.js/morris.min.js"></script>
  <script src="../plugin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="../plugin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../plugin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="../plugin/bower_components/moment/min/moment.min.js"></script>
  <script src="../plugin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../plugin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../plugin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="../plugin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../plugin/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="../plugin/dist/js/adminlte.min.js"></script>
  <script src="../plugin/dist/js/pages/dashboard.js"></script>
  <script src="../plugin/dist/js/demo.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

</body>
</html>
<?php
}
?>