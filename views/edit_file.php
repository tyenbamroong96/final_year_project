<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/css/jquery.dataTables.min.css" type="text/css">

    <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <style>
      textarea {
        width: 100%;
        resize: none;
      }

      .head {
        font-size: 20px;
        margin: 0.7%;
        text-decoration: underline;
      }

      input[type="text"] {
        width: 100%;
      }
    </style>
  </head>
  <body>
    <!-- include header -->
    <div id="wrapper">
      <?php $data['page'] = "show_files"; ?>
      <?php $this->load->view('templates/admin', $data); ?>

      <!-- Users table -->
      <?php foreach ($file_by_id->result_array() as $row) {
      if ($row['fileCategory'] == "Sales") {
        $res = 1;
      } else {
        $res = 2;
      }?>
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="head">Edit file</div>
          <div class="col-md-12">
            <div class="col-md-1"></div>
            <div class="col-md-9">
              <table class="table table-bordered">
              <tbody>
                <form id="update_form" action="" method="post">
                  <tr>
                    <td class="col-md-2"> Type: </td>
                    <td class="col-md-10">
                      <input type="radio" name="fileCategory" value="Sales" <?php if($res==1) echo "checked"; ?>> Sales </br>
                      <input type="radio" name="fileCategory" value="Technical" <?php if($res==2) echo "checked"; ?>> Technical </br>
                      <?php break;} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Description: </td>
                    <td>
                      <textarea type="text" name="description" rows="5" value="<?= $row['description'];?>"></textarea>
                    </td>
                  </tr>
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
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

  <script>
    $(function(){
      $('#update_form').submit(function(event) {
        var form = $(this);
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "<?= base_url('Upload/update_file')?>/<?= $row['fileID'] ?>",
          data: form.serialize(),
          dataType: "html",
          success: function(data){
              if(data == 0) {
                alert("Update failed.");
              } else {
                alert("Update succesful.");
                window.location.href="<?= base_url('Admin/edit_files');?>";
              }
          },
          error: function() { alert("Error posting feed."); }
          });

        });
    });
  </script>
