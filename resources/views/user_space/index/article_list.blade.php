{{-- @@ 文章列表item --}}
@if($article_list->count())
    @foreach ($article_list as $item)
            <div class="card">
                {{--@@ 文章标题--}}
                <div class="card-header">
                    <h5>{{$item->title}}</h5>
                </div>
                {{-- @@ 文章内容 --}}
                <div class="card-body" style="max:100px">
                    {!! $item->content !!}
                </div>
                <div class="card-footer">
                    <div style="float: right">
                        <a class="mr-auto" href={{ route('uedit.detail',$item->uid) }}>详情</a>
                        <a class="mr-auto" href={{ route('uedit.update',$item->uid) }}>编辑</a>
                        <a class="mr-auto" href={{ route('uedit.delete',$item->uid) }}>删除</a>
                    </div>
                </div>
            </div>
        <br>
    @endforeach
@else
    <div class="card">
        <div class="card-body" style="margin: auto">无文章</div>
    </div>
@endif

