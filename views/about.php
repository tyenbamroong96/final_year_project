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

    textarea {
      resize: none;
      width: 100%;
      border: 1px solid !important;
    }

    button {
      margin: 0.3%;
    }

    label {
    font-weight: normal !important;
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
      <?php $data['page'] = "about"; ?>
      <?php $this->load->view('templates/admin', $data); ?>

      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="head">About</div>
          <table class="table table-bordered">
            <tbody>
              <form action="<?= base_url('Message/update_about') ?>" method="post">
                <?php foreach ($about->result_array() as $row) { ?>
                <tr>
                  <td class="col-md-2"><label for="topic">Topic: </label></td>
                  <td class="col-md-10"><input name="topic" id="topic" value="<?= $row['topic'] ?>" class="info" type="text"></td>
                </tr>
                <tr>
                  <td><label for="body">Body: </label></td>
                  <td><textarea class="ckeditor" name="body" id="body"><?= urldecode($row['body']); ?></textarea></td>
                </tr>
                <?php break;} ?>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" class="btn btn-warning" id="save" style="float: left;" value="Save">
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
  $(document).ready(function(){
    $("#save").click(function(){
      if (confirm('Would you like to save the changes made?'))
        $("#save").submit();
    });
  });
</script>
