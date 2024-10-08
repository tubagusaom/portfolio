<style type="text/css">
.cnegara{
    display: none;
}

  .input-upper { text-transform: uppercase }
  .input-upper::-webkit-input-placeholder { text-transform: none }
  .input-upper::-moz-placeholder { text-transform: none }
  .input-upper:-moz-placeholder { text-transform: none }
  .input-upper:-ms-placeholder { text-transform: none }
</style>
<link href="<?= base_url(); ?>assets/plugins/select2-4.0.3/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>


<div class="col-xs-12 formStep2">
    <div class="col-md-12" style="margin-bottom: 20px;">

        <fieldset><legend><h3> FR-APL-01. FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</h3>
            <h5> Pada bagian ini, cantumkan data pribadi, data pendidikan formal, serta data pekerjaan Anda pada saat ini. Untuk bagian yang bertanda (*) wajib diisi.</h5></legend></fieldset>

            <div class="col-md-3">
                <label class="control-label">Pendaftar <b class="harus_diisi">*</b></label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <select name="marketing" id="marketing" class="form-control">
                        <option value="umum_pskk">Umum (PSKK)</option>
                        <option value="mahasiswa_pskk">Mahasiswa (PSKK)</option>
                        <option value="umum">Umum</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label">No.Identitas <b class="harus_diisi">*</b></label>
            </div>

            <div class="col-md-9">
                <div class="form-group">

                    <input onblur="checklengthnik(this)" maxlength="16" type="text" name="no_identitas" id="no_identitas" required class="form-control input-number input-number-ktp" placeholder="Masukkan Nomor Identitas (KTP)"  />
                    <label id="label_no_identitas" style="font-size:10px;color: red;"></label>
                    <span id="notifnik"></span>

                    <input type="hidden" id="step_langkah">      </div>
                </div>
                <div id="div_pilih">

                </div>
                <div class="col-md-3">
                    <label class="control-label">Nama Lengkap <b class="harus_diisi">*</b> </label>
                </div>

                <div class="col-md-9">
                    <div class="form-group">
                        <input  maxlength="100" type="text" name="nama_lengkap" id="nama_lengkap" required class="form-control input-upper" placeholder="Masukkan Nama Lengkap"  />       </div>
                        <label id="label_nama_lengkap" style="font-size:10px;color: red;"></label>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Organisasi</label>
                    </div>

                    <div class="col-md-9">
                        <div class="form-group">
                            <input  maxlength="100" type="text" name="organisasi" id="organisasi" class="form-control" placeholder="Organisasi / Tempat Bekerja / Institusi terkait / Freelance"  />       </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Tujuan Asesmen </label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio" name="is_perpanjangan" id="is_perpanjangan" value="0" checked>Sertifikasi</label>
                                <label class="radio-inline"><input type="radio" name="is_perpanjangan" id="is_perpanjangan" value="1" >Sertifikasi Ulang</label>
                                <!--<input  maxlength="100" type="checkbox" name="is_perpanjangan" id="is_perpanjangan" value="1"   /> Checklist jika merupakan perpanjangan sertifikat sebelumnya-->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Tempat Lahir</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input  maxlength="100" type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir"  />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input maxlength="100" type="date" id="tanggal_lahir" name="tanggal_lahir" value="2005-05-25" class="form-control" placeholder="Contoh 05/10/1985"  />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Jenis Kelamin </label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">

                                <select class="form-control validate[required]" name="jenis_kelamin" id="jenis_kelamin" >
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div id="div_bukti" style="display:none;"></div>

                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Kewarganegaraan  </label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                                    <option value="">Pilih</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                            <div class="form-group cnegara">
                                <select class="form-control" name="negara" id="negara">
                                    <option value="">Pilih</option>
                                    <option value="USA">USA</option>
                                    <option value="Inggris">Inggris</option>
                                    <option value="Australia">Australia</option>
                                    <option value="China">China</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Alamat</label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap Domisili"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Provinsi Domisili</label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="id_provinsi" id="id_provinsi" class="combobox form-control select2" required >
                                    <?php foreach ($data_provinsi as $result) { ?>
                                        <option value="<?php echo $result->id ?>">
                                            <?php echo $result->name ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Kabupaten</label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="id_kabupaten" id="id_kabupaten" class="combobox form-control select2" required >
                                    <?php foreach ($data_kabupaten as $kab) { ?>
                                        <option value="<?php echo $kab->id ?>">
                                            <?php echo $kab->name ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">No.HP  <b class="harus_diisi">*</b> </label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <input  maxlength="15" type="text" name="no_telp" id="no_telp" required class="form-control input-number" placeholder="Masukkan No Hp yang aktif"  />
                                <label id="label_no_telp" style="font-size:10px;color: red;"></label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Email  <b class="harus_diisi">*</b> </label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <input  maxlength="100" type="text" name="email" id="email" required class="form-control input-email" placeholder="Masukkan Email"  />
                                <label id="label_email" style="font-size:10px;color: red;"></label>
                                <input type="hidden" id="validasi_email">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Pendidikan Terakhir<b class="harus_diisi">*</b></label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="form-control" name="id_pendidikan" id="id_pendidikan">
                                    <option value="">Pilih</option>
                                    <?php foreach ($pendidikan as $value) { ?>
                                        <option value="<?=$value->id?>"><?=$value->nama_pendidikan?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label"> Tempat Uji Kompetensi</label>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <?php
                                $attribute = 'id="id_tuk" class="combobox form-control" required';
                                echo form_dropdown('id_tuk', $data_tuk,'Pilih Tuk', $attribute); ?>
<!--                <select name="id_tuk" id="id_tuk" class="combobox form-control" required >
                    <?php //foreach ($data_tuk as $key => $value) {
                        ?>
                        <option value="<?= $value->id ?>"><?= ($key + 1) . ". " . $value->tuk ?>(<?= $value->alamat ?>)</option>
                        <?php
                    //}
                    ?>

                </select>  -->
            </div>
        </div>

        <div class="col-md-3">
            <label class="control-label">Jadwal Uji Kompetensi</label>
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <select name="jadwal_id" id="jadwal_id" class="combobox form-control" required >
                    <option>Pilih Jadwal</option>
                    <?php //foreach ($data_jadwal as $key => $value) {
                        ?>
                        <!--<option value="<?= $value->id ?>"><?= ($key + 1) . ". " . $value->jadual ?>(<?= tgl_indo($value->tanggal) ?>)</option>-->
                        <?php
                    // }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Nama Sekolah / Perguruan Tinggi </label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <input  maxlength="100" type="text" name="perg_tinggi" id="perg_tinggi"  class="form-control" placeholder="Masukkan Nama Perguruan Tinggi"  />
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Program Studi</label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <input  maxlength="100" type="text" name="jurusan" id="jurusan" class="form-control"  placeholder="Masukkan Program Studi"  />
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Nama dan Alamat Perusahaan</label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <textarea name="alamat_perusahaan" id="alamat_perusahaan" class="form-control"  placeholder="Alamat Lengkap Perusahaan"> </textarea>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label">Pekerjaan<b class="harus_diisi">*</b></label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <select class="form-control select2" name="id_pekerjaan" id="id_pekerjaan">
                        <option value="">Pilih</option>
                        <?php foreach ($pekerjaan as $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->nama_pekerjaan?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">No.Telp Perusahaan</label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <input  maxlength="100" type="text" name="no_telp_company" id="no_telp_company"  class="form-control input-number" placeholder="Masukkan No Telp Perusahaan"  />
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Email Perusahaan</label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <input  maxlength="100" type="text" id="email_company" name="email_companny"  class="form-control input-email" placeholder="Masukkan Email Perusahaan"  />
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Sumber Anggaran<b class="harus_diisi">*</b></label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <select class="form-control" name="id_sumber_anggaran" id="id_sumber_anggaran">
                        <option value="">Pilih</option>
                        <?php foreach ($sumber_anggaran as $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->jenis_anggaran?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Pemberi Anggaran<b class="harus_diisi">*</b></label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <select class="form-control" name="id_instansi_anggaran" id="id_instansi_anggaran">
                        <option value="">Pilih</option>
                        <?php foreach ($instansi_anggaran as $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->instansi_pemberi_anggaran?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label class="control-label">Genre Buku<b class="harus_diisi">*</b></label>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <select class="form-control select2" name="id_genre" id="id_genre">
                        <option value="">Pilih Genre</option>
                        <?php foreach ($genre as $value) { ?>
                            <option value="<?=$value->id?>"><?=$value->nama_genre?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="margin-top:20px; margin-bottom:20px;">
                    <button id="selanjutnya-2" class="btn btn-success nextBtn btn-md pull-left" type="button" >Selanjutnya (Langkah 3)</button>
                </div>
            </div>

        </div>

    </div>


    <script src="<?= base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2-4.0.3/dist/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        $("#id_provinsi").select2({
            placeholder: "Provinsi",
            allowClear: true
        });

        $("#id_kabupaten").select2({
            placeholder: "Kabupaten",
            allowClear: true
        });

        $("#id_pekerjaan").select2({
            placeholder: "Pilih Pekerjaan",
            allowClear: true
        });

        $("#id_tuk").select2({
            placeholder: "Pilih TUK",
            allowClear: true
        });

        $("#jadwal_id").select2({
            placeholder: "Pilih Jadwal",
            allowClear: true
        });

        $("#id_sumber_anggaran").select2({
            placeholder: "Pilih Sumber Anggaran",
            allowClear: true
        });

        $("#id_instansi_anggaran").select2({
            placeholder: "Pilih Instansi",
            allowClear: true
        });

        $('#kewarganegaraan').change(function () {
            var warga = $(this).val();

            if (warga == "WNA") {
                $(".cnegara").show();
            } else {
                $(".cnegara").hide();
            }
        });

        $('#id_tuk').change(function () {
            $('#myOverlay').show();
            $('#loadingGIF').show();
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url('welcome/get_jadwal'); ?>",
                method: "POST",
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function (data) {
                    if(data.length > 0){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].jadual+'</option>';
                        }
                        $('#jadwal_id').html(html);
                    }else{
                        alert('Belum ada jadwal di TUK yang dipilih. Silahkan pilih TUK lainnya!')
                    }
                    $('#myOverlay').hide();
                    $('#loadingGIF').hide();

                }
            });
            return false;
        });

    </script>
