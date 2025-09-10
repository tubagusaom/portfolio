<style media="screen">
  .tabeltb{
    width:98%;
    font-size: 12px;
    border-collapse:
    collapse;
    margin: 10px 0 15px 10px;
    background: #fff;
  }
  .tabeltb, .tabeltb th, .tabeltb td{
    height:30px;
    border-color:#777;
  }
  .tx-center{
    text-align:center;
  }
  .tx-bold{
  font-weight: bold;
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
          <td style="width:10%; text-align:center; border-top: 1px solid #333; color: white; background-color: #f44758;">[[page_cu]]</td>
        </tr>
      </table>
    </page_footer>
    <br/>
    <span style="font-size:11pt; font-weight:bold;">FR.MAPA.02 PETA INSTRUMEN ASESSMEN HASIL PENDEKATAN ASESMEN DAN PERENCANAAN ASESMEN</span>
    <br/>
    <table class="tabeltb" border="1" cellpadding="5" cellspacing="5">
       <tr>
        <td rowspan="2" style="width:32%;">Skema Sertifikasi <br/> (KKNI/Okupasi/Klaster)</td>
        <td style="width:15%;" >Judul</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:50%;"><?= $data_asesi->skema ?></td>
      </tr>
      <tr>
        <td style="width:15%;border-left:0px;" >Nomor</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:50%;"><?= $data_asesi->kode_skema ?></td>
      </tr>
    </table>
    <table class="tabeltb" border="1" cellpadding="5" cellspacing="5">
       <tr>
        <td rowspan="2" style="width:32%;" class="tx-bold">Unit Kompetensi</td>
        <td style="width:15%;" >Kode Unit</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:50%;"><?=$kode_unit?></td>
      </tr>
      <tr>
        <td style="width:15%;border-left:0px;" >Judul Unit</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:50%;"><?=$unit?></td>
      </tr>
    </table>
  <table class="tabeltb" border="1" cellpadding="5" cellspacing="5">
      <tr>
        <td rowspan="2" class="tx-center tx-bold" style="font-size:9pt;width:5%;background-color: #FF8C00;">NO</td>
        <td rowspan="2" class="tx-center tx-bold" style="font-size:9pt;width:55%;background-color: #FF8C00;">MUK</td>
        <td colspan="5" class="tx-center tx-bold" style="font-size:9pt;width:40%;background-color: #FF8C00;">Potensi Asesi</td>
      </tr>
      <tr>
        <td class="tx-center tx-bold" style="font-size:9pt;border-left:0px;">1</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">2</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">3</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">4</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">5</td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">1.</td>
      <td style="width:55%;">Ceklis Observasi Untuk Aktivitas di Tempat Kerja atau Tempat Kerja Simulasi</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_clo) &&  $data_asesi->ins_clo == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_clo) &&  $data_asesi->ins_clo == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_clo) &&  $data_asesi->ins_clo == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_clo) &&  $data_asesi->ins_clo == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_clo) &&  $data_asesi->ins_clo == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">2.</td>
      <td style="width:55%;">Tugas Praktik Demonstrasi</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_praktik) &&  $data_asesi->ins_praktik == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_praktik) &&  $data_asesi->ins_praktik == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_praktik) &&  $data_asesi->ins_praktik == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_praktik) &&  $data_asesi->ins_praktik == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_praktik) &&  $data_asesi->ins_praktik == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">3.</td>
      <td style="width:55%;">Pertanyaan untuk mendukung Observasi</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_observasi) &&  $data_asesi->ins_observasi == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_observasi) &&  $data_asesi->ins_observasi == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_observasi) &&  $data_asesi->ins_observasi == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_observasi) &&  $data_asesi->ins_observasi == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_observasi) &&  $data_asesi->ins_observasi == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">4.</td>
      <td style="width:55%;">Penjelasan Singkat Proyek terkait Pekerjaan / Kegiatan Terstruktur lainnya</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_portofolio) &&  $data_asesi->ins_portofolio == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_portofolio) &&  $data_asesi->ins_portofolio == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_portofolio) &&  $data_asesi->ins_portofolio == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_portofolio) &&  $data_asesi->ins_portofolio == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_portofolio) &&  $data_asesi->ins_portofolio == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">5.</td>
      <td style="width:55%;">Pertanyaan Tertulis – Pilihan Ganda</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pg) &&  $data_asesi->ins_pg == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pg) &&  $data_asesi->ins_pg == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pg) &&  $data_asesi->ins_pg == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pg) &&  $data_asesi->ins_pg == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pg) &&  $data_asesi->ins_pg == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">6.</td>
      <td style="width:55%;">Pertanyaan Tertulis – Esai</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_esai) &&  $data_asesi->ins_esai == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_esai) &&  $data_asesi->ins_esai == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_esai) &&  $data_asesi->ins_esai == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_esai) &&  $data_asesi->ins_esai == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_esai) &&  $data_asesi->ins_esai == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">7.</td>
      <td style="width:55%;">Pertanyaan Lisan</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_lisan) &&  $data_asesi->ins_lisan == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_lisan) &&  $data_asesi->ins_lisan == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_lisan) &&  $data_asesi->ins_lisan == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_lisan) &&  $data_asesi->ins_lisan == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_lisan) &&  $data_asesi->ins_lisan == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">8.</td>
      <td style="width:55%;">Ceklis Verifikasi Portofolio</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_vportofolio) &&  $data_asesi->ins_vportofolio == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_vportofolio) &&  $data_asesi->ins_vportofolio == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_vportofolio) &&  $data_asesi->ins_vportofolio == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_vportofolio) &&  $data_asesi->ins_vportofolio == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_vportofolio) &&  $data_asesi->ins_vportofolio == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">9.</td>
      <td style="width:55%;">Pertanyaan Wawancara</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_wawancara) &&  $data_asesi->ins_wawancara == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_wawancara) &&  $data_asesi->ins_wawancara == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_wawancara) &&  $data_asesi->ins_wawancara == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_wawancara) &&  $data_asesi->ins_wawancara == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_wawancara) &&  $data_asesi->ins_wawancara == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">10.</td>
      <td style="width:55%;">Klarifikasi Bukti Pihak Ketiga</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pihak3) &&  $data_asesi->ins_pihak3 == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pihak3) &&  $data_asesi->ins_pihak3 == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pihak3) &&  $data_asesi->ins_pihak3 == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pihak3) &&  $data_asesi->ins_pihak3 == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_pihak3) &&  $data_asesi->ins_pihak3 == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
      <tr>
      <td class="tx-center" style="width:5%;">11.</td>
      <td style="width:55%;">Ceklis Meninjau Materi Uji Kompetensi</td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_materi) &&  $data_asesi->ins_materi == 1?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_materi) &&  $data_asesi->ins_materi == 2?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_materi) &&  $data_asesi->ins_materi == 3?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_materi) &&  $data_asesi->ins_materi == 4?"checked":"uncheck").'.png'; ?>"></td>
      <td class="tx-center"><img style="width:14px;" src="<?=FCPATH.'assets/img/'.(isset($data_asesi->ins_materi) &&  $data_asesi->ins_materi == 5?"checked":"uncheck").'.png'; ?>"></td>
      </tr>
</table>
</page>
