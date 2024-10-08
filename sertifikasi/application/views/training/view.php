<style type="text/css">
    a {
        text-decoration: none;
    }
    .img-thumbnail {
        margin-left: 75px;
    }

.note {
  position: relative;
  color: #1d2127;
  background: #F9F9F9;
  overflow: hidden;
  padding-top:30px;
  border-radius: 7px;
  padding: 20px;
}

.note:before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  border-width: 0 36px 36px 0;
  border-style: solid;
  border-color: #fff #fff rgb(190, 17, 45) rgb(190, 17, 45);
  /* background: transparent; */
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  box-shadow: 0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  /* Firefox 3.0 damage limitation */
  display: block; width: 0;
}

.note input, .note textarea, .note select{
  border-radius: 5px;
  width: 90%;
}
.note input:focus, .note textarea:focus{
  border-color: #0088cc;
}

.aom strong{
  border-bottom: 2px solid #0088cc;
}

.btn-file{
  border-radius: 5px;
}
.type-file{
  color: #111;
  cursor: pointer;
}

.btn-download{
  border-radius: 7px;
  background-color: #0088cc;
  color: #fff;
}
.btn-download:hover{
  background-color: #de8855;
  color: #fff;
}

.bungkus-button-simpan{
  padding-top: 5px;
}
.btn-simpan {
  color: #ffffff;
  background-color: #383f48;
  border-color: #383f48 #383f48 #22262b;
  border-radius: 6px;
  float: right;
}
.btn-simpan:hover {
  border-color: #434c56 #434c56 #2d323a;
  background-color: #434c56;
  color: #ffffff;
}

.alert-warning{
  color: red;
  border-radius: 5px;
  text-align: center;
  font-weight: 700;
}
.alert-success{
  border-radius: 5px;
  text-align: center;
  font-weight: 700;
}

.harus_diisi{
  color: red;
}


.header-tb {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 30px;
  margin-bottom: 20px;
  border-top: 2px solid rgb(190, 17, 45);
  border-radius: 5px;
}

.header-tb a {
  /* float: left; */
  color: #111;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header-tb a.logo {
  font-size: 25px;
  font-weight: 400;
}

.header-tb a.active {
  background-color: rgb(190, 17, 45);
  color: white;
}
.header-tb a.active:hover {
  background-color: rgb(129, 14, 32);
  color: white;
}

.header-right-tb {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }

  .header-tb a.active {
    width: 100%;
    float: right;
    margin-right: 17px;
  }
}

