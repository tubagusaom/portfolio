	<ul>
		<label for="penagihan">
			<li <?=$this_url->check_header() == 'Penagihan' ? 'class="menuaktif"' : ''?>><i class="fa fa-credit-card-alt"></i>Penagihan</li>
		</label>
		<input type="checkbox" id="penagihan" name="rad" value="" <?=$this_url->check_header() == 'Penagihan' ? 'checked' : ''?>>
			<ul id="n_penagihan">
				<li <?=$segmen[0] == 'Data-Penagihan' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Penagihan&&header=<?php echo "Penagihan" ?>">Simpan & Pinjam</a></li>
			</ul>
	</ul>
