<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Lead Tracking System</title>

    <!-- Favicons -->
    <link href="{{asset('assets')}}/img/favicon.png" rel="icon">
    <link href="{{asset('assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style-responsive.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        var utlt =[];
        utlt["siteUrl"] = function(url){
            url = typeof url == "undefined" ? "" : url;
            return "<?php echo url('/'); ?>/"+url;
        }

        utlt["cLog"] = function(url){
            console.log(url);
        }
    </script>


</head>

<body>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">
        <form method="POST" action="{{ route('login') }}" class="form-login">
            @csrf
            <h2 class="form-login-heading">sign in</h2>
            <div class="login-wrap">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input class="form-control" name="email" value="{{ old('email') }}" required autofocus type="email">
                    @if ($errors->has('email'))
                    <span class="help-block" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <br>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input class="form-control" name="password" required type="password">
                    @if ($errors->has('password'))
                    <span class="help-block" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <label class="checkbox">
                    <span class="pull-right">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </span>
                </label>
                <button class="btn btn-theme btn-block" id = "LoginBtn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                <hr>


            </div>
        </form>

    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->

<script src="{{asset('assets')}}/lib/bootstrap/js/bootstrap.min.js"></script>


</body></html>