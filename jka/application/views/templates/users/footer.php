		<!---start: modal notifikasi delet--->
		<div id="modal_hapus" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
		    <div class="modal-body">
		        <p style="center">
		            Yakin akan dihapus?
		        </p>
		    </div>
		    <div class="modal-footer">
		        <button type="button" data-dismiss="modal" class="btn btn-default">
		            Batal
		        </button>
		        <button id="btn_delete" type="button" data-dismiss="modal" onclick="return true" class="btn btn-primary">
		            OK
		        </button>
		    </div>
		</div>
		<!---end: modal notifikasi delet--->
		<!---start: modal edit password--->
		<div id="modal_edit_password" class="modal fade modal_edit_password" tabindex="-1" data-backdrop="static"
		    data-keyboard="false" style="display: none;">
		    <div class="modal-body">
		        <div class="row mg-t-10">
		            <label class="col-sm-4 mg-t-10 form-control-label  tx-13">Password Lama </label>
		            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
		                <input name="old_password" type="password" class="form-control tx-13"
		                    placeholder="input password lama">
		            </div>
		        </div><!-- row -->
		        <div class="row mg-t-10">
		            <label class="col-sm-4 mg-t-10 form-control-label  tx-13">Password Baru </label>
		            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
		                <input name="new_password" type="password" class="form-control tx-13"
		                    placeholder="buat password baru">
		            </div>
		        </div><!-- row -->
		        <div class="row mg-t-10">
		            <label class="col-sm-4 mg-t-10 form-control-label  tx-13">Ulangi Password </label>
		            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
		                <input name="re_password" type="password" class="form-control tx-13"
		                    placeholder="ulangi password baru">
		                <small id="alert_password"></small>
		            </div>
		        </div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" data-dismiss="modal" class="btn btn-default">
		            Batal
		        </button>
		        <button id="btn_save_password" type="button" data-dismiss="modal" class="btn btn-primary">
		            Simpan
		        </button>
		    </div>
		</div>
		<!---end: modal modal edit password--->

		<!-- start: FOOTER -->
		<div class="footer clearfix">
		    <div class="footer-inner">
		        2023 &copy; terabytee.
		    </div>



		    <div class="footer-items">
		        <span class="go-top"><i class="clip-chevron-up"></i></span>
		        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"></a>
		    </div>



		</div>
		<!-- end: FOOTER -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
		<script src="<?=base_url("assets/admin/js/jquery_2.0.3.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/bootstrap/js/bootstrap.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/blockUI/jquery.blockUI.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/iCheck/jquery.icheck.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/perfect-scrollbar/src/jquery.mousewheel.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/less/less-1.5.0.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/jquery-cookie/jquery.cookie.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js")?>"></script>
		<script src="<?=base_url("assets/admin/js/main.js")?>"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?=base_url("assets/admin/plugins/flot/jquery.flot.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/flot/jquery.flot.pie.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/flot/jquery.flot.resize.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/jquery.sparkline/jquery.sparkline.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.js")?>"></script>
		<script src="<?=base_url("assets/admin/js/index.js")?>"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?=base_url("assets/admin/plugins/bootstrap-modal/js/bootstrap-modal.js")?>"></script>
		<script src="<?=base_url("assets/admin/plugins/bootstrap-modal/js/bootstrap-modalmanager.js")?>"></script>
		<script src="<?=base_url("assets/admin/js/ui-modals.js")?>"></script>
		<!-- <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script> -->
		<script src="<?=base_url("assets/admin/js/nprogress_0.2.0.js")?>"></script>
		
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
            

		    function loading(type, msg) {
		        $('#snackbar2').addClass('show');
		        $('#snackbar2').html(msg);
		    }

		    function loaded() {
		        $('#snackbar2').removeClass('show');
		    }
		    NProgress.configure({
		        showSpinner: true,
		        parent: '.br-mainpanel'
		    });

		    function loader_2() {
		        return `<div class="col-md-12 col-xl-12 mg-0" style="padding: 70px 0px 70px 0px;">
						<div class="tx-center text-center tx-dark ht-150" style="margin-top:20%;">
						<img style="width:17px;" src="<?= base_url('assets/admin/images/loading.gif'); ?>" alt=""> &nbsp;Processing...
						</div>
				</div>`;
		    }

		    function toaster(type, msg) {
		        var x = document.getElementById("snackbar");
		        x.className = "show";
		        $('#snackbar').html(msg);
		        setTimeout(function () {
		            x.className = x.className.replace("show", "");
		        }, 3000);
		    }

		    xhr = null;
		    $("#btn_save_password").on("click", function () {
		        if (xhr && xhr.readyState != 4) {
		            xhr.abort();
		        }
		        xhr = $.ajax({
		            type: 'POST',
		            url: '<?= base_url("setting/change_password") ?>',
		            dataType: 'json',
		            data: {
		                'old_password': $('input[name="old_password"]').val(),
		                'new_password': $('input[name="new_password"]').val(),
		                're_password': $('input[name="re_password"]').val()
		            },
		            success: function (data) {
		                if (data.type == 'success') {
		                    $('input[name="old_password"]').val('');
		                    $('input[name="new_password"]').val('');
		                    $('input[name="re_password"]').val('');
		                    $('#alert_password').text('');
		                    $('.modal_edit_password').modal('hide');
		                    toaster(data.type, data.msg);
		                } else {
		                    $('#alert_password').css('color', 'red');
		                    $('#alert_password').text('noted: ' + data.msg);
		                }
		            }
		        });
		    });
		</script>

<script>
    jQuery(document).ready(function () {
        Main.init();
        Index.init();
    });
</script>
		</body>
		<!-- end: BODY -->

		</html>