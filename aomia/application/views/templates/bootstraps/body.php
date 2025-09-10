
  <?php
    $this->load->view("templates/bootstraps/popup_depan");
  ?>

  <!-- <div class="animated slideOutUp durationslidetb" data-appear-animation="slideOutUp" data-appear-animation-delay="0" data-appear-animation-duration="50s"> -->
  <div id="divTb" class="hide">

    <div class="toggle__tb"></div>
    <div class="body">

    <!-- <header id="header_tb" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 84, 'stickySetTop': '-70px'}"> -->
    <div class="header-tb">
      <?php $this->load->view("templates/bootstraps/menu_baru"); ?>
    </div>
    <!-- </header> -->

    <?php
      $this->load->view("templates/bootstraps/aomia");
    ?>

    <?php
      $this->load->view("templates/bootstraps/mempelai");
    ?>


    <?php
      $this->load->view("templates/bootstraps/wedding");
    ?>

    <?php
      // $this->load->view("templates/bootstraps/prewed");
    ?>

    <?php
      $this->load->view("templates/bootstraps/gift");
    ?>

    <?php
      $this->load->view("templates/bootstraps/guestbook");
    ?>

  </div>
