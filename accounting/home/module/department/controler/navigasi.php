	<ul>
		<label for="dept">
			<li <?=$this_url->check_header() == 'Departmen' ? 'class="menuaktif"' : ''?>><i class="fa fa-briefcase"></i>Departmen</li>
		</label>
		<input type="checkbox" id="dept" name="rad" value="" <?=$this_url->check_header() == 'Departmen' ? 'checked' : ''?>>
			<ul id="n_dept">
				<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
				<li <?=$segmen[0] == 'Input-Department' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Department&&header=<?php echo "Departmen" ?>">Tambah</a></li>
				<li <?=$segmen[0] == 'Data-Department' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Department&&header=<?php echo "Departmen" ?>">Data</a></li>
				<?php }else { ?>
				<li <?=$segmen[0] == 'Data-Department' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Department&&header=<?php echo "Departmen" ?>">Data</a></li>
				<?php } ?>
			</ul>
	</ul>
