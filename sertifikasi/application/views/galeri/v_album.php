<div role="main" class="main">

  <section class="page-header">
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Media</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h1>Album Gallery</h1>
        </div>
      </div>
    </div><!-- container-->
  </section>

  <div class="container">
    <div class="row">
      <div class="col-md-9">

      <h4>Album Foto kegiatan</h4>

      <div class="row">
      <?php foreach($album as $value){ ?>
        <div class="col-md-4" style="padding: 3px;">
          <div class="panel-image">
            <a class="thumbnail" href="<?php echo base_url().'galeri-foto-detail/'.$value->id ?>" style="text-decoration: none;">
            <div class="panel-image hide-panel-body">
              <img class="panel-title" src="<?php echo base_url()."assets/folder.png"?>" alt="sertifikasi" class="panel-image-preview" /><b style="margin-left: 10px;"><?php echo $value->nama_album ?></b>
            </div>
            </a>
          </div>
        </div>
      <?php } ?>
      </div><!-- row-->
      </div><!-- col-md-9-->

      <div class="col-md-3">
          <aside class="sidebar">

              <form>
                  <div class="input-group input-group-lg">
                      <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
                      <span class="input-group-btn">
                          <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                      </span>
                  </div>
              </form>

              <hr>
              <h4 class="heading-primary">Berita Lainnya</h4>
              <ul class="list list-icons list-primary list-side-borders mt-xlg">
              <?php foreach ($berita_lainnya as $key => $value) { ?>
                  <li><i class="fa fa-check"></i> <a href="<?=base_url().'profile/index/'.$value->id?>"><?=$value->judul?></a></li>

              <?php } ?>
              </ul>
          </aside>
      </div><!-- col-md-3-->

    </div><!-- row-->
  </div><!-- container-->

</div><!-- main-->
