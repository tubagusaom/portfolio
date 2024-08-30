<ul>
	<label for="laporan">
		<li <?=$this_url->check_header() == 'Laporan' ? 'class="menuaktif"' : ''?>><i class="fa fa-book"></i>Laporan</li>
	</label>
	<input type="checkbox" id="laporan" name="BB" value="" <?=$this_url->check_header() == 'Laporan' ? 'checked' : ''?>>
		<ul id="n_laporan">
				<li <?=$segmen[0] == 'Buku-Besar' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Buku-Besar&&header=<?php echo "Laporan" ?>">Buku Besar</a></li>
				<li <?=$segmen[0] == 'Neraca-Lajur' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Neraca-Lajur&&header=<?php echo "Laporan" ?>">Neraca Lajur</a></li>
				<li <?=$segmen[0] == 'Neraca' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Neraca&&header=<?php echo "Laporan" ?>">Neraca</a></li>
				<li <?=$segmen[0] == 'Laba-Rugi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Laba-Rugi&&header=<?php echo "Laporan" ?>">Laba-Rugi</a></li>
				<?php if ($akses=='default' OR $akses=='superuser') { ?>
				<li <?=$segmen[0] == 'Konfigurasi-Laporan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Konfigurasi-Laporan&&header=<?php echo "Laporan" ?>">Konfigurasi</a></li>
				<?php }else { echo ""; } ?>
			</ul>
	</ul>
