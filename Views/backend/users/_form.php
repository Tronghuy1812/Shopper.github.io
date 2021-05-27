<div class="main-panel">
	<div class="content-wrapper">
	    <div class="row">
	        <div class="col-md-12 stretch-card">
	        	<form action="index.php?module=backend&controller=user&action=save&id=<?=$_GET['id'] ?? '' ?>" style="width: 100%;" method="post" enctype="multipart/form-data">
	            	<div class="card">
				    <div class="card-body">
				    <div class="card-title">
				    	Thông tin thành viên
				    	<button type="submit" class="btn btn-success" style="float: right;">Lưu lại</button>
				    </div>

				    <div class="card-body">
				    	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Họ và Tên
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="name" class="form-control" value="<?= $user['name'] ?? $_POST['name'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['name'] ?? '' ?></span>
						    </div>
						</div>

						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Email
						    </label>

						    <div class="col-sm-10">
						        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['email'] ?? '' ?></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Mật khẩu
						    </label>

						    <div class="col-sm-10">
						        <input type="password" name="password" class="form-control" value="">
						        <span class="small text-danger"><?= $errors['password'] ?? '' ?></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Xác nhận mật khẩu
						    </label>

						    <div class="col-sm-10">
						        <input type="password" name="repassword" class="form-control" value="<?= $user['repassword'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['repassword'] ?? '' ?></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Số điện thoại
						    </label>

						    <div class="col-sm-10">
						        <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['phone'] ?? '' ?></span>
						    </div>
						</div>
			           	
			           	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Độ tuổi
						    </label>

                            <div class="col-sm-10">
						        <input type="text" name="age" class="form-control" value="<?= $user['age'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['age'] ?? '' ?></span>
						    </div>
						</div>
			           	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
						        Địa chỉ
						    </label>

                            <div class="col-sm-10">
						        <input type="text" name="address" class="form-control" value="<?= $user['address'] ?? '' ?>">
						        <span class="small text-danger"><?= $errors['address'] ?? '' ?></span>
						    </div>
						</div>
			           	<div class="form-group row">
						    <label class="col-sm-2 col-form-label">
                                Giới tính
						    </label>

                            <div class="col-sm-10">
						        <select name="gender" class="form-control">
                                    <option value="">Chọn giới tính</option>
                                    <option value="1" <?= !empty($user['gender']) && $user['gender'] ==1 ? 'selected' : ''?>>Nam</option>
                                    <option value="2" <?= !empty($user['gender']) && $user['gender'] ==2 ? 'selected' : ''?>>Nữ</option>
                                </select>
						        <span class="small text-danger"><?= $errors['gender'] ?? '' ?></span>
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
