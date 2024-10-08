<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 140px;">Nama Lengkap: </td>
                    <td>
                        <?php echo $data->nama_user ?>
                    </td>
                </tr>

                <tr>
                    <td style="width: 100px;">username : </td>
                    <td>
                        <?php echo $data->akun ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">email : </td>
                    <td>
                        <?php echo $data->email ?>

                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">No HP : </td>
                    <td>
                        <?php echo $data->hp ?>

                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Skema Sertifikasi : </td>
                    <td>
                        <?php echo $data->skema ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
