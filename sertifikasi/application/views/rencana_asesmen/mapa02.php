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

  .w-e{
    width: 5%;
    background: #eee;
  }
</style>

<table class="tabeltb" border="1" cellpadding="5" cellspacing="5">
      <tr style="background:#ccc">
        <td rowspan="2" class="tx-center tx-bold" style="font-size:9pt;width:5%;">NO</td>
        <td rowspan="2" class="tx-center tx-bold" style="font-size:9pt;width:55%;">MUK</td>
        <td colspan="5" class="tx-center tx-bold" style="font-size:9pt;width:40%;">Potensi Asesi</td>
      </tr>
      <tr style="background:#ccc">
        <td class="tx-center tx-bold" style="font-size:9pt;">1</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">2</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">3</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">4</td>
        <td class="tx-center tx-bold" style="font-size:9pt;">5</td>
      </tr>

      <tr style="background:<?=$data->ins_clo == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">1.</td>
        <td style="width:55%;">Ceklis Observasi Untuk Aktivitas di Tempat Kerja atau Tempat Kerja Simulasi</td>
        <td class="tx-center" style="background:<?=$data->ins_clo == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input type="hidden" name="id" value="<?=$data->id?>">
          <input type="hidden" name="id_asesi" value="<?=$data->id_asesi?>">
          <input id="clo-1" type="radio" name="ins_clo" <?=$data->ins_clo == 1?'checked':'' ?> value="1">
          <label for="clo-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_clo == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="clo-2" type="radio" name="ins_clo" <?=$data->ins_clo == 2?'checked':'' ?> value="2">
          <label for="clo-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_clo == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="clo-3" type="radio" name="ins_clo" <?=$data->ins_clo == 3?'checked':'' ?> value="3">
          <label for="clo-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_clo == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="clo-4" type="radio" name="ins_clo" <?=$data->ins_clo == 4?'checked':'' ?> value="4">
          <label for="clo-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_clo == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="clo-5" type="radio" name="ins_clo" <?=$data->ins_clo == 5?'checked':'' ?> value="5">
          <label for="clo-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_praktik == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">2.</td>
        <td style="width:55%;">Tugas Praktik Demonstrasi</td>
        <td class="tx-center" style="background:<?=$data->ins_praktik == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="praktik-1" type="radio" name="ins_praktik" <?=$data->ins_praktik == 1?'checked':'' ?> value="1">
          <label for="praktik-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_praktik == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="praktik-2" type="radio" name="ins_praktik" <?=$data->ins_praktik == 2?'checked':'' ?> value="2">
          <label for="praktik-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_praktik == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="praktik-3" type="radio" name="ins_praktik" <?=$data->ins_praktik == 3?'checked':'' ?> value="3">
          <label for="praktik-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_praktik == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="praktik-4" type="radio" name="ins_praktik" <?=$data->ins_praktik == 4?'checked':'' ?> value="4">
          <label for="praktik-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_praktik == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="praktik-5" type="radio" name="ins_praktik" <?=$data->ins_praktik == 5?'checked':'' ?> value="5">
          <label for="praktik-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_observasi == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">3.</td>
        <td style="width:55%;">Pertanyaan untuk mendukung Observasi</td>
        <td class="tx-center" style="background:<?=$data->ins_observasi == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="observasi-1" type="radio" name="ins_observasi" <?=$data->ins_observasi == 1?'checked':'' ?> value="1">
          <label for="observasi-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_observasi == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="observasi-2" type="radio" name="ins_observasi" <?=$data->ins_observasi == 2?'checked':'' ?> value="2">
          <label for="observasi-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_observasi == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="observasi-3" type="radio" name="ins_observasi" <?=$data->ins_observasi == 3?'checked':'' ?> value="3">
          <label for="observasi-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_observasi == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="observasi-4" type="radio" name="ins_observasi" <?=$data->ins_observasi == 4?'checked':'' ?> value="4">
          <label for="observasi-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_observasi == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="observasi-5" type="radio" name="ins_observasi" <?=$data->ins_observasi == 5?'checked':'' ?> value="5">
          <label for="observasi-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_portofolio == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">4.</td>
        <td style="width:55%;">Penjelasan Singkat Proyek terkait Pekerjaan / Kegiatan Terstruktur lainnya</td>
        <td class="tx-center" style="background:<?=$data->ins_portofolio == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="portofolio-1" type="radio" name="ins_portofolio" <?=$data->ins_portofolio == 1?'checked':'' ?> value="1">
          <label for="portofolio-1"><span><span></span></span> </label></td>
        <td class="tx-center" style="background:<?=$data->ins_portofolio == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="portofolio-2" type="radio" name="ins_portofolio" <?=$data->ins_portofolio == 2?'checked':'' ?> value="2">
          <label for="portofolio-2"><span><span></span></span> </label></td>
        <td class="tx-center" style="background:<?=$data->ins_portofolio == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="portofolio-3" type="radio" name="ins_portofolio" <?=$data->ins_portofolio == 3?'checked':'' ?> value="3">
          <label for="portofolio-3"><span><span></span></span> </label></td>
        <td class="tx-center" style="background:<?=$data->ins_portofolio == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="portofolio-4" type="radio" name="ins_portofolio" <?=$data->ins_portofolio == 4?'checked':'' ?> value="4">
          <label for="portofolio-4"><span><span></span></span> </label></td>
        <td class="tx-center" style="background:<?=$data->ins_portofolio == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="portofolio-5" type="radio" name="ins_portofolio" <?=$data->ins_portofolio == 5?'checked':'' ?> value="5">
          <label for="portofolio-5"><span><span></span></span> </label></td>
      </tr>

      <tr style="background:<?=$data->ins_pg == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">5.</td>
        <td style="width:55%;">Pertanyaan Tertulis – Pilihan Ganda</td>
        <td class="tx-center" style="background:<?=$data->ins_pg == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pg-1" type="radio" name="ins_pg" <?=$data->ins_pg == 1?'checked':'' ?> value="1">
          <label for="pg-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pg == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pg-2" type="radio" name="ins_pg" <?=$data->ins_pg == 2?'checked':'' ?> value="2">
          <label for="pg-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pg == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pg-3" type="radio" name="ins_pg" <?=$data->ins_pg == 3?'checked':'' ?> value="3">
          <label for="pg-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pg == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pg-4" type="radio" name="ins_pg" <?=$data->ins_pg == 4?'checked':'' ?> value="4">
          <label for="pg-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pg == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pg-5" type="radio" name="ins_pg" <?=$data->ins_pg == 5?'checked':'' ?> value="5">
          <label for="pg-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_esai == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">6.</td>
        <td style="width:55%;">Pertanyaan Tertulis – Esai</td>
        <td class="tx-center" style="background:<?=$data->ins_esai == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="esai-1" type="radio" name="ins_esai" <?=$data->ins_esai == 1?'checked':'' ?> value="1">
          <label for="esai-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_esai == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="esai-2" type="radio" name="ins_esai" <?=$data->ins_esai == 2?'checked':'' ?> value="2">
          <label for="esai-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_esai == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="esai-3" type="radio" name="ins_esai" <?=$data->ins_esai == 3?'checked':'' ?> value="3">
          <label for="esai-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_esai == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="esai-4" type="radio" name="ins_esai" <?=$data->ins_esai == 4?'checked':'' ?> value="4">
          <label for="esai-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_esai == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="esai-5" type="radio" name="ins_esai" <?=$data->ins_esai == 5?'checked':'' ?> value="5">
          <label for="esai-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_lisan == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">7.</td>
        <td style="width:55%;">Pertanyaan Lisan</td>
        <td class="tx-center" style="background:<?=$data->ins_lisan == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="lisan-1" type="radio" name="ins_lisan" <?=$data->ins_lisan == 1?'checked':'' ?> value="1">
          <label for="lisan-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_lisan == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="lisan-2" type="radio" name="ins_lisan" <?=$data->ins_lisan == 2?'checked':'' ?> value="2">
          <label for="lisan-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_lisan == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="lisan-3" type="radio" name="ins_lisan" <?=$data->ins_lisan == 3?'checked':'' ?> value="3">
          <label for="lisan-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_lisan == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="lisan-4" type="radio" name="ins_lisan" <?=$data->ins_lisan == 4?'checked':'' ?> value="4">
          <label for="lisan-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_lisan == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="lisan-5" type="radio" name="ins_lisan" <?=$data->ins_lisan == 5?'checked':'' ?> value="5">
          <label for="lisan-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_vportofolio == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">8.</td>
        <td style="width:55%;">Ceklis Verifikasi Portofolio</td>
        <td class="tx-center" style="background:<?=$data->ins_vportofolio == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="vportofolio-1" type="radio" name="ins_vportofolio" <?=$data->ins_vportofolio == 1?'checked':'' ?> value="1">
          <label for="vportofolio-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_vportofolio == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="vportofolio-2" type="radio" name="ins_vportofolio" <?=$data->ins_vportofolio == 2?'checked':'' ?> value="2">
          <label for="vportofolio-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_vportofolio == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="vportofolio-3" type="radio" name="ins_vportofolio" <?=$data->ins_vportofolio == 3?'checked':'' ?> value="3">
          <label for="vportofolio-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_vportofolio == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="vportofolio-4" type="radio" name="ins_vportofolio" <?=$data->ins_vportofolio == 4?'checked':'' ?> value="4">
          <label for="vportofolio-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_vportofolio == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="vportofolio-5" type="radio" name="ins_vportofolio" <?=$data->ins_vportofolio == 5?'checked':'' ?> value="5">
          <label for="vportofolio-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_wawancara == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">9.</td>
        <td style="width:55%;">Pertanyaan Wawancara</td>
        <td class="tx-center" style="background:<?=$data->ins_wawancara == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="wawancara-1" type="radio" name="ins_wawancara" <?=$data->ins_wawancara == 1?'checked':'' ?> value="1">
          <label for="wawancara-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_wawancara == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="wawancara-2" type="radio" name="ins_wawancara" <?=$data->ins_wawancara == 2?'checked':'' ?> value="2">
          <label for="wawancara-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_wawancara == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="wawancara-3" type="radio" name="ins_wawancara" <?=$data->ins_wawancara == 3?'checked':'' ?> value="3">
          <label for="wawancara-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_wawancara == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="wawancara-4" type="radio" name="ins_wawancara" <?=$data->ins_wawancara == 4?'checked':'' ?> value="4">
          <label for="wawancara-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_wawancara == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="wawancara-5" type="radio" name="ins_wawancara" <?=$data->ins_wawancara == 5?'checked':'' ?> value="5">
          <label for="wawancara-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_pihak3 == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">10.</td>
        <td style="width:55%;">Klarifikasi Bukti Pihak Ketiga</td>
        <td class="tx-center" style="background:<?=$data->ins_pihak3 == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pihak3-1" type="radio" name="ins_pihak3" <?=$data->ins_pihak3 == 1?'checked':'' ?> value="1">
          <label for="pihak3-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pihak3 == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pihak3-2" type="radio" name="ins_pihak3" <?=$data->ins_pihak3 == 2?'checked':'' ?> value="2">
          <label for="pihak3-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pihak3 == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pihak3-3" type="radio" name="ins_pihak3" <?=$data->ins_pihak3 == 3?'checked':'' ?> value="3">
          <label for="pihak3-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pihak3 == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pihak3-4" type="radio" name="ins_pihak3" <?=$data->ins_pihak3 == 4?'checked':'' ?> value="4">
          <label for="pihak3-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_pihak3 == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="pihak3-5" type="radio" name="ins_pihak3" <?=$data->ins_pihak3 == 5?'checked':'' ?> value="5">
          <label for="pihak3-5"><span><span></span></span> </label>
        </td>
      </tr>

      <tr style="background:<?=$data->ins_materi == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">11.</td>
        <td style="width:55%;">Ceklis Meninjau Materi Uji Kompetensi</td>
        <td class="tx-center" style="background:<?=$data->ins_materi == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-1" type="radio" name="ins_materi" <?=$data->ins_materi == 1?'checked':'' ?> value="1">
          <label for="materi-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_materi == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-2" type="radio" name="ins_materi" <?=$data->ins_materi == 2?'checked':'' ?> value="2">
          <label for="materi-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_materi == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-3" type="radio" name="ins_materi" <?=$data->ins_materi == 3?'checked':'' ?> value="3">
          <label for="materi-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_materi == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-4" type="radio" name="ins_materi" <?=$data->ins_materi == 4?'checked':'' ?> value="4">
          <label for="materi-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_materi == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-5" type="radio" name="ins_materi" <?=$data->ins_materi == 5?'checked':'' ?> value="5">
          <label for="materi-5"><span><span></span></span> </label>
        </td>
      </tr>
      <tr style="background:<?=$data->ins_ulasan == ''?'rgba(255, 191, 191, 0.1)':'' ?>">
        <td class="tx-center w-e">12.</td>
        <td style="width:55%;">Ceklis Ulasan Produk</td>
        <td class="tx-center" style="background:<?=$data->ins_ulasan == 1?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-1" type="radio" name="ins_ulasan" <?=$data->ins_ulasan == 1?'checked':'' ?> value="1">
          <label for="materi-1"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_ulasan == 2?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-2" type="radio" name="ins_ulasan" <?=$data->ins_ulasan == 2?'checked':'' ?> value="2">
          <label for="materi-2"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_ulasan == 3?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-3" type="radio" name="ins_ulasan" <?=$data->ins_ulasan == 3?'checked':'' ?> value="3">
          <label for="materi-3"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_ulasan == 4?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-4" type="radio" name="ins_ulasan" <?=$data->ins_ulasan == 4?'checked':'' ?> value="4">
          <label for="materi-4"><span><span></span></span> </label>
        </td>
        <td class="tx-center" style="background:<?=$data->ins_ulasan == 5?'rgba(28, 155, 160, 0.1)':'' ?>">
          <input id="materi-5" type="radio" name="ins_ulasan" <?=$data->ins_ulasan == 5?'checked':'' ?> value="5">
          <label for="materi-5"><span><span></span></span> </label>
        </td>
      </tr>

</table>
