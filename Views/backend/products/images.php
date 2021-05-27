<?php
    view('partitions.backend.header');
    view('partitions.backend.sidebar');
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12 stretch-card">
	        	<form action="index.php?module=backend&controller=product&action=uploadImage&id=<?=$product['id'] ?? '' ?>" style="width: 100%;" method="post" enctype="multipart/form-data">
	            	<div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Upload ảnh sản phẩm
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" >Hình ảnh</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" />
                                        <span class="small text-danger"><?= $errors['image'] ?? '' ?></span>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success" style="float: right;">Upload</button>
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
                            Ảnh sản phẩm 
                        </div>
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($productImages as $images) : ?>
                                <tr>
                                    <td>
                                        <img src="./public/uploads/<?= $images['name'] ? $images['name'] : 'no-image.jpg' ?>" alt="">   
                                    </td>
                                    <td><?=$images['created_at'] ?? null ?></td>
                                    <td width="150">
                                        <a href="index.php?module=backend&controller=product&action=deleteImage&id=<?=$images['id']?>&product_id=<?=$product['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không !')">Xóa</a>
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


<?php view('partitions.backend.footer');?>
