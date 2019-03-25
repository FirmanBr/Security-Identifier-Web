<?php error_reporting(0);
session_start();

include '../koneksi.php';

if ($_SESSION[ROLE_ID] !=2) {
  echo "<script language=\"JavaScript\">document.location='../404.php'</script>";

}

else {
  ?>< !DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible"content="IE=edge"><title>SID</title><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"name="viewport"><link rel="stylesheet"href="../plugin/bower_components/bootstrap/dist/css/bootstrap.min.css"><link rel="stylesheet"href="../plugin/bower_components/font-awesome/css/font-awesome.min.css"><link rel="stylesheet"href="../plugin/bower_components/Ionicons/css/ionicons.min.css"><link rel="stylesheet"href="../plugin/dist/css/AdminLTE.min.css"><link rel="stylesheet"href="../plugin/dist/css/skins/_all-skins.min.css"><link rel="stylesheet"href="../plugin/bower_components/morris.js/morris.css"><link rel="stylesheet"href="../plugin/bower_components/jvectormap/jquery-jvectormap.css"><link rel="stylesheet"href="../plugin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"><link rel="stylesheet"href="../plugin/bower_components/bootstrap-daterangepicker/daterangepicker.css"><link rel="stylesheet"href="../plugin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"><script src="../js/jquery.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script><script src='https://www.google.com/recaptcha/api.js'></script><link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"><style>label.error {
    padding-left: .3em;
    color: #DC143C;
  }

  input.error {
    border: 3px solid #DC143C
  }

  #errbox {
    border: 1px solid #f00;
    background-color: #fef1ec
  }

  </style><script>$(document).ready(function () {
    $('#Seafarers').keyup(function () {
      this.value=this.value.replace(/[^0-9.]/g, '');
    }

    );
  }

  );

  $(document).ready(function () {
    $('#telprumah').keyup(function () {
      this.value=this.value.replace(/[^0-9.]/g, '');
    }

    );
  }

  );

  $(document).ready(function () {
    $('#telpkantor').keyup(function () {
      this.value=this.value.replace(/[^0-9.]/g, '');
    }

    );
  }

  );

  $(document).ready(function () {
    $('#HP').keyup(function () {
      this.value=this.value.replace(/[^0-9.]/g, '');
    }

    );
  }

  );

  $(document).ready(function () {
    $('#KodePos').keyup(function () {
      this.value=this.value.replace(/[^0-9.]/g, '');
    }

    );
  }

  );

  $(document).ready(function () {
    $('#KodePosSrt').keyup(function () {
      this.value=this.value.replace(/[^0-9.]/g, '');
    }

    );
  }

  );

  </script><script>$.validator.addMethod("minAge", function (value, element, min) {
    var today=new Date();
    var birthDate=new Date(value);
    var age=today.getFullYear() - birthDate.getFullYear();

    if (age > min + 1) {
      return true;
    }

    var m=today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m===0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    return age >=min;
  }

  , "You are not old enough!");

  </script><script type="text/javascript">$(document).ready(function () {
    $('#pengajuan').validate( {
      rules: {
        date: {
          required: true,
            minAge: 18
        }
      }

      ,
      //errorPlacement: function (error, element) {
      //element.attr("placeholder", error.text());
      //},
      //submitHandler: function (form) { // for demo
      //alert('valid form submitted'); // for demo
      //return false; // for demo
      //},
      messages: {
        Seafarers: {
          required: " Seafarers Code harus diisi"
        }

        ,
        date: {
          required: "Tanggal Lahir harus diisi",
            minAge: "Usia Minimal 18 Tahun"
        }

        ,
        NamaBelakang: {
          required: "Nama Belakang  harus diisi"
        }

        ,
        NamaDepan: {
          required: "Nama Depan  harus diisi"
        }

        ,
        JenisKelamin: {
          required: "Jenis Kelamin harus diisi"
        }

        ,
        Tempat: {
          required: "Tempat Lahir  harus diisi"
        }

        ,
        Kewarnegaraan: {
          required: "Kewarnegaraan  harus diisi"
        }

        ,
        Reason: {
          required: "Jenis Permohonan  harus diisi"
        }

        ,
        Jalan: {
          required: "Nama Jalan  harus diisi"
        }

        ,
        Kota: {
          required: "Nama Kota  harus diisi"
        }

        ,
        Negara: {
          required: "Nama Negara  harus diisi"
        }

        ,
        KodePos: {
          required: "Nomor Kode Pos  harus diisi"
        }

        ,
        HP: {
          required: "Nomor HP  harus diisi"
        }

        ,
        JalanSrt: {
          required: "Alamat Jalan harus diisi"
        }

        ,
        KotaSrt: {
          required: "Nama Kota  harus diisi"
        }

        ,
        NegaraSrt: {
          required: "Nama Negara  harus diisi"
        }

        ,
        KodePosSrt: {
          required: "Nomor Kode POS  harus diisi"
        }

        ,
        LokasiRekam: {
          required: "Nama Lokasi Rekam  harus diisi"
        }

        ,
        check2: {
          required: "Wajib Centang"
        }
      }

      ,
      invalidHandler: function (form, validator) {
        var errors=validator.numberOfInvalids();

        if (errors) {
          $("#errbox").html(validator.errorList[0].message);
          $("#errbox").show();
          validator.errorList[0].element.focus();
        }

        else {
          $("#errbox").hide();
        }
      }

      ,
      errorPlacement: function (error, element) {}

      ,
    }

    );
  }

  );

  </script><script>$(document).ready(function () {
    $('form[name=pengajuan]').submit(function (e) {
      var Seafarers=$('#Seafarers');
      var NamaBelakang=$('#NamaBelakang');

      if ( !Seafarers.val()) {
        Seafarers.addClass('error')
      }

      else {
        Seafarers.removeClass('error')
      }

      if ( !NamaBelakang.val()) {
        NamaBelakang.addClass('error')
      }

      else {
        NamaBelakang.removeClass('error')
      }

      if ( ! (Seafarers.val() && NamaBelakang.val())) e.preventDefault()
    }

    )
  }

  ) </script></head><body class="hold-transition skin-green sidebar-mini"><div class="wrapper"><header class="main-header"><a href="#"class="logo"><span class="logo-lg"><img width=60 height=40 src='../admin/hubla.png'/><b>USER</b></span></a><nav class="navbar navbar-static-top"><a href="#"class="sidebar-toggle"data-toggle="push-menu"role="button"><span class="sr-only">Toggle navigation</span></a><div class="navbar-custom-menu"><ul class="nav navbar-nav"><li class="dropdown tasks-menu"></li><li class="dropdown user user-menu"><a href="#"class="dropdown-toggle"data-toggle="dropdown"><img src="../plugin/image/profile.jpg"class="user-image"alt="User Image"><span class="hidden-xs"><?php session_start();
  echo $_SESSION['NAME'];
  ?></span></a><ul class="dropdown-menu"><li class="user-header"><img src="../plugin/image/profile.jpg"class="img-circle"alt="User Image"><p><?php session_start();
  echo $_SESSION['NAME'];
  ?></p></li><li class="user-footer"><div class="pull-right"><a href="../logout.php"class="btn btn-default btn-flat">Sign out</a></div></li></ul></li></ul></div></nav></header><aside class="main-sidebar"><section class="sidebar"><div class="user-panel"><div class="pull-left image"><img src="../plugin/image/profile.jpg"class="img-circle"alt="User Image"></div><div class="pull-left info"><?php session_start();
  echo $_SESSION['username'];
  ?></div></div>
  
  <ul class="sidebar-menu"data-widget="tree">
    <li class="header">
      <B>MAIN NAVIGATION</B>
    </li>
    <li class="active">
      <a href="index.php">
        <i class="fa fa-table">
        </i>
        <span>Registrasi</span>
        <span class="pull-right-container"></span>
      </a>
    </li>
    
    <li>
      <a href="monitor.php">
        <i class="fa fa-address-card"></i>
        <span>Monitoring</span>
        <span class="pull-right-container"></span>
      </a>
    </li>
  </ul>
