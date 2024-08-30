<style media="screen">
  .a-tb {
    color: #999;
  }

  .a-tb:hover {
    color: rgb(0, 103, 244);
  }
</style>


<div role="main" class="main">
  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li>
              <a href="<?=base_url() ?>" class="a-tb">
                      <i class="fa fa-home"></i> Home
                    </a>
            </li>
            <li class="active">Profil</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h1>
                  <?php
                    $judul = isset($data->judul) ? $data->judul : 'Docars';
                    echo $judul;
                  ?>
                </h1>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div>
          <i class="fa fa-calendar"></i>
          <?php echo tgl_indo($data->tanggal_buat) ?> /
          <i class="fa fa-user"></i> admin
        </div>
        <?php
                  //var_dump($data->foto);
                  //if($data->status_image !=0){
                if ($data->show_image == '1') {
                    if ($data->foto != '') {
                        $gambar_db = isset($data->foto) ? $data->foto : '';
                        if ($gambar_db == "") {
                            $gambar = base_url().'assets/img/images.jpg';
                        } else {
                            $gambar = base_url().'assets/files/artikel/'.$data->foto;
                        }
                        echo '<img  width="100%" class="img-thumbnail"  src="' . $gambar . '"  />';
                    }
                }
                ?>
          <div style="margin-top: 15px;"></div>
          <div style="text-align: justify;">
            <?php
                  echo $data->isi ;
                  ?>
          </div>
          <hr />
          <!-- <div class="col-md-12" style="margin: 0px;">
            <h4>Artikel / Berita Lainnya</h4>
            <ul>
              <?php
                        foreach($berita_lainnya as $value){
                            echo "<li><a href='".base_url()."profile/index/".$value->id.".html'>".strip_tags($value->headline)."</a></li>";
                        }
                    ?>
            </ul>
            <hr />
          </div> -->
      </div>
    </div>
  </div>
</div>
