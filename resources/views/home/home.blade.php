@extends('layouts.app')

@section('content')

    <div class="text-center" style="margin-bottom:0">
        <h1>我的第一个 Bootstrap 4 页面</h1>
        <p>重置浏览器窗口大小查看效果！</p>
    </div>

    {{-- 导航 --}}


    <div class="container">
        <div class="row">
            {{-- 左侧栏目 --}}
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <a class="navbar-brand" href="#">首页</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">链接</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">链接</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">链接</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>


    {{-- 主要内容 --}}
    <div class="container" style="margin-top:30px">

        <div class="row">

            {{-- 左侧栏目 --}}
            <div class="col-sm-4">


                <div class="card">
                    <div class="card-header font-weight-bold">
                        公告</div>

                    {{-- @@ 公告内容 --}}
                    <div class="card-body">内容</div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">最热</div>

                    {{-- @@ 热门 --}}
                    <div class="card-body">内容</div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header">最新</div>
                    {{-- @@ 最新 --}}
                    <div class="card-body">内容</div>
                </div>
                <br>

            </div>

            {{-- 内容显示 --}}
            <div class="col-sm-8">
                @yield('main_body')
            </div>
        </div>
    </div>


    {{-- 底部内容 --}}
    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>底部内容</p>
    </div>


@endsection
