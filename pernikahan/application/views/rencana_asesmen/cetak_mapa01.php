<style media="screen">
  .tabeltbl{
    width:100%;
    font-size: 12px;
    border-collapse:
    collapse;
    background: #fff;
  }
  .tabeltb, .tabeltb th, .tabeltb td{
    border-color:#777;
  }
  .tx-top{
    vertical-align: top;
  }
</style>
<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left; width: 5%"><img src="<?php echo FCPATH.'assets/img/logo48.png';?>" alt="" style="width:33px;"></td>
                <td style="text-align: left; width: 64%;font-weight: lighter;">
                    <?=$aplikasi->nama_unit?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
      <table style="width:92%; border:none; padding-left:45px;">
        <tr style="border:none; border-top: 1px solid #333;">
          <td style="width: 90%; border:none; border-top: 1px solid #333; font-size: 8pt; text-transform:uppercase;"><?=$aplikasi->nama_unit?> | <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
          <td style="width:10%; text-align:center; border-top: 1px solid #333; color: white; background-color: #f44758">[[page_cu]]</td>
        </tr>
      </table>
    </page_footer>
    <span style="font-size:11pt; font-weight:bold;">FR.MAPA.01 MERENCANAKAN AKTIVITAS DAN PROSES ASESMEN</span>
    <br/>
    <br/>
    <table class="tabeltbl" border="1" cellpadding="5" cellspacing="5">
        <tr>
          <td colspan="4" style="width:100%; font-weight:bold;background-color: #FF8C00;">1. Menentukan Pendekatan Asesmen</td>
        </tr>
       <tr>
        <td rowspan="2" style="width:30%;"> Skema Sertifikasi <br/> (KKNI/Okupasi/Klaster)</td>
        <td style="width:19%;" > Judul</td>
        <td style="width:1.5%;">:</td>
        <td style="width:50%;"> <?= $data_asesi->skema ?></td>
      </tr>
      <tr>
        <td style="width:19%; border-left:0px;" > Nomor</td>
        <td style="width:1.5%;">:</td>
        <td style="width:50%;"> <?= $data_asesi->kode_skema ?></td>
      </tr>

    </table>
    <table class="tabeltbl" border="1" cellpadding="5" cellspacing="5">
        <tr>
          <td class="tx-top" rowspan="16" style="width:5%;">1.1</td>
          <td class="tx-top" rowspan="3" style="width:25%;"> Kandidat</td>
          <td colspan="5" style="width:70%;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_kandidat) &&  $data_uji->is_kandidat == 1?"checked":"uncheck").'.png'; ?>"> Hasil pelatihan dan / atau pendidikan</td>
        </tr>
        <tr>
          <td colspan="5" style="width:70%;border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_kandidat) &&  $data_uji->is_kandidat == 2?"checked":"uncheck").'.png'; ?>"> Pekerja berpengalaman</td>
        </tr>
        <tr>
          <td colspan="5" style="width:70%;border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_kandidat) &&  $data_uji->is_kandidat == 3?"checked":"uncheck").'.png'; ?>"> Pelatihan / belajar mandiri</td>
        </tr>

        <tr>
        <?php
          if (isset($data_uji->is_perpanjangan)) {
            $perpanjangan = $data_uji->is_perpanjangan;
          }else {
            $perpanjangan = $data->is_perpanjangan;
          }
        ?>
          <td class="tx-top" style="border-left:0px;"> Tujuan Asesmen</td>
          <td class="tx-top" style=""><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($perpanjangan) &&  $perpanjangan == 0?"checked":"uncheck").'.png'; ?>"> Sertifikasi</td>
          <td class="tx-top" style=""><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($perpanjangan) &&  $perpanjangan == 1?"checked":"uncheck").'.png'; ?>"> RCC</td>
          <td class="tx-top"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($perpanjangan) &&  $perpanjangan == 2?"checked":"uncheck").'.png'; ?>"> RPL</td>
          <td class="tx-top"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($perpanjangan) &&  $perpanjangan == 3?"checked":"uncheck").'.png'; ?>"> Hasil<br>Pelatihan/<br>proses<br>pembelajaran</td>
          <td class="tx-top"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($perpanjangan) &&  $perpanjangan == 4?"checked":"uncheck").'.png'; ?>"> Lainnya</td>
        </tr>
        <tr>
          <td class="tx-top" rowspan="8" style="border-left:0px;"> Konteks Asesmen</td>
          <td colspan="2" style="width:60px;">Lingkungan</td>
          <td colspan="2"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_lingkungan) &&  $data_uji->is_lingkungan == 1?"checked":"uncheck").'.png'; ?>"> Tempat kerja nyata</td>
          <td><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_lingkungan) &&  $data_uji->is_lingkungan == 2?"checked":"uncheck").'.png'; ?>"> Tempat kerja simulasi</td>
        </tr>
        <tr>
          <td colspan="2" style="width:60px;border-left:0px;"> Peluang untuk mengumpulkan bukti dalam sejumlah situasi</td>
          <td colspan="2" class="tx-top"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_peluang_bukti) &&  $data_uji->is_peluang_bukti == 1?"checked":"uncheck").'.png'; ?>"> Tersedia</td>
          <td class="tx-top"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_peluang_bukti) &&  $data_uji->is_peluang_bukti == 2?"checked":"uncheck").'.png'; ?>"> Terbatas</td>
        </tr>
        <tr>
          <td rowspan="3" colspan="2" style="width:60px;border-left:0px;"> Hubungan antara standar kompetensi</td>
          <td colspan="3" style="width:48%;border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_hubungan_kompetensi) &&  $data_uji->is_hubungan_kompetensi == 1?"checked":"uncheck").'.png'; ?>">Bukti untuk mendukung asesmen/RPL : <b id="rating1"></b></td>
        </tr>
        <tr>
          <td colspan="3" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_hubungan_kompetensi) &&  $data_uji->is_hubungan_kompetensi == 2?"checked":"uncheck").'.png'; ?>"> Aktivitas kerja di tempat kerja kandidat:</td>
        </tr>
        <tr>
          <td colspan="3" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_hubungan_kompetensi) &&  $data_uji->is_hubungan_kompetensi == 3?"checked":"uncheck").'.png'; ?>"> Kegiatan Pembelajaran:</td>
        </tr>
        <tr>
          <td rowspan="3" colspan="2" style="width:60px;border-left:0px;"> Siapa yang melakukan asesmen / RPL</td>
          <td colspan="3"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_lembaga) &&  $data_uji->is_lembaga == 1?"checked":"uncheck").'.png'; ?>"> Oleh Lembaga Sertifikasi</td>
        </tr>
        <tr>
          <td colspan="3" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_lembaga) &&  $data_uji->is_lembaga == 2?"checked":"uncheck").'.png'; ?>"> Oleh Organisasi Pelatihan</td>
        </tr>
        <tr>
          <td colspan="3" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_lembaga) &&  $data_uji->is_lembaga == 3?"checked":"uncheck").'.png'; ?>"> Oleh asesor perusahaan</td>
        </tr>
        <tr>
          <td class="tx-top" rowspan="4" style="border-left:0px;"> Orang yang relevan<br>untuk dikonfirmasi</td>
          <td colspan="5"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_relevan_asesor) &&  $data_uji->is_relevan_asesor == 1?"checked":"uncheck").'.png'; ?>"> Manajer sertifikasi LSP</td>
        </tr>
        <tr>
          <td colspan="5" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_relevan_asesor) &&  $data_uji->is_relevan_asesor == 2?"checked":"uncheck").'.png'; ?>"> Master Assessor / Master Trainer / Asesor Utama kompetensi</td>
        </tr>
        <tr>
          <td colspan="5" style="width:48%;border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_relevan_asesor) &&  $data_uji->is_relevan_asesor == 3?"checked":"uncheck").'.png'; ?>"> Manajer pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</td>
        </tr>
        <tr>
          <td colspan="5" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_relevan_asesor) &&  $data_uji->is_relevan_asesor == 4?"checked":"uncheck").'.png'; ?>"> Lainnya : Kepala TUK</td>
        </tr>
        <tr>
          <td class="tx-top" rowspan="5" style="vertical-align: top;">1.2</td>
          <td class="tx-top" rowspan="5"> Tolok ukur asesmen</td>
          <td colspan="5" style="width:60%;">
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_tolak_ukur) &&  $data_uji->is_tolak_ukur == 1?"checked":"uncheck").'.png'; ?>"> Standar Kompetensi: SKKNI
          </td>
        </tr>
        <tr>
          <td colspan="5" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_tolak_ukur) &&  $data_uji->is_tolak_ukur == 2?"checked":"uncheck").'.png'; ?>"> Kriteria asesmen dari kurikulum pelatihan</td>
        </tr>
        <tr>
          <td colspan="5" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_tolak_ukur) &&  $data_uji->is_tolak_ukur == 3?"checked":"uncheck").'.png'; ?>"> Spesifikasi kinerja suatu perusahaan atau industri:</td>
        </tr>
        <tr>
          <td colspan="5" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_tolak_ukur) &&  $data_uji->is_tolak_ukur == 4?"checked":"uncheck").'.png'; ?>"> Spesifikasi Produk:</td>
        </tr>
        <tr>
          <td colspan="5" style="border-left:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_tolak_ukur) &&  $data_uji->is_tolak_ukur == 5?"checked":"uncheck").'.png'; ?>"> Pedoman khusus</td>
        </tr>
    </table><br/>
    <strong style="background-color: #FF8C00;"> 2. Mempersiapkan Rencana Asesmen </strong>
    <?= $elemen_kuk ?>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
    <tr>
        <td style="width:100%; background-color: #FF8C00;" class="tx-bold" colspan="3">3. Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi </td>
      </tr>
      <tr>
        <td class="tx-top" style="width:5%; border-right:0px;" >3.1</td>
        <td class="tx-top"  style="width:35 border-left:0px;" > a. Karakteristik Kandidat</td>
        <td class="tx-top" style="width:60%;">
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_karakter[0]) &&  $array_karakter[0] == 1?"checked":"uncheck").'.png'; ?>"> Ada
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_karakter[0]) &&  $array_karakter[0] == 2?"checked":"uncheck").'.png'; ?>"> Tidak Ada * karakteristik khusus Kandidat<br/>
          jika ada, tuliskan : <?=isset($array_karakter[2])?$array_karakter[2]:''?>
        </td>
      </tr>
      <tr>
        <td style="width:5%; border-right:0px;"></td>
        <td class="tx-top" style="width:35%;">b. Kebutuhan kontekstualisasi terkait tempat kerja</td>
        <td class="tx-top" style="width:60%;">
        <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_kebutuhan[0]) &&  $array_kebutuhan[0] == 1?"checked":"uncheck").'.png'; ?>"> Ada
        <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_kebutuhan[0]) &&  $array_kebutuhan[0] == 2?"checked":"uncheck").'.png'; ?>"> Tidak Ada * kebutuhan kontekstualisasi<br/>
        jika ada, tuliskan : <?=isset($array_kebutuhan[2])?$array_kebutuhan[2]:''?>
        </td>
        
      </tr>
      <tr>
        <td class="tx-top" style="width:5%; border-right:0px;">3.2</td>
        <td class="tx-top" style="width:35%; ">Saran yang diberikan oleh paket pelatihan atau pengembang pelatihan</td>
        <td class="tx-top" style="width:60%">
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_saran[0]) &&  $array_saran[0] == 1?"checked":"uncheck").'.png'; ?>"> Ada
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_saran[0]) &&  $array_saran[0] == 2?"checked":"uncheck").'.png'; ?>"> Tidak Ada * saran<br/>
          jika ada, tuliskan : <?=isset($array_saran[2])?$array_saran[2]:''?>
        </td>
      </tr>
      <tr>
        <td class="tx-top" style="width:5%; border-right:0px;" >3.3.</td>
        <td class="tx-top" style="width:35%; ">Penyesuaian perangkat asesmen terkait kebutuhan kontekstualisasi</td>
        <td class="tx-top" style="width:60%;">  
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_penyesuaian[0]) &&  $array_penyesuaian[0] == 1?"checked":"uncheck").'.png'; ?>"> Ada
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_penyesuaian[0]) &&  $array_penyesuaian[0] == 2?"checked":"uncheck").'.png'; ?>"> Tidak Ada * penyesuaian perangkat<br/>
          jika ada, tuliskan : <?=isset($array_penyesuaian[2])?$array_penyesuaian[2]:''?>
        </td>
      </tr>
      <tr>
        <td class="tx-top" style="width:5%; border-right:0px;" >3.4.</td>
        <td class="tx-top" style="width:35%; ">Peluang untuk kegiatan asesmen terintegrasi dan mencatat setiap perubahan yang diperlukan untuk alat asesmen </td>
        <td class="tx-top" style="width:60%;">
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_peluang[0]) &&  $array_peluang[0] == 1?"checked":"uncheck").'.png'; ?>"> Ada
          <img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($array_peluang[0]) &&  $array_peluang[0] == 2?"checked":"uncheck").'.png'; ?>"> Tidak Ada * peluang<br/>
          jika ada, tuliskan : <?=isset($array_peluang[2])?$array_peluang[2]:''?>
        </td>
      </tr>
    </table>
    <br/>
    <strong>Konfirmasi dengan orang yang relevan</strong>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
      <tr>
      <td style="width:5%; border-right:0px;background-color: #FF8C00;"></td>
        <td style="width:55%; background-color: #FF8C00;" class="tx-center tx-bold">Orang Yang Relevan</td>
        <td style="width:40%; background-color: #FF8C00;" class="tx-center tx-bold">Tanda tangan</td>
      </tr>
      <tr>
        <td style="width:5%; border-right:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_konfirmasi) &&  $data_uji->is_konfirmasi == 1?"checked":"uncheck").'.png'; ?>"></td>
        <td style="width:55%;">Manajer sertifikasi LSP</td>
        <td class="tx-center" style="width:40%; "></td>
      </tr>
      <tr>
        <td style="width:5%; border-right:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_konfirmasi) &&  $data_uji->is_konfirmasi == 2?"checked":"uncheck").'.png'; ?>"></td>
        <td style="width:55%;">Master Asesor / Master Trainer / Lead Asesor/ Asesor Utama Kompetensi</td>
        <td style="width:40%;"></td>
      </tr>
      <tr>
        <td style="width:5%; border-right:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_konfirmasi) &&  $data_uji->is_konfirmasi == 3?"checked":"uncheck").'.png'; ?>"></td>
        <td style="width:55%;">Manajer pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</td>
        <td style="width:40%;"></td>
      </tr>
      <tr>
        <td style="width:5%; border-right:0px;"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_uji->is_konfirmasi) &&  $data_uji->is_konfirmasi == 4?"checked":"uncheck").'.png'; ?>"></td>
        <td style="width:55%;">Lainnya: Kepala TUK</td>
        <td style="width:40%;"></td>
      </tr>
    </table><br/>
    <strong>Penyusun dan Validator</strong>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
      <tr>
        <td style="width:40%; background-color: #FF8C00;">Nama</td>
        <td style="width:30%; background-color: #FF8C00;" class="tx-center tx-bold">Jabatan</td>
        <td style="width:30%; background-color: #FF8C00;" class="tx-center tx-bold">Tanggal & Tanda tangan</td>
      </tr>
      <tr>
        <td style="width:40%;"><?=$asesor_pra_asesmen->users?></td>
        <td style="width:30;">Penyusun</td>
        <td style="width:30%;"><qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode> <br/><?= tgl_indo($data_asesi->tanggal_akhir) ?></td>
      </tr>
      <tr>
        <td style="width:40%;"></td>
        <td style="width:30%;">Validator</td>
        <td style="width:30%;"></td>
      </tr>
    </table>
</page>
