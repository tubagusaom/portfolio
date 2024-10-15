 <div class="container">
<div class="row">
<div class="col-md-12" style="background-color: white;padding-top: 10px;padding-bottom: 10px;width: 96%;margin-left: 15px;padding-left: 2px;padding-right: 2px"><?php
            if($this->session->flashdata('result')!=''){
        ?>
        <div class="alert alert-<?=$this->session->flashdata('mode_alert')?>" role="alert"><?php echo '<h2>'.$this->session->flashdata('result').'</h2>'; ?><br/>
        
        </div>
        <?php
        }
        ?>
 </div></div></div>