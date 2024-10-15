<style type="text/css">

  a {
    text-decoration: none;
  }
</style>
<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active">Apresiasi LSP</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1><?php echo "APRESIASI LSP MSDM"; ?></h1>
      </div>
    </div>
  </div>
</section>
<div class="container">

  <div class="row">
    <div class="col-md-9">
      <div class="blog-posts single-post">

        <!-- <article class="post post-large blog-single-post"> -->

          <div>
            <!-- <div style=""> -->
              <embed src="<?=base_url();?>assets/files/Apresiasi-LSP-MSDM.pdf" width="100%" height="600"> </embed>
            <!-- </div> -->
          </div>
        <!-- </article> -->

      </div>
    </div>

    <div class="col-md-3">
      <?php $this->load->view('profile/left_menu_profile'); ?>
    </div>
  </div>

</div>
