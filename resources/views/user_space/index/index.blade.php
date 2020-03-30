@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                {{--用户信息--}}
                @include('user_space.index.userInfo')
            </div>
            <div class="col-sm-8">
                {{--导航--}}
                    @if(isset($tag))
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{route('user.index')}}>全部标签</a></li>
                            <li class="breadcrumb-item"><a>{{ $tag }}</a></li>
                        </ol>
                    @endif
                    @if(isset($classify))
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{route('user.index')}}>全部分类</a></li>
                                <li class="breadcrumb-item"><a>{{ $classify }}</a></li>
                            </ol>
                    @endif
                {{--文章列表--}}
                @include('user_space.index.article_list',$article_list)
                {{--分页--}}
                <div class="pull-right" style="float: right">
                    {{--分类/标签  不显示分页--}}
                    @unless(isset($tag) || isset($classify))
                        {{  $article_list->render() }}
                    @endunless
                </div>
            </div>
        </div>
    </div>
    {{-- 底部栏目 --}}
    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>底部信息</p>
    </div>
@endsection

