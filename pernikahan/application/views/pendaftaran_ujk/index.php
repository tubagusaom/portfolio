<div style="margin: 2px;">
	<div id="pendaftaran_ujk">
        <?php

            echo "<br><br>";
            echo "<b>List</b> <br> " . $grid['list'];
            // echo "<br><br>";
            // echo "<b>Toolbar</b> <br> " . $grid['toolbar'];
            echo "<br><br>";
            echo "<b>Columns</b> <br> " . $grid['columns'];

            // foreach($grid['toolbar'] as $grides) {
            //     // echo $keys;
            //     echo $grides;
            // }

            // echo $data_grid['columns'];
        // ?>
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

                    // alert('save');

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

                

                $('#toolbar_add').on('click', function () {

                    // alert(xhr);

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
                                    $('.btn_simpan').html('Save changes');
                                    $('.btn_simpan').attr('onclick', 'save("")');
                                    $('.btn_simpan').css('display', 'inline-block');
                                }, 0000);
                            },
                            beforeSend: function () {
                                $('.modal_title').html('Sedang memuat data ...');
                            }
                        });
                    });
                    $('.main_modal').modal('show');
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
                    // $('#btn_delete').attr('onclick', "remove('" + id + "')");
                    $('#btn_delete').attr('onclick', "remove('" + id + "')");
                    // $('#toolbar_remove').removeAttr('disabled');
                    $('#toolbar_remove').attr('data-id', id);
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
                                $('.btn_simpan').html('Save changes');
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

                    if(id == 0) {
                        $('.main_modal').modal('hide');
                        $('#modal_warning').modal('show');
                    }else {
                        alert(id);
                        // $('.btn_simpan').attr('onclick', 'remove(' + $id + ')');
                        // $('.main_modal').modal('hide');
                        // $('#modal_warning').modal('hide');
                        // $.ajax({
                        //     type: 'POST',
                        //     url: segmenUri + "hapus/" + id,
                        //     dataType: 'json',
                        //     success: function (data) {
                        //         var pageno = $('.paginate_active a').data('ci-pagination-page') - 1;
                        //         load_data(pageno);
                        //         $('#toolbar_remove').attr('disabled', 'true');
                        //         $('#modal_remove').modal('hide');
                        //     }
                        // });
                    }

                    // $('.main_modal').modal('hide');
                }

                $('#toolbar_remove').on('click', function () {

                    var number = $('#toolbar_remove').attr('data-id');
                    // alert(number);

                    if(number == 0) {
                        // $('.main_modal').modal('hide');
                        $('#modal_warning').modal('show');
                    }else {
                        $('.main_modal').on('show.bs.modal', function (e) {
                            $('.modal_title').html('Hapus');
                            $('#modal_content').html('Yakin akan dihapus ?');
                            $('.btn_simpan').html('Hapus');
                            // $('.btn_simpan').css('display', 'none');
                            $('.btn_simpan').attr('onclick', 'remove(' + number + ')');
                        });

                        $('.main_modal').modal('show');
                    }
                });

                $('#toolbar_view').on('click', function () {
                    var id = 1;
                    // var number = $('#toolbar_remove').attr('data-id');
                    $('#toolbar_remove').attr('data-id', id);
                    // alert(id);
                });
            </script>