@extends('admin.layouts.main')
@section('admin-main-content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">首页</li>
            <li class="breadcrumb-item">
                <a href="{{route('user_index')}}">会员</a>
            </li>
            <li class="breadcrumb-item active">添加</li>
            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn" href="#">
                        <i class="icon-speech"></i>
                    </a>
                    <a class="btn" href="./">
                        <i class="icon-graph"></i>  总览</a>
                    <a class="btn" href="#">
                        <i class="icon-settings"></i>  设置</a>
                </div>
            </li>
        </ol>
        <div class="container-fluid">
            @if($errors->any())
            <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <div class="animated fadeIn">
                <form method="post" action="/admin/savaUser">
                    @csrf
                <input type="hidden" name="id" value="{{$users->id}}" >

                <div class="form-group">
                    <label class="col-form-label" for="appendedInput">昵称</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="appendedInput" class="form-control"  name='username' size="16" type="text" value="{{$users->username}}">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="appendedPrependedInput">手机号</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input id="appendedPrependedInput" class="form-control" name="phone" size="16" type="text" value="{{$users->phone}}">
                        </div>
                    </div>
                </div> <div class="form-group">
                    <label class="col-form-label" for="appendedPrependedInput">密码</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input id="appendedPrependedInput" class="form-control" name="password" size="16" type="text" value="{{$users->password}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="appendedPrependedInput">身份证</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input id="appendedPrependedInput" class="form-control" name="card" size="16" type="text" value="{{$users->card}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="appendedInputButton">头像</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="appendedInputButton" name="avatar" class="form-control" size="16" type="text" value="{{$users->avatar}}">
                            <span class="input-group-append">
                              <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="appendedPrependedInput">状态</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <select id="select1" name="status" class="form-control" >
                                <option value="">请选择</option>
                                <option value="1" @if($users->status==1)selected @endif>正常</option>
                                <option value="2"  @if($users->status==2)selected @endif>冻结</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">保存</button>
                    <button type="button" class="btn btn-secondary">取消</button>
                </div>
                </form>
            </div>
            </div>

        </div>
    </main>
@endsection


@section('admin-js-part')
    <!-- Plugins and scripts required by this view-->
    <script src="/dist/vendors/chart.js/js/Chart.min.js"></script>
    <script src="/dist/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js"></script>
    <script src="/dist/js/main.js"></script>
@endsection


@section('admin-css-part')
    <!-- Main styles for this application-->
    <link href="/dist/css/style.css" rel="stylesheet">
    <link href="/dist/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
@endsection