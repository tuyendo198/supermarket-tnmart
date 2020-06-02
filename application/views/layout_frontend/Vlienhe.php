<style>
	.group_contact input{
		height: 40px;
		padding: 0 20px;
		color: #636363;
		border-radius: 3px !important;
		border-color: #e5e5e5;
		box-shadow: none;
		margin-bottom: 15px;
	}
	.group_contact textarea{
		min-height: 130px;
		padding: 10px 15px;
		border-radius: 3px !important;
		resize: none;
		border-color: #e5e5e5;
		box-shadow: none;
	}
	.btn-lienhe{
		font-size: 14px;
		font-weight: 400;
		text-transform: none;
		background: #eb3e32;
		color: #fff;
		border-radius: 3px;
		margin-top: 10px;
		border: 1px solid transparent;
	}
	.btn-lienhe:hover{
		background: #fff !important;
		border-radius: 4px !important;
		color: #e53935 !important;
		border: 1px solid #e53935 !important;
	}
	.bando{
		margin-top: 15px;
	}
</style>
<div class="title_chitiet_bot" style="border-bottom: 1px solid #ebebeb; margin-bottom: 20px;">
	<div class="lblChitiet">
		<ul>
			<li>
				<a href="{$url}"> Trang chủ</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</li>
			<li>
				<a href="">Liên hệ</a>
			</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6" style="padding-left: 0px;">
			<h4 style="font-weight: 600; font-size: 20px;">Gửi liên hệ cho chúng tôi</h4>
			<div class="group_contact">
				<div class="col-md-6" style="padding-left: 0px;">
					<input type="text" name="hoten" class="form-control" value="" placeholder="Họ và tên">
				</div>
				<div class="col-md-6">
					<input type="email" name="email" class="form-control" value="" placeholder="Email">
				</div>
				<div class="col-md-12" style="padding-left: 0px;">
					<input type="text" name="sdt" class="form-control" value="" placeholder="Số điện thoại">
				</div>
				<div class="col-md-12" style="padding-left: 0px;">
					<textarea name="comment" class="form-control" rows="5" placeholder="Nội dung"></textarea>
				</div>
				<div>
					<button type="submit" name="btnGuiLienHe" class="btn btn-primary btn-lienhe">Gửi liên hệ</button>
				</div>
			</div>
		</div>
		<div class="bando col-md-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21072.73337084551!2d105.81388828153568!3d20.985895083054864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac5e863178ad%3A0x37c97933308ba815!2zMjMwIMSQ4buLbmggQ8O0bmcsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1576035922619!5m2!1svi!2s" width="100%" height="315" frameborder="0" style="border:0;" allowfullscreen="">

			</iframe>
		</div>
	</div>
</div>
