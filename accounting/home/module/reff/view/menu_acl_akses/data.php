<form action="" method="post">
<table>

  <tr>
    <th>No</th>
    <th>Akses</th>
    <th>Menu ACL</th>
    <th>Status</th>
    <th align="center">-</th>
  </tr>

  <?php

    if (isset($_POST['pencarian'])) {
      // $cari=$_POST['search'];
      $cari = "WHERE a.id_akses = $_POST[search]";
    }else {
      $cari = '';
    }

		$no		  =1;
    // SELECT a.id, a.name,b.id FROM tutorials_inf a
		$sql_ca	  =
              "SELECT
                  a.id,
                  a.id_akses,
                  a.id_menu_acl,
                  a.stts_akses,
                  b.id AS IDAKSES,
                  b.nama_peran AS NAMA,
                  b.keterangan AS KETNAMA,
                  c.id AS IDMENUACL,
                  c.menu_acl as MENUACL,
                  d.keterangan as KETMENU
                FROM conf_akses_menu_acl a
                JOIN t_role b ON b.id = a.id_akses
                JOIN t_menu_acl c ON c.id = a.id_menu_acl
                JOIN t_menu d ON d.id = c.id_menu
                $cari
                  -- AND a.stts_akses NOT LIKE '0'

                -- ORDER BY (IDMENUACL) ASC,c.no_menu_acl
                ORDER BY IDAKSES ASC, IDMENUACL ASC, c.no_menu_acl ASC
              ";
		$query_ca	=mysqli_query($koneksi,$sql_ca);
		while($data_ca=mysqli_fetch_array($query_ca)){

			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

	?>

  <tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo $no; ?>.</td>
		<td>
      <?php echo "$data_ca[KETNAMA] - $data_ca[NAMA]"; ?>
    </td>
		<td>
			<?php
				echo "$data_ca[KETMENU] - $data_ca[MENUACL]";
        // $nmdivisi = str_replace('&', 'and', $data_ca['menu']);
			?>
		</td>

    <td align="center"><?=$data_ca['stts_akses'] == '1' ? 'Aktif':'Tidak Aktif' ?></td>

		<td align="center">
      <a class="btn-link-yellow" href="?Akses-Menu-ACL&&header=<?='Konfigurasi'?>&&Akses=Editakses&&id=<?=$data_ca['id']?>&&idm=<?=$data_ca['idmenu']?>&&menu=<?=$data_ca['menu_acl']?>&&stts=<?=$data_ca['stts_akses']?>&&MenuACLakses=Addaclakses&&ACLakses-Edit" >
        <i class="fa fa-pencil"></i>
      </a>
		</td>
	</tr>

	<?php
		$no++;};
	?>
</table>
</form>
