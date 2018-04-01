<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Downloads</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/template.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/member.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/faq.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/font-awesome.min.css" type="text/css">
    <script src="<?= base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootbox.min.js"></script>

    <style>
        .category {
          font-size: 35px;
        	color:#a09785;
        	font-family:'helveticaneuemedium_italic';
        	font-style:italic;
        	text-shadow: 1px 1px 0 #856701;
          text-decoration: underline;
          margin: 15px;
        }

        .panel-heading {
          background-color: rgba(0, 0, 0, 0.8);
        }

    </style>
  <head>
  <body>
    <!-- Including header -->
    <?php
    if ($this->session->logged_in == FALSE) {
      $this->view('templates/header');
    } else {
      if ($this->session->userType == 'Member') {$this->view('templates/header2.php');}
      else {$this->view('templates/counselor.php');} }
    ?>

    <div class="container">
      <div class="panel-group" id="accordion">
          <div class="faqHeader">General questions</div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I submit my own Bootstrap templates or themes?</a>
                  </h4>
              </div>
              <div id="collapseTen" class="panel-collapse collapse">
                  <div class="panel-body">
                      A lot of the content of the site has been submitted by the community. Whether it is a commercial element/template/theme
                      or a free one, you are encouraged to contribute. All credits are published along with the resources.
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is the currency used for all transactions?</a>
                  </h4>
              </div>
              <div id="collapseEleven" class="panel-collapse collapse">
                  <div class="panel-body">
                      All prices for themes, templates and other items, including each seller's or buyer's account balance are in <strong>USD</strong>
                  </div>
              </div>
          </div>

          <div class="faqHeader">Students</div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who cen sell items?</a>
                  </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                      Any registed user, who presents a work, which is genuine and appealing, can post it on <strong>PrepBootstrap</strong>.
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">I want to sell my items - what are the steps?</a>
                  </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                      The steps involved in this process are really simple. All you need to do is:
                      <ul>
                          <li>Register an account</li>
                          <li>Activate your account</li>
                          <li>Go to the <strong>Themes</strong> section and upload your theme</li>
                          <li>The next step is the approval step, which usually takes about 72 hours.</li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How much do I get from each sale?</a>
                  </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse">
                  <div class="panel-body">
                      Here, at <strong>PrepBootstrap</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                      <br />
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                  </h4>
              </div>
              <div id="collapseSix" class="panel-collapse collapse">
                  <div class="panel-body">
                      There are a number of reasons why you should join us:
                      <ul>
                          <li>A great 70% flat rate for your items.</li>
                          <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>
                          <li>We are not an exclusive marketplace. This means that you can sell your items on <strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                  </h4>
              </div>
              <div id="collapseEight" class="panel-collapse collapse">
                  <div class="panel-body">
                      The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment.
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                  </h4>
              </div>
              <div id="collapseNine" class="panel-collapse collapse">
                  <div class="panel-body">
                      Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account.
                      The minimum amount of your balance should be at least 70 USD.
                  </div>
              </div>
          </div>

          <div class="faqHeader">Counselors</div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy a theme - what are the steps?</a>
                  </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                      Buying a theme on <strong>PrepBootstrap</strong> is really simple. Each theme has a live preview.
                      Once you have selected a theme or template, which is to your liking, you can quickly and securely pay via Paypal.
                      <br />
                      Once the transaction is complete, you gain full access to the purchased product.
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Is this the latest version of an item</a>
                  </h4>
              </div>
              <div id="collapseSeven" class="panel-collapse collapse">
                  <div class="panel-body">
                      Each item in <strong>PrepBootstrap</strong> is maintained to its latest version. This ensures its smooth operation.
                  </div>
              </div>
          </div>
      </div>
    </div>
  </body>
</html>
