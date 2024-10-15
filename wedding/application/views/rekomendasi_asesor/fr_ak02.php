


    <div style="width:100%;">Beri tanda centang (<img style="width:16px;" src="<?= base_url().'assets/img/cl.png'; ?>">) di kolom yang sesuai untuk mencerminkan bukti yang diperoleh untuk menentukan Kompetensi siswa untuk setiap unit kompetensi.</div>
    <table class="tabel" border="1" cellpadding="3" cellspacing="0">
      <tr>
        <td rowspan="2" style="width:44%; height:100px;" class="thead tx-center bd-b tx-bold ">Unit Kompetensi</td>

        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Observasi Demonstrasi
        </td>
        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Portofolio
        </td>
        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Pernyataan Pihak Ketiga Pertanyaan Wawancara
        </td>
        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Pertanyaan Lisan
        </td>
        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Pertanyaan Tertulis
        </td>
        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Proyek Kerja
        </td>
        <td style="width:10%; padding:0px; font-size:7pt; height:100px;" class="thead tx-center rotate tx-bold">
          Lainnya
        </td>
      </tr>

      <tr>
          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="1frak2_all" onclick="alerts1frak2()" class="label__checkbox v_1frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>
          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="2frak2_all" onclick="alerts2frak2()" class="label__checkbox v_2frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>

          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="3frak2_all" onclick="alerts3frak2()" class="label__checkbox v_3frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>

          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="4frak2_all" onclick="alerts4frak2()" class="label__checkbox v_4frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>

          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="5frak2_all" onclick="alerts5frak2()" class="label__checkbox v_5frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>

          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="6frak2_all" onclick="alerts6frak2()" class="label__checkbox v_6frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>

          <td style="width:10%; height:40px; padding-left:26px;background:#eee;" class="rotate">
            <label class="label">
              <input id="7frak2_all" onclick="alerts7frak2()" class="label__checkbox v_7frak2" type="checkbox" name="" />
              <span class="span__text">
                <span class="label__check" style="">
                  <i class="fa fa-check icon"></i>
                </span>
              </span>
            </label>
          </td>
      </tr>

      <?php
       foreach ($unit_kompetensi as $keys => $unitt): ?>
      <tr>
        <td style="width:58%;">
          <b><?= $unitt->id_unit_kompetensi ?></b> <br> <?= $unitt->unit_kompetensi ?>
        </td>

        <td style="width:5%;" class="tx-center">
            <input class="v_1frak2" type="checkbox" id="ch1<?=$keys ?>" name="frak02[<?='1'.$keys?>]" <?=isset($frak02["1".$keys]) && $frak02["1".$keys] == 1 ?'checked':'' ?> value="1">
            <label for="ch1<?=$keys ?>"><span><span></span></span></label>
        </td>
        <td style="width:5%;" class="tx-center">
            <input class="v_2frak2" type="checkbox" id="ch2<?=$keys ?>" name="frak02[<?='2'.$keys?>]" <?=isset($frak02["2".$keys]) && $frak02["2".$keys] == 2 ?'checked':'' ?> value="2">
            <label for="ch2<?=$keys ?>"><span><span></span></span></label>
        </td>
        <td style="width:5%;" class="tx-center">
            <input class="v_3frak2" type="checkbox" id="ch3<?=$keys ?>" name="frak02[<?='3'.$keys?>]" <?=isset($frak02["3".$keys]) && $frak02["3".$keys] == 3 ?'checked':'' ?> value="3">
            <label for="ch3<?=$keys ?>"><span><span></span></span></label>
        </td>
        <td style="width:5%;" class="tx-center">
            <input class="v_4frak2" type="checkbox" id="ch4<?=$keys ?>" name="frak02[<?='4'.$keys?>]" <?=isset($frak02["4".$keys]) && $frak02["4".$keys] == 4 ?'checked':'' ?> value="4">
            <label for="ch4<?=$keys ?>"><span><span></span></span></label>
        </td>
        <td style="width:5%;" class="tx-center">
            <input class="v_5frak2" type="checkbox" id="ch5<?=$keys ?>" name="frak02[<?='5'.$keys?>]" <?=isset($frak02["5".$keys]) && $frak02["5".$keys] == 5 ?'checked':'' ?> value="5">
            <label for="ch5<?=$keys ?>"><span><span></span></span></label>
        </td>
        <td style="width:5%;" class="tx-center">
            <input class="v_6frak2" type="checkbox" id="ch6<?=$keys ?>" name="frak02[<?='6'.$keys?>]" <?=isset($frak02["6".$keys]) && $frak02["6".$keys] == 6 ?'checked':'' ?> value="6">
            <label for="ch6<?=$keys ?>"><span><span></span></span></label>
        </td>
        <td style="width:5%;" class="tx-center">
            <input class="v_7frak2" type="checkbox" id="ch7<?=$keys ?>" name="frak02[<?='7'.$keys?>]" <?=isset($frak02["7".$keys]) && $frak02["7".$keys] == 7 ?'checked':'' ?> value="7">
            <label for="ch7<?=$keys ?>"><span><span></span></span></label>
        </td>

      </tr>
      <?php endforeach; ?>
      <!-- <tr>
        <td class="tx-bold" style="width:35%;">Rekomendasi Hasil Asesmen</td>
        <td colspan="7" style="width:65%;" disabled> -->
            <?php
              // if($data->rekomendasi_asesor ==1){
              //   echo 'Kompeten';
              // }else if($rekomendasi_asesor ==2){
              //   echo 'Belum Kompeten';
              // }else{
              //   echo 'Belum ada hasil';
              // }
            ?>
        <!-- </td>
      </tr>
      <tr>
        <td style="width:35%;"><b>Tindak lanjut yang dibutuhkan</b></br>(Masukkan pekerjaan tambahan dan asesmen yang diperlukan untuk mencapai kompetensi) </td>
        <td colspan="7" style="width:65%;"> -->
          <!-- <textarea name="rekomendasi_description" id="rekomendasi_description" rows="3" cols="55"><?=$data->rekomendasi_description?></textarea> -->
        <!-- </td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:35%;">Komentar/Observasi oleh <br> asesor</td>
        <td colspan="7" style="width:65%;"> -->
          <!-- <textarea name="komentar_observasi" id="komentar_observasi" cols="55"></textarea> -->
        <!-- </td>
      </tr> -->
    </table>

    <script type="text/javascript">
      function alerts1frak2(){
          if($("#1frak2_all").is(':checked')){
              $('.v_1frak2').prop("checked", true);
          }else{
              $('.v_1frak2').prop("checked", false);
          }
      }

      function alerts2frak2(){
          if($("#2frak2_all").is(':checked')){
              $('.v_2frak2').prop("checked", true);
          }else{
              $('.v_2frak2').prop("checked", false);
          }
      }

      function alerts3frak2(){
          if($("#3frak2_all").is(':checked')){
              $('.v_3frak2').prop("checked", true);
          }else{
              $('.v_3frak2').prop("checked", false);
          }
      }

      function alerts4frak2(){
          if($("#4frak2_all").is(':checked')){
              $('.v_4frak2').prop("checked", true);
          }else{
              $('.v_4frak2').prop("checked", false);
          }
      }

      function alerts5frak2(){
          if($("#5frak2_all").is(':checked')){
              $('.v_5frak2').prop("checked", true);
          }else{
              $('.v_5frak2').prop("checked", false);
          }
      }

      function alerts6frak2(){
          if($("#6frak2_all").is(':checked')){
              $('.v_6frak2').prop("checked", true);
          }else{
              $('.v_6frak2').prop("checked", false);
          }
      }

      function alerts7frak2(){
          if($("#7frak2_all").is(':checked')){
              $('.v_7frak2').prop("checked", true);
          }else{
              $('.v_7frak2').prop("checked", false);
          }
      }
    </script>
