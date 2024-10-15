<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">

            <div id="tips">
              <ol class="rounded-list">
                <li><a href="javascript: void(0)">PERSONAL INFORMATION</a></li>
              </ol>
            </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Nama Lengkap : </td>
                    <td>
                        <input type="hidden" id="pemilik_dealer" name="pemilik_dealer" value="<?=$data->pemilik_dealer; ?>">
                        <b><?=$data->pemilik_dealer; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">No Handphone : </td>
                    <td>
                        <input type="hidden" id="no_hp_dealer" name="no_hp_dealer" value="<?=$data->no_hp_dealer; ?>">
                        <b><?=$data->no_hp_dealer; ?></b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Email : </td>
                    <td>
                        <input type="hidden" id="email_dealer" name="email_dealer" value="<?=$data->email_dealer; ?>">
                        <b><?=$data->email_dealer; ?></b>
                    </td>
                </tr>
            </table>

            <div id="tips">
              <ol class="rounded-list">
                <li><a href="javascript: void(0)">DEALER INFORMATION</a></li>
              </ol>
            </div>

            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Nama Dealer : </td>
                    <td>
                        <input id="nama_dealer" name="nama_dealer" value="<?=$data->nama_dealer; ?>" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Alamat : </td>
                    <td>
                        <textarea id="alamat_dealer" name="alamat_dealer" style="width: 250px;" class="easyui-textarea"><?=$data->alamat_dealer; ?></textarea>
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
                        $akun_dealer=$data->akun_dealer;

                        if ($akun_dealer == 0) {
                      ?>
                        <input type="checkbox" name="akun_dealer" value="1">
                      <?php
                        }else {
                          echo "<input type='hidden' name='akun_dealer' value='2'>";
                          echo "<b>Akses login sudah ada</b>";
                        }
                      ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
