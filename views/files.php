<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forums</title>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/css/jquery.dataTables.min.css" type="text/css">

  <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <style>
    .body {
      white-space: nowrap;
      width: 25em;
      height: 20px;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    a.upload {
      font-size: 15px;
      margin-left: 4px;
      margin-top: 3px;
    }
  </style>
</head>
  <body>
    <!-- include header -->
    <div id="wrapper">
      <?php $data['page'] = "show_files"; ?>
      <?php $this->load->view('templates/admin', $data); ?>
      <!-- File upload form -->
      <div id="page-wrapper">
        <div class="page-wrapper">
          <div class="container-fluid">
            <a class="upload" href="<?= base_url('Upload') ?>"><i class="fa fa-upload"></i> Upload</a></br>
          </div>
        </div></br>
        <div class="container-fluid table-responsive">
          <!-- Posts table -->
          <table id="forumTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th>File name</th>
                  <th>Description</th>
                  <th>Upload date</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                  <th>File name</th>
                  <th>Description</th>
                  <th>Upload date</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
              <!-- Foreach to organise the data from db(important!) before printing -->
              <?php foreach ($files->result_array() as $row) { ?>
              <tr>
                <td>
                  <div class="">
                    <a target="_blank" href="<?= base_url('assets/files') . '/' . $row['fileName'] ?>">
                      <?php echo $row['fileName'] ?>
                    </a>
                  </div>
                </td>
                <td>
                  <div class="">
                    <?php echo $row['description'] ?>
                  </div>
                </td>
                <td>
                  <?php $data = date_create($row['uploadDate']); ?>
                  <?php echo date_format($data, "d/m/Y"); ?>
                </td>
                <td><?php echo $row['fileCategory'] ?></td>
                <td>
                  <a href="<?= base_url('Upload/edit_file') ?>/<?= $row['fileID'] ?>">Edit</a>
                  |
                  <a href="javascript:void(0)" class="confirmation">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
$(document).ready(function() {
    $('#forumTable').DataTable();

    $('.confirmation').on('click', function(e) {
        if (confirm('Are you sure you want to delete this file?')) {
          window.location.href="<?= base_url('Upload/delete_file/' . $row['fileID']) ?>";
        }
    });
  } );

</script>
