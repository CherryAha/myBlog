@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:30px">
        @include('user_space.article.detail',$detail)
    </div>
    {{-- 底部栏目 --}}
    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>底部信息</p>
    </div>
@endsection

