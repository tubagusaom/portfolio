<style>
.nav-sidebar { 
    width: 100%;
    padding: 8px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
    border-radius: 0; 
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #428bca; 
    color: #fff;
    text-shadow: 1px 1px 1px #666; 
}
.nav-sidebar .active a:hover {
    background-color: #428bca;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}
.box-categories .fa-ul > li > * {
    line-height: inherit;
    margin: 0;
}
</style>
<div class="container">
    <div class="row">
    <div class="col-md-12" style="padding-top: 15px;">
        <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>">Home</a></li>
            <li class="active">Frequently Asked Questions</li>
        </ol>
        </div>
        <div class="col-md-12">
             <h3>Frequently asked questions(FAQ)</h3>
            <div class="panel-group" id="accordion">
                <?php 
                    $no=1;
                    foreach($value as $key=>$data){
                        if($key == 0){
                            $in = 'in';
                        }else{
                            $in = '';
                        }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no;?>"><span class="glyphicon glyphicon-film">
                            </span> <?php echo $data->pertanyaan;?></a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $no;?>" class="panel-collapse collapse <?=$in?>">
                        <div class="panel-body">
                            <?php echo $data->jawaban;?>
                        </div>
                    </div>
                </div>
                <?php $no++; } ?>
            </div>
           
        </div>

    </div>
    </div>
</div>
