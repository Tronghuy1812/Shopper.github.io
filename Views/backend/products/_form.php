<div class="main-panel">
	<div class="content-wrapper">
	    <div class="row">
	        <div class="col-md-12 stretch-card">
	        	<form action="index.php?module=backend&controller=product&action=save&id=<?=$_GET['id'] ?? '' ?>" style="width: 100%;" method="post" enctype="multipart/form-data">
	            	<div class="card">
				    <div class="card-body">
				    <div class="card-title">
				    	Thông tin  sản phẩm

				    	<button type="submit" class="btn btn-success" style="float: right;">Lưu lại</button>
				    </div>

				    <div class="card-body">
				    	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Tên sản phẩm
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?? $_POST['name'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['name'] ?? '' ?></span>
						    </div>
						</div>

						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Sku
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="sku" class="form-control" value="<?= $product['sku'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['sku'] ?? '' ?></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Giá tiền
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="price" class="form-control" value="<?= $product['price'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['price'] ?? '' ?></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Giá sale
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="price_sale" class="form-control" value="<?= $product['price_sale'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['price_sale'] ?? '' ?></span>
						    </div>
						</div>
			           	
			           	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Thông tin mô tả
						    </label>

						    <div class="col-sm-10">
						        <textarea class="form-control" name="description"><?= $product['description'] ?? '' ?></textarea>
						        <span class="small text-danger"><?= $errors['description'] ?? '' ?></span>
						    </div>
						</div>
			           	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Danh mục
						    </label>

						    <div class="col-sm-10">
						        <select name="category_id" id="" class="form-control">
									<option value="">Danh mục cho sản phẩm </option>
									<?php foreach($categories as $category) : 
											if(!empty($category['id']) && $category['id']==$_POST['category_id'])
											{
												$selected ='selected';
											} else if(!empty($product['category_id']) && $category['id']==$product['category_id']){
												$selected ='selected';
											}
											else {
												$selected= '';
											}
									?>
										<option value="<?=$category['id']?>" <?= $selected ?> ><?=$category['name']?> </option>
									<?php endforeach; ?>
								</select>
						        <span class="small text-danger"><?= $errors['category'] ?? '' ?></span>
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
			        <!-- </form> -->
				    </div>
					</div>
				</form>
	        </div>
	    </div>
	  </div>
	</div>
</div>
