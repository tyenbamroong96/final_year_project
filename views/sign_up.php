<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/template.css">
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <script src="<?= base_url(); ?>assets/jquery/jquery-2.2.3.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootbox.min.js"></script>

    <style>
    .box {
      background-color: rgba(0, 0, 0, 0.7);
      max-width: 100%;
      height: 100%;
      padding: 13px;
      border: 1px solid;
    }

    .text {
      color: orange;
    }

    input[type="text"],  input[type="password"], input[type="email"] {
      color: black;
      width: 100%;
    }

    td {
      border-top: none !important;
    }
    </style>
  </head>
  <body>
    <!-- include header -->
    <?php $this->view('/templates/header.php') ?>
    <!-- Register form -->
    <div class="col-md-12">
      <div class="col-md-2"></div>
      <div class="col-md-8 container-fluid box">
        <div style="color: grey; margin-bottom: 5px;">
          Please fill in the form below. Once submitted, the form will first be processed by our team at Comanche international.
          We will email you (via the email address you entered) to notify once your account has been activated.
        </div>
        <table class="table text">
          <tbody>
            <form action="" id="signup" method="post">
              <tr>
                <td class="col-md-2"><label for="userTitle">Title: </label></td>
                <td class="col-md-10"><input type="text" name="userTitle" id="userTitle" placeholder="Title"></td>
              </tr>
              <tr>
                <td><label for="firstName">First name: </label></td>
                <td><input type="text" name="firstName" id="firstName" placeholder="First name" class="info"></td>
              </tr>
              <tr>
                <td><label for="lastName">Last name: </label></td>
                <td><input type="text" name="lastName" id="lastName" placeholder="Last name" class="info"></td>
              </tr>
              <tr>
                <td><label for="userEmail">Email: </label></td>
                <td><input required type="email" name="userEmail" id="userEmail" placeholder="Email" class="info"></td>
              </tr>
              <tr>
                <td><label for="userPass">Password: </label></td>
                <td><input required type="password" name="userPass" id="p1" placeholder="Password" class="info"></td>
              </tr>
              <tr>
                <td><label for="password">Re-enter password: </label></td>
                <td><input required type="password" name="password" id="p2" placeholder="Re-enter password" class="info"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Request" class="btn btn-primary"></td>
              </tr>
              <input class="hidden" name="userType" value="Member">
            </form>
          </tbody>
        </table>
      </div>
      <div class="col-md-2"></div>
    </div>
  </body>
</html>

<script>
  $(function(){
    $('#signup').submit(function(event) {
      var form = $(this);
      event.preventDefault();
      // Compare if user enter the same passwords
      if ($('#p1') == $('#p2')) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('Manage/create_user') ?>",
          data: form.serialize(),
          dataType: "html",
          success: function(data){
            bootbox.alert({
              message: "Your request has been received by our team. Please wait for confirmation from our team.",
              callback: function(){ window.location.href = "<?= base_url('Message/about') ?>";}
            });
          },
          error: function() { alert("Error posting feed."); }
          });
      } else {
        bootbox.alert({
          message: "Passwords do not match, please try again.",
        });
      }
      });
  });
</script>