</style>

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?=base_url()?>"> <i class="fa fa-home"></i> Home</a></li>
                    <!-- <li class="active">Kontak</li> -->
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>TRAINING REGISTRASION</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="overflow-x: auto;">



            <form action="<?php echo base_url('training/save');?>" method="POST" enctype="multipart/form-data" id="regist_form">
              <div class="panel-body note">

                <!-- <b>Silahkan download formulir atau lakukan pendaftaran online .</b> -->

                <div class="header-tb" style="margin-top:30px; text-align:center">
                  <a class="logo">
                    <b> FORM REGISTRASION </b>
                  </a>
                </div>

                <div class="alert alert-warning" style="margin-top:30px">
                  Tanda (*) Wajib Diisi
                  <?php if($this->session->flashdata('result')!=''){ ?>
                      <div class="alert alert-<?=$this->session->flashdata('mode_alert')?>" role="alert" id="Div-Alert">
                        <button class="close" onclick="hide('Div-Alert')">×</button>
                        <?php echo $this->session->flashdata('result'); ?>
                      </div>
                  <?php } ?>
                </div>

                <h5><span style="font-weight:500; color:#940f06">A.&nbsp;DATA DIRI</span></h5>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">Nama Lengkap <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                   <input type="text" class="form-control"  name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Lengkap">
                    <?php
                        echo form_error('nama', '<label for="nama" class="text-danger" style="display: block">', '</label>');
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">NIK <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                    <input type="text" class="form-control"  name="no_identitas" id="no_identitas" value="<?php echo set_value('no_identitas'); ?>" placeholder="KTP/ SIM/">
                     <?php
                        echo form_error('no_identitas', '<label for="no_identitas" class="text-danger" style="display: block">', '</label>');
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">Jenis Klamin <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7" style="padding-bottom:20px">
                    <div class="col-md-6">
                      <input type="radio" required value="1"  name="jenis_klamin" id="jenis_klamin" style="width:5%"> <font style="font-size:13px">Laki - Laki</font>
                    </div>
                    <div class="col-md-6">
                      <input type="radio" required value="2"  name="jenis_klamin" id="jenis_klamin" style="width:5%"> <font style="font-size:13px">Perempuan</font>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">Usia <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="usia" id="usia" value="<?php echo set_value('usia'); ?>" placeholder="Usia">
                     <?php
                        echo form_error('usia', '<label for="usia" class="text-danger" style="display: block">', '</label>');
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">Pendidikan <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                    <div class="col-md-5">
                      <select class="form-control" name="pendidikan" id="pendidikan" required style="width:95%">
                          <option value="">-Pilih jenjang pendidikan-</option>

                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D3">D3</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>

                      </select>
                    </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?php echo set_value('jurusan'); ?>" placeholder="Jurusan">
                         <?php
                        echo form_error('jurusan', '<label for="jurusan" class="text-danger" style="display: block">', '</label>');
                        ?>

                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">Jabatan <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo set_value('jabatan'); ?>" placeholder="Jabatan Anda">
                     <?php
                        echo form_error('jabatan', '<label for="jabatan" class="text-danger" style="display: block">', '</label>');
                    ?>
                    </div>
                  </div>


                <div class="form-group">
                  <label class="col-md-4 control-label" for="inputDefault">Lama Menjabat <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                   <input type="text" class="form-control" name="lama_menjabat" value="<?php echo set_value('lama_menjabat'); ?>" id="lama_menjabat" placeholder="Lama Menjabat">
                    <?php
                        echo form_error('lama_menjabat', '<label for="lama_menjabat" class="text-danger" style="display: block">', '</label>');
                    ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label" for="inputDefault">Departemen/Divisi <b class='harus_diisi'>*</b></label>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="divisi" id="divisi" value="<?php echo set_value('divisi'); ?>" placeholder="Departemen / Divisi">
                       <?php
                        echo form_error('t_lahir', '<label for="t_lahir" class="text-danger" style="display: block">', '</label>');
                    ?>
                    </div>
                  </div>

                 <div class="form-group">
                   <label class="col-md-4 control-label" for="inputDefault">Email <b class='harus_diisi'>*</b></label>
                   <div class="col-md-7">
                     <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Email Anda">
                      <?php
                        echo form_error('email', '<label for="email" class="text-danger" style="display: block">', '</label>');
                    ?>
                   </div>
                 </div>

                 <div class="form-group">
                   <label class="col-md-4 control-label" for="inputDefault">No HP <b class='harus_diisi'>*</b></label>
                   <div class="col-md-7">
                     <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo set_value('no_hp'); ?>" placeholder="No HP">
                      <?php
                        echo form_error('no_hp', '<label for="no_hp" class="text-danger" style="display: block">', '</label>');
                    ?>
                   </div>
                 </div>


                  <div class="form-group">
                   <label class="col-md-4 control-label" for="inputDefault">Nama Perusahaan <b class='harus_diisi'>*</b></label>
                   <div class="col-md-7">
                     <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo set_value('nama_perusahaan'); ?>" placeholder="PT/ Cv/ Perusahaan">
                      <?php
                        echo form_error('nama_perusahaan', '<label for="nama_perusahaan" class="text-danger" style="display: block">', '</label>');
                    ?>
                   </div>
                  </div>

                 <label class="col-md-4 control-label" for="inputDefault">Alamat Perusahaan <b class='harus_diisi'>*</b></label>
                 <div class="col-md-7">
                  <textarea class="form-control" name="alamat" id="alamat" style="width: 90%;"><?php echo set_value('alamat'); ?></textarea>
                   <?php
                        echo form_error('alamat', '<label for="alamat" class="text-danger" style="display: block">', '</label>');
                    ?>
                 </div>


                 <div class="form-group">
                   <h5><span style="font-weight:500; color:#940f06">&nbsp;</span></h5>
                 </div>

                <div class="form-group">
                  <h5><span style="font-weight:500; color:#940f06">B.&nbsp;PELATIHAN YANG DI IKUTI</span></h5>

                  <div class="form-group">
                    <label class="col-md-4 control-label" for="inputDefault">Jadwal Pelatihan <b class='harus_diisi'>*</b></label>
                    <div class="col-md-7">
                      <select name="jadwal_id" id="jadwal_id" class="combobox form-control" required style="width:90%">
                        <option value="">Pilih</option>
                          <?php
                            foreach ($data_jadwal as $key => $value) {
                              $tgl_akhir = $value->tanggal_akhir;
                          ?>
                            <option value="<?= $value->id ?>"><?= ($key + 1) . ". " . $value->jadual ?> (<?= tgl_indo($value->tanggal) ?> s/d <?= tgl_indo($tgl_akhir) ?>)</option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>



                  <h5><span style="font-weight:500; color:#940f06">C.&nbsp;METODE PEMBAYARAN</span></h5>

                  <div class="form-group">
                    <label class="col-md-4 control-label" for="inputDefault">tipe pembayaran <b class='harus_diisi'>*</b></label>
                    <div class="col-md-7">
                        <select class="form-control" style="width: 90%;" name="pembayaran" required id="pembayaran">
                            <option value="">-Pilih metode-</option>
                            <option value="cash">cash</option>
                            <option value="transfer">transfer</option>
                        </select>
                      </div>
                  </div>

                  <label class="col-md-4 control-label" for="inputDefault">Invoice ditujukan ke alamat <b class='harus_diisi'>*</b></label>
                  <div class="col-md-7">
                   <textarea class="form-control" name="alamat_invoice" id="alamat_invoice" style="width: 90%;" ><?php echo set_value('alamat_invoice'); ?></textarea>
                    <?php
                        echo form_error('alamat_invoice', '<label for="alamat_invoice" class="text-danger" style="display: block">', '</label>');
                    ?>
                  </div>

                </div>

                <div class="form-group">
                  <h5><span style="font-weight:500; color:#940f06">D.&nbsp;LAMPIRAN UNTUK KEBUTUHAN UJI KOMPETENSI</span></h5>

                  <div class="alert" role="alert" style="color:red">
                    Type file upload .png , .jpg , .jpeg dan .pdf
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">1. Scan Identitas <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="identitas" />
                      <input accept="image/*|application/pdf|application/pdf" required type="file" class="type-file form-control"  id="identitas" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">2. Scan NPWP <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="npwp" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="npwp" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">3. Scan Ijazah terakhir <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="ijazah" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="ijazah" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">4. Pas Foto 3x4 <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="pas_foto" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="pas_foto" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">5. Scan Sertifikat Pelatihan sesuai bidang terkait </label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="sertifikat" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="sertifikat" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">6. Surat keterangan kerja dari perusahaan <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="skk" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="skk" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">7. Bukti pengalaman kerja / pengalaman Hidup (CV) <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="cv" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="cv" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">8. Bukti Kerja/ Laporan Kerja <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="bukti_kerja" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="bukti_kerja" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">9. Uraian Jabatan/ Job Desk </label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="job_desk" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="job_desk" name="file_data[]"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="inputDefault">10. Bukti lain yang mendukung (seperti portofolio) <b class='harus_diisi'>*</b></label>
                    <div class="col-md-6">
                      <input type="hidden" name="nama_dokumen[]" class="file_data" value="portfolio" />
                      <input accept="image/*|application/pdf" required type="file" class="type-file form-control"  id="portfolio" name="file_data[]"/>
                    </div>
                  </div>

                </div>

                <div class="form-group">&nbsp;
                  <h5><span style="font-weight:500; color:#940f06">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h5>
                </div>

                  <div class="alert" style="background:#F9F9F9; border-color:#F9F9F9; color:#111; padding-bottom:50px">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-3d mr-xs mb-sm btn-simpan btn-block">
                  </div>



              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
