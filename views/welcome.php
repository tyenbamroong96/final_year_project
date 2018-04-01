<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About</title>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/font-awesome.min.css" type="text/css">

  <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  <style>
    input.info {
      width: 70%;
      border: 1px solid;
      float: left;
    }

    label {
    font-weight: normal !important;
    }

    textarea {
      resize: none;
      width: 100%;
      border: 1px solid !important;
    }

    button {
      margin: 0.3%;
    }

    .table td {
      text-align: right;
      vertical-align: middle !important;
    }

    .head {
      font-size: 20px;
      margin: 0.7%;
      text-decoration: underline;
    }

    .page {
      display: inline-block;
    }
  </style>
</head>
  <body>
    <!-- include header -->
    <div id="wrapper">
      <?php $data['page'] = "welcome"; ?>
      <?php $this->load->view('templates/admin', $data); ?>
      <!-- File upload form -->
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="head">Welcome</div>
          <table class="table table-bordered">
            <tbody>
              <form id="edit_form" action="<?= base_url('Message/update_welcome') ?>" method="post">
                <?php foreach ($welcome->result_array() as $row) { ?>
                <tr>
                  <td class="col-md-2"><label for="topic">Topic: </label></td>
                  <td class="col-md-10"><input name="topic" id="topic" value="<?= $row['topic'] ?>" class="info" type="text"></td>
                </tr>
                <tr>
                  <td>Body: </td>
                  <td><textarea class="ckeditor" name="body"><?= $row['body'] ?></textarea></td>
                </tr>
                <?php break;} ?>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" class="btn btn-warning" style="float: left;" value="Save">
                  </td>
                </tr>
              </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
  $(function(){
    var editor = CKEDITOR.replace( 'body' );
    $('#edit_form').submit(function(event) {
      event.preventDefault();
      var form = $(this);
      var data = editor.getData();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Message/update_welcome') ?>",
        data: form.serialize() + '&body=' + encodeURI(data) ,
        success: function(data){
              alert("Update successful.");
        },
        error: function() { alert("Update failed."); }
      });

      });
    });
</script>
