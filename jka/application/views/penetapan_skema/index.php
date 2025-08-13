<!-- start: PAGE CONTENT -->
<div class="row" style="padding-top: 15px;">
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <i class="clip-list-2"></i> Data Penetapan Skema
                <div class="panel-tools">
                    
                    <!-- <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                        <i class="fa fa-wrench"></i>
                    </a> -->
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="icon-resize-full"></i>
                    </a>
                    <!-- <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a> -->
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"></a>
                    <!-- <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a> -->
                </div>
            </div>

            <!-- start: PAGE -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="sample-table-1">
                        <thead>
                            <tr>
                                <!-- <th>No</th> -->
                                <th>Kode</th>
                                <th>Jadwal</th>
                                <th>Tanggal</th>
                                <th>TUK</th>
                                <th class="center">Kuota</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="animated table_content">
                            <tr>
                                <td colspan="5">
                                    <i id="spinner" class="fa fa-spinner"></i> &nbsp; Loading.. Mohon tunggu.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel-heading">
                <div class="panel-tools">
                    <!-- <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                        <i class="fa fa-wrench"></i>
                    </a> -->
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <!-- <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="icon-resize-full"></i>
                    </a> -->
                    <!-- <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a> -->
                </div>
            </div>

            <div class="modal fade main_modal" tabindex="-1" data-width="760" style="display: none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal_title"></h4>
                </div>
                <div id="modal_content" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                        Close
                    </button>
                    <button type="button" class="btn btn-blue btn_simpan">
                        Save changes
                    </button>
                </div>
            </div>

            <script type="text/javascript">
                var segmenUri = "<?=base_url().$uri_segmen.'/'?>";

                load_data();

                $('#btn_close').on('click', function () {
                    $('.modal_tambah').modal('hide');
                });

                function save(id = "") {
                    $.ajax({
                        type: 'POST',
                        url: segmenUri + "save/" + id,
                        dataType: 'json',
                        data: {
                            about_us: $('textarea[name="about_us"]').val(),
                            address: $('textarea[name="address"]').val(),
                            phone: $('input[name="phone"]').val(),
                            email: $('input[name="email"]').val(),
                            linkedin: $('input[name="linkedin"]').val(),
                        },
                        success: function (data) {
                            var pageno = $('.paginate_active a').data('ci-pagination-page') - 1;
                            load_data(pageno);
                            $('.main_modal').modal('hide');
                        }
                    });
                }

                $('#toolbar_tambah').on('click', function () {
                    $('.main_modal').on('show.bs.modal', function (e) {
                        if (xhr && xhr.readyState != 4) {
                            xhr.abort();
                        }
                        xhr = $.ajax({
                            type: 'POST',
                            url: segmenUri + "tambah",
                            datatype: 'json',
                            success: function (data) {
                                setTimeout(function () {
                                    $('.modal_title').html('Tambah');
                                    $('#modal_content').html(data);
                                    $('.btn_simpan').attr('onclick', 'save("")');
                                }, 0000);
                            },
                            beforeSend: function () {
                                $('.modal_title').html('Sedang memuat data ...');
                            }
                        });
                    });
                    $('.main_modal').modal('show');
                });

                function load_data(pageno) {

                    // var fdf = data.total_data;

                    // alert(fdf);

                    $.ajax({
                        type: 'POST',
                        url: segmenUri + "datagrid/" + pageno,
                        dataType: 'json',
                        success: function (data) {
                            if (data.pagination > 14) {
                                $('#pagination').css('margin-right', '5px');
                            }
                            $('#pagination').html(data.pagination);
                            $('.table_content').html(data.tabel);
                            $('.total_data').html('Total : ' + data.total_data + ' Data');
                        }
                    });
                }  

                $(document).ready(function () {
                    $('#pagination').on('click', 'a', function (e) {
                        e.preventDefault();
                        var pageno = $(this).attr('data-ci-pagination-page');

                        $.ajax({
                            url: segmenUri + "datagrid/" + pageno,
                            type: 'get',
                            dataType: 'json',
                            success: function (data) {
                                loaded();
                                if (data.pagination > 14) {
                                    $('#pagination').css('margin-right', '5px');
                                }
                                $('#pagination').html(data.pagination);
                                $('.table_content').html(data.tabel);
                                $('.total_data').html('Total : ' + data.total_data +
                                    ' Data');
                                NProgress.done();
                            },
                            beforeSend: function () {
                                loading('success',
                                    '<i class="fa fa-spinner" id="spinner"></i> &nbsp;sedang mengambil data..'
                                );
                                NProgress.start();
                            }
                        });
                    });
                });

                function action(id) {
                    $('tr').css({
                        'background-color': '',
                        'color': ''
                    });
                    $('#kolom' + id).css({
                        'background-color': '#FFE48D',
                        'color': '#9E6007'
                    });
                    $('#btn_delete').attr('onclick', "remove('" + id + "')");
                    $('#toolbar_delete').removeAttr('disabled');
                    $('#toolbar_edit').attr('onclick', "edit('" + id + "')");
                    $('#edit').removeAttr('disabled');
                }

                xhr = null;

                function edit(id) {
                    $('.main_modal').on('show.bs.modal', function (e) {
                        if (xhr && xhr.readyState != 4) {
                            xhr.abort();
                        }
                        xhr = $.ajax({
                            type: 'POST',
                            url: segmenUri + "edit/" + id,
                            dataType: 'json',
                            success: function (data) {
                                $('#modal_content').html(data);
                                $('.modal_title').html('Edit');
                                $('.btn_simpan').attr('onclick', 'save("' + id + '")');
                                $('.btn_simpan').css('display', 'inline-block');
                            },
                            beforeSend: function () {
                                $('.modal_title').html('Sedang memuat data ..');
                                $('#modal_content').html(loader_2());
                            }
                        });
                    });
                    $('.main_modal').modal('show');
                }

                function remove(id) {
                    $.ajax({
                        type: 'POST',
                        url: segmenUri + "hapus/" + id,
                        dataType: 'json',
                        success: function (data) {
                            var pageno = $('.paginate_active a').data('ci-pagination-page') - 1;
                            load_data(pageno);
                            $('#toolbar_delete').attr('disabled', 'true');
                            $('#modal_hapus').modal('hide');
                        }
                    });
                }
            </script>