</section>
</aside>

<div class="content-wrapper">
  <form id="pengajuan"class="form-horizontal"method="POST"action="catcha.php">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <fieldset>
                <legend><center>Registration Form</center></legend>
                  <div id="errbox"style="display: none"></div>
                  <br />
                  
                  <div class="form-group">
                    <label for="tiga"class="col-sm-2 control-label">Seafarers Code</label>
                      <div class="col-sm-4">
                        <input type="text"class="form-control "name="Seafarers"id="Seafarers"value=""placeholder="Nomor Seafarers Code" autocomplete="off"maxlength="20"required>
                      </div>
                      
                      <label for="tiga"class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                          <input type="date"class="form-control"name="date"id="date"value=""required>
                        </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="tiga"class="col-sm-2 control-label">Nama Belakang</label>
                      <div class="col-sm-4">
                        <input type="text"class="form-control"name="NamaBelakang"id="NamaBelakang"value=""autocomplete="off"required>
                      </div>
                    <label for="tiga"class="col-sm-2 control-label">Tempat Lahir</label>
                      <div class="col-sm-4">
                        <input type="text"class="typeahead form-control"name="Tempat"id="Tempat"value=""autocomplete="off"required></div>
                      </div>
                      <div class="form-group">
                        <label for="tiga"class="col-sm-2 control-label">Nama Depan</label>
                          <div class="col-sm-4">
                            <input type="text"class="form-control"name="NamaDepan"id="NamaDepan"value=""autocomplete="off" required>
                          </div>
                            <label for="tiga"class="col-sm-2 control-label">Kewarnegaraan</label>
                              <div class="col-sm-4">
                                <select name="Kewarnegaraan"class="form-control"id="Kewarnegaraan"required>
                                  <option value="INDONESIA">INDONESIA</option>
                                </select></div></div><div class="form-group">
                            <label for="tiga"class="col-sm-2 control-label">Nama Tengah</label>
                              <div class="col-sm-4">
                                <input type="text"class="form-control"name="NamaTengah"id="NamaTengah"autocomplete="off"value="">
                              </div>
                            <label for="tiga"class="col-sm-2 control-label">Jenis Permohonan</label>
                              <div class="col-sm-4"><select name="Reason"class="form-control"id="JenisPermohonan"required>
                                <option>---SELECT---</option>
                                <?php $file=file_get_contents("http://localhost/sid/services/view/Reason.php");
                                $json=json_decode($file, true);

                                foreach ($json as $key) {
                                  if (is_array($key)) {
                                    foreach ($key as $key=> $reason) {
                                      if($key=='REASON FOR ISSUANCE DESC') {
                                        echo $reason . '<br />';
                                        echo "<option value='".$reason."'>";
                                        echo $reason;
                                        echo "</option>";
                                      }
                                    }
                                  }
                                }

                                echo '</select>';
                                ?></select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="tiga"class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-4">
                                  <select name="JenisKelamin"class="form-control"id="JenisKelamin"required>
                                    <option>---SELECT---</option>
                                      <?php $file=file_get_contents("http://localhost/sid/services/view/Gender.php");
                                      $json=json_decode($file, true);

                                      foreach ($json as $key) {
                                        if (is_array($key)) {
                                          foreach ($key as $key=> $value) {
                                            if($key=='GENDER') {
                                              echo $value . '<br />';
                                              echo "<option value='".$value."'>";
                                              echo $value;
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
                            </fieldset>
                          </div>
                        </div>
                      </section>
                      
                      <section class="content">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="box box-success">
                              <div class="box-header with-border">
                                <fieldset><h5><B>Data Alamat </h5></B>
                              <div class="form-group">
                                <label for="tiga"class="col-sm-2 control-label">Jalan</label>
                                  <div class="col-sm-4">
                                    <input type="text"class="form-control"name="Jalan"id="Jalan"value=""autocomplete="off" required>
                                  </div>
                                <label for="tiga"class="col-sm-2 control-label">Telepon Rumah</label>
                                  <div class="col-sm-4">
                                    <input type="text"class="form-control"name="telprumah"placeholder="Nomor Telepon Rumah"id="telprumah" value=""maxlength="13"autocomplete="off">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="tiga"class="col-sm-2 control-label">Kota</label>
                                    <div class="col-sm-4">
                                      <input type="text"class="typeahead form-control"name="Kota"id="Kota"value=""autocomplete="off" required>
                                    </div>
                                  <label for="tiga"class="col-sm-2 control-label">Telepon Kantor</label>  
                                    <div class="col-sm-4">
                                      <input type="text"class="form-control"name="telpkantor"placeholder="Nomor Telepon Kantor"maxlength="13"id="telpkantor"value=""autocomplete="off">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="tiga"class="col-sm-2 control-label">Negara</label>
                                      <div class="col-sm-4">
                                        <select name="Negara"id="Negara"class="form-control"required>
                                          <?php $file=file_get_contents("http://localhost/sid/services/view/CountryMaster.php");
                                          $json=json_decode($file, true);

                                          foreach ($json as $key) {
                                            if (is_array($key)) {
                                              foreach ($key as $key=> $negara) {
                                                if($key=='COUNTRY NAME') {
                                                  echo $negara . '<br />';
                                                  echo "<option value='".$negara."'>";
                                                  echo $negara;
                                                  echo "</option>";
                                                }
                                              }
                                            }
                                          }

                                      echo '</select>';
                                      ?></select>
                                    </div>
                                  <label for="tiga"class="col-sm-2 control-label">Nomor Handphone</label>
                                    <div class="col-sm-4">
                                      <input type="text"class="form-control"name="HP"placeholder="Nomor Handphone"id="HP"maxlength="13"value=""autocomplete="off"required></div>
                                    </div>
                                    <div class="form-group">
                                      <label for="tiga"class="col-sm-2 control-label">Kode Pos</label>
                                        <div class="col-sm-4">
                                          <input type="text"class="form-control"name="KodePos"placeholder="Kode Pos"id="KodePos" maxlength="5"value=""autocomplete="off"required>
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
                                    <div class="box box-success">
                                      <div class="box-header with-border">
                                      <fieldset>
                                      <h5><B>Alamat Surat  
                                        <input type="checkbox"name="checker"id="checker"value="">(sama dengan alamat permanen)<br />
                                      </h5></B>                                      
                                      <div class="form-group">
                                        <label for="tiga"class="col-sm-2 control-label">Jalan</label>
                                          <div class="col-sm-4">
                                            <input type="text"class="form-control"name="JalanSrt"id="JalanSrt"value=""autocomplete="off"required>
                                          </div>
                                      </div>
                                        
                                      <div class="form-group">
                                        <label for="tiga"class="col-sm-2 control-label">Kota</label>
                                          <div class="col-sm-4">
                                            <input type="text"class="typeahead form-control"name="KotaSrt"id="KotaSrt"value="" autocomplete="off"required> 
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="tiga"class="col-sm-2 control-label">Negara</label>
                                          <div class="col-sm-4">
                                            <select name="NegaraSrt"id="NegaraSrt"class="form-control"required>
                                            
                                            <?php $file=file_get_contents("http://localhost/sid/services/view/CountryMaster.php");
                                            $json=json_decode($file, true);

                                            foreach ($json as $key) {
                                              if (is_array($key)) {
                                                foreach ($key as $key=> $negara) {
                                                  if($key=='COUNTRY NAME') {
                                                    echo $negara . '<br />';
                                                    echo "<option value='".$negara."'>";
                                                    echo $negara;
                                                    echo "</option>";
                                                  }
                                                }
                                              }                             
                                            }

                                            echo '</select>';
                                            ?></select>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="tiga"class="col-sm-2 control-label">Kode Pos</label>
                                            <div class="col-sm-4">
                                              <input type="text"class="form-control"name="KodePosSrt"placeholder="Kode Pos"maxlength="5" id="KodePosSrt"value=""autocomplete="off"required>
                                            </div>
                                        </div>
                                        
                                        <h5><B>Lokasi Rekam Data</h5></B>
                                          <div class="form-group">
                                            <label for="tiga"class="col-sm-2 control-label">Lokasi</label>
                                              <div class="col-sm-4">
                                                <select name="LokasiRekam"id="LokasiRekam"class="form-control"required>
                                                  <option>---SELECT---</option>
                                                  
                                                    <?php $file=file_get_contents("http://localhost/sid/services/view/Location.php");
                                                    $json=json_decode($file, true);

                                                    foreach ($json as $key) {
                                                      if (is_array($key)) {
                                                        foreach ($key as $key=> $lokasi) {
                                                          if($key=='LOCATION NAME') {
                                                            echo $lokasi . '<br />';
                                                            echo "<option value='".$lokasi."'>";
                                                            echo $lokasi;
                                                            echo "</option>";
                                                          }
                                                        }
                                                      }
                                                    }

                                                    echo '</select>';
                                                    ?></select>
                                                  </div>
                                                </div>
                                              </section>
                                              
                                              <section class="content">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="box box-success">\
                                                      <div class="box-header with-border">
                                                        <fieldset>
                                                          <input type="checkbox"name="check2"value=""id="cek"onclick="javascript:gotcha();"required>Saya Menyatakan Bahwa Data Adalah Benar<br /></h5></B>
                                                          
                                                          <div class="form-group">
                                                            <div class="col-sm-4">
                                                              <div class="g-recaptcha"nama="capcay"id="capcay"data-sitekey="6LdZsXQUAAAAAKPPayqg24DZ6wsFGwH-tO21WeYY">
                                                              </div>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="form-group">
                                                            <div class="col-md-4"style="float: center;">
                                                              <button id="send"name="send"class="btn btn-success"id="verifikasi">Send</button>
                                                            </div>
                                                          </div>
                                                        </fieldset>
                                                      </div>
                                                    </div>
                                                  </section>
                                                </form>
                                              </div><footer class="main-footer">
                                              
<div class="pull-right hidden-xs"><b>Version</b>2018 </div><strong>Copyright &copy; 2018 <a href="https://len.co.id">PT Len (PERSERO)</a>.</strong>All rights reserved. </footer></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script><script src="../js/user.js"></script><script>$('input.typeahead').typeahead( {
    source: function (query, process) {
      return $.get('SearchTempat.php', {
        query: query
      }

      , function (data) {
        console.log(data);
        data=$.parseJSON(data);
        return process(data);
      }

      );
    }
  }

  );
  </script><script type="text/javascript">document.getElementById('capcay').style.display='none';

  function gotcha() {
    if (document.getElementById('cek').checked) {
      document.getElementById('capcay').style.display='block';
    }

    else {
      document.getElementById('capcay').style.display='none';
    }
  }

  </script><script type="text/javascript">$(document).ready(function () {
    $("#pengajuan").validate();
  }

  );

  </script><script>$(document).ready(function () {
    $("input#checker").bind("click", function (o) {
      if ($("input#checker:checked").length) {
        $("#JalanSrt").val($("#Jalan").val());
        $("#KotaSrt").val($("#Kota").val());
        $("#NegaraSrt").val($("#Negara").val());
        $("#KodePosSrt").val($("#KodePos").val());
      }

      else {
        $("#JalanSrt").val("");
        $("#KotaSrt").val("");
        $("#NegaraSrt").val("");
        $("#KodePosSrt").val("");
      }
    }

    );
  }

  );

  </script><script type="text/javascript">$(function () {
    $("#pengajuan").validate();

    $("#pengajuan").submit(function (event) {
      var isvalidate=$("#pengajuan").valid();

      if (isvalidate) {

        $.ajax( {
          url: 'catcha.php',
          type: 'POST',
          data: $(this).serialize(),

          success: function (data) {
            alert(data);
            $('[name=Seafarers]').val("");
            $('[name=date]').val("");
            $('[name=NamaBelakang]').val("");
            $('[name=Tempat]').val("");
            $('[name=NamaDepan]').val("");
            $('[name=Kewarnegaraan]').val("");
            $('[name=NamaTengah]').val("");
            $('[name=Reason]').val("");
            $('[name=JenisKelamin]').val("");
            $('[name=Jalan]').val("");
            $('[name=telprumah]').val("");
            $('[name=Kota]').val("");
            $('[name=telpkantor]').val("");
            $('[name=Negara]').val("");
            $('[name=HP]').val("");
            $('[name=KodePos]').val("");
            $('[name=JalanSrt]').val("");
            $('[name=KotaSrt]').val("");
            $('[name=NegaraSrt]').val("");
            $('[name=KodePosSrt]').val("");
            $('[name=LokasiRekam]').val("");
            $('[name=g-recaptcha]').val("");
            $('.kontent').append('Berhasil Meload');
          }

          ,

          error: function (e) {
            alert("Tidak dapat memproses data !");
          }

        }

        );
      }

      return false;

    }

    );
  }

  );
  </script><script src="../plugin/bower_components/jquery-ui/jquery-ui.min.js"></script><script>$.widget.bridge('uibutton', $.ui.button);
  </script><script src="../plugin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script><script src="../plugin/bower_components/raphael/raphael.min.js"></script><script src="../plugin/bower_components/morris.js/morris.min.js"></script><script src="../plugin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script><script src="../plugin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script><script src="../plugin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script><script src="../plugin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script><script src="../plugin/bower_components/moment/min/moment.min.js"></script><script src="../plugin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><script src="../plugin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script><script src="../plugin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script><script src="../plugin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script><script src="../plugin/bower_components/fastclick/lib/fastclick.js"></script><script src="../plugin/dist/js/adminlte.min.js"></script><script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script><script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script><script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script><script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script><link rel="stylesheet"type="text/css"href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/><link rel="stylesheet"type="text/css"href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/></body></html><?php
}

?>