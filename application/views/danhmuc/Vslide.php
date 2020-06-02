<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Quản lý danh mục</a>
			</li>
			<li class="active">
				<a href="">Danh mục slide</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox">
				<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
					<div class="ibox-title col-md-12">
						<div class="col-md-8">
							<h5>Thêm slide</h5>
						</div>
						<div class="col-md-4" style="padding-left: 0px; margin-top: -5px; text-align: right;">
							<button type="submit" class="btn btn-sm btn-primary" name="btnThem" value="save">
								<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Uplpad
							</button>
						</div>
					</div>
					<div class="ibox-content">
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#tab-3">Slide 1</a></li>
								<li class=""><a data-toggle="tab" href="#tab-4">Slide 2</a></li>
								<li class=""><a data-toggle="tab" href="#tab-5">Slide 3</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab-3" class="tab-pane active">
									<div class="panel-body">
										<div class="fallback">
											<div class="text-file">
												<p><strong>Choose slide to upload.</strong></p>
											</div>
										</div>
										<input type="file" name="slide1" onchange="readURL(this, '.slide1');"/>
										<div class="imgLT-parent">
											<img src="{$url}assets/img/slider/slider1.png?v={time()}" class="slide1" alt="" width="100%" height="180px;">
										</div>
									</div>
								</div>
								<div id="tab-4" class="tab-pane">
									<div class="panel-body">
										<div class="fallback">
											<div class="text-file">
												<p><strong>Choose slide to upload.</strong></p>
											</div>
										</div>
										<input type="file" name="slide2" onchange="readURL(this, '.slide2');"/>
										<div class="imgLT-parent">
											<img src="{$url}assets/img/slider/slider2.png?v={time()}" class="slide2" alt="" width="100%" height="180px;">
										</div>
									</div>
								</div>
								<div id="tab-5" class="tab-pane">
									<div class="panel-body">
										<div class="fallback">
											<div class="text-file">
												<p><strong>Choose slide to upload.</strong></p>
											</div>
										</div>
										<input type="file" name="slide3" onchange="readURL(this, '.slide3');"/>
										<div class="imgLT-parent">
											<img src="{$url}assets/img/slider/slider3.png?v={time()}" class="slide3" alt="" width="100%" height="180px;">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
