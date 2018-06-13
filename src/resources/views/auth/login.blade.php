<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>后台管理登陆</title>
    <!-- Icons-->
    <link href="/dist/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="/dist/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="/dist/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/dist/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="/dist/css/style.css" rel="stylesheet">
    <link href="/dist/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <h1>登陆</h1>
                        <p class="text-muted">后台管理</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                            </div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">登陆</button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-link px-0">忘记密码?</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>免责协议</h2>
                            <p>对于因不可抗力或本站不能控制的原因造成的网络服务中断或其它缺陷，本站不承担任何责任，但将尽力减少因此而给用户造成的损失和影响。</p>
                            <button type="button" class="btn btn-primary active mt-3">马上注册!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins-->
<script src="/dist/vendors/jquery/js/jquery.min.js"></script>
<script src="/dist/vendors/popper.js/js/popper.min.js"></script>
<script src="/dist/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/dist/vendors/pace-progress/js/pace.min.js"></script>
<script src="/dist/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
<script src="/dist/vendors/@coreui/coreui/js/coreui.min.js"></script>
</body>
</html>
