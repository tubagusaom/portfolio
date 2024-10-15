<style type="text/css">
/*Panel tabs*/
.panel-primary{
  border-color: #2c4b87;
}
.panel-primary>.panel-heading{
  color: #fff;
  background-color: #365899;
  border-color: #2c4b87;
}

.panel-tabs {
  position: relative;
  bottom: 30px;
  clear:both;
  border-bottom: 1px solid transparent;
}

.panel-tabs > li {
  float: left;
  margin-bottom: -1px;
  color: #fff;
}

.panel-tabs > li > a {
  margin-right: 2px;
  margin-top: 4px;
  line-height: .85;
  border: 1px solid transparent;
  border-radius: 4px 4px 0 0;
  color: #b3c7f0;
}

.panel-tabs > li > a:hover {
  border-color: transparent;
  color: #fff;
  background-color: transparent;
}

.panel-tabs > li.active > a,
.panel-tabs > li.active > a:hover,
.panel-tabs > li.active > a:focus {
  color: #fff;
  cursor: default;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
  background-color: #102857;
  border-bottom-color: transparent;
}
#tabFB{
  margin-right: 10px;
}
img.fbwae{
  width: 140px;
  height: 100px;
  margin-bottom: 22px;
  margin-right: 5px;
  /* padding-right: 10px; */
}

.tab-pane a{
  color: #365899;
}
div.abc{
  height: 120px;
  float: left;
  margin-top: 15px;
}
div.ttl{
  height: 120px;
  margin-top: 15px;
}
div.art{
  text-align: center;
  margin-top: -15px;
}

.art:hover{
  cursor: pointer;
  opacity: 1.0;
  background: #F0F3F4;
}
.lsp{
  height: 30px;
  margin-top: -50px;
}
.lsp a{
  text-decoration: none;
}
</style>

<div class="col-md-6" style="margin-top: 20px">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Social Media</h3>
      <span class="pull-right">
        <!-- Tabs -->
        <ul class="nav panel-tabs">
          <li class="active"><a href="#tab3" data-toggle="tab" title="video"><i class="glyphicon glyphicon-facetime-video"></i></a></li>
          <li ><a href="#tabIG" data-toggle="tab"><i class="glyphicon glyphicon-facebook"> </i> Facebook</a></li>
          <li><a href="#tabFB" data-toggle="tab"> IG</a></li>
        </ul>
      </span>
    </div>
    <div class="panel-body">
      <div class="tab-content col-md-6" style="width: auto; height: 330px;  overflow-y: scroll; overflow-x: hidden; text-decoration: none;">
        <div class="tab-pane active" id="tab3">
          <iframe width="450" height="350" src="https://www.youtube.com/embed/iYv-dDAO4BI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="tab-pane" id="tabIG" >

            </div>

            <div class="tab-pane" id="tabFB">

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6" style="margin-top: 20px">

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Populer</h3>
          <span class="pull-right">
            <!-- Tabs -->
            <ul class="nav panel-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab" title="Jadwal Uji"><i class="glyphicon glyphicon-calendar"> </i></a></li>
              <li><a href="#tab2" data-toggle="tab" title="file"><i class="glyphicon glyphicon-file"></i></a></li>

            </ul>
          </span>
        </div>
        <div class="panel-body">
          <div class="tab-content">

            <div class="tab-pane active" id="tab1">
              <h4>Jadwal Uji Kompetensi</h4>
              <?php foreach ($jadwal as $key => $value) { ?>
              <div class="well">
                <a href="<?= base_url().'uji_kompetensi.html'?>" target="_blank"><?= $value->jadual ?> ( <?= tgl_indo($value->tanggal) ?> ) Kuota <?=$value->kuota_peserta?></a>
              </div>

              <?php } ?>

              <button type="button" class="btn btn-primary btn-block">Jadwal Lainnya</button>
            </div>

            <div class="tab-pane" id="tab2">
              <h4>Download Dokumen</h4>
              <?php foreach ($repo as $key => $value) { ?>
              <a href="<?=base_url().'repositori/klik_download/'.$value->id?>" style="font-size: 14px;font-style: bold;">
                <?php
                $string = $value->nama_dokumen;
                echo word_limiter($string, 10);
                ?></a><br/>
                <label style="font-size: 10px;"><?= $value->nama_file ?></label>
                <br>
                <?php  } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
