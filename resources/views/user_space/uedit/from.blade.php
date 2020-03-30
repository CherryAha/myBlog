{{--编辑器--}}
<form action={{ route('uedit.save')}} method="post">
    {{ csrf_field() }}
    <div class="container">
        {{--错误提示--}}
        @include('user_space.uedit.error')
        {{--标题--}}
        <div class="row">
            <div class="form-group col">
                <h5>标题:</h5>
                @if(isset($article->title))
                    <input type="text" class="form-control" id="name"  name="title"  value={{$article->title}}>
                @else
                    <input type="text" class="form-control" id="name"  name="title" placeholder="请输入标题">
                @endif
            </div>
        </div>
        <br>
        {{--编辑器内容--}}
        <div class="row">
            <div class="col">
                <script id="container" name="content" type="text/plain">
@if( isset($article->content))
                        <?php echo $article->content; ?>
                    @else
@endif
                </script>
            </div>
        </div>
        <br>

        {{--标签--}}
        @include("user_space.uedit.from_tag")

        {{--添加分类--}}
        @include("user_space.uedit.from_classify")
        {{--提交按钮--}}
        <div class="row">
            <div class="col">
                <div id="btn_give_up" style="float: right;margin-left: 10px" class="btn btn-danger" >放弃保存</div>
                &nbsp; &nbsp;
                <input type="submit" style="float: right" class="btn btn-success" value="提交按钮">
     </div>
    </div>
    </div>
    <br>
    {{--隐藏用户名--}}
    <input type="hidden" name="author" value={{ Auth::id() }}>

    {{--隐藏文章id--}}
    @if(isset($article->uid))
        <input type="hidden" name="article_uid" value={{$article->uid}}>
    @endif
</form>



{{--jq对话框 样式--}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">
        $(document).ready(function () {
            // 确认对话框
            $('#btn_give_up').click(function () {
                $.confirm({
                    title: 'Confirm!',
                    content: 'Simple confirm!',
                    confirm: function(){
                        $.alert('Confirmed!');
                    },
                    cancel: function(){
                        $.alert('Canceled!')
                    }
                });
            });
        })


</script>