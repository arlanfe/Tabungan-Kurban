<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/template/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <h4>Tabungan Kurban Al-Ukhuwah</h4>
                  <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                <div class="form-group">
                    {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="form-group">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    Login
                </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                      Keep me signed in
                    </label>
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
  <script src="assets/template/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="assets/template/js/off-canvas.js"></script>
  <script src="assets/template/js/hoverable-collapse.js"></script>
  <script src="assets/template/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
