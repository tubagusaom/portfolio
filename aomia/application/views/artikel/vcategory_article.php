<style type="text/css">
    .nopadding {
        padding: 2px !important;
        margin: 0 !important;
    }
</style>
<div id="mainContent" >
<div class="headerContent" >
<div class="container">
<div class="row">
<div class="col-md-12" style="background-color: white;padding-top: 20px;padding-bottom: 20px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px">

	<div class="col-md-3 nopadding">
		<?php $this->load->view('sertifikasi/left_menu_sertifikasi');?>
	</div>
   <div class="col-md-9 nopadding">
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>">Home</a></li>
        <li><a href="<?=base_url().'artikel/category'?>">Article Category</a></li>
            <li class="active"><?=isset($data[0]->kategori)?$data[0]->kategori:'Belum ada data'?></li>
      </ol>
            <?php 
            //var_dump($data);
            foreach ($data as $key => $value) { 
                if($value->foto == ""){
                    $foto = base_url().'assets/img/logo.png';
                }else{
                    $foto = base_url().'assets/files/artikel/'.$value->foto;
                }
            ?>
              
            <div class="col-md-12">
            <div class="col-md-12 nopadding">
              <h4><strong><a href="<?=base_url().'profile/index/'.$value->id?>"><?=$value->judul?></a></strong></h4>
            </div>
            <div class="col-md-2 nopadding">
              <a href="<?=base_url().'profile/index/'.$value->id?>" class="thumbnail">
                  <img src="<?=$foto?>" width="260px" height="180" alt="">
              </a>
            </div>
            <div class="col-md-10 nopadding">      
              <p style="text-align: justify;">
                <?=$value->headline?>
              </p>
             
            </div>
         
        
            <div class="col-md-12 nopadding">
             
              <p>
                <i class="icon-user"></i> by <a href="#"><?=$value->nama_user?></a> 
                | <i class="icon-calendar"></i> <?=$value->created_when?>
                | <i class="icon-comment"></i> <a href="<?=base_url().'profile/index/'.$value->id?>">Read More</a>
                
                | <i class="icon-tags"></i> Tags : <a href="#"><col-md- class="label label-info">BNSP</col-md-></a> 
                <a href="#"><col-md- class="label label-info">Akuntansi</col-md-></a> 
                
              </p>
            </div>
          </div>
        <?php } ?>
  </div>
	
</div>
</div>
</div>
</div>
</div>
