<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">

            <div style="background-color: #00355c;color: #fff;font-weight: bold;padding: 10px;width: 96%; border-radius: 5px">Detail jadwal Uji</div>
            <div class="x-panel-bwrap">
              <table style="margin-bottom: 10px;border: 2px solid #95B8E7;width: 95.98%; border-radius: 0 0 5px 5px;" class="table-data">
                <tr>
                     <td style="width: 200px; float: left">Kode Jadwal</td>
                     <td style="width: 5px">:</td>
                     <td>
                         <input id="kode_jadwal" name="kode_jadwal" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                     </td>
                 </tr>
                 <tr>
                      <td style="width: 200px; float: left">Jadwal Uji Kompetensi</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="jadual" name="jadual" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Uji Kolektif</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <?php echo form_dropdown('is_kolektif', array('N','Y'), '', 'id="is_kolektif" style="width: 250px;" class="easyui-combobox"  data-options="required: true"'); ?>
                      </td>
                  </tr>
                 <tr>
                      <td style="width: 200px; float: left">Tempat Uji Kompetensi</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="id_tuk" name="id_tuk" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Tanggal & Jam Mulai</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="tanggal" name="tanggal" style="width: 122px;" class="easyui-datebox" data-options="">
                          <input id="starttime" name="starttime" class="easyui-timespinner" label="Start Time:" labelPosition="top" value="00:00" style="width:122px;">
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Tanggal & Jam Akhir</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="tanggal_akhir" name="tanggal_akhir" style="width: 122px;" class="easyui-datebox" data-options="">
                          <input id="endtime" name="endtime" class="easyui-timespinner" value="00:00" style="width:122px;">
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Jumlah Asesi</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="kuota_peserta" name="kuota_peserta" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Potongan Biaya Asesmen</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="discount_event" name="discount_event" style="width: 250px;" class="easyui-numberbox" data-options="required: true" >
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Persyaratan / Notifikasi Peserta</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <textarea rows="4" cols="40" name="persyaratan" id="persyaratan" style="width: 250px;" ></textarea>
                      </td>
                  </tr>
                  <tr>
                      <td style="width: 200px; float: left">Panitia / Pengawas <br> (Jika lebih dari satu orang pisahkan dengan koma(,)</td>
                      <td style="width: 5px">:</td>
                      <td>
                          <input id="panitia" name="panitia" style="width: 250px;" class="easyui-textbox" data-options="" placeholder="Jika lebih dari satu orang pisahkan dengan (,)">
                      </td>
                  </tr>

              </table>
              <hr style="width: 88%; color: #95B8E7;" />
            </div>

            <div style="background-color: #00355c;color: #fff;font-weight: bold;padding: 10px;width: 96%; border-radius: 5px 5px 0 0">Pilih Skema dan Asesor yang akan di ujikan dan ditugaskan untuk melaksanakan Asesmen!</div>
            <div class="x-panel-bwrap">
                <table style="margin-bottom: 10px;border: 2px solid #95B8E7;width: 95.98%; border-radius: 0 0 5px 5px;" class="table-data">
                    <tr>
                        <td style="width: 140px;">Skema Sertifikasi : </td>
                        <td>
                            <input id="id_skema" name="id_skema" style="width: 250px;" class="easyui-textbox">
                            <!-- <a style="margin:5px;" href="#" id="tbl_pilihan_skema"> PILIH </a> -->
                            <a id="tbl_pilihan_skema" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'">
                                Pilih Skema
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 140px;">Skema Yang Dipilih : </td>
                        <td>
                            <table class="table-data" style="width:92.9%;font-size: 11px;border-collapse: collapse;margin-left: 0px; border-color: #95B8E7;" border="1" cellpadding="5" cellspacing="5" id="table_skema_dipilih">
                                <tr style="background-color: whitesmoke;">
                                    <th style="text-align: center; border-color: #95B8E7;">No.</th>
                                    <th style="border-color: #95B8E7;">Skema Sertifikasi</th>
                                    <th style="text-align: center; border-color: #95B8E7;">Hapus</th>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table><hr style="width: 88%; color: #95B8E7;" />

                <table style="margin-bottom: 10px;border: 2px solid #95B8E7;width: 96%; border-radius: 5px; " class="table-data">
                   <tr>
                    <td style="width: 140px;">Asesor Kompetensi : </td>
                    <td>
                        <input id="id_asesor" name="id_asesor" style="width: 250px;" class="easyui-textbox">
                        <!-- <a style="margin:5px;" href="#" id="tbl_pilihan_asesor"> PILIH </a> -->
                        <a id="tbl_pilihan_asesor" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'">
                            Pilih Asesor
                        </a>
                    </td>
                    </tr>
                    <tr>
                        <td style="width: 140px;">Asesor Yang Dipilih : </td>
                        <td>
                            <table class="table-data" style="width:92.9%;font-size: 11px;border-collapse: collapse;margin-left: 0px; border-color: #95B8E7;" border="1" cellpadding="5" cellspacing="5" id="table_asesor_dipilih">

                            <tr style="background-color: whitesmoke;">
                                <th style="text-align: center; border-color: #95B8E7;">No.</th>
                                <th style="border-color: #95B8E7;">Asesor Kompetensi</th>
                                <th style="text-align: center; border-color: #95B8E7;">Hapus</th></tr>
                            </table>

                    </td>
                </tr>
                </table>
                <!-- <hr style="width: 88%; color: #95B8E7;" /> -->
            </div>

        </form>
    </div>
</div>
<script type="text/javascript">
<?php
 echo $tuk_grid;
//echo $perangkat_grid;
 echo $skema_grid;
 echo $asesor_grid;
?>

function hapus_skema_terpilih(kode){
        $('.rowtable'+kode).remove();
        jumlah_data_skema = $('.row_skema').length;
        if(jumlah_data_skema > 1){
            inputs = $(".kode_skema_dipilih");
            for(var i = 1; i <= inputs.length; i++){
                currentRow = $('#table_skema_dipilih tr:eq('+i+')');
                currentRow.find("td:eq(0)").text(i);
            }
        }
    }

    function hapus_asesor_terpilih(kode){
        $('.rowtable'+kode).remove();
        jumlah_data_asesor = $('.row_asesor').length;
        if(jumlah_data_asesor > 1){
            inputs = $(".kode_asesor_dipilih");
            for(var i = 1; i <= inputs.length; i++){
                currentRow = $('#table_asesor_dipilih tr:eq('+i+')');
                currentRow.find("td:eq(0)").text(i);
            }
        }
    }

$(function(){
        $('#tbl_pilihan_skema').on('click',function(){

            jumlah_data_skema = $('.row_skema').length;
            var kode_skema = $('#id_skema').combogrid('getValue');
            var nama_skema = $('#id_skema').combogrid('getText');

            if(jumlah_data_skema > 0){
                inputs = $(".kode_skema_dipilih");
                for(var i = 0; i < inputs.length; i++){
                      if($(inputs[i]).val() == kode_skema){
                        alert(nama_skema+' Sudah ada!');
                        return false;
                      }
                }
            }
            if(kode_skema != ""){
                $("#table_skema_dipilih tr:last").after("<tr class='row_skema rowtable"+kode_skema+"'><td style='text-align:center;border-color: #95B8E7;'>"+(jumlah_data_skema + 1)+"</td><td style='text-align:left;border-color: #95B8E7;'>"+nama_skema+"<input type='hidden' name='kode_skema_terpilih[]' class='kode_skema_dipilih' value='"+kode_skema+"' /></td><td style='text-align:center;border-color: #95B8E7;'><a href='#' onclick='hapus_skema_terpilih("+kode_skema+")' id='rowtable"+kode_skema+"' ><b>X</b></a</td></tr>");
                $('#id_skema').combogrid('setText','');
                $('#id_skema').combogrid('setValue','');
                $('#id_skema').focus();
            }else{
                alert('Tidak Boleh Kosong');
            }
        })
        $('#tbl_pilihan_asesor').on('click',function(){
            jumlah_data_asesor = $('.row_asesor').length;
            var kode_asesor = $('#id_asesor').combogrid('getValue');
            var nama_asesor = $('#id_asesor').combogrid('getText');

            if(jumlah_data_asesor > 0){
                inputs = $(".kode_asesor_dipilih");
                for(var i = 0; i < inputs.length; i++){
                      if($(inputs[i]).val() == kode_asesor){
                        alert(nama_asesor+' Sudah ada!');
                        return false;
                      }
                }
            }
            if(kode_asesor != ""){
                $("#table_asesor_dipilih tr:last").after("<tr class='row_asesor rowtable"+kode_asesor+"'><td style='text-align:center;border-color: #95B8E7;'>"+(jumlah_data_asesor + 1)+"</td><td style='text-align:left;border-color: #95B8E7;'>"+nama_asesor+"<input type='hidden' name='kode_asesor_terpilih[]' class='kode_asesor_dipilih' value='"+kode_asesor+"' /></td><td style='text-align:center;border-color: #95B8E7;'><a href='#' class='easyui-linkbutton' plain='true' iconCls='icon-cancel' onclick='hapus_asesor_terpilih("+kode_asesor+")' id='rowtable"+kode_asesor+"' ><b>X</b></a</td></tr>");
                $('#id_asesor').combogrid('setText','');
                $('#id_asesor').combogrid('setValue','');
                $('#id_asesor').focus();
            }else{
                alert('Tidak Boleh Kosong');
            }
        })


    })

</script>
