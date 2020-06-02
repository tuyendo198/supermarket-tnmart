<!-- c3 Charts -->
<link href="{$url}assets/css/plugins/c3/c3.min.css" rel="stylesheet">
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>THANH NGA MART</h2>
		<ol class="breadcrumb">
			<li>
				<a>Trang chủ</a>
			</li>
			<li>
				<a href="">Báo cáo thống kê</a>
			</li>
			<li class="active">
				<a href="">Thống kê doanh thu</a>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="{(($tab=='tab1')?'active':'')}" id="li-tab1"><a data-toggle="tab" href="#tab1">Ngày</a></li>
                    <li class="{(($tab=='tab2')?'active':'')}" id="li-tab2"><a data-toggle="tab" href="#tab2">Tháng</a></li>
                    <li class="{(($tab=='tab3')?'active':'')}" id="li-tab3"><a data-toggle="tab" href="#tab3">Năm</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane {(($tab=='tab1')?'active':'')}">
                    	<div class="panel-body">
                            <form action="" method="GET">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label class="control-label m-t-xs">Ngày</label>
                                            <input type="date" name="ngay" value="{$ngay}" class="form-control">
                                        </div>
                                        <div class="col-md-3" style="margin-top: 27px;">
                                            <button type="submit" class="btn btn-success" name="tab" value="tab1">Xem</button>
                                        </div>
                                        <div class="col-md-12 m-t">
                                            <h3>Tổng doanh thu ngày: {number_format($tongdoanhthungay, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="pie"></div>
                                </div>
                            </form>
                    	</div>
                    </div>
                    <div id="tab2" class="tab-pane {(($tab=='tab2')?'active':'')}">
                    	<div class="panel-body">
                            <form action="" method="GET">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label m-t-xs">Tháng</label>
                                            <select class="form-control m-b" name="thang">
                                                {for $i=1; $i < 13; $i++}
                                                    <option value="{if $i < 10}0{/if}{$i}" {if $i==$thang}selected{/if}>Tháng {$i}</option>
                                                {/for}
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label m-t-xs">Năm</label>
                                            <select class="form-control m-b" name="nam">
                                            {foreach $rangeYear as $v}
                                                <option value="{$v.nam}" {if $v.nam==$nam}selected{/if}>{$v.nam}</option>
                                            {/foreach}
                                        </select>
                                        </div>
                                        <div class="col-md-1" style="margin-top: 27px;">
                                            <button type="submit" class="btn btn-success" name="tab" value="tab2">Xem</button>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-4 m-b">
                                            <h3>Tổng doanh thu tháng: {number_format($tongdoanhthuthang, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                        <div class="col-md-4 m-b">
                                            <h3>Tổng tiền nhập hàng: {number_format($tongtiennhaphang, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                        <div class="col-md-4 m-b">
                                            <h3>Tổng tiền huỷ hàng: {number_format($tongtienhuyhang, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="stocked"></div>
                                </div>
                            </form>
                    	</div>
                    </div>
                    <div id="tab3" class="tab-pane {(($tab=='tab3')?'active':'')}">
                    	<div class="panel-body">
                            <form action="" method="GET">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label m-t-xs">Năm</label>
                                            <select class="form-control m-b" name="nam">
                                            {foreach $rangeYear as $v}
                                                <option value="{$v.nam}" {if $v.nam==$nam}selected{/if}>{$v.nam}</option>
                                            {/foreach}
                                        </select>
                                        </div>
                                        <div class="col-md-1" style="margin-top: 27px;">
                                            <button type="submit" class="btn btn-success" name="tab" value="tab3">Xem</button>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-4 m-b">
                                            <h3>Tổng doanh thu năm: {number_format($tongdoanhthunam, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                        <div class="col-md-4 m-b">
                                            <h3>Tổng tiền nhập hàng: {number_format($tongtiennhapnam, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                        <div class="col-md-4 m-b">
                                            <h3>Tổng tiền huỷ hàng: {number_format($tongtienhuynam, 0, ',', '.')} VNĐ</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="stockedYear"></div>
                                </div>
                            </form>
                    	</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script type="text/javascript" src="assets/js/plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/c3/c3.min.js"></script>
<script type="text/javascript">
    const urlParams = new URLSearchParams(window.location.search);
    $(document).ready(function () {
        var tab = urlParams.get('tab');
        if (tab == null){
            tab = 'tab1';
        }
        switch (tab){
            case 'tab1':
                charTab1(); break;
            case 'tab2':
                charTab2(); break;
            case 'tab3':
                charTab3(); break;
        }
        $(document).on('click', '#li-tab1', function () {
            charTab1();
        });
        $(document).on('click', '#li-tab2', function () {
            charTab2();
        });
        $(document).on('click', '#li-tab3', function () {
            charTab3();
        });
    });
    function charTab1() {
        c3.generate({
            bindto: '#pie',
            data:{
                columns: [
                    {foreach $doanhthunhomsp as $v}
                        {$tempArr[] = $v.PK_sMaNhomSP}
                        ['{$v.sTenNhomSP}', {$v.tongthunhom}],
                    {/foreach}
                    {if (count($doanhthunhomsp) != count($nhomsanpham))}
                        {foreach $nhomsanpham as $v}
                            {if (!in_array($v.PK_sMaNhomSP, $tempArr))}
                                ['{$v.sTenNhomSP}', 0],
                            {/if}
                        {/foreach}
                    {/if}
                ],
                type : 'pie'
            }
        });
    }
    function charTab2() {
        c3.generate({
            bindto: '#stocked',
            data:{
                x: 'x',
                columns: [
                    ['x', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,
                        17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
                    [
                        'Doanh thu',
                        {foreach $doanhthutungngay as $v}
                            {$v},
                        {/foreach}
                    ]
                ],
                colors:{
                    'Doanh thu': '#1ab394'
                },
                type: 'bar'
            }
        });
    }
    function charTab3() {
        c3.generate({
            bindto: '#stockedYear',
            data:{
                x: 'x',
                columns: [
                    ['x', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    [
                        'Doanh thu',
                        {foreach $doanhthutungthang as $v}
                            {$v},
                        {/foreach}
                    ]
                ],
                colors:{
                    'Doanh thu': '#1ab394'
                },
                type: 'bar'
            }
        });
    }
</script>