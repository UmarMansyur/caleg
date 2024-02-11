<html lang="en">

<head>

  <meta charset="utf-8">
  <title>Login | AREP (Aplikasi Rekap Eviden Pemilu)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
  <meta content="Themesdesign" name="author">
  <!-- App favicon -->
  <link rel="shortcut icon" href="/assets/images/logo-1.svg">

  <!-- Bootstrap Css -->
  <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
  <!-- Icons Css -->
  <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <!-- App Css-->
  <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

  <style type="text/css"
    id="s./node_modules/css-loader/index.js!./node_modules/sass-loader/lib/loader.js!./package/src/animation.scss-0">
    /**
* @license
* Copyright Akveo. All Rights Reserved.
* Licensed under the MIT License. See License.txt in the project root for license information.
*/
    .eva-animation {
      animation-duration: 1s;
      animation-fill-mode: both;
    }

    .eva-infinite {
      animation-iteration-count: infinite;
    }

    .eva-icon-shake {
      animation-name: eva-shake;
    }

    .eva-icon-zoom {
      animation-name: eva-zoomIn;
    }

    .eva-icon-pulse {
      animation-name: eva-pulse;
    }

    .eva-icon-flip {
      animation-name: eva-flipInY;
    }

    .eva-hover {
      display: inline-block;
    }

    .eva-hover:hover .eva-icon-hover-shake,
    .eva-parent-hover:hover .eva-icon-hover-shake {
      animation-name: eva-shake;
    }

    .eva-hover:hover .eva-icon-hover-zoom,
    .eva-parent-hover:hover .eva-icon-hover-zoom {
      animation-name: eva-zoomIn;
    }

    .eva-hover:hover .eva-icon-hover-pulse,
    .eva-parent-hover:hover .eva-icon-hover-pulse {
      animation-name: eva-pulse;
    }

    .eva-hover:hover .eva-icon-hover-flip,
    .eva-parent-hover:hover .eva-icon-hover-flip {
      animation-name: eva-flipInY;
    }

    @keyframes eva-flipInY {
      from {
        transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        animation-timing-function: ease-in;
        opacity: 0;
      }

      40% {
        transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
        animation-timing-function: ease-in;
      }

      60% {
        transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
        opacity: 1;
      }

      80% {
        transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
      }

      to {
        transform: perspective(400px);
      }
    }

    @keyframes eva-shake {

      from,
      to {
        transform: translate3d(0, 0, 0);
      }

      10%,
      30%,
      50%,
      70%,
      90% {
        transform: translate3d(-3px, 0, 0);
      }

      20%,
      40%,
      60%,
      80% {
        transform: translate3d(3px, 0, 0);
      }
    }

    @keyframes eva-pulse {
      from {
        transform: scale3d(1, 1, 1);
      }

      50% {
        transform: scale3d(1.2, 1.2, 1.2);
      }

      to {
        transform: scale3d(1, 1, 1);
      }
    }

    @keyframes eva-zoomIn {
      from {
        opacity: 1;
        transform: scale3d(0.5, 0.5, 0.5);
      }

      50% {
        opacity: 1;
      }
    }
  </style>
</head>


<body>

  @include('sweetalert::alert')
  <div class="authentication-bg min-vh-100">
    <div class="bg-overlay bg-light"></div>
    <div class="container">
      <div class="d-flex flex-column min-vh-100 px-3 pt-4">
        <div class="row justify-content-center my-auto">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
              <div class="card-body p-4">
                <div class="text-center mt-1">
                  <a href="/login" class="text-center">
                    <span><img src="/assets/images/logo-1.svg" alt="" height="70"></span>
                  </a>
                  <h5>Welcome Back !</h5>
                  <p class="text-muted">Tekan Log In untuk masuk.</p>
                </div>
                <div class="p-2 mt-4">
                  <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="email">Email</label>
                      <div class="position-relative input-custom-icon">
                        <input type="text" class="form-control" id="email" placeholder="Email" required name="email">
                        <span class="bx bx-user"></span>
                      </div>
                    </div>

                    <div class="mb-3">
                      <div class="float-end">
                        <a href="/forgot-password" class="text-muted text-decoration-underline" tabindex="-1">Forgot
                          password?</a>
                      </div>
                      <label class="form-label" for="password-input">Password</label>
                      <div class="position-relative auth-pass-inputgroup input-custom-icon">
                        <span class="bx bx-lock-alt"></span>
                        <input type="password" class="form-control" id="password-input" placeholder="Password" required
                          name="password">
                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                          id="password-addon">
                          <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                        </button>
                      </div>
                    </div>

                    <div class="form-check py-1">
                      <input type="checkbox" class="form-check-input" id="auth-remember-check" name="remember">
                      <label class="form-check-label" for="auth-remember-check">Remember me</label>
                    </div>

                    <div class="mt-3">
                      <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>

          </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="text-center p-4">
              <p>© <script>
                  document.write(new Date().getFullYear())
                </script>~Arep. Crafted with <i class="mdi mdi-heart text-danger"></i> by ProJs</p>
            </div>
          </div>
        </div>

      </div>
    </div><!-- end container -->
  </div>
  <!-- end authentication section -->

  <!-- JAVASCRIPT -->
  <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/libs/metismenujs/metismenujs.min.js"></script>
  <script src="/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="/assets/libs/eva-icons/eva.min.js"></script>

  <script src="/assets/js/pages/pass-addon.init.js"></script>

  <script>
  const element = document.getElementById('password-addon');
  const input = document.getElementById('password-input');
  document.addEventListener('click', function (event) {
    const target = event.target;
    if (target === element) {
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      element.classList.toggle('active');
    }
  });
  </script>

</body>

</html>