<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Manage</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/font-awesome.min.css" type="text/css">

    <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <style>
      body {
        overflow-y: hidden;
        margin-bottom: 15px;
      }

      textarea {
        resize: none;
        width: 100%;
      }

      label {
      font-weight: normal !important;
      }

      .post-button {
        background:green;
        color:white;
        margin-top:10px;
      }

      .head {
        font-size: 20px;
        margin: 0.7%;
        text-decoration: underline;
      }

      .table td {
        text-align: right;
        vertical-align: middle !important;
      }

      input.info {
        width: 100%;
      }

      #radioBtn .notActive {
        color: #3276b1;
        background-color: #fff;
      }
    </style>
  </head>
  <body>
  <!-- include header -->
  <div id="wrapper">
    <?php $data['page'] = "forums"; ?>
    <?php $this->load->view('templates/admin', $data); ?>

    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="head">Create forum</div>
        <table class="table table-bordered">
          <tbody>
            <form action='<?=base_url('Formpost/data_submitted');?>' method="post">
              <tr>
                <td class="col-md-2"><label for="topic">Topic: </label></td>
                <td class="col-md-10"><input class="col-md-12" type=text name="postTitle" id="topic"></td>
              </tr>
              <tr>
                <td><label>Body: </label></td>
                <td><textarea class="ckeditor" name="postBody" placeholder="Please write down the details of your topic." rows="8"></textarea></td>
              </tr>
              <tr>
                <td><label for="postType" class="control-label text-right formtxt">Tag: </label></td>
                <td>
                  <div class="input-group">
                    <div id="radioBtn" class="btn-group">
                      <a class="btn btn-primary btn-sm notActive" data-toggle="postType" data-title="Sales">Sales</a>
                      <a class="btn btn-primary btn-sm notActive" data-toggle="postType" data-title="Technical">Technical</a>
                      <a class="btn btn-primary btn-sm active" data-toggle="postType" data-title="Others">Others</a>
                    </div>
                    <input type="hidden" name="postType" id="postType" value="Others">
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td><input class="post-button" type=submit value="Post" style="float: left;"></td>
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
  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  })
</script>
