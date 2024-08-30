<table>
  <tr>
    <td colspan="4"><h1>Data Toolbar Menu</h1></td>
  </tr>

  <tr>
    <th>No</th>
    <th>Toolbar</th>
    <th>Keterangan</th>
    <th align="center">-</th>
  </tr>

  <?php

		$no		  =1;
    // SELECT a.id, a.name,b.id FROM tutorials_inf a
		$sql_role	  =
              "SELECT
                  a.id,
                  a.nama_toolbar,
                  a.keterangan,
                  a.c_toolbar
                FROM t_toolbar a
                -- WHERE a.stts_akses NOT LIKE '3'
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
		<td align="center"><?php echo $no; ?>.</td>
		<td><?php echo "$data_role[nama_toolbar]"; ?></td>
		<td>
			<?php
				echo "$data_role[keterangan]";
			?>
		</td>

		<td align="center">
			<a href="?Toolbar-Menu&&header=<?='Konfigurasi'?>&&id=<?=$data_role['id']?>&&nama=<?=$data_role['nama_toolbar']?>&&ket=<?=$data_role['keterangan']?>&&Toolbars-Menu=Addtoolbarmenu&&Toolbar-Menu-Edit" >
        <b style="text-align: center;font-size:15px;"> <i class="fa fa-pencil-square" style="background:yellow;padding:3px;border:1px solid #bbb;border-radius:3px;"></i> </b>
      </a>

      <a href="?Toolbar-Menu&&header=<?='Konfigurasi'?>&&id=<?=$data_role['id']?>&&nama=<?=$data_role['nama_toolbar']?>&&ket=<?=$data_role['keterangan']?>&&Toolbars-Menu=Addtoolbarmenu&&Toolbar-Menu-Edit" >
        <b style="font-size:15px;"> <i class="fa fa-trash" style="background:rgba(255, 0, 0, 0.4);padding:3px;border:1px solid #bbb;border-radius:3px;"></i> </b>
      </a>
		</td>

	</tr>

	<?php
		$no++;};
	?>
</table>
