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
    .upload-box {
      background-color: rgba(0, 0, 0, 0.7);
      position: absolute;
      padding: 20px;
      color: orange;
      margin-top: 7%;
      border:solid black 1px
    }

    .upload-btn {
      color: black;
    }

    .description-box {
      color: black;
    }

    .head {
      font-size: 20px;
      margin: 0.7%;
      text-decoration: underline;
    }

    input.description-box {
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
      <?php $data['page'] = "upload_form"; ?>
      <?php $this->load->view('templates/admin', $data); ?>

      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="head">File Upload</div>
          <table class="table table-bordered">
            <tbody>
              <?php echo form_open_multipart('Upload/do_upload'); ?>
                <tr>
                  <td class="col-md-2"><label>Upload file: </label></td>
                  <td class="col-md-10" style="color: grey"><input type="file" name="userfile" size="20" /></td>
                </tr>
                <tr>
                  <td><label for="description">Include any description of the file:</label</td>
                  <td><textarea class="ckeditor" type="text" name="description" id="description" class="description-box"></textarea></td>
                </tr>
                <tr>
                  <td><label>Specify what category the file is:</label></td>
                  <td>
                    <div class="input-group">
                      <div id="radioBtn" class="btn-group">
                        <a class="btn btn-primary btn-sm active" data-toggle="postType" data-title="Sales">Sales</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="postType" data-title="Technical">Technical</a>
                      </div>
                      <input type="hidden" name="fileCategory" value="Sales">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" value="upload" /></td>
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
