<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" >
        <div id="tips">
            <ol class="rounded-list">
                <li><a href="javascript: void(0)">Personal Data</a></li>
            </ol>
        </div>
           <table class="table-data">
                <tr>
                    <td style="width: 150px;">Username  : </td>
                    <td>
                        <input disabled id="akun" name="akun" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $akun ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No Registrasi / No MET : </td>
                    <td>
                        <input id="no_reg" name="no_reg" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $profil_asesor->no_reg ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Nama Lengkap : </td>
                    <td>

                        <input id="users" name="users" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $profil_asesor->users ?>">
                        <input type="hidden" name="id" value="<?php echo $profil_asesor->id ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Tahun Menjadi Asesor : </td>
                    <td>

                        <input id="tahun_menjadi_asesor" name="tahun_menjadi_asesor" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $profil_asesor->tahun_menjadi_asesor ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Jenis Kelamin : </td>
                    <td>
                        <?php echo form_dropdown('sex', $sex, $profil_asesor->sex, 'id="sex" class="easyui-combobox" '); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Place of birth : </td>
                    <td>
                        <input id="tempat_lahir" name="tempat_lahir" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->tempat_lahir ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Date of birth : </td>
                    <td>
                        <input id="tgl_lahir" name="tgl_lahir" style="width: 250px;" class="easyui-datebox"  value="<?php echo date('d/m/Y', strtotime($profil_asesor->tgl_lahir)) ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 100px;">Email : </td>
                    <td>
                        <input id="email" name="email" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $profil_asesor->email ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">HP : </td>
                    <td>
                        <input id="hp" name="hp" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $profil_asesor->hp ?>">
                    </td>
                </tr>
               
                 <tr>
                    <td style="width: 100px;">Type Identity : </td>
                    <td>
                        <input placeholder="KTP/SIM/NPWP" id="tempat_lahir" name="identity_type" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->identity_type ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 100px;">Identity Number : </td>
                    <td>
                        <input id="identity_number" name="identity_number" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->identity_number ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Deskripsi Bidang Asesor : </td>
                    <td>
                        <textarea id="deskripsi_bidang_asesor" name="deskripsi_bidang_asesor" rows="4" cols="40"><?php echo $profil_asesor->deskripsi_bidang_asesor ?></textarea>
                    </td>
                </tr>
                </table>
                <div id="tips">
                    <ol class="rounded-list">
                        <li><a href="javascript: void(0)">Data Domicile</a></li>
                    </ol>
                </div>
            <table class="table-data">

                <tr>
                    <td style="width: 150px;">Address : </td>
                    <td>
                        <textarea id="alamat" name="alamat" rows="4" cols="40"><?php echo $profil_asesor->alamat ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Postal Code : </td>
                    <td>
                        <input id="pos_code" name="pos_code" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->pos_code ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Nationality : </td>
                    <td>
                        <input id="nationality" name="nationality" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->nationality ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Province : </td>
                    <td>
                        <input id="province" name="province" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->province ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">District : </td>
                    <td>
                        <input id="district" name="district" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->district ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Sub District : </td>
                    <td>
                        <input id="sub_district" name="sub_district" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->sub_district ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Village / Kelurahan: </td>
                    <td>
                        <input id="village" name="village" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->village ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">RT : </td>
                    <td>
                        <input id="rt" name="rt" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->rt ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">RW : </td>
                    <td>
                        <input id="rw" name="rw" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->rw ?>">
                    </td>
                </tr>
            </table>
              
           
                <div id="tips">
                    <ol class="rounded-list">
                        <li><a href="javascript: void(0)">Lampiran</a></li>
                    </ol>
                </div>
            <table class="table-data">
                <tr>
                    <td style="width: 100px;">CV : </td>
                    <td>
                        <input id="lampiran_cv" name="lampiran_cv" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->lampiran_cv ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Surat Pernyataan : </td>
                    <td>
                        <input id="lampiran_surat_pernyataan" name="lampiran_surat_pernyataan" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->lampiran_surat_pernyataan ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Pakta Integritas : </td>
                    <td>
                        <input id="lampiran_pakta_integritas" name="lampiran_pakta_integritas" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->lampiran_pakta_integritas ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Sertifikat ASKOM : </td>
                    <td>
                        <input id="lampiran_seraskom" name="lampiran_seraskom" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->lampiran_seraskom ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Sertifikat Teknis : </td>
                    <td>
                        <input id="lampiran_serkom1" name="lampiran_serkom1" style="width: 250px;" class="easyui-textbox"  value="<?php echo $profil_asesor->lampiran_serkom1 ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Foto : </td>
                    <td>
                        <input id="foto_user" name="foto_user" class="foto_user" value="<?php echo $profil_asesor->foto_user ?>">
                        
                    </td>

                </tr>		
                <tr><td></td><td><img style="width: 200px" src="<?=base_url().'assets/files/artikel/'.$profil_asesor->foto_user?>"  /></td></tr>	
            </table>
        </form>
    </div>
</div>

<div id="dd" ></div>
<script>
<?php
echo $files;
echo $lampiran_cv;
echo $lampiran_surat_pernyataan;
echo $lampiran_pakta_integritas;
echo $lampiran_seraskom;
echo $lampiran_serkom1;
?>

var id = '<?php echo $user_id; ?>';
$('#dd').dialog({
        title: 'Browse File',
        width: 600,
        height: 500,
        closed: true,
        cache: false,
        
        modal: true
    });
    function buka(){
        $('#dd').dialog('open');
        $('#dd').dialog('refresh', 'sertifikat/file'+id);
    }



</script>
