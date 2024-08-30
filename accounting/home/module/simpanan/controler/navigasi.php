<ul>
	<label for="simpanan">
		<li <?=$this_url->check_header() == 'Simpanan' ? 'class="menuaktif"' : ''?>><i class="fa fa-money"></i>Simpanan</li>
	</label>
	<input type="checkbox" id="simpanan" name="rad" value="" <?=$this_url->check_header() == 'Simpanan' ? 'checked' : ''?>>
		<ul id="n_simpanan">
			<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>

				<li <?=$segmen[0] == 'Data-Simpanan' || $segmen[0] == 'Detail-Simpanan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Simpanan&&header=<?php echo "Simpanan" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Data-Pengambilan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pengambilan&&header=<?php echo "Simpanan" ?>">Aprove</a></li>
				<li <?=$segmen[0] == 'Laporan-Simpanan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Laporan-Simpanan&&header=<?php echo "Simpanan" ?>">SHU</a></li>

			<?php }elseif ($akses=='akunting') { ?>

				<li <?=$segmen[0] == 'Data-Simpanan' || $segmen[0] == 'Detail-Simpanan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Simpanan&&header=<?php echo "Simpanan" ?>">Data</a></li>
				<li <?=$segmen[0] == 'Data-Pengambilan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Pengambilan&&header=<?php echo "Simpanan" ?>">Aprove</a></li>

			<?php }elseif ($akses=='admin' OR $akses=='sekertaris' OR $akses=='akunting' OR $akses=='analis') { ?>

				<li <?=$segmen[0] == 'Data-Simpanan' || $segmen[0] == 'Detail-Simpanan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Simpanan&&header=<?php echo "Simpanan" ?>">Data</a></li>

			<?php }elseif ($akses=='kredit') { ?>

				<li <?=$segmen[0] == 'Data-Simpanan' || $segmen[0] == 'Detail-Simpanan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Simpanan&&header=<?php echo "Simpanan" ?>">Data</a></li>

			<?php }else{echo "";}?>
		</ul>
</ul>
