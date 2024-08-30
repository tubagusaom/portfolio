<ul>
	<label for="penyelesaian">
		<li <?=$this_url->check_header() == 'Penyelesaian' ? 'class="menuaktif"' : ''?>><i class="fa fa-external-link-square"></i>Penyelesaian</li>
	</label>
	<input type="checkbox" id="penyelesaian" name="rad" value="" <?=$this_url->check_header() == 'Penyelesaian' ? 'checked' : ''?>>
		<ul id="n_penyelesaian">
			<?php
				$akses=$_SESSION['akses_user'];

				if ($akses=='default' OR $akses=='superuser') {
			?>

				<li <?=$segmen[0] == 'Data-Anggota-Keluar' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Anggota-Keluar&&header=<?php echo "Penyelesaian" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Penyelesaian' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Penyelesaian&&header=<?php echo "Penyelesaian" ?>">Detail</a></li>
				<li <?=$segmen[0] == 'Data-Penyelesaian' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Penyelesaian&&header=<?php echo "Penyelesaian" ?>">Aprove</a></li>

			<?php }elseif ($akses=='ketua' OR $akses=='akunting' OR $akses=='kredit') { ?>

				<li <?=$segmen[0] == 'Data-Anggota-Keluar' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Anggota-Keluar&&header=<?php echo "Penyelesaian" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Data-Penyelesaian' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Penyelesaian&&header=<?php echo "Penyelesaian" ?>">Aprove</a></li>

			<?php }elseif ($akses=='admin' OR $akses=='sekertaris') { ?>

				<li <?=$segmen[0] == 'Penyelesaian' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Penyelesaian&&header=<?php echo "Penyelesaian" ?>">Detail</a></li>
				<li <?=$segmen[0] == 'Data-Anggota-Keluar' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Anggota-Keluar&&header=<?php echo "Penyelesaian" ?>">Data</a></li>

			<?php }else{?>

				<li <?=$segmen[0] == 'Data-Anggota-Keluar' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Anggota-Keluar&&header=<?php echo "Penyelesaian" ?>">Data</a></li>

			<?php }?>
		</ul>
</ul>
