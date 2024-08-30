<style media="screen">
  .tabeltbl{
    width:98%;
    font-size: 12px;
    border-collapse:
    collapse;
    margin: 10px 0 15px 10px;
    background: #fff;
  }
  .tabeltbl, .tabeltbl th, .tabeltbl td{
    padding: 5px;
    border-color:#777;
  }

  .tx-top{
    padding: 5px;
    vertical-align: top;
  }
  .tx-bold{
    padding: 5px;
    font-weight: bold;
  }
  /* .rotate{
    writing-mode: sideways-lr;
  } */
</style>
    <table class="tabeltbl" border="1" cellpadding="5" cellspacing="5">
      <tr>
        <td style="width:100%;" class="tx-bold" colspan="3">3. Mengidentifikasi Persyaratan Modifikasi dan Kontekstualisasi </td>
      </tr>
      <tr>
        <td style="width:5%;">3.1.</td>
        <td style="width:25%;">a. Karakteristik Kandidat</td>
        <td class="inputan" style="width:70%;">
          <input id="karakter-1" type="radio" onchange="karakter(this)" name="karakter[0]" <?=$array_karakter[0] == 1?'checked':'' ?> value="1">
          <label for="karakter-1"><span><span></span></span>Ada</label>&nbsp;&nbsp;&nbsp;

          <input id="karakter-2" type="radio" onchange="karakter(this)" name="karakter[0]" <?=$array_karakter[0] == 2?'checked':'' ?> value="2">
          <label for="karakter-2"><span><span></span></span>Tidak Ada</label></br>

          <textarea id="karakter-3" style="width:100%;display:<?=$array_karakter[0] == '2'?'none':'block'?>;" name="karakter[2]" placeholder="jika ada, tuliskan .."><?=isset($array_karakter[2])?$array_karakter[2]:''?></textarea>
        </td>
      </tr>
      <tr>
        <td style="width:5%;"></td>
        <td style="width:25%;">b. Kebutuhan kontekstualisasi terkait tempat kerja</td>
        <td class="inputan" style="width:70%;">
          <input id="kebutuhan-1" type="radio" name="kebutuhan[0]" <?=$array_kebutuhan[0] == 1?'checked':'' ?> onchange="kebutuhan(this)" value="1">
          <label for="kebutuhan-1"><span><span></span></span>Ada</label>&nbsp;&nbsp;&nbsp;

          <input id="kebutuhan-2" type="radio" name="kebutuhan[0]" <?=$array_kebutuhan[0] == 2?'checked':'' ?> onchange="kebutuhan(this)"value="2">
          <label for="kebutuhan-2"><span><span></span></span>Tidak Ada</label></br>

          <textarea id="kebutuhan-3" style="width:100%;display:<?=$array_kebutuhan[0] == 2?'none':'block'?>;" name="kebutuhan[2]" placeholder="jika ada, tuliskan .."><?=isset($array_kebutuhan[2])?$array_kebutuhan[2]:''?></textarea>
        </td>

      </tr>
      <tr>
        <td style="width:5%;">3.2.</td>
        <td style="width:25%;">Saran yang diberikan oleh paket pelatihan atau pengembang pelatihan</td>
        <td class="inputan" style="width:70%;">
          <input id="saran-1" type="radio" onchange="saran(this)" name="saran[0]" <?=$array_saran[0] == 1?'checked':'' ?> value="1">
          <label for="saran-1"><span><span></span></span>Ada</label>&nbsp;&nbsp;&nbsp;

          <input id="saran-2" type="radio" onchange="saran(this)" name="saran[0]" <?=$array_saran[0] == 2?'checked':'' ?> value="2">
          <label for="saran-2"><span><span></span></span>Tidak Ada</label></br>

          <textarea id="saran-3" style="width:100%;display:<?=$array_saran[0] == 2?'none':'block'?>;" name="saran[2]" onchange="saran(this)" placeholder="jika ada, tuliskan .."><?=isset($array_saran[0])?$array_saran[2]:''?></textarea>
        </td>
      </tr>
      <tr>
        <td style="width:5%;">3.3.</td>
        <td style="width:25%;">Penyesuaian perangkat asesmen terkait kebutuhan kontekstualisasi</td>
        <td class="inputan" style="width:70%;">
          <input id="penyesuaian-1" type="radio" onchange="penyesuaian(this)" name="penyesuaian[0]" <?=$array_penyesuaian[0] == 1?'checked':'' ?> value="1">
          <label for="penyesuaian-1"><span><span></span></span>Ada</label>&nbsp;&nbsp;&nbsp;

          <input id="penyesuaian-2" type="radio" onchange="penyesuaian(this)" name="penyesuaian[0]" <?=$array_penyesuaian[0] == 2?'checked':'' ?> value="2">
          <label for="penyesuaian-2"><span><span></span></span>Tidak Ada</label></br>

          <textarea id="penyesuaian-3" style="width:100%;display:<?=$array_penyesuaian[0] == 2?'none':'block'?>;" name="penyesuaian[2]" onchange="penyesuaian(this)" placeholder="jika ada, tuliskan .."><?=isset($array_penyesuaian[2])?$array_penyesuaian[2]:''?></textarea>
        </td>
      </tr>
      <tr>
        <td style="width:5%;">3.4.</td>
        <td style="width:25%;">Peluang untuk kegiatan asesmen terintegrasi dan mencatat setiap perubahan yang diperlukan untuk alat asesmen</td>
        <td class="inputan" style="width:70%;">
          <input id="peluang-1" type="radio" onchange="peluang(this)" name="peluang[0]" <?=$array_peluang[0] == 1?'checked':'' ?> value="1">
          <label for="peluang-1"><span><span></span></span>Ada</label>&nbsp;&nbsp;&nbsp;

          <input id="peluang-2" type="radio" onchange="peluang(this)" name="peluang[0]" <?=$array_peluang[0] == 2?'checked':'' ?> value="2">
          <label for="peluang-2"><span><span></span></span>Tidak Ada</label></br>

          <textarea id="peluang-3" style="width:100%;display:<?=$array_peluang[0] == 2?'none':'block'?>;" name="peluang[2]" placeholder="jika ada, tuliskan .."><?=isset($array_peluang[2])?$array_peluang[2]:''?></textarea>
        </td>
      </tr>
    </table>
    <table class="tabeltbl" border="1" cellpadding="5" cellspacing="5">
      <tr>
        <td rowspan="5" style="width:30%;">Orang yang relevan untuk dikonfirmasi</td>
      </tr>
      <tr>
        <td class="inputan" style="width:70%;">
          <input id="konfirmasi-1" type="radio" name="is_konfirmasi" <?=$data_uji->is_konfirmasi == 1?'checked':'' ?> value="1">
          <label for="konfirmasi-1"><span><span></span></span> Manajer sertifikasi LSP</label>
        </td>
      </tr>
      <tr>
        <td class="inputan" style="width:70%;">
          <input id="konfirmasi-2" type="radio" name="is_konfirmasi" <?=$data_uji->is_konfirmasi == 2?'checked':'' ?> <?=isset($is_konfirmasi[1])?'checked':''?> value="2">
          <label for="konfirmasi-2"><span><span></span></span> Master Asesor / Master Trainer / Lead Asesor/ Asesor Utama Kompetensi</label>
        </td>
      </tr>
      <tr>
        <td class="inputan" style="width:70%;">
          <input id="konfirmasi-3" type="radio" name="is_konfirmasi" <?=$data_uji->is_konfirmasi == 3?'checked':'' ?> value="3">
          <label for="konfirmasi-3"><span><span></span></span> Manajer pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</label>
        </td>
      </tr>
      <tr>
        <td class="inputan" style="width:70%;">
          <input id="konfirmasi-4" type="radio" name="is_konfirmasi" <?=$data_uji->is_konfirmasi == 4?'checked':'' ?> value="4">
          <label for="konfirmasi-4"><span><span></span></span> Lainnya: Kepala TUK</label>
        </td>
      </tr>
    </table>

    <script type="text/javascript">
      function karakter(sel){
        if(sel.value == '1'){
          $('#karakter-3').show();
        }else if(sel.value == '2'){
          $('#karakter-3').hide();
        }else{
          $('#karakter-3').hide();
        }
      }

      function kebutuhan(sel){
        if(sel.value == '1'){
          $('#kebutuhan-3').show();
        }else if(sel.value == '2'){
          $('#kebutuhan-3').hide();
        }else{
          $('#kebutuhan-3').hide();
        }
      }

      function saran(sel){
        if(sel.value == '1'){
          $('#saran-3').show();
        }else if(sel.value == '2'){
          $('#saran-3').hide();
        }else{
          $('#saran-3').hide();
        }
      }

      function penyesuaian(sel){
        if(sel.value == '1'){
          $('#penyesuaian-3').show();
        }else if(sel.value == '2'){
          $('#penyesuaian-3').hide();
        }else{
          $('#penyesuaian-3').hide();
        }
      }

      function peluang(sel){
        if(sel.value == '1'){
          $('#peluang-3').show();
        }else if(sel.value == '2'){
          $('#peluang-3').hide();
        }else{
          $('#peluang-3').hide();
        }
      }
    </script>
