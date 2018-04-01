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
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/bootstrap-toggle/css/bootstrap-toggle.min.css" type="text/css">

  <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>

  <style>
    .body {
      white-space: nowrap;
      width: 20em;
      height: 20px;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    a.write {
      font-size: 15px;
      margin-left: 4px;
      margin-top: 3px;
    }
  </style>
</head>
  <body>
    <!-- include header -->
    <div id="wrapper">
      <?php $data['page'] = "forums"; ?>
      <?php $this->load->view('templates/admin', $data); ?>
      <!-- File upload form -->
      <div id="page-wrapper">
        <div class="page-wrapper">
          <div class="container-fluid">
            <a class="write" href="<?= base_url('Loadview/forum_admin') ?>"><i class="fa fa-plus-circle"></i> Add forum</a></br>
          </div>
        </div></br>
        <div class="container-fluid table-responsive">

          <!-- Posts table -->
          <table id="forumTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th>Topic</th>
                  <th>Body</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Access</th>
                  <th>Action</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                  <th>Topic</th>
                  <th>Body</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Access</th>
                  <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
              <!-- Foreach to organise the data from db(important!) before printing -->
              <?php foreach ($posts->result_array() as $row) { ?>
              <tr>
                <td>
                  <a href="<?= base_url('Formpost/show_post_by_id')?>/<?= $row['postID'] ?>">
                    <div class="body"><?php echo $row['postTitle'] ?></div>
                  </a>
                </td>
                <td>
                  <div class="body"><?php echo $row['postBody'] ?></div>
                </td>
                <td>
                  <?php $data = date_create($row['postDate']); ?>
                  <?php echo date_format($data, "d/m/Y"); ?>
                </td>
                <td><?php echo $row['postType'] ?></td>
                <td>
                  <input id="<?= $row['postID'] ?>" class="tg" type="checkbox" data-toggle="toggle"
                  data-on="Public" data-off="Private" data-size="mini" <?php if ($row['public'] == 'Public') echo 'checked';?> >
                </td>
                <td>
                  <a href="<?=base_url('Formpost/delete_post')?>/<?= $row['postID']?>" class="confirmation">Delete</a>
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
  $(function() {

    $('#forumTable').DataTable();

    $('.tg').on('change',function(event) {
      var st = ( $(this).prop('checked') )?'Public':'Private';
      $.ajax({
        type: "POST",
        url: "<?= base_url('Formpost/change_access') ?>",
        data: {id:$(this).prop('id'),status:st},
        success: function(data){
        },
        error: function() {
          alert("Error posting feed.");
        }
      });
    });

    $('.confirmation').on('click', function() {
        return confirm('Are you sure you want to delete this post?');
    });
  });
</script>
