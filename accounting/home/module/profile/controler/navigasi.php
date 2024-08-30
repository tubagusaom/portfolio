
<style media="screen">
	.profile_p{
		/* color:#31a8eb; */
		text-shadow: -1px 0 #31a8eb, 0 1px #31a8eb, 1px 0 #31a8eb, 0 -1px #31a8eb;
	}
	.sub_profile_p{
		/* color:whitesmoke; */
		text-shadow: -1px 0 #31a8eb, 0 1px #31a8eb, 1px 0 #31a8eb, 0 -1px #31a8eb;

		font-size: 10px!important;
		padding-top: 3px;
	}
</style>


<ul>
	<label for="profile">
		<li <?=$this_url->check_header() == 'Profile' ? 'class="menuaktif"' : ''?>>
			<i class="fa fa-universal-access profile_p"></i>Profile
		</li>
	</label>
	<input type="checkbox" id="profile" name="rad" value="" <?=$this_url->check_header() == 'Profile' ? 'checked' : ''?>>
		<ul id="n_profile">

			<li <?=$segmen[0] == 'Profile-Simpanan' ? 'class="subaktif"' : ''?>>
				<i class="fa fa-money sub_profile_p"></i>
				<a href="?Profile-Simpanan&&header=<?php echo "Profile" ?>">Simpanan</a>
			</li>

			<li <?=$segmen[0] == 'Profile-Pinjaman' ? 'class="subaktif"' : ''?>>
				<i class="fa fa-money sub_profile_p"></i>
				<a href="?Profile-Pinjaman&&header=<?php echo "Profile" ?>">Pinjaman</a>
			</li>

			<!-- <li <?=$segmen[0] == 'Detail-Profile' ? 'class="subaktif"' : ''?>>
				<i class="fa fa-cogs sub_profile_p"></i>
				<a href="?Detail-Profile&&header=<?php echo "Profile" ?>">Akun</a>
			</li> -->
		</ul>

		<ul id="n_profile">

			<?php
				while($data_menu_acls=mysqli_fetch_array($query_menu_acls)){
			?>

				<li <?=$segmen[0] == "Detail-$data_menu_acls[MENUACL]" ? 'class="subaktif"' : ''?> >
					<i class="fa fa-cogs sub_profile_p"></i>
					<a href="?Detail-<?=$data_menu_acls['MENUACL']?>&&header=<?="Profile"?>">
						<?=$data_menu_acls['MENUACL']?>
					</a>
				</li>

			<?php } ?>

		</ul>
</ul>
