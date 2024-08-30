	<ul>
		<label for="reff">
			<li <?=$this_url->check_header() == 'Konfigurasi' ? 'class="menuaktif"' : ''?>><i class="fa fa-wrench"></i>Pengaturan</li>
		</label>
		<input type="checkbox" id="reff" name="rad" value="" <?=$this_url->check_header() == 'Konfigurasi' ? 'checked' : ''?>>
			<ul id="n_reff">
				<?php if ($akses=='default' OR $akses=='superuser') { ?>
					<li <?=$segmen[0] == 'Refferensi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Refferensi&&header=<?php echo "Konfigurasi" ?>">General</a></li>
					<li <?=$segmen[0] == 'Hak-Akses' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Hak-Akses&&header=<?php echo "Konfigurasi" ?>">Akses</a></li>
					<li <?=$segmen[0] == 'Menu' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Menu&&header=<?php echo "Konfigurasi" ?>">Menu</a></li>
					<li <?=$segmen[0] == 'Akses-Menu' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Akses-Menu&&header=<?php echo "Konfigurasi" ?>">Menu Akses</a></li>

					<li <?=$segmen[0] == 'Menu-ACL' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Menu-ACL&&header=<?php echo "Konfigurasi" ?>">Menu ACL</a></li>
					<li <?=$segmen[0] == 'Akses-Menu-ACL' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Akses-Menu-ACL&&header=<?php echo "Konfigurasi" ?>">Menu ACL Akses</a></li>

					<li <?=$segmen[0] == 'Toolbar' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Toolbar&&header=<?php echo "Konfigurasi" ?>">Toolbar</a></li>
					<!-- <li <?=$segmen[0] == 'Toolbar-Menu' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Toolbar-Menu&&header=<?php echo "Konfigurasi" ?>">Toolbar Menu</a></li> -->
					<li <?=$segmen[0] == 'Toolbar-Akses' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Toolbar-Akses&&header=<?php echo "Konfigurasi" ?>">Toolbar Akses</a></li>
				<?php }elseif ($akses == 'ketua') { ?>
					<li <?=$segmen[0] == 'Refferensi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Refferensi&&header=<?php echo "Konfigurasi" ?>">General</a></li>
				<?php }else { ?>
					<?php echo '' ?>
				<?php } ?>
			</ul>
	</ul>
