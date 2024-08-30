<div class="col-md-12 formStep3">
    <fieldset><legend><h3> UPLOAD BUKTI PENDUKUNG</h3>
    <h5>Upload beberapa dokumen yang menunjukan bukti pemenuhan persyaratan dasar sertifikasi yang ditetapkan dalam dokumen skema sertifikasi.</h5></legend></fieldset>
    <div class="col-md-12" id="div_unit_dipilih">
        <div id="unit_dipilih"></div>
    </div>

    <div class="col-md-12" id="div_list_bukti_pendukung">
        <div class="alert alert-info">
            Pada bagian ini, Anda diminta untuk mengunggah Persyaratan Wajib yang Anda anggap relevan terhadap setiap elemen/KUK unit kompetensi. Pilihan dapat lebih dari 1 (satu) bukti pendukung. Tekan tombol "Tambah Dokumen" untuk menambah bukti pendukung lainnya.
        </div>

        <div class="col-md-6 col-xs-12" align="right">Pasfoto (4x6) <b class="harus_diisi">*</b> :</div>
        <div class="col-md-6 col-xs-12" id="dpasfoto">
            <!-- <input type="hidden" name="nama_dokumen[]" class="nama_dokumen" value="foto" /> -->
            <input type="file" id="pasfoto" class="form-control input-sm uploadData" required />
        </div>
        <div style="clear: both;margin-bottom: 10px;"></div>

        <div class="col-md-6 col-xs-12" align="right">Identitas Pribadi (KTP/SIM) <b class="harus_diisi">*</b> :</div>
        <div class="col-md-6 col-xs-12" id="dktp">
            <!-- <input type="hidden" name="nama_dokumen[]" class='nama_dokumen' value="ktp" /> -->
            <input type="file" id="ktp" class="form-control input-sm uploadData" required />
        </div>
        <div style="clear: both;margin-bottom: 10px;"></div>

        <div class="col-md-6 col-xs-12" align="right">CV (Daftar Riwayat Hidup) <b class="harus_diisi">*</b> :</div>
        <div class="col-md-6 col-xs-12" id="dcv">
            <!-- <input type="hidden" name="nama_dokumen[]" id="cv" class="nama_dokumen" value="cv" /> -->
            <input  type="file" id="cv" class="form-control input-sm uploadData" required />
        </div>

        <div style="clear: both;margin-bottom: 10px;"></div>

        <div class="col-md-6 col-xs-12" align="right">Ijazah <b class="harus_diisi">*</b> :</div>
        <div class="col-md-6 col-xs-12" id="dijazah">
            <!-- <input type="hidden" name="nama_dokumen[]" id="ijazah" class="nama_dokumen" value="ijazah" /> -->
            <input  type="file" id="ijazah" class="form-control input-sm uploadData" required />
        </div>

        <div style="clear: both;margin-bottom: 10px;"></div>

        <div class="col-md-6 col-xs-12" align="right">SKK (Surat Keterangan Kerja) :</div>
        <div class="col-md-6 col-xs-12" id="dskk">
            <!-- <input type="hidden" id="skk" class="nama_dokumen" value="" /> -->
            <!-- <input type="file" id="file_skk" class="form-control input-sm uploadData" oninput="checkSKK()" /> -->
            <input type="file" id="file_skk" class="form-control input-sm uploadData" />
        </div>

        <div style="clear: both;margin-bottom: 10px;"></div>

        <div class="col-md-6 col-xs-12" align="right">Sertifikat Pelatihan Kompetensi :</div>
        <div class="col-md-6 col-xs-12" id="dsertifikat">
            <!-- <input type="hidden" id="sertifikat" class="nama_dokumen" value="" /> -->
            <!-- <input type="file" id="file_sertifikat" class="form-control input-sm uploadData" oninput="checkSertifikat()" /> -->
            <input type="file" id="file_sertifikat" class="form-control input-sm uploadData" />
        </div>

        <div style="clear: both;margin-bottom: 10px;"></div>

        <!-- <div style="clear: both;margin-bottom: 10px;"></div>
        <div class="alert alert-info">
            Unggah Persyaratan Wajib (SKK (Surat Keterangan Kerja) dan Sertifikat Pelatihan Kompetensi Penulis Nonfiksi atau Penyunting)
        </div>

            <div class="col-md-12 col-xs-12" id="addmore">
                <button type="button" name="btn_tambah" id="btn_tambah" class="btn btn-info">Tambah Dokumen</button>
            </div>
            <div style="clear: both;margin-bottom: 10px;"></div>

            <div class="dokumen_wajib"></div> -->

        <div style="clear: both;margin-bottom: 10px;"></div>
        <div class="alert alert-info">Unggah Dokumen Portofolio (Cover Buku Minimal 3)
        </div>

            <!-- <div class="col-md-12 col-xs-12" id="addmore">
                <button type="button" name="btn_addmore" id="btn_addmore" class="btn btn-info">Tambah Dokumen</button>
            </div> -->
            <div style="clear: both;margin-bottom: 10px;"></div>

            <div>
                <div style='clear:both;margin-top:20px;'></div>
                <div class='col-md-4 col-xs-12'>
                    <!-- <input type="hidden" id="cover1" value="cover_1"> -->
                    1. <b>Cover Buku 1</b>
                </div>
                <div class='col-md-4 col-xs-12'>
                    <input type='text' id="isbn1" class='form-control inputControl uploadData' placeholder='Masukkan Kode ISBN' />
                </div>
                <div class='col-md-4 col-xs-12' id="dcover1">
                    <input type='file' id="file_cover1" class='form-control inputControl uploadData' oninput="checkCover1()" />
                </div>
                <div style='clear:both;padding-top:20px;'></div>


                <div class='col-md-4 col-xs-12'>
                    <!-- <input type="hidden" id="cover2" value="cover_2"> -->
                    2. <b>Cover Buku 2</b>
                </div>
                <div class='col-md-4 col-xs-12'>
                    <input type='text' id="isbn2" class='form-control inputControl uploadData' placeholder='Masukkan Kode ISBN' />
                </div>
                <div class='col-md-4 col-xs-12' id="dcover2">
                    <input type='file' id="file_cover2" class='form-control inputControl uploadData' oninput="checkCover2()" />
                </div>
                <div style='clear:both;padding-top:20px;'></div>


                <div class='col-md-4 col-xs-12'>
                    <!-- <input type="hidden" id="cover3" value="cover_3"> -->
                    3. <b>Cover Buku 3</b>
                </div>
                <div class='col-md-4 col-xs-12'>
                    <input type='text' id="isbn3" class='form-control inputControl uploadData' placeholder='Masukkan Kode ISBN' />
                </div>
                <div class='col-md-4 col-xs-12' id="dcover3">
                    <input type='file' id="file_cover3" class='form-control inputControl uploadData' oninput="checkCover3()" />
                </div>

            </div>

            <!-- {name: '', value: '- Nama Dokumen -'},
            {name: 'cover_1', value: 'Cover Buku 1'},
            {name: 'cover_2', value: 'Cover Buku 2'},
            {name: 'cover_3', value: 'Cover Buku 3'}, -->


        <div style="clear: both;margin-bottom: 30px;"></div>
        <br />
        <div class="col-md-12" style="margin-bottom: 20px;text-align: right;">
            <button style="float: right;text-align: right;" class="btn btn-success nextBtn btn-md pull-left" type="button" id="selanjutnya-3">Selanjutnya (Langkah 4)</button>
        </div>
    </div>

