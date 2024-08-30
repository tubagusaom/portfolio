	<ul>
		<label for="jurnal">
			<li <?=$this_url->check_header() == 'Jurnal' ? 'class="menuaktif"' : ''?>><i class="fa fa-pie-chart"></i>Jurnal</li>
		</label>
		<input type="checkbox" id="jurnal" name="rad" value="" <?=$this_url->check_header() == 'Jurnal' ? 'checked' : ''?>>
			<ul id="n_jurnal">

				<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='akunting') { ?>

				<li <?=$segmen[0] == 'Input-Jurnal' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Jurnal&&header=<?php echo "Jurnal" ?>">Jurnal</a></li>
				<li <?=$segmen[0] == 'Data-Jurnal' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Jurnal&&header=<?php echo "Jurnal" ?>">Data</a></li>

				<?php }else{ ?>

				<li <?=$segmen[0] == 'Data-Jurnal' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Jurnal&&header=<?php echo "Jurnal" ?>">Data</a></li>

				<?php } ?>
			</ul>
	</ul>
