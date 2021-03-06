
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopper Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./public/backend/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./public/backend/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./public/backend/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./public/backend/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="./public/backend/images/logo.svg" alt="logo">
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              <form class="pt-3" action="" method="post" >
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="email" type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" value="<?= $input['email'] ?? $_POST['email'] ?? null ?>">
                  </div>
                  <small class="text-danger"><?= $errors['email'] ?? '' ?></small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" value="<?= $input['password'] ?? $_POST['password'] ?? null ?>">   
                  <!-- value Post gi??? khi nh???p k m???t n???u sumit  -->
                  </div>
                  <small class="text-danger"><?= $errors['password'] ?? '' ?></small>
                </div>
                <small class="text-danger"><?= $errors['all'] ?? '' ?></small>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="remember" value="1" <?= (isset($_COOKIE['email']) && isset($_COOKIE['password']))  ? 'checked' : '' ?>>
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
               
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn_login">LOGIN</button>
                </div>
                <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
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
