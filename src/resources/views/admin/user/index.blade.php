@extends('admin.layouts.main')
@section('admin-main-content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">首页</li>
            <li class="breadcrumb-item">
                <a href="{{route('user_index')}}">会员</a>
            </li>
            <li class="breadcrumb-item active">列表</li>
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
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i> 会员列表
                                <a href="/admin/addUser">添加用户</a>
                            </div>

                            <div class="card-body">
                                <form action='/admin/user' method="post"> @csrf
                                昵称：<input type="text" name="username" id="username" placeholder="昵称">
                                手机号：<input type="text" name="phone" id="phone" placeholder="手机号">
                                <input type="submit"   value="搜索">
                                </form>
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>昵称</th>
                                        <th>手机号</th>
                                        <th>身份证</th>
                                        <th>芝麻信用</th>
                                        <th>创建时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->card }}</td>
                                        <td>{{ $user->sesame }}</td>
                                        <td>{{ intval($user->create_time)>0 ? date("Y-m-d H:i:s",$user->create_time):'' }}</td>
                                        <td>
                                            <span class="badge badge-success">{{ $status[$user->status] }}</span>
                                        </td>
                                        <td><a href="#">更改状态</a>
                                        <a href="/admin/addUser?id={{$user->id}}">编辑</a></td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <nav>
                                       {{$users ->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
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