<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Danh sách sản phẩm 
                            <a href="index.php?module=backend&controller=product&action=create" style="float:right" >Thêm Mới</a>
                        </div>
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Price</th>
                                    <th>Tên danh mục</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach($products as $product) : ?>
                                    <tr>
                                        <td align="center">
                                            <img src="./public/uploads/<?= $product['image'] ? $product['image'] : 'no-image.jpg' ?>" alt="">
                                        </td>
                                        <td><?=$product['name']?></td>
                                        <td><?=$product['price']?></td>
                                        <td><?=$product['category_name']?></td>
                                        <td><?=$product['created_at']?></td>
                                        <td>
                                            <a href="index.php?module=backend&controller=product&action=addImage&id=<?=$product['id']?>">Thêm ảnh</a> |
                                            <a href="index.php?module=backend&controller=product&action=edit&id=<?=$product['id']?>">Sửa</a> |
                                            <a href="index.php?module=backend&controller=product&action=delete&id=<?=$product['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không !')">Xóa</a>
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