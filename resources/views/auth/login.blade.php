
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>
    
    <link rel="stylesheet" href="{{ url('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/atlantis.min.css') }}">
	<link rel="stylesheet" href="{{ url('vendors/ladda/ladda-themeless.min.css') }}">
	<link rel="stylesheet" href="{{ url('vendors/jquery-confirm/jquery-confirm.css') }}">
	<link rel="stylesheet" href="{{ url('css/custom/select2-atlantis.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/custom/login-added.css') }}" />
</head>

<body>
    <style>    
        .invalid-feedback{
            font-size: 14px;
        }
    </style>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ url('assets/img/login.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <center>
                                <h2>Sign in</h2>
                            </center>
                            <form action="{{ route('login') }}" class="mt-5" id="formLogin" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email<span class="login-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" required>
                                    <span class="profile-views mb-4 feather-eye toggle-password"></span>
                                    <p class="message-error text-danger"></p>
                                </div>
                                <div class="forgotpass mt-3">
                                    <div class="remember-me">
                                        <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                            <input type="checkbox" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <a href="{{ url('halaman') }}">Forgot Password?</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    <p class="account-subtitle mt-3">Need an account? <a href="{{ route('register') }}">Sign Up</a></p>
                                </div>
                            </form>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <div class="social-login">
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/core/jquery.3.2.1.min.js') }}"></script>

    <script src="{{ url('js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ url('js/core/popper.min.js') }}"></script>
	<script src="{{ url('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ url('vendors/ladda/spin.min.js') }}"></script>
	<script src="{{ url('vendors/ladda/ladda.min.js') }}"></script>
	<script src="{{ url('vendors/ladda/ladda.jquery.min.js') }}"></script>
	<script src="{{ url('js/myJs.js') }}"></script>

    <script  type="text/javascript">
         $(function() {
            const $formLogin = $('#formLogin');
            const $formLoginSubmitBtn = $formLogin.find(`[type="submit"]`).ladda();

            $formLogin.on('submit', function(e){
                e.preventDefault();
                $('.message-error').html()

                const formData = $(this).serialize();
                $formLoginSubmitBtn.ladda('start');

                ajaxSetup();
                $.ajax({
                    url: "{{ route('login') }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json'
                })
                .done(response => {
                    successNotification('Login Successful', 'Welcome to Dashboard');
                    setTimeout(() => {
                        window.location.href = "{{ url('/dashboard') }}"
                    }, 1000);
                })
                .fail(error =>{
                    $formLoginSubmitBtn.ladda('stop');
                    errorNotification('Error', 'Username Atau Password Salah');
                    $('.message-error').html('Username Password Salah')
                })
            })
        })
    </script>



</body>

</html>



