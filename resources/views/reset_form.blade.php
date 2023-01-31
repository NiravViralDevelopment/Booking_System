<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="{{ asset('front') }}assets/img/favicon.png" rel="icon">
  <link href="{{ asset('front') }}assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  
  <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">


</head>

<body>

  <main class="login_bg">
    <div class="container">

      <section class="register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                </a>
              </div><!-- End Logo -->


              

              <div class="card mb-3">

                <div class="card-body login_block">

                  <div class="pt-4 pb-2">
                    <img src="{{ asset('front/assets/img/logo.png') }}" class="img-fluid" alt="logo">
                  </div>
                      
                  <form method="POST" action="{{ route('reset_login') }}">
                    @csrf
                    
                    <div class="col-12 mt-0">
                      <div class="input-group">
                      @if(Session::has('success'))
                          <span class="text-success">{{ Session::get('success') }}</span>
                      @endif
                        <span class="input-group-text" id="inputGroupPrepend">
                          <img src="{{ asset('front/assets/img/user-grey.png') }}" class="img-fluid" alt="image">
                        </span>
                        <input type="email" id='email' name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    </div>

                    <div class="col-12 mt-0">
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">
                          <img src="{{ asset('front/assets/img/password.png') }}" class="img-fluid" alt="image">
                        </span>
                        <input type="password" name="new_password" class="form-control" id="password" placeholder="New Password">
                        @error('new_password')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    </div>


                    <div class="col-12 mt-0">
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">
                          <img src="{{ asset('front/assets/img/password.png') }}" class="img-fluid" alt="image">
                        </span>
                        <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Confirm Password">
                        @error('confirm_password')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    </div>

                   
                    <div class="col-12">
                      <div class="login_btn text-center">
                      <a href="{{ url('/')}}" class="btn btn-secondary" type="submit">Login</a>
                      <button class="btn btn-success" type="submit">Reset</button>
                      </div>
                      
                    </div>
                   
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  
  <script src="{{ asset('front/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>


  <script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>

</html>