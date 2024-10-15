<table>
  <tr>
    <td colspan="5"><h1>Data Menu</h1></td>
  </tr>

  <tr>
    <th>No</th>
    <th>Akses</th>
    <th>Keterangan</th>
    <th>Status</th>
    <th align="center">-</th>
  </tr>

  <?php

		$no		  =1;
		$sql_role	  =
              "SELECT
                  a.id,
                  a.nm_menu,
                  a.keterangan,
                  a.stts_menu,
                  a.c_menu
                FROM t_menu a
                -- WHERE a.stts_menu NOT LIKE '0'
                ORDER BY a.id ASC
              ";
		$query_role	=mysqli_query($koneksi,$sql_role);
		while($data_role=mysqli_fetch_array($query_role)){

			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

	?>

  <tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo $no; ?>.</td>
		<td><?php echo "$data_role[nm_menu]"; ?></td>
		<td>
			<?php
				echo "$data_role[keterangan]";
        // $nmdivisi = str_replace('&', 'and', $data_role['nmdivisi']);
			?>
		</td>

    <td align="center">
      <?=$data_role['stts_menu'] == '1' ? 'Aktif' : 'Tidak Aktif'?>
    </td>

		<?php if ($akses=='admin'){echo "";}else { ?>
		<td align="center">
			<a
        href=
          "?Menu&&header=<?='Konfigurasi'?>&&id=<?=$data_role['id']?>&&menu=<?=$data_role['nm_menu']?>&&status=<?=$data_role['stts_menu']?>&&Akses=Adddir&&MenuEdit"
      >
        Edit
      </a>
		</td>
		<?php } ?>
	</tr>

	<?php
		$no++;};
	?>
</table>
