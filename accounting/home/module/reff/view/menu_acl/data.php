<form action="" method="post">
<table>
  <tr>
    <td colspan="6"><h1>Data Menu ACL</h1></td>
  </tr>

  <tr>
    <td colspan="6">

      <?php
				if (isset($_POST['pencarian'])) {
					if ($_POST['search']=='') {
						echo "";
					}
					else{
						echo "Filter data berdasarkan Menu <b>$_POST[search]</b>";
					}
				}
			?>

			<button type="submit" name="pencarian" class="cari">
				<i class="fa fa-search"></i>
			</button>
			<select class="acount" name="search" style="width:30%;font-size:13px;">
				<option value="">Filter Menu</option>
				<?php
          $sql_a = "SELECT
            a.id,
            a.nm_menu,
            a.keterangan
            FROM t_menu a
            -- JOIN conf_akses ON conf_akses.id_akses = t_role.id
            WHERE a.stts_menu NOT LIKE '0'
            ORDER BY a.keterangan ASC
           -- GROUP BY akun.id
          ";
          $query_a=mysqli_query($koneksi,$sql_a);
					while($dataa=mysqli_fetch_array($query_a))
					{
						echo "<option value='$dataa[nm_menu]'>$dataa[keterangan] - $dataa[nm_menu]</option>";
					}
				?>
			</select>

    </td>
  </tr>

  <tr>
    <th>No</th>
    <th>Menu</th>
    <th>ACL</th>
    <th>No Urut</th>
    <!-- <th>Status</th> -->
    <th align="center">-</th>
  </tr>

  <?php

    if (isset($_POST['pencarian'])) {
      $cari=$_POST['search'];
    }else {
      $cari='';
    }

		$no		  =1;
    // SELECT a.id, a.name,b.id FROM tutorials_inf a
		$sql_ca	  =
              "SELECT
                  a.id,
                  a.menu_acl,
                  a.id_menu,
                  a.no_menu_acl,
                  a.stts_menu_acl,
                  b.id AS idmenu,
                  b.nm_menu as menu,
                  b.keterangan as ketmenu
                FROM t_menu_acl a
                JOIN t_menu b ON b.id = a.id_menu
                WHERE  b.nm_menu LIKE '%$cari%' AND
                  a.stts_menu_acl NOT LIKE '0'
                ORDER BY (id) ASC,no_menu_acl
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
      <?php echo "$data_ca[ketmenu] - $data_ca[menu]"; ?>
    </td>
		<td>
			<?php
				echo "$data_ca[menu_acl]";
        // $nmdivisi = str_replace('&', 'and', $data_ca['menu']);
			?>
		</td>
    <td align="center"><?php echo "$data_ca[no_menu_acl]"; ?></td>
    <!-- <td align="center"><?=$data_ca['stts_menu_acl'] == '1' ? 'Aktif':'Tidak Aktif' ?></td> -->

		<td align="center">
      <a class="btn-link-yellow" href="?Menu-ACL&&header=<?='Konfigurasi'?>&&Akses=Editakses&&id=<?=$data_ca['id']?>&&idm=<?=$data_ca['idmenu']?>&&no=<?=$data_ca['no_menu_acl']?>&&menu=<?=$data_ca['menu_acl']?>&&MenuACL=Addacl&&ACL-Edit" >
        <i class="fa fa-pencil"></i>
      </a>
		</td>
	</tr>

	<?php
		$no++;};
	?>
</table>
</form>
