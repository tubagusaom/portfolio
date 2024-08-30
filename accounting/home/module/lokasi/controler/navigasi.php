	<ul>
		<label for="lokasi">
			<li <?=$this_url->check_header() == 'Lokasi' ? 'class="menuaktif"' : ''?>><i class="fa fa-building"></i>Lokasi</li>
		</label>
		<input type="checkbox" id="lokasi" name="rad" value="" <?=$this_url->check_header() == 'Lokasi' ? 'checked' : ''?>>
			<ul id="n_lokasi">
				<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
				<li <?=$segmen[0] == 'Input-Lokasi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Lokasi&&header=<?php echo "Lokasi" ?>">Tambah</a></li>
				<li <?=$segmen[0] == 'Data-Lokasi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Lokasi&&header=<?php echo "Lokasi" ?>">Data</a></li>
				<?php }else { ?>
				<li <?=$segmen[0] == 'Input-Lokasi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Lokasi&&header=<?php echo "Lokasi" ?>">Data</a></li>
				<?php } ?>
			</ul>
	</ul>
