<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="images/icons/icon_pt.png">
    <title>Login | Phuc Truong</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="fontend/css/bootstrap.min.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fontend/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="fontend/css/login-style.css">
</head>
<body>
    <!-- Sign up form -->
	<div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="fontend/images/signin-image.jpg" alt="sing up image"></figure>
                <!-- <a href="signup" class="signup-image-link">Create an account</a> -->
                <a href="password/reset" class="signup-image-link">Forget password ?</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}                         
                    </div>
                @endif
                <form method="POST" class="register-form" id="login-form" action="login">
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <!-- <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="fontend/jquery/jquery.min.js"></script>
    <script src="fontend/js/main.js"></script>
</body>
</html>