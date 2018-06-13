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
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Date registered</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Vishnu Serghei</td>
                                        <td>2012/01/01</td>
                                        <td>Member</td>
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Zbyněk Phoibos</td>
                                        <td>2012/02/01</td>
                                        <td>Staff</td>
                                        <td>
                                            <span class="badge badge-danger">Banned</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Einar Randall</td>
                                        <td>2012/02/01</td>
                                        <td>Admin</td>
                                        <td>
                                            <span class="badge badge-secondary">Inactive</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Félix Troels</td>
                                        <td>2012/03/01</td>
                                        <td>Member</td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aulus Agmundr</td>
                                        <td>2012/01/21</td>
                                        <td>Staff</td>
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#">Prev</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
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