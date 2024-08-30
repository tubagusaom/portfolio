<ul>
	<label for="gl">
		<li <?=$this_url->check_header() == 'Account' ? 'class="menuaktif"' : ''?>><i class="fa fa-university"></i>GL</li>
	</label>

	<input type="checkbox" id="gl" name="rad" value="" <?=$this_url->check_header() == 'Account' ? 'checked' : ''?> >
		<ul id="n_gl">
			<li <?=$segmen[0] == 'Input-Account_master' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Account_master&&header=<?php echo "Account" ?>">Master Account</a></li>
			<li <?=$segmen[0] == 'Input-Account_sub' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-Account_sub&&header=<?php echo "Account" ?>">Sub Account</a></li>
			<li <?=$segmen[0] == 'Data-Account' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-Account&&header=<?php echo "Account" ?>">Data</a></li>
			<?php   if ($akses=='default' OR $akses=='superuser') { ?>
			<li <?=$segmen[0] == 'Configurasi-Account' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Configurasi-Account&&header=<?php echo "Account" ?>">Konfigurasi</a></li>
			<?php } ?>
		</ul>
</ul>
