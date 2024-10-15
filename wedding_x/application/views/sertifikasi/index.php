<div id="mainContent" >
  <div class="headerContent" >
  <div class="container">
<div class="row">
<div class="col-md-12" style="background-color: white;padding-top: 20px;padding-bottom: 20px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px">
   <div>
    <div class="col-md-3">
        <?php $this->load->view('sertifikasi/left_menu_sertifikasi');?>
    </div>
    <div class="col-md-9">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>">Home</a></li>
            <li class="active"><?=$data->judul?></li>
        </ol>
        <h2>
                <?php
                    $judul = isset($data->judul) ? $data->judul : 'LSP Geomatika';
                    echo $judul;
                ?>
          </h2>
          <div >
            <i class="fa fa-calendar"></i> <?php echo tgl_indo($data->tanggal_buat) ?> /
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
                  
                  <?php
                  echo $data->isi ; 
                  ?>
                <hr />
                <div class="col-md-12" style="margin: 0px;"><h4>Artikel / Berita Lainnya</h4>
                <ul>
                    <?php
                        foreach($berita_lainnya as $value){
                            echo "<li><a href='".base_url()."profile/index/".$value->id.".html'>".strip_tags($value->headline)."</a></li>";
                        }
                    ?>
                </ul>  <hr /></div>
                
                         <div class="col-md-4 list_bottom" style="margin: 0px;"><h4>Tautan Populer</h4>
                <ul>
                    <a target="_blank" href="http://www.bnsp.go.id"><li>BNSP</li></a>
                    <a target="_blank" href="http://www.online.lspteknisiakuntansi.or.id"><li>Pendaftaran Online</li></a>
                    <a target="_blank" href="<?=base_url().'kontak/index'?>"><li>Kontak LSP</li></a>
                    
                    
                </ul>  </div>
                        <div class="col-md-4 list_bottom" style="margin: 0px;"><h4>Lembaga Pendukung</h4>
                <ul>
                    <a target="_blank" href="http://www.bnsp.go.id"><li>BNSP</li></a>
                    <a target="_blank" href="http://www.ristekdikti.go.id"><li>RISTEKDIKTI</li></a>
                    <a target="_blank" href="http://www.kemenkeu.go.id"><li>KEMENKEU</li></a>
                    <a target="_blank" href="http://www.kompas.com"><li>KOMPAS</li></a>
                    <a target="_blank" href="http://www.krakatausteel.com"><li>PT KRAKATAU STEEL</li></a>
                    
                    
                </ul>  </div> 
                <div class="col-md-4 list_bottom" style="margin: 0px;"><h4>LSP Jejaring</h4>
                <ul>
                    <a target="_blank" href="http://www.lspteknisiakuntansi.or.id"><li>LSP Teknisi Akuntansi</li></a>
                    <a target="_blank" href="http://www.lsp-abi.org"><li>LSP Alat Berat Indonesia</li></a>
                    <a target="_blank" href="http://www.lspgeomatika.or.id"><li>LSP Geomatika</li></a>
                    <a target="_blank" href="http://www.lspkomputer.id"><li>LSP Komputer</li></a>
                    <a target="_blank" href="http://www.lsp-migas.org"><li>LSP Migas</li></a>
                    <a target="_blank" href="http://www.lspmsdm.org"><li>LSP MSDMI</li></a>
                </ul> 
                </div>
    </div>
<div>
</div>
</div>
</div></div>
</div> </div>