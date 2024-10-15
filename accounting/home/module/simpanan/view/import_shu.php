<form name="myForm" id="myForm" onSubmit="return validateForm()" action="" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td colspan="4">
      <h1>IMPORT SHU ANGGOTA "KOPERASI KARYAWAN OTSUKA BHAKTI"</h1>
    </td>
  </tr>
  <tr>
    <td>Pastikan format file format .xls (Example: SHU.xls) :</td>
    <td><input type="file" id="fileshu" name="fileexcel"></td>
    <td><input type="submit" name="import" value="Lihat File"></td>
  </tr>
</table>
</form>

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('fileshu', ['.xls'])){
            alert("Pilih file .xls !!!");
            return false;
        }
    }
</script>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
  if(isset($_POST['import'])){
    $fileexcel = basename($_FILES['fileexcel']['name']) ;
    require_once base_url()."model/modul/excel_reader.php";

      $no=1;
      move_uploaded_file($_FILES['fileexcel']['tmp_name'], $fileexcel);

      // tambahkan baris berikut untuk mencegah error is not readable
      chmod($_FILES['fileexcel']['name'],0777);

      $data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['name'],false);

      // menghitung jumlah baris file xls
      $baris = $data->rowcount($sheet_index=0);
      $periode=1;
      $periode<=$baris;
?>

<form class="" action="?Proses-Import" method="post">
  <table>
    <tr>
      <td colspan="4" style="border-bottom:1px solid #999; border-top:1px solid #999; font-size:14px" align="center">
        <b>
          <?php
            echo $judul=$data->val($periode, 1);
            $a=substr($judul,60);
          ?>
        </b>
        <input type="hidden" name="periode" value="<?php echo "$a"; ?>">
        <input type="hidden" name="fileexcel" value="<?php echo $fileexcel; ?>">
      </td>
    </tr>
    <tr align="center">
      <th>No</th>
      <th>No Anggota</th>
      <th>Nama</th>
      <th>SHU</th>
    </tr>

    <?php
        //  import data excel mulai baris ke-4 (karena tabel xls ada header pada baris 1 s/d 3)
        for ($i=4; $i<=$baris; $i++)
        {
          if(fmod($no,2)==1)
          {$warna="ghostwhite";}
          else
          {$warna="whitesmoke";}
    ?>

    <tr class="hover" bgcolor="<?php echo $warna ?>">
      <td><?php echo $no ?></td>
      <td>
        <?php echo $data1 = $data->val($i, 3); ?>

        <input type="hidden" name="kdschm[]" value="<?php echo $data0 = $data->val($i, 2); ?>">
      </td>
      <td><?php echo $data2 = $data->val($i, 4); ?></td>
      <td align='right'>
        <?php echo $data3 = $data->val($i, 13); ?>
        <input type="hidden" name="shu[]" value="<?php echo $data3; ?>">
      </td>
    </tr>

  <?php $no++;} ?>

  <tr>
    <td colspan="4" style="border-top:1px solid #999">
      <input type="submit" onclick="return confirm('APAKAH DATA <?php echo $fileexcel ?> AKAN DI IMPORT ?')" name="import-shu" value="IMPORT SHU" class="import">
    </td>
  </tr>
  </table>
</form>

<?php } ?>
