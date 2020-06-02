		<div class="footer">
			<div>
				<strong>TNMART</strong> Quản lý hệ thống bán hàng <span class="glyphicon glyphicon-heart" style="color: red;" aria-hidden="true"></span> <strong> Thanh Nga Mart </strong> &copy; 2020
			</div>
		</div>
	</div>
</div>
    <script src="{$url}assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{$url}assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="{$url}assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="{$url}assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{$url}assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="{$url}assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="{$url}assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="{$url}assets/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="{$url}assets/js/plugins/flot/jquery.flot.time.js"></script>
    <script src="{$url}assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="{$url}assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{$url}assets/js/inspinia.js"></script>
    <script src="{$url}assets/js/plugins/pace/pace.min.js"></script>
	<!-- Data picker -->
	<script src="{$url}assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- FooTable -->
    <script src="{$url}assets/js/plugins/footable/footable.all.min.js"></script>
    <!-- Sparkline -->
    <script src="{$url}assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{$url}assets/js/plugins/toastr/toastr.min.js"></script>
	<!-- iCheck -->
	<script src="{$url}assets/js/plugins/iCheck/icheck.min.js"></script>
	<!-- Steps -->
	<script src="{$url}assets/js/plugins/steps/jquery.steps.min.js"></script>
	<!-- SUMMERNOTE -->
	<script src="{$url}assets/js/plugins/summernote/summernote.min.js"></script>
	<!-- Select2 -->
	<script src="{$url}assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="{$url}assets/js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
	<!-- Chosen -->
	<script src="{$url}assets/js/plugins/chosen/chosen.jquery.js"></script>

	<!-- blueimp gallery -->
	<script src="{$url}assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

	<script src="{$url}assets/js/tnmart.js"></script>
	<script src="{$url}assets/js/validateForm.js"></script>

	<script type="text/javascript">
		function readURL(input,doianh) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$(doianh).attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('a[href="'+window.location.href+'"]').parent().addClass('active');
		$('a[href="'+window.location.href+'"]').parents().parent().addClass('active');

		$('.noactive').removeClass('active');
		let active = $('.noactive').children().find('.active');

		active.each(function (k, v) {
			$(v).removeClass('active');
		});

		$(document).ready(function(){
			$('.summernote').summernote();

			$('.input-group.date').datepicker({
				todayBtn: "linked",
				keyboardNavigation: false,
				forceParse: false,
				calendarWeeks: true,
				autoclose: true
			});

			$('#anh').on('click', function(){
				$('#avatar').trigger('click');
			});
			$("#avatar").change(function () {
				if (this.files && this.files[0])
				{
					var reader = new FileReader();
					reader.onload = imageIsL;
					reader.readAsDataURL(this.files[0]);
				}
			});
			function imageIsL(e) {
				$('#anh').attr('src', e.target.result);
			};

			$('.footable').footable();
			$('.footable2').footable();

			$('.datepicker').datepicker({
				keyboardNavigation: false,
				forceParse: false,
				autoclose: true,
				format: "dd/mm/yyyy"
			});

			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});
			$(".select2").select2();
			$(".select2_placehoder").select2({
				placeholder: "Tìm kiếm sản phẩm",
				allowClear: true
			});
			$('.chosen-select').chosen({
				width: "100%"
			});
		});
	</script>

    {if !empty($message)}
    <script type="text/javascript">
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 5000,
				preventDuplicates: true
            };
            toastr.{$message.type}("{$message.title}","{$message.message}");
        }, 500);
    </script>
    {/if}
</body>
</html>
