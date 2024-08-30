<ul>
	<label for="akun">
		<li <?=$this_url->check_header() == 'User' ? 'class="menuaktif"' : ''?>>
			<i class="fa fa-users"></i>User
		</li>
	</label>

	<input type="checkbox" id="akun" name="rad" value=""  <?=$this_url->check_header() == 'User' ? 'checked' : ''?>>
		<ul id="n_akun">
			<li <?=$segmen[0] == 'Input-User' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Input-User&&header=<?php echo "User" ?>">Tambah</a></li>
			<li <?=$segmen[0] == 'Data-User' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-User&&header=<?php echo "User" ?>">Pengurus</a></li>
			<li <?=$segmen[0] == 'Data-User-Anggota' ? 'class="subaktif"' : ''?>><i class="fa fa-window-minimize"></i><a href="?Data-User-Anggota&&header=<?php echo "User" ?>">Anggota</a></li>
		</ul>
</ul>
