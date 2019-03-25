<!DOCTYPE html>
<html lang="en">

<head>
  <meta char+set="UTF-8">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!DOCTYPE html>
  <html>

  <head>
    <title>SID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript">
      addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
        window.scrollTo(0, 1);
      }
    </script>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/val.css" type="text/css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/jquery.pstrength-min.1.2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax+----/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="../js/index.js"></script>
    <script src="../js/register.js"></script>

  </head>

  <body>

    <div class="main-w3layouts wrapper">
      <h1>Registration</h1>
      <div class="main-agileinfo">
        <div class="agileits-top">
          <form id="validateForm" class="form-horizontal" method="POST" Action="catcha.php">

            <div class="form-group">
              <input class="text " id="Nama" type="text" name="Nama" placeholder="Nama..." autocomplete="off" required="">
            </div>

            <div class="form-group">
              <input class="text email" id="email" type="email" name="Email" placeholder="Email..." autocomplete="off"
                required="">
              <span id="popover-email" class="hide pull-center block-help"><i class="fa fa-info-circle text-danger"
                  aria-hidden="true"></i> Enter an valid email address</span>
            </div>

            <div class="form-group">
              <input class="text" id="password" name="password" type="password" autocomplete="off" placeholder="Password..."
                class="form-control input-md" required>
              <div id="popover-password">
                <p>Password Strength: <span id="result"> </span></p>
                <div class="progress">
                  <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input class="text" id="confirm-password" name="confirm-password" type="password" autocomplete="off"
                placeholder="Password Confirmation..." required>
              <span id="popover-cpassword" class="hide pull-center block-help"><i class="fa fa-info-circle text-danger"
                  aria-hidden="true"></i> Password don't match</span>
            </div>

            <div class="form-group">
              <div class="g-recaptcha" name="capcay" id="capcay" data-sitekey="6LeY8HEUAAAAAKuD6Vn305Ea2wx2jM5SBMv06voq"></div>
            </div>

            <input type="submit" id="send" name="send" value="SIGNUP">
          </form>
          <p>Don't have an Account? <a href="../index/login.php"> Login Now!</a></p>
        </div>
      </div>

      <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>

  </body>

  </html>

  <script src="assets/js/jquery-1.11.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.backstretch.min.js"></script>
  <script src="assets/js/retina-1.1.0.min.js"></script>
  <script src="assets/js/scripts.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('#validateForm').submit(function () {
        $.ajax({
          url: 'catcha.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function (data) {
            alert(data);
            $('[name=password]').val("");
            $('[name=confirm-password]').val("");
            $('[name=Nama]').val("");
            $('[name=capcay]').val("");
            $('.kontent').append('Berhasil Meload');
            window.location.replace('../index/');
          },

          error: function () {
            alert("Tidak dapat memproses data !");
          }
        });

        return false;
      });
    });
  </script>

</body>

</html>