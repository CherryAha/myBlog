@extends('user_space.left_item')

@section('left_content')
      {{-- 中间内容 --}}
      <div class="col-sm-8"> 
        <div class="card" style="height:50px;margin-top:5px"> 
            {{-- @@ 导航栏 默认选项--}}
            <ul class="nav nav-pills  justify-content-end"  style="margin-top:5px">
                <li class="nav-item">
                  <a class="nav-link active" href="#">默认</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">最新</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">最热</a>
                </li> 
              </ul>
        </div>
       <br>
          {{-- @@ 文章列表item --}}
          @foreach ($article_list as $item)
              <div class="card">
                  <div class="card">
                      {{--@@ 文章标题--}}
                      <div class="card-header">
                          <h5>{{$item->title}} {{ $item->uid }}</h5>
                      </div>
                      {{-- @@ 文章内容 --}}
                      <div class="card-body">
                          {!! $item->content !!}
                      </div>
                      <div class="card-footer">
                          <a class="mr-auto" href={{ route('uedit.update',$item->uid) }}>编辑</a>
                          <a class="mr-auto" href={{ route('uedit.delete',$item->uid) }}>删除</a>
                      </div>
                  </div>
             </div>
            <br>
          @endforeach
          {{--分页--}}
          <div class="pull-right">
              {{  $article_list->render() }}
          </div>
    </div> 
  
@endsection
