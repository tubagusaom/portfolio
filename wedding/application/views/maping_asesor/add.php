<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Jadwal Uji Kompetensi : </td>
                    <td>
                        <input id="id_jadwal" name="id_jadwal" style="width: 200px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama Asesor : </td>
                    <td>
                        <input id="id_asesor" name="id_asesor" style="width: 200px;"  >
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Sebagai : </td>
                    <td>
                        <input name="jenis_asesmen" type="radio" value="1" > Asesor Mandiri <br>
                        <input name="jenis_asesmen" type="radio" value="2" > Asesor Penguji
                        <br>
                        <input name="jenis_asesmen" type="radio" value="3" > Asesor Mandiri/Penguji
                        <br>
                        <input name="jenis_asesmen" type="radio" value="4" > Lead Asesor
                        <br>
                        <input name="jenis_asesmen" type="radio" value="5" > Penanggung Jawab
                        <br>
                        <input name="jenis_asesmen" type="radio" value="6" > Asesor Lisensi
                        <br>
                        <input name="jenis_asesmen" type="radio" value="7" > Subject Specialist
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
echo $jadwal_grid;
echo $asesor_grid;
?>
</script>
