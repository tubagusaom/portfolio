<!-- persiapan `perangkat uji` terhadap `KUK` berdasarkan `dimensi perangkat` -->
<style media="screen">
  .tabeltb{
    width:98%;
    font-size: 12px;
    border-collapse:
    collapse;
    table-layout: fixed;
    margin: 10px 0 15px 10px;
    background: #fff;
  }
  .tx-center{
    text-align:center;
  }
  .borderr-n{
    border-right: 1px solid transparent!important;
  }
  textarea{
    border: 1.5px solid #95B8E7;
    /* resize: vertical; */
    border-radius: 4px;
    padding: 5px;
    z-index: 999;
  }
</style>
     <br>
    <table class="tabeltb" border="1" cellpadding="5" cellspacing="5" style="padding-bottom:20px;">

      <tr>
        <td rowspan="4" class="tx-center tx-bold" style="font-size:9pt; width:35%;">
          Kriteria Unjuk Kerja
        </td>
        <td colspan="3" rowspan="2" class="tx-center tx-bold" style="">Jenis<br>Bukti</td>
        <td colspan="6" class="tx-bold tx-center" style="font-size:9pt;">Metode dan Perangkat Asesmen</td>
      </tr>
      <tr>
        <td style="font-size:8pt; text-align:justify; width:30%;" colspan="6">
          <b>CL (Daftar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan), DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), CLO (Ceklis Observasi), PW (Pertanyaan Wawancara).</b>
        </td>
      </tr>

      <tr>
        <td class="tx-center" style="font-size:9pt; width:6%;">L</td>
        <td class="tx-center" style="font-size:9pt; width:6%;">TL</td>
        <td class="tx-center" style="font-size:9pt; width:6%;">T</td>
        <td class="rotate tx-center" style="font-size:6pt;">
          <b>Obsevasi langsung</b>
          <br>(kerja nyata/ aktivitas waktu
          <br>nyata di tempat kerja
          <br>dilingkungan tempat kerja yang
          <br>di simulasikan)
        </td>
        <td style="font-size:6pt;" class="rotate tx-center">
          <b>Kegiatan Struktur</b>
          <br>(latihan simulasi dan bermain
          <br>peran, proyek,  presentasi,
          <br>lembar kegiatan)
        </td>
        <td style="font-size:6pt;" class="rotate tx-center">
          <b>Tanya Jawab</b>
          <br>(pertanyaan tertulis,
          <br>wawancara, asesmen diri,
          <br>tanya jawab lisan, angket,
          <br>ujian lisan atau tertulis)
        </td>
        <td style="font-size:6pt;" class="rotate tx-center">
          <b>Verifikasi Portfolio</b>
          <br>(sampel pekerjaaan yang
          <br>disusun oleh kandidat, produk
          <br>dengan dokumentasi pendukung,
          <br>bukti sejarah, jurnal atau catatan, informasi tentang
          <br>pengalaman hidup)
        </td>
        <td style="font-size:6pt;" class="rotate tx-center">
          <b>Review produk</b>
          <br>(testimoni dan laporan dari
          <br>atasan dan atasan, bukti
          <br>pelatihan, otentikasi pencapaian sebelumnya, wawancara
          <br>dengan atasan, atasan, atau
          <br>rekan kerja)
        </td>
        <td style="font-size:6pt;" class="rotate tx-center">
          <b>Lainnya ......</b>
        </td>
      </tr>

      <tr>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;">
          <label class="label__text">
            ✔ all
          </label><label class="label__text"></label>
          <label class="label">
            <input id="1mapa1_all" onclick="alerts1mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;">
          <label class="label">
            <label class="label__text">
              ✔ all
            </label>
            <input id="2mapa1_all" onclick="alerts2mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;">
          <label class="label">
            <label class="label__text">
              ✔ all
            </label>
            <input id="3mapa1_all" onclick="alerts3mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;">
          <label class="label">
            <label class="label__text">
              ✔ all
            </label>
            <input id="4mapa1_all" onclick="alerts4mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;" class="rotate tx-center">
          <label class="label">
            <label class="label__text">
              ✔ all
            </label>
            <input id="5mapa1_all" onclick="alerts5mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;" class="rotate tx-center">
          <label class="label">
            <label class="label__text">
              ✔ all
            </label>
            <input id="6mapa1_all" onclick="alerts6mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;" class="rotate tx-center">
          <label class="label">
          <label class="label__text">
            ✔ all
          </label>
            <input id="7mapa1_all" onclick="alerts7mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;padding-left: 20px;" class="tx-center">
          <label class="label">
            <label class="label__text">
              ✔ all
            </label>
            <input id="8mapa1_all" onclick="alerts8mapa1()" class="label__checkbox" type="checkbox" name="" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="width:9%;background:#eaf2ff;font-size:6pt;" class="rotate tx-center">
          -
        </td>
      </tr>

        <?php
        $no_unit = 1;
        foreach ($unit_kompetensi as $keyu => $unit) :
            $elemen = $this->asesi_model->elemen($unit->id_unit_kompetensi);
            $no_unit = $keyu+1;
        ?>
      <tr>
        <td rowspan="2" style="width:38%;background:#ddd;">Unit Kompetensi No. <?=$no_unit?> </td>
        <td colspan="3" style="width:12%;background:#ddd;">Kode Unit</td>
        <td colspan="6" style="width:50%;background:#ddd;">: <?=$unit->id_unit_kompetensi?></td>
      </tr>
      <tr>
        <td colspan="3" style="background:#ddd;">Judul Unit</td>
        <td colspan="6" style="background:#ddd;">: <?=$unit->unit_kompetensi?></td>
      </tr>
        <?php
        $no_elemen = 1;
        foreach ($elemen as $keye => $elemen) :
            $query_kuk = $this->asesi_model->kuk($elemen->id);
        ?>
      <tr>
        <td colspan="10" class="tx-bold" style="font-size:9pt;">
          Elemen &nbsp; &nbsp; &nbsp; &nbsp; : <?=$no_elemen?>. <?=$elemen->elemen_kompetensi?>
        </td>
      </tr>

      <tr>
        <td rowspan="2" class="tx-center tx-bold" style="background:#ccc;font-size:9pt;">
          KUK
        </td>
      </tr>

      <tr>
        <td class="tx-center" style="font-size:9pt; width:6%;background:#bbb;">
          <b>L</b>
        </td>
        <td class="tx-center" style="font-size:9pt; width:6%;background:#bbb;">
          <b>TL</b>
        </td>
        <td class="tx-center" style="font-size:9pt; width:6%;background:#bbb;">
          <b>T</b>
        </td>
        <td class="rotate tx-center" style="background:#bbb;">
          <b>CLO</b>
        </td>
        <td class="rotate tx-center" style="background:#bbb;">
          <b>DIT</b>
        </td>
        <td class="rotate tx-center" style="background:#bbb;">
          <b>PW</b>
        </td>
        <td class="rotate tx-center" style="background:#bbb;">
          <b>VP</b>
        </td>
        <td class="rotate tx-center" style="background:#bbb;">
          <b>CUP</b>
        </td>
        <td class="rotate tx-center" style="background:#bbb;font-size:6pt;">
          <b>LAINNYA</b>
        </td>
      </tr>



      <!-- <tr>
        <td style="vertical-align:bottom;padding:8px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" id="all_l" onclick="alertall_l()" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding:8px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding:8px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td style="vertical-align:bottom;padding: 0 0 8px 25px;border-top:1px solid whitesmoke;border-right:1px solid whitesmoke;">
          <label class="label">
            <input class="label__checkbox" type="checkbox" name="l" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
      </tr> -->

        <?php
            foreach ($query_kuk as $keyk => $kuk) :
              $nokuk = $keyk+1;
              $noelkuk = $no_elemen.'.'.$nokuk;
              $nuek = $no_unit.$no_elemen.$nokuk;
        ?>

      <tr>
        <td style="font-size:9pt; width:14%;" class="tx-top">
          <?=$noelkuk.'. '.$kuk->kuk ?>
        </td>

        <td class="tx-center" style="width:6%;padding-left:20px">
          <!-- l -->
          <label class="label">
            <input class="label__checkbox v_1mapa1" type="checkbox" name="l[<?=$nuek?>]" <?=isset($array_jenis_bukti_l[$nuek]) ?'checked':'' ?> value="0" />
            <!-- <input class="label__checkbox v_1mapa1" type="checkbox" name="l[<?=$nuek?>]" checked value="0" /> -->
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td class="tx-center" style="width:6%;padding-left:20px">
          <!-- tl -->
          <label class="label">
            <input class="label__checkbox v_2mapa1" type="checkbox" name="tl[<?=$nuek?>]" <?=isset($array_jenis_bukti_tl[$nuek]) ?'checked':'' ?> value="1" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>
        <td class="tx-center" style="width:6%;padding-left:20px">
          <!-- t -->
          <label class="label">
            <input class="label__checkbox v_3mapa1" type="checkbox" name="t[<?=$nuek?>]" <?=isset($array_jenis_bukti_t[$nuek])?'checked':'' ?> value="2" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
          </label>
        </td>

        <td class="tx-center borderr-n">
          <!-- cl -->
          <label class="label">
            <input class="label__checkbox v_4mapa1" type="checkbox" name="cl[<?=$nuek?>]" <?=isset($array_metode_cl[$nuek])?'checked':'' ?> value="0" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
            <label class="label__text">
              CLO
            </label>
          </label>
        </td>
        <td class="tx-center borderr-n">
          <!-- dit -->
          <label class="label">
            <input class="label__checkbox v_5mapa1" type="checkbox" name="dit[<?=$nuek?>]" <?=isset($array_metode_dit[$nuek])?'checked':'' ?> value="1" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
            <label class="label__text">
              DIT
            </label>
          </label>
        </td>
        <td class="tx-center borderr-n">
          <!-- pw -->
          <label class="label">
            <input class="label__checkbox v_6mapa1" type="checkbox" name="pw[<?=$nuek?>]" <?=isset($array_metode_pw[$nuek])?'checked':'' ?> value="2" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
            <label class="label__text">
              PW
            </label>
          </label>
        </td>
        <td class="tx-center borderr-n">
          <!-- vp -->
          <label class="label">
            <input class="label__checkbox v_7mapa1" type="checkbox" name="vp[<?=$nuek?>]" <?=isset($array_metode_vp[$nuek])?'checked':'' ?> value="3" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
            <label class="label__text">
              VP
            </label>
          </label>
        </td>
        <td class="tx-center">
          <!-- cup -->
          <label class="label">
            <input class="label__checkbox v_8mapa1" type="checkbox" name="cup[<?=$nuek?>]" <?=isset($array_metode_cup[$nuek])?'checked':'' ?> value="4" />
            <span class="span__text">
              <span class="label__check" style="">
                <i class="fa fa-check icon"></i>
              </span>
            </span>
            <label class="label__text">
              CUP
            </label>
          </label>
        </td>

        <td class="tx-center" style="width:9%;"><textarea style="width:100%" name="lainnya[<?=$nuek?>]"><?=isset($array_metode_cup[$nuek])?$array_metode_lainnya[$nuek]:''?></textarea></td>
      </tr>
      <!-- <tr>
        <td style="font-size:9pt; width:18%;"></td>
        <td class="tx-center" style="width:6%;"><input type="checkbox" name="t" value="0"></td>
        <td class="tx-center" style="width:6%;"><input type="checkbox" name="tl" value="1"></td>
        <td class="tx-center" style="width:6%;"><input type="checkbox" name="l" value="2"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><textarea style="width:100%" name="lainnya"></textarea></td>
      </tr>     -->
    <?php endforeach;?>
    <?php $no_elemen++; endforeach;?>
    <?php endforeach; ?>
  </table>

  <script type="text/javascript">
  function alerts1mapa1(){
      if($("#1mapa1_all").is(':checked')){
          $('.v_1mapa1').prop("checked", true);
      }else{
          $('.v_1mapa1').prop("checked", false);
      }
  }

  function alerts2mapa1(){
      if($("#2mapa1_all").is(':checked')){
          $('.v_2mapa1').prop("checked", true);
      }else{
          $('.v_2mapa1').prop("checked", false);
      }
  }

  function alerts3mapa1(){
      if($("#3mapa1_all").is(':checked')){
          $('.v_3mapa1').prop("checked", true);
      }else{
          $('.v_3mapa1').prop("checked", false);
      }
  }

  function alerts4mapa1(){
      if($("#4mapa1_all").is(':checked')){
          $('.v_4mapa1').prop("checked", true);
      }else{
          $('.v_4mapa1').prop("checked", false);
      }
  }

  function alerts5mapa1(){
      if($("#5mapa1_all").is(':checked')){
          $('.v_5mapa1').prop("checked", true);
      }else{
          $('.v_5mapa1').prop("checked", false);
      }
  }

  function alerts6mapa1(){
      if($("#6mapa1_all").is(':checked')){
          $('.v_6mapa1').prop("checked", true);
      }else{
          $('.v_6mapa1').prop("checked", false);
      }
  }

  function alerts7mapa1(){
      if($("#7mapa1_all").is(':checked')){
          $('.v_7mapa1').prop("checked", true);
      }else{
          $('.v_7mapa1').prop("checked", false);
      }
  }

  function alerts8mapa1(){
      if($("#8mapa1_all").is(':checked')){
          $('.v_8mapa1').prop("checked", true);
      }else{
          $('.v_8mapa1').prop("checked", false);
      }
  }
  </script>
