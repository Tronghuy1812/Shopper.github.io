<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Danh sách đơn hàng
                        </div>
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Tên khách hàng</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach($orders as $order) : ?>
                                    <tr>
                                        <td>
                                            <a href="index.php?module=backend&controller=order&action=detail&id=<?=$order['id']?>"><?=$order['code']?></a>
                                        </td>
                                        <td><?=$order['created_at']?></td>
                                        <td><?=$order['customer_name']?></td>
                                        <td><?=$order['customer_phone']?></td>
                                        <td><?=$order['customer_email']?></td>
                              
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- sau là footer -->