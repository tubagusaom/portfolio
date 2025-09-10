<style type="text/css">
    td.name{
        width: 22%;
        padding: 5px;
    }
    td.isi{
        width: 70%;
        padding: 5px;
    }
    td.tikua{
        width: 5%;
        padding: 5px;
        text-align: center;
    }
    .cobaw{
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);       
    }
</style>
<?php
$array_dokumen_cetak = unserialize($global_setting->dokumen_cetak);
//var_dump($type);
//var_dump($array_dokumen_cetak);die();
if(isset($array_dokumen_cetak[0])){
  $this->load->view('pra_asesmen/apl01'); 
}
if(isset($array_dokumen_cetak[1])){
  $this->load->view('pra_asesmen/apl02'); 
}
if(isset($array_dokumen_cetak[2])){
  $this->load->view('pra_asesmen/mma'); 
}
if(isset($array_dokumen_cetak[3])){
  $this->load->view('pra_asesmen/mak03'); 
}
if(isset($array_dokumen_cetak[4])){
  $this->load->view('pra_asesmen/mak01'); 
}
if(isset($array_dokumen_cetak[5])){
  $this->load->view('pra_asesmen/mpa'); 
}
if(isset($array_dokumen_cetak[6])){
  $this->load->view('pra_asesmen/mpa02'); 
}
if(isset($array_dokumen_cetak[7])){
  $this->load->view('pra_asesmen/mpa_02'); 
}
if(isset($array_dokumen_cetak[8])){
  $this->load->view('pra_asesmen/mpa_02-01'); 
}
if(isset($array_dokumen_cetak[9])){
  $this->load->view('pra_asesmen/mpa03'); 
}
if(isset($array_dokumen_cetak[10])){
  $this->load->view('pra_asesmen/dpl'); 
}
if(isset($array_dokumen_cetak[11])){
  $this->load->view('pra_asesmen/mak02'); 
}
if(isset($array_dokumen_cetak[12])){
  $this->load->view('pra_asesmen/mak04'); 
}
if(isset($array_dokumen_cetak[13])){
  $this->load->view('pra_asesmen/mak05'); 
}
if(isset($array_dokumen_cetak[14])){
  $this->load->view('pra_asesmen/mak06'); 
}
 // $this->load->view('pra_asesmen/apl02');
 // $this->load->view('pra_asesmen/mma');
 // $this->load->view('pra_asesmen/mak03');
 // $this->load->view('pra_asesmen/mak01');
 //  $this->load->view('pra_asesmen/mpa');
 //  $this->load->view('pra_asesmen/mpa02');
 //  $this->load->view('pra_asesmen/mpa_02');
 //  $this->load->view('pra_asesmen/mpa_02-01');
 //  $this->load->view('pra_asesmen/mpa03');
 //         $this->load->view('pra_asesmen/dpl');
 // $this->load->view('pra_asesmen/mak02');
 // $this->load->view('pra_asesmen/mak04');
 // $this->load->view('pra_asesmen/mak05');
 // $this->load->view('pra_asesmen/mak06');

//}else{
//$this->load->view('pra_asesmen/mma');

//}
?>








