<?php
  $idanggota=$_GET['Data-Anggota'];
  $sqlpopup	  =
  "SELECT
    a.kd_akun,
    a.nm_akun,
    a.almt_akun,
    a.tlp_akun,
    a.kd_comp,
    a.kd_divisi,
    a.tgl_perusahaan,
    a.tgl_koperasi,
    b.p_schm,
    b.w_schm,
    b.s_schm,
    b.bank_schm,
    b.norek_schm,
    b.pemilik_schm,
    b.s_schm,
    c.nm_comp,
    d.nm_divisi,
    e.nm_dept,
    f.nm_lokasi
  FROM akun a
  LEFT JOIN schm b ON b.id_akun = a.id
  LEFT JOIN company c ON c.id = a.kd_comp
  LEFT JOIN divisi d ON d.id = a.kd_divisi
  LEFT JOIN dept e ON e.id = b.id_dept
  LEFT JOIN lokasi f ON f.id = b.id_lokasi
  WHERE a.id=$idanggota";

  $querypopup	=mysqli_query($koneksi,$sqlpopup);
  $datapopup=mysqli_fetch_array($querypopup);
?>

<table>
  <tr>
    <td colspan="3" style="border-bottom:1px solid #bbb;padding-top:15px;">
      <strong> TANGGAL BERGABUNG </strong>
    </td>
  </tr>
  <tr>
    <td style="width:30%;padding-left:15px;">Perusahaan</td>
    <td style="width:70%">
       : <?=isset($datapopup['tgl_perusahaan'])?tgl_indo($datapopup['tgl_perusahaan']):'.....'?>
    </td>
  </tr>
  <tr>
    <td style="width:30%;padding-left:15px;">Koperasi</td>
    <td style="width:70%;border-top:1px solid #ccc">
       : <?=isset($datapopup['tgl_koperasi'])?tgl_indo($datapopup['tgl_koperasi']):'.....'?>
    </td>
  </tr>

  <tr>
    <td colspan="3" style="border-top:1px solid #bbb;border-bottom:1px solid #bbb;padding-top:15px;">
      <strong> BIODATA </strong>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">NIK</td>
    <td>
       : <?=$datapopup['kd_akun']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Nama</td>
    <td style="border-top:1px solid #ccc">
       : <?=$datapopup['nm_akun']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Email</td>
    <td style="border-top:1px solid #ccc;">
       : <?=$datapopup['almt_akun']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">No Hp (WA)</td>
    <td style="border-top:1px solid #ccc">
       : <?=$datapopup['tlp_akun']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Perusahaan</td>
    <td style="border-top:1px solid #ccc">
       : <?=$datapopup['nm_comp']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Bisnis Unit <br> <i style="font-size:10px;"> (Divisi) </i></td>
    <td style="border-top:1px solid #ccc">
       : <?=$datapopup['nm_divisi']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Departemen</td>
    <td style="border-top:1px solid #ccc">
       : <?=$datapopup['nm_dept']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Lokasi</td>
    <td style="border-top:1px solid #ccc">
       : <?=$datapopup['nm_lokasi']?>
    </td>
  </tr>


  <tr>
    <td colspan="3" style="border-top:1px solid #bbb;border-bottom:1px solid #bbb;padding-top:15px;">
      <strong> SIMPANAN </strong>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Pokok</td>
    <td>
       : Rp. <?=isset($datapopup['p_schm'])?rupiah($datapopup['p_schm']):'.....'?> <br>
       <i style="padding-left:10px;font-size:10px;">
         <?=isset($datapopup['p_schm'])?terbilang($datapopup['p_schm']):'.....'?> Rupiah
       <i>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Wajib</td>
    <td style="border-top:1px solid #ccc">
      : Rp. <?=isset($datapopup['w_schm'])?rupiah($datapopup['w_schm']):'.....'?> <br>
      <i style="padding-left:10px;font-size:10px;">
        <?=isset($datapopup['w_schm'])?terbilang($datapopup['w_schm']):'.....'?> Rupiah
      <i>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Sukarela</td>
    <td style="border-top:1px solid #ccc">
      : Rp. <?=isset($datapopup['s_schm'])?rupiah($datapopup['s_schm']):'.....'?> <br>
      <i style="padding-left:10px;font-size:10px;">
        <?=isset($datapopup['s_schm'])?terbilang($datapopup['s_schm']):'.....'?> Rupiah
      <i>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="border-top:1px solid #bbb;border-bottom:1px solid #bbb;padding-top:15px;">
      <strong> REKENING </strong>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Bank</td>
    <td>
      : <?=$datapopup['bank_schm']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">No Rekening</td>
    <td style="border-top:1px solid #ccc">
      : <?=$datapopup['norek_schm']?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:15px;">Pemilik</td>
    <td style="border-top:1px solid #ccc">
      : <?=$datapopup['pemilik_schm']?>
    </td>
</table>
