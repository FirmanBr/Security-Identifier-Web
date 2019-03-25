<?php
error_reporting(0);
session_start();

if ($_SESSION[ROLE_ID] != 2) {
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
</head>

<style type="text/css">
  .navbar-inverse {
    background-color: #25476A;
  }
</style>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-lg"><b>USER</span>
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
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../plugin/image/profile.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <?php session_start(); echo $_SESSION['username']; ?>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class=>
            <a href="index.php">
              <i class="fa fa-table"></i> <span>Registrasi</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="active">
            <a href="monitor.php">
              <i class="fa fa-address-card"></i> <span>Monitoring</span>
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
            <div class="box box-success">
              <div class="box-header with-border">
                <table id="status" class="table table-bordered table-hover">
                  <thead bgcolor="#eeeeee" align="center">
                    <tr>
                      <th>Registration Number</th>
                      <th>Seafarer Code</th>
                      <th>Reason For Issuance</th>
                      <th>Status</th>
                      <th>Location</th>
                      <th>Schedule</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2018
      </div>

      <strong>Copyright &copy; 2018 <a href="https://len.co.id">PT Len (PERSERO)</a>.</strong> All rights reserved.
    </footer>
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

  <script>
    $(document).ready(function () {
      $('#status').DataTable({
        "processing": true,
        "bFilter": false,
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "serverSide": true,
        "ajax": {
          url: "../services/tabel/status.php", // json datasource
          type: "post", // method  , by default get
          error: function () { // error handling
            $(".lookup-error").html("");
            $("#lookup").append(
              '<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
            );
            $("#lookup_processing").css("display", "none");

          }
        },
        dom: 'Bfrtip',
        lengthMenu: [
          [10, 25, 50, 10000],
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
    });
  </script>

</body>

</html>

<?php
}
?>