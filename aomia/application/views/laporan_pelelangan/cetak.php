<style>
td,th{
    padding: 1mm;
}
</style>


<page backtop="12mm" backbottom="10mm" backleft="5mm" backright="15mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left; width: 5%"><img src="<?php echo base_url().'assets/img/logo48.jpg';?>" /></td>
                <td style="text-align: left; width: 44%;font-weight: lighter;"><?=$konfigurasi->nama_unit?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left; width: 25%"><?=$konfigurasi->singkatan_unit?> :
                </td>
                <td style="text-align: center; width: 50%"> <?=$konfigurasi->alamat?> <?=$konfigurasi->no_telpon?></td>
                <td style="text-align: right; width: 25%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

  <table style="width: 100%; border: 0px;">
    <tr>
        <td style="text-align: center; width: 100%">
          <h3>LAPORAN HASIL PELELANGAN</h3> <hr>
        </td>
    </tr>
  </table>



  <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" >
    <tr style="font-weight:bold;">
    	<td style="width:4%;text-align: center;"> No </td>
    	<td style="width:12%;text-align: center;"> Bidding Date </td>
    	<td style="width:20%;"> Customer </td>
    	<td style="width:20%;"> Cars </td>
    	<td style="width:20%;"> Dealer </td>
    	<td style="width:15%;"> Bid Amount </td>
    	<td style="width:9%;text-align: center;"> Status </td>
    </tr>

    <?php
      $no =1;
      foreach($laporan as $key=>$value){
    ?>

    <tr>
      <td style="width:4%;text-align: center;"><?=$no?></td>
      <td style="width:12%;text-align: center;"><?=tgl_indo($value->tanggal_bid)?></td>
      <td style="width:20%;"><?=$value->customer?></td>
      <td style="width:20%;text-align: center;"><?=$value->mobil?></td>
      <td style="width:20%;"><?=$value->dealer?></td>
      <td style="width:15%;">Rp <?=number_format($value->total_harga,0,',','.')?></td>
      <td style="width:9%;text-align: center;"><?=$value->status?></td>
    </tr>

    <?php $no++;} ?>

  </table>

</page>
