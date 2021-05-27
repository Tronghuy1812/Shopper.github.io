<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Danh sách danh mục sản phẩm 
                            <a href="index.php?module=backend&controller=category&action=create" style="float:right" >Thêm Mới</a>
                        </div>
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>
                                    <th align="center">Hình ảnh</th>
                                    <th align="center">Tên danh mục</th>
                                    <th align="center">Slug</th>
                                    <th align="center">Home</th>
                                    <th align="center">Ngày tạo</th>
                                    <th align="center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach($categories as $category) : ?>
                                    <tr>
                                        <td align="center">
                                            <img src="./public/uploads/<?= $category['image'] ? $category['image'] : 'no-image.jpg' ?>" alt="">
                                        </td>
                                        <td><?=$category['name']?></td>
                                        <td><?=$category['slug']?></td>
                                        <td><?=$category['is_home'] ? 'Yes' : 'No' ?></td>
                                        <td><?=$category['created_at']?></td>
                                        <td>
                                            <a href="index.php?module=backend&controller=category&action=edit&id=<?=$category['id']?>">Sửa</a> |
                                            <a href="index.php?module=backend&controller=category&action=delete&id=<?=$category['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không !')">Xóa</a>
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