</div>

<script type="text/javascript">

    var baseUrl = "<?= base_url(); ?>";

    $("#pasfoto").on('change', function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/foto";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
               data = JSON.parse(data);
               if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#pasfoto").val("");
                alert(data.error);
               }else{
                 var txt = "<input type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='foto' /><input type='text' name='file_data[]' id='foto' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dpasfoto").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
        return false;
    });

    $("#ktp").on('change', function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/ktp";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {

                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#ktp").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='ktp' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dktp").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }


            }
        });
        return false;
    });

    $("#cv").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/cv";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#cv").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='cv' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dcv").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#ijazah").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/ijazah";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#ijazah").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' class='nama_dokumen' value='ijazah' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dijazah").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#file_skk").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/skk";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#file_skk").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' id='skk' class='nama_dokumen' value='skk' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dskk").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#file_sertifikat").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/sertifikat";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#file_sertifikat").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' id='sertifikat' class='nama_dokumen' value='sertifikat' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dsertifikat").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#file_cover1").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/cover_1";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#file_cover1").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' id='cover1' class='nama_dokumen' value='cover_1' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dcover1").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#file_cover2").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/cover_2";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#file_cover1").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' id='cover1' class='nama_dokumen' value='cover_2' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dcover2").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#file_cover3").change(function (e) {
        e.preventDefault();
        var urlTarget = baseUrl + "welcome/upload_ajax/cover_3";
        var f = $(this);
        var listFiles = f[0].files;
        var formData = new FormData();
        formData.append('file', listFiles[0]);
        $('#myOverlay').show();
        $('#loadingGIF').show();
        $.ajax({
            url: urlTarget,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                data = JSON.parse(data);
                if(data.error){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
                $("#file_cover3").val("");
                alert(data.error);
               }else{
                var txt = "<input type='hidden' name='nama_dokumen[]' id='cover3' class='nama_dokumen' value='cover_3' /><input type='text' name='file_data[]' class='form-control input-sm uploadData' value='" + data.upload_data.file_name + "' readonly />";
                $("#dcover3").append(txt);
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
               }

            }
        });
        return false;
    });

    $("#btn_tambah").click(function () {

        var addmore = $(".dokumen_wajib");
        var item = "<div style='clear:both;margin-top:20px;'></div>";
        item += "<div class='col-md-6 col-xs-12'>";
        item += dokumen_wajib();
        item += "</div>";
        item += "<div class='col-md-6 col-xs-12'><input type='file' name='file_data[]' class='form-control inputControl uploadData' /></div>";
        item += "<div style='clear:both;margin-top:10px;'></div>";

        addmore.append(item);

        return false;
    });

    function dokumen_wajib() {
        var data = [
            {name: '', value: '- Nama Dokumen -'},
            // {name: 'ijazah', value: 'Ijazah'},
            {name: 'surat_kerja', value: 'SKK (Surat Keterangan Kerja)'},
            {name: 'sertifikat', value: 'Sertifikat Pelatihan Kompetensi'},
        ];

        var dropdown = "<select name='nama_dokumen[]' class='form-control nmdokumen'>";
        $.each(data, function (key, hasil) {
            //console.log(hasil);
            dropdown += "<option value='" + hasil.name + "'>" + hasil.value + "</option>";
        });
        dropdown += "</select>";

        return dropdown;
    }

    $("#btn_addmore").click(function () {

        var addmore = $(".dokumen_tambah");
        var item = "<div style='clear:both;margin-top:20px;'></div>";
        item += "<div class='col-md-4 col-xs-12'>";

        item += dropdown_dokumen();

        item += "</div>";
        item += "<div class='col-md-4 col-xs-12'><input type='text' name='isbn[]' class='form-control inputControl uploadData' placeholder='Masukkan Kode ISBN' /></div>";
        item += "<div class='col-md-4 col-xs-12'><input type='file' name='file_data[]' class='form-control inputControl uploadData' /></div>";
        item += "<div style='clear:both;margin-top:10px;'></div>";

        addmore.append(item);

        return false;
    })

    function dropdown_dokumen() {
        var data = [
            {name: '', value: '- Nama Dokumen -'},
            {name: 'cover_1', value: 'Cover Buku 1'},
            {name: 'cover_2', value: 'Cover Buku 2'},
            {name: 'cover_3', value: 'Cover Buku 3'},
        ];

        var dropdown = "<select name='nama_dokumen[]' class='form-control nmdokumen'>";
        $.each(data, function (key, hasil) {
            //console.log(hasil);
            dropdown += "<option value='" + hasil.name + "'>" + hasil.value + "</option>";
        });
        dropdown += "</select>";

        return dropdown;
    }

</script>
