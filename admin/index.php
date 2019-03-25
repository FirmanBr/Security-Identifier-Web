<?php

error_reporting(0);
session_start();
include '../koneksi.php';

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
    .modal-content
    {
      border-radius: 0;
      border: 10px solid #A9A9A9;
    }
             </style>
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-lg">
          <img width=60 height=40 src='hubla.png' />
          <b>Administrator</b>
        </span>
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
                  <?php session_start(); echo $_SESSION['NAME']; ?></span>
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
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header with-border">
                <fieldset>

                  <div class="form-group">
                    <label for="tiga" class="col-xs-2 control-label">
                      <h5>JENIS PERMOHONAN</h5>
                    </label>
                    <div class="col-xs-4">
                      <select data-column="8" class="form-control search-input-select">
                        <option value="">---SELECT---</option>

                        <?php
                        $file = file_get_contents("http://localhost/sid/services/view/AplikasiMaster.php");
                        $json = json_decode($file, true);
                        foreach ($json as $key) 
                        {
                          if (is_array($key)) {
                            foreach ($key as $key => $status) {
                              if($key=='STATUS ID')
                                {
                                  echo $status . '<br />';
                                  echo "<option value='".$status."'>";
                                  echo $status;
                                  echo "</option>";
                                }
                              }
                            }
                          }                              
                          echo '</select>';
                          ?>

                      </select>
                    </div>

                    <label for="tiga" class="col-xs-1 control-label">
                      <h5>REASON</h5>
                    </label>
                    <div class="col-xs-4">
                      <select data-column="9" class="form-control search-input-select">
                        <option value="">---SELECT---</option>

                        <?php
                        $file = file_get_contents("http://localhost/sid/services/view/Reason.php");
                        $json = json_decode($file, true);
                              
                        foreach ($json as $key) 
                        {
                          if (is_array($key)) 
                          {
                            foreach ($key as $key => $reason) 
                            {
                              if($key=='REASON FOR ISSUANCE')
                              {
                                if ($reason=='1')
                                {
                                  $text = 'PERMOHONAN BARU';  
                                }
                                else if ($reason=='2')
                                {
                                  $text = 'PERPANJANGAN';  
                                }
                                else 
                                {
                                  $text = 'PENGGANTIAN';  
                                }
                                echo $text . '<br />';
                                echo "<option value='".$reason."'>";
                                echo $text;
                                echo "</option>";
                              }
                            }
                          }
                        }                              
                        echo '</select>';
                        ?>

                      </select>
                    </div>
                  </div>

                  <table id="employee-grid" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                    <thead>
                      <tr>
                        <th>Nomor Registrasi</th>
                        <th>Seafarer's Code</th>
                        <th>Nama Belakang</th>
                        <th>Nama Depan</th>
                        <th>Gender</th>
                        <th>Tanggal Lahir</th>
                        <th>Lokasi Enrollment</th>
                        <th>Tanggal Enrollment</th>
                        <th>Status</th>
                        <th>Jenis Permohonan</th>
                        <th>View</th>
                      </tr>
                    </thead>
                  </table>
              </div>
              </fieldset>
            </div>
          </div>
      </section>
      </form>

    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2018
      </div>

      <strong>Copyright &copy; 2018 <a href="https://len.co.id">PT Len (PERSERO)</a>.</strong> All rights reserved.
    </footer>

  </div>

  <div id="modalenroll" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <h4 class="modal-title">
            <p>
              <center>Enrollment</center>
            </p>
          </h4>
        </div>
        <div class="modal-body">
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="../plugin/bower_components/moment/min/moment.min.js"></script>
  <script src="../plugin/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="../plugin/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
  <script src="../plugin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
  <script src="../plugin/dist/js/demo.js"></script>
  <script src="../plugin/dist/js/adminlte.min.js"></script>
  <script src="../plugin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../plugin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="../plugin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../plugin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../plugin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="../plugin/bower_components/morris.js/morris.min.js"></script>
  <script src="../plugin/bower_components/raphael/raphael.min.js"></script>
  <script src="../plugin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

  <script type="text/javascript" language="javascript">
    $(document).ready(function () {
      var dataTable = $('#employee-grid').DataTable({
        "scrollY": "600px",
        "scrollCollapse": true,
        "paging": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
          url: "../services/tabel/employee-grid-data.php",
          type: "post",
          error: function () {
            $(".employee-grid-error").html("");
            $("#employee-grid").append(
              '<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
            );
            $("#employee-grid_processing").css("display", "none");
          }
        },

        dom: 'Bfrtip',
        lengthMenu: [
          [10, 25, 50, -1],
          ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [{
            extend: 'pageLength'
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Excel'
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'PDF',
            orientation: 'landscape',
            pageSize: 'LEGAL'
          },
          {
            extend: 'print',
            text: '<i class="fa fa-lg fa-print"></i>',
            titleAttr: 'PRINT',
            orientation: 'landscape',
            pageSize: 'LEGAL'
          }
        ]
      });
      $("#employee-grid_filter").css("display", "none"); // hiding global search box
      $('.search-input-text').on('keyup click', function () { // for text boxes
        var i = $(this).attr('data-column'); // getting column index
        var v = $(this).val(); // getting search input value
        dataTable.columns(i).search(v).draw();
      });
      $('.search-input-select').on('change', function () { // for select box
        var i = $(this).attr('data-column');
        var v = $(this).val();
        dataTable.columns(i).search(v).draw();
      });
    });
  </script>

  <script>
    function show_enroll(kd) {
      console.log(kd);
      $("#modalenroll .modal-body").load('modalview.php?kd=' + kd);
      $("#modalenroll").modal("show");
    };
  </script>

  <script>
    function show_enroll(kd) {
      console.log(kd);
      $("#modalenroll .modal-body").load('modalview.php?kd=' + kd);
      $("#modalenroll").modal("show");
    };
  </script>

</body>

</html>
<?php
}
?>