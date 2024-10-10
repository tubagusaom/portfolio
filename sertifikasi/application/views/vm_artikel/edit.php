<div class="row">
	<div class="form-group col-sm-12">
		<label class="col-sm-2 control-label">
			About us
		</label>
		<div class="col-sm-9">
			<textarea id="about_us" name="about_us" placeholder="Default Text"
				class="form-control"><?=$about->about_us?></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="col-sm-2 control-label">
			Alamat
		</label>
		<div class="col-sm-9">
			<textarea id="address" name="address" placeholder="Default Text"
				class="form-control"><?=$about->address?></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="col-sm-2">
			No HP
		</label>
		<div class="col-sm-9">
			<input id="phone" name="phone" type="text" class="form-control input-mask-phone" value="<?=$about->phone?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="col-sm-2 control-label">
			Email
		</label>
		<div class="col-sm-9">
			<input id="email" name="email" type="text" placeholder="Text Field" class="form-control"
				value="<?=$about->email?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="col-sm-2 control-label">
			Link
		</label>
		<div class="col-sm-9">
			<input id="linkedin" name="linkedin" type="text" placeholder="Text Field" class="form-control"
				value="<?=$about->linkedin?>">
		</div>
	</div>
</div>
