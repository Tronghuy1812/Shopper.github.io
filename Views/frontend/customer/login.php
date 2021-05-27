
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Shopper</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./public/backend/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./public/backend/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./public/backend/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./public/frontend/images/shopper-com-logo.png" />
  
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./public/frontend/images/shopper-com-logo.png" alt="logo" style="width:50px">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input name="email" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username@gmail.com" value="<?= $input['email'] ?? $_POST['email'] ?? null ?>">
                  <small class="text-danger"><?= $errors['email'] ?? '' ?></small>
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" value="<?= $input['password'] ?? $_POST['password'] ?? null ?>">
                  <small class="text-danger"><?= $errors['password'] ?? '' ?></small>
                </div>
                <div class="form-group">
                    <small class="text-danger"><?= $errors['all'] ?? '' ?></small>
                </div>
                <div class="mt-3">
                  <button name="btn_login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="index.php?controller=register" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./public/backend/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./public/backend/js/off-canvas.js"></script>
  <script src="./public/backend/js/hoverable-collapse.js"></script>
  <script src="./public/backend/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
