<ul>
	<label for="anggota">
		<li <?=$this_url->check_header() == 'Anggota' ? 'class="menuaktif"' : ''?>><i class="fa fa-address-card"></i>Anggota</li>
	</label>

	<input type="checkbox" id="anggota" name="rad" value="" <?=$this_url->check_header() == 'Anggota' ? 'checked' : ''?>>
		<ul id="n_anggota">
			<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='admin' OR $akses=='sekertaris') { ?>

			<li <?=$segmen[0] == 'Pendaftaran-Anggota' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Pendaftaran-Anggota&&header=<?php echo "Anggota" ?>">Pendaftaran</a></li>
			<li <?=$segmen[0] == 'Data-Anggota' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Anggota&&header=<?php echo "Anggota" ?>">Data</a></li>

			<?php }else{ ?>

			<li <?=$segmen[0] == 'Data-Anggota' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Anggota&&header=<?php echo "Anggota" ?>">Data</a></li>

			<?php } ?>
		</ul>
</ul>
