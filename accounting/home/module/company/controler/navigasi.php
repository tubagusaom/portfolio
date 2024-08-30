	<ul>
		<label for="company">
			<li <?=$this_url->check_header() == 'Company' ? 'class="menuaktif"' : ''?>><i class="fa fa-building-o"></i>Perusahaan</li>
		</label>

		<input type="checkbox" id="company" name="rad" value="" <?=$this_url->check_header() == 'Company' ? 'checked' : ''?>>
			<ul id="n_company">
				<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
				<li <?=$segmen[0] == 'Input-Company' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Company&&header=<?php echo "Company" ?>">Tambah</a></li>
				<li <?=$segmen[0] == 'Data-Company' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Company&&header=<?php echo "Company" ?>">Data</a></li>
				<?php }else { ?>
				<li <?=$segmen[0] == 'Data-Company' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Company&&header=<?php echo "Company" ?>">Data</a></li>
				<?php } ?>
			</ul>
	</ul>
