<div class="main-panel">
	<div class="content-wrapper">
	    <div class="row">
	        <div class="col-md-12 stretch-card">
	        	<form action="index.php?module=backend&controller=category&action=store&id=<?=$product['id'] ?? '' ?>" style="width: 100%;" method="post" enctype="multipart/form-data">
	            	<div class="card">
				    <div class="card-body">
				    <div class="card-title">
				    	Thông tin danh mục sản phẩm

				    	<button type="submit" class="btn btn-success" style="float: right;">Lưu lại</button>
				    </div>

				    <div class="card-body">
				    	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Tên danh mục
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?? $_POST['name'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['name'] ?? '' ?></span>
						    </div>
						</div>

						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Slug
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="slug" class="form-control" value="<?= $product['slug'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['slug'] ?? '' ?></span>
						    </div>
						</div>
			           	
			           	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Thông tin mô tả
						    </label>

						    <div class="col-sm-10">
						        <textarea class="form-control" name="description"><?= $product['description'] ?? '' ?></textarea>
						        <span class="small text-danger"><?= $errorFullname ?? '' ?></span>
						    </div>
						</div>

						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Hiển thị ở trang chủ?
						    </label>

						    <div class="col-sm-10">
						        <input type="checkbox" name="is_home" value="1" <?= !empty($product['is_home']) ? 'checked' : '' ?>  />
						        <span class="small text-danger"><?= $errorFullname ?? '' ?></span>
						    </div>
						</div>

						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Hình ảnh
						    </label>

						    <div class="col-sm-10">
						        <input type="file" name="image" />
						        <span class="small text-danger"><?= $errors['image'] ?? '' ?></span>

						        <?php if (isset($product['image'])): ?>
							    	<img  width="120" src="./public/uploads/<?= $product['image'] ? $product['image'] : 'no-image.jpg' ?>">
							    <?php endif; ?>
						    </div>
						</div>
			        </form>
				    </div>
					</div>
				</form>
	        </div>
	    </div>
	  </div>
	</div>
</div>
