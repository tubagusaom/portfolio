<form class="" action="" method="post">
<table>
  <tr>
    <td colspan="5"><h1>Data Menu Akses</h1></td>
  </tr>

  <tr>
    <td colspan="5">

      <?php
				if (isset($_POST['pencarian'])) {
					if ($_POST['search']=='') {
						echo "";
					}
					else{
						echo "Filter data berdasarkan Akses <b>$_POST[search]</b>";
					}
				}
			?>

			<button type="submit" name="pencarian" class="cari">
				<i class="fa fa-search"></i>
			</button>
			<select class="acount" name="search" style="width:30%;font-size:13px;">
				<option value="">Filter akses</option>
				<?php
          $sql_a="SELECT
            a.id,
            a.nama_peran,
            a.keterangan
            FROM t_role a
            -- JOIN conf_akses ON conf_akses.id_akses = t_role.id
            -- WHERE a.nama_peran NOT LIKE 'anonymous' AND
            --       a.nama_peran NOT LIKE 'default'
           -- ORDER BY a.keterangan ASC
           -- GROUP BY akun.id
          ";
          $query_a=mysqli_query($koneksi,$sql_a);

					while($dataa=mysqli_fetch_array($query_a))
					{
						echo "<option value='$dataa[nama_peran]'>$dataa[keterangan] - $dataa[nama_peran]</option>";
					}
				?>
			</select>

    </td>
  </tr>

  <tr>
    <th>No</th>
    <th>User</th>
    <th>Menu</th>
    <th>No Urut</th>
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
                  a.id_akses,
                  a.id_menu,
                  a.no_menu,
                  b.keterangan as menu,
                  c.keterangan as role
                FROM conf_akses a
                JOIN t_menu b ON b.id = a.id_menu
                JOIN t_role c ON c.id = a.id_akses
                WHERE  c.nama_peran LIKE '%$cari%' AND
                  a.stts_akses NOT LIKE '3'
                ORDER BY (id_akses) DESC,no_menu
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
		<td><?php echo "$data_ca[role]"; ?></td>
		<td>
			<?php
				echo "$data_ca[menu]";
        $nmdivisi = str_replace('&', 'and', $data_ca['menu']);
			?>
		</td>
    <td align="center"><?php echo "$data_ca[no_menu]"; ?></td>

		<td align="center">
			<a
        href=
          "?Akses-Menu-Edit&&header=<?='Konfigurasi'?>&&Akses=Editakses&&id=<?=$data_ca['id']?>&&id_user=<?=$data_ca['id_akses']?>&&no=<?=$data_ca['no_menu']?>&&id_menu=<?=$data_ca['id_menu']?>&&menu=<?=$data_ca['menu']?>&&role=<?=$data_ca['role']?>"
      >
        Edit
      </a>
		</td>
	</tr>

	<?php
		$no++;};
	?>
</table>
</form>
