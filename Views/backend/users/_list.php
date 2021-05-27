<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Danh sách thành viên
                            <a href="index.php?module=backend&controller=user&action=create" style="float:right" >Thêm Mới</a>
                        </div>
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>            
                                    <th>Họ và Tên</th>
                                    <th>Email</th>
                                    <th>Số Điện thoại</th>
                                    <th>Giới Tính</th>
                                    <th>Địa chỉ</th>
                                    <th>Hành động</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user) :?>
                                <tr>
                                    <td><?=$user['name']?></td>
                                    <td><?=$user['email']?></td>
                                    <td><?=$user['phone']?></td>
                                    <td><?=$user['gender']==1 ? 'Nam' : 'Nữ'?></td>
                                    <td><?=$user['address']?></td>
                                    <td width="100">
                                        <a href="index.php?module=backend&controller=user&action=edit&id=<?=$user['id']?>">Sửa</a> |
                                        <a href="index.php?module=backend&controller=user&action=delete&id=<?=$user['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không !')">Xóa</a>
                                    </td>
                                    
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