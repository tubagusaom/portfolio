	<ul>
		<label for="divisi">
			<li <?=$this_url->check_header() == 'Divisi' ? 'class="menuaktif"' : ''?>>
				<i class="fa fa-users"></i>Divisi
				<b style="font-size:10px">( Bisnis unit )</b>
			</li>
		</label>
		<input type="checkbox" id="divisi" name="rad" value="" <?=$this_url->check_header() == 'Divisi' ? 'checked' : ''?>>
			<ul id="n_divisi">
				<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
				<li <?=$segmen[0] == 'Input-Divisi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Divisi&&header=<?php echo "Divisi" ?>">Tambah</a></li>
				<li <?=$segmen[0] == 'Data-Divisi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Divisi&&header=<?php echo "Divisi" ?>">Data</a></li>
				<?php }else { ?>
				<li <?=$segmen[0] == 'Data-Divisi' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Divisi&&header=<?php echo "Divisi" ?>">Data</a></li>
				<?php } ?>
			</ul>
	</ul>
