<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12 stretch-card">
	        	<form action="" style="width: 100%;" method="post" enctype="multipart/form-data">
	            	<div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                CHI TIẾT ĐƠN HÀNG
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-2 font-weight-bold">Mã đơn hàng</div>
									<label class="col-sm-10"><?=  $order['code'] ?? '' ?></label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 font-weight-bold">Ngày tạo đơn hàng</div>
									<label class="col-sm-10"><?=  $order['created_at'] ?? '' ?></label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 font-weight-bold">Tên khách hàng</div>
									<label class="col-sm-10"><?=  $order['customer_name'] ?? '' ?></label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 font-weight-bold">Email</div>
									<label class="col-sm-10"><?=  $order['customer_email'] ?? '' ?></label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 font-weight-bold">Số điện thoại </div>
									<label class="col-sm-10"><?=  $order['customer_phone'] ?? '' ?></label>
                                </div>
                            </div>
					    </div>
                    </div>
				</form>
	        </div>
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            DANH SÁCH SẢN PHẨM
                        </div>
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product) : ?>
                                <tr>
                                    <td><?=$product['product_name']?></td>
                                    <td><?=$product['product_price']?></td>
                                    <td><?=$product['product_qty']?></td>
                                    <td><?=number_format($product['product_qty'] * $product['product_price'],0)?></td> 
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php view('partitions.backend.footer');?>
