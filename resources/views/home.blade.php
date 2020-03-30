@extends('layouts.app')

@section('content')

    <div class="text-center" style="margin-bottom:0">
        <h1>我的第一个 Bootstrap 4 页面</h1>
        <p>重置浏览器窗口大小查看效果！</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">导航</a>
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

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <h2>关于我</h2>
                <h5>我的照片:</h5>
                <div class="fakeimg">这边插入图像</div>
                <p>关于我的介绍..</p>
                <h3>一些链接</h3>
                <p>说明文本</p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">激活状态</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">链接</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">链接</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">禁用</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <h2>标题</h2>
                <h5>副标题</h5>
                <div class="fakeimg">图像</div>
                <p>一些文本..</p>
                <p>菜鸟教程，学的不仅是技术，更是梦想！！！菜鸟教程，学的不仅是技术，更是梦想！！！菜鸟教程，学的不仅是技术，更是梦想！！！</p>
                <br>
                <h2>标题</h2>
                <h5>副标题</h5>
                <div class="fakeimg">图像</div>
                <p>一些文本..</p>
                <p>菜鸟教程，学的不仅是技术，更是梦想！！！菜鸟教程，学的不仅是技术，更是梦想！！！菜鸟教程，学的不仅是技术，更是梦想！！！</p>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>底部内容</p>
    </div>
@endsection
