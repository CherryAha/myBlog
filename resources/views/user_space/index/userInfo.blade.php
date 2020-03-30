{{-- 个人信息 --}}
<div>
    <div class="card" style="width:100%">
        <img class="card-img-top" src="https://static.runoob.com/images/mix/img_avatar.png" alt="Card image" style="width:100%">
        <div class="card-body">
            {{-- @@ 用户名字 --}}
            <h4 class="card-title">{{ $author_info->name }}</h4>
            {{-- @@ 个人简介 --}}
            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>

        </div>
    </div>
    <br>
    {{-- 标签--}}
    <div class="card">
        <div class="card-header">文章分类</div>
        <div class="card-body">
            @if(isset($classifies_list))
                @foreach($classifies_list as $item)
                    <h5><a href={{  route('uedit.classify',['classify'=>$item['name'],'list'=>$item['id_list']]) }}>   {{$item['name']}}({{$item['count']}}) </a></h5>
                @endforeach
            @endif
        </div>
    </div>
    <br>
    {{-- 分类 --}}
    <div class="card">
        <div class="card-header">标签</div>
        {{-- @@ 标签内容 --}}
        <div class="card-body">
            @if(isset($tags_list))
                @foreach($tags_list as $item)
                    <h5><a href={{route('uedit.tag',['tag'=>$item['name'],'list'=>$item['list']])}} > {{$item['name']}} ( {{$item['count']}})</a></h5>
                @endforeach
            @endif
        </div>
    </div>
    <br>
</div>
<hr class="d-sm-none">