<div id="mainContent" >
  <div class="headerContent" >
  <div class="container">
<div class="row">
<div class="col-md-12" style="background-color: white;padding-top: 20px;padding-bottom: 20px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px">
	<div class="col-md-3">
		<?php $this->load->view('sertifikasi/left_menu_sertifikasi');?>
	</div>
	<div class="col-md-9">
		<ol class="breadcrumb">
    		<li><a href="<?=base_url()?>">Home</a></li>
            <li class="active">Article Category</li>
    	</ol>
       <div class="list-group">
       <?php foreach ($data as $key => $value) { 
              if($key == 0){
                $active = "active";
              }else{
                $active = "";
              }
       ?>
          <a href="<?=base_url().'artikel/category/'.$value->id?>" class="list-group-item <?=$active?>">
          <h4 class="list-group-item-heading"><?=$value->kategori?></h4>
          <p class="list-group-item-text"><?=$value->description?></p>
          </a>
      <?php } ?>
      </div>
    	
            
      
	</div>
</div>
</div>
</div>
</div>
</div></div>
</div> </div>