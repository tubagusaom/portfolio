<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Status Pengajuan : </td>
                    <td>
                        <?php echo form_dropdown('status_member', $status_member, $data->status_member, 'id="status_member" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
            </table>

            <div id="tips">
              <ol class="rounded-list">
                <li><a href="javascript: void(0)">PERSONAL INFORMATION</a></li>
              </ol>
            </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Customer : </td>
                    <td>
                        <input type="hidden" id="nama_member" name="nama_member" value="<?=$data->nama_member; ?>">
                        <b><?=$data->nama_member; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No Handphone : </td>
                    <td>
                        <input type="hidden" id="no_hp_member" name="no_hp_member" value="<?=$data->no_hp_member; ?>">
                        <b><?=$data->no_hp_member; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Email : </td>
                    <td>
                        <input type="hidden" id="email_member" name="email_member" value="<?=$data->email_member; ?>">
                        <b><?=$data->email_member; ?></b>
                    </td>
                </tr>
            </table>

            <div id="tips">
              <ol class="rounded-list">
                <li><a href="javascript: void(0)">INFORMASI KENDARAAN</a></li>
              </ol>
            </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">No.Pol Kendaraan : </td>
                    <td>
                        <!-- <input type="hidden" id="nopol_member" name="nopol_member" value="<?=$data->nopol_member; ?>"> -->
                        <b><?=$data->nopol_member; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tahun : </td>
                    <td>
                      <!-- <input type="hidden" id="id_tahun" name="id_tahun" value="<?=$data->id_tahun; ?>"> -->
                      <b><?=$detail_kendaraan->tahun_mobil; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Merek : </td>
                    <td>
                      <!-- <input type="hidden" id="id_merek" name="id_merek" value="<?=$data->id_merek; ?>"> -->
                      <b><?=$detail_kendaraan->merek_mobil; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Model : </td>
                    <td>
                      <!-- <input type="hidden" id="id_model" name="id_model" value="<?=$data->id_model; ?>"> -->
                      <b><?=$detail_kendaraan->model_mobil; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Transmisi : </td>
                    <td>
                      <!-- <input type="hidden" id="id_transmisi" name="id_transmisi" value="<?=$data->id_transmisi; ?>"> -->
                      <b><?=$detail_kendaraan->transmisi_mobil; ?></b>
                    </td>
                </tr>
            </table>

            <div id="tips">
              <ol class="rounded-list">
                <li><a href="javascript: void(0)">AKUN</a></li>
              </ol>
            </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Akses Login : </td>
                    <td>
                      <?php
                        $akun_member=$data->akun_member;

                        if ($akun_member == 0) {
                      ?>
                        <input type="checkbox" name="akun_member" value="1">
                      <?php
                        }else {
                          echo "<input type='hidden' name='akun_member' value='2'>";
                          echo "<b>Akses login sudah ada</b>";
                        }
                      ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
