<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View & Edit forum</title>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/sb-admin.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/css/jquery.dataTables.min.css" type="text/css">

  <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  <style>
    body {
      overflow-x: hidden;
      margin-bottom: 15px;
      background-color: rgba(250, 250, 250, 0.1);
    }

    textarea {
      resize: none;
    }

    .forum-full {
      background-color: rgba(0, 0, 0, 0.85);
      max-width: 100%;
      max-height: 100%;
      border: 1px solid;
      padding: 15px;
      padding-bottom: 7.5px;
    }

    .topic {
      margin-top: 5px;
      color: rgba(215, 169, 60, 0.8);
    }

    .body-full {
      color: white;
      display: inline-block;
      overflow: auto;
    }

    .comment {
      position: absolute;
      right: 35px;
      bottom: 10px;
      font-size: 40px
    }

    .comment-box {
      width: 100%;
    }

    .tag {
      position: absolute;
      bottom: 3px;
      right: 160px;
      font-size: 12px;
    }

    hr {
      border: 0;
      height: 0;
      border-top: 1px solid rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }


    .body {
      white-space: nowrap;
      width: 16em;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .trash {
      font-size: 18px;
      text-align: center;
      vertical-align: middle !important;
    }

    a.write {
      font-size: 15px;
      margin-left: 4px;
      margin-top: 3px;
    }

    a.confirmation {
      color: black;
    }

    .remove-top-border >td{
      border-top: none !important;
    }

    .glyphicon-trash:hover {
      cursor: pointer;
    }

    .details {
      color: grey;
    }

    .date {
      float: right;
      margin-left: 10px;
      margin-right: 10px;
    }

  </style>
</head>
  <body>
    <!-- include header -->
    <div id="wrapper">
      <?php $data['page'] = "forums"; ?>
      <?php $this->load->view('templates/admin', $data); ?>
      <?php foreach ($post->result_array() as $row) { ?>
        <table class="table">
          <tbody> <tr>
            <td class="col-md-2 trash"> <a href="<?=base_url('Formpost/delete_post')?>/<?= $row['postID']?>" class="confirmation"> <i class="glyphicon glyphicon-trash"></i> </a> </td>
            <td class="col-md-8">
              <div class="forum-full">
                <h2 class="topic"> <?php echo $row['postTitle'] ?> </h2>
                <div class="body-full" >
                  <?php echo $row['postBody'] ?>
                </div>
                <div class="details">
                  Post by: user ID <?php echo $row['userID'] ?>
                  <span style="float:right;"><i class="fa fa-tag"></i> <?php echo $row['postType'] ?></span>
                  <div class="date">
                    <?php $data = date_create($row['postDate']) ?>
                    <?php echo date_format($data, "d M Y"); ?> <i class="fa fa-clock-o" style="margin-left: 0.01%;"></i> <?php echo date_format($data, "H:i"); ?>
                  </div>
                </div>
              </div>
            </td>
            <td class="col-md-2"></td>
          </tr> </tbody>
        </table>
      <?php } ?>
      <hr>
      <?php if ($comments->result_array() !== NULL) { ?>
        <!-- All comments -->
        <table class="table">
          <tbody>
            <?php foreach ($comments->result_array() as $comment): ?>
              <tr id="comment_tr_<?php echo $comment['commentID'] ?>" class="remove-top-border">
                <td class="col-md-2 trash"><i onclick="delete_comment( <?php echo $comment['commentID'] ?> )" class="glyphicon glyphicon-trash"></i></td>
                <td class="col-md-8">
                  <div class="forum-full">
                    <div class="body-full"> <?php echo $comment['commentBody'] ?> </div>
                    <div class="details">
                      <span>Post by: user ID <?php echo $comment['userID'] ?> </span>
                      <div class="date">
                        <?php $data = date_create($comment['commentDate']) ?>
                        <?php echo date_format($data, "d M Y"); ?>
                              <i class="fa fa-clock-o" style="margin-left: 0.01%;"></i>
                              <?php echo date_format($data, "H:i");
                        ?>
                    </div>
                  </div>
                </td>
                <td class="col-md-2"></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php } ?>

      <!-- Comment form -->
      <table class="table">
        <tbody> <tr>
          <td class="col-md-2 trash" style="font-size: 13px;">
            This is where you can reply to posts as admin.
          </td>
          <td class="col-md-8">
            <div class="forum-full">
              <form action="<?= base_url('Formpost/comment') . '/' . $row['postID'] ?>" method="post">
                <textarea class="col-md-12 ckeditor" name="commentBody" rows="8" placeholder="Write your comment..."></textarea>
                <input type="submit" value="Post" style="background:green;color:white;margin-top:10px;">
              </form>
            </div>
          </td>
          <td class="col-md-2"></td>
        </tr> </tbody>
      </table>
    </div>
  </body>
</html>

<script type="text/javascript">
    $('.confirmation').on('click', function() {
        return confirm('Are you sure you want to delete this post?');
    });
</script>
<!--
<script>
  $(function(){
    var editor = CKEDITOR.replace( 'body' );
    $('#edit_form').submit(function(event) {
      event.preventDefault();
      var form = $(this);
      var data = editor.getData();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Message/update_about') ?>",
        data: form.serialize() + '&body=' + data ,
        success: function(data){
              alert("Update successful.");
        },
        error: function() { alert("Update failed."); }
      });

      });
    });
</script> -->

<script>
  $(function(){
    $().submit(function(event) {
      var url = $(this);
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Formpost/delete_comment') ?>",
        data: form.serialize(),
        success: function(data){
            if (data == 1) {
              window.location.href="<?= base_url('Account/log_in') ?>";
            } else {
              $('#hidden_text').removeClass('hidden')
            }
        },
        error: function() { alert("Error posting feed."); }
      });

      });
    });

    function delete_comment(commentID) {
      if (confirm('Are you sure you want to delete this comment?')) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('Formpost/delete_comment') ?>",
          data: {id:commentID},
          success: function(data){
                alert("Update successful." );

                  console.log(commentID)
                $('#comment_tr_'+ commentID).hide();
          },
          error: function() { alert("Update failed."); }
        });
      }
    }
</script>
