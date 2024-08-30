<?php
	// echo $akses;
?>

<ul>
	<label for="pinjaman">
		<li <?=$this_url->check_header() == 'Pinjaman' ? 'class="menuaktif"' : ''?>><i class="fa fa-money"></i>Pinjaman</li>
	</label>
	<input type="checkbox" id="pinjaman" name="rad" value="" <?=$this_url->check_header() == 'Pinjaman' ? 'checked' : ''?>>
		<ul id="n_pinjaman">

			<?php
				$akses=$_SESSION['akses_user'];

				if ($akses=='default' OR $akses=='superuser' OR $akses=='admin'OR $akses=='sekertaris') {
			?>

				<li <?=$segmen[0] == 'Pinjaman-Anggota' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Pinjaman-Anggota&&header=<?php echo "Pinjaman" ?>">Tambah</a></li>
				<li <?=$segmen[0] == 'Data-Peminjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Peminjaman&&header=<?php echo "Pinjaman" ?>">Formulir</a></li>
				<li <?=$segmen[0] == 'Data-Pinjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pinjaman&&header=<?php echo "Pinjaman" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Data-Pelunasan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pelunasan&&header=<?php echo "Pinjaman" ?>">Pelunasan</a></li>

			<?php }elseif ($akses=='ketua') { ?>

				<li <?=$segmen[0] == 'Data-Peminjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Peminjaman&&header=<?php echo "Pinjaman" ?>">Formulir</a></li>
				<li <?=$segmen[0] == 'Data-Pinjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pinjaman&&header=<?php echo "Pinjaman" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Data-Pelunasan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pelunasan&&header=<?php echo "Pinjaman" ?>">Pelunasan</a></li>


			<?php }elseif ($akses=='anggota') { ?>

				<li <?=$segmen[0] == 'Data-Pinjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pinjaman&&header=<?php echo "Pinjaman" ?>">Data</a></li>

			<?php }elseif ($akses=='akunting') { ?>

				<li <?=$segmen[0] == 'Data-Peminjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Peminjaman&&header=<?php echo "Pinjaman" ?>">Formulir</a></li>
				<li <?=$segmen[0] == 'Data-Pinjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pinjaman&&header=<?php echo "Pinjaman" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Data-Pelunasan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pelunasan&&header=<?php echo "Pinjaman" ?>">Pelunasan</a></li>

			<?php }elseif ($akses=='kredit') { ?>

				<li <?=$segmen[0] == 'Data-Peminjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Peminjaman&&header=<?php echo "Pinjaman" ?>">Formulir</a></li>
				<li <?=$segmen[0] == 'Data-Pelunasan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pelunasan&&header=<?php echo "Pinjaman" ?>">Pelunasan</a></li>

			<?php }else{?>

				<li <?=$segmen[0] == 'Data-Pinjaman' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pinjaman&&header=<?php echo "Pinjaman" ?>">Data</a></li>

			<?php }?>
		</ul>
</ul>
