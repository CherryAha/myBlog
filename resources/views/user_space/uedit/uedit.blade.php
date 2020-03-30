@extends('layouts.app')

@section('content')
    {{--导入js / css--}}
    @include('UEditor::head')
    <div class="container">
        {{--表单--}}
        @include('user_space.uedit.from')
        {{--js文件--}}
        @include('user_space.uedit.js')
    </div>
@endsection









