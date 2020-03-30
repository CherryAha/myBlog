<div class="row col">
    <div class="form-inline mb-2">
        <div class="form-group">
            <H5 >标签:</H5>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group form-check-inline" id="tag_broder">
            {{--加载已经存在标签--}}
            @if(isset($article->tags))
                @foreach($article->tags as $item)
                    <label><input name="tag[] " class="tag_list" type="checkbox"  checked="checked" value={{$item->name}} /> &nbsp;{{$item->name}} &nbsp;</label>
                @endforeach
            @endif
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input id="add_tag_input" type="text" class="form-control"   placeholder="添加标签">
        </div>
        <div type="submit" class="btn btn-primary mb-2" id="add_tag_btn" >添加</div>
    </div>
</div>


{{--jq添加事件--}}
<script type="text/javascript">
    $(document).ready(function(){
        // 点击添加tag按钮
        $("#add_tag_btn").click(function(){
           var input_val  =  $(" #add_tag_input ").val();
           var tag  =   '<label><input name="tag[] " class="tag_list" type="checkbox"  checked="checked" value="' + input_val + '" /> &nbsp; '+ input_val +'&nbsp;</label> &nbsp;';

            //获得tag一组值
            var array_option = [];
            $('.tag_list').each(function () {
                array_option.push($(this).val())
            });

            //判断标签是否存在
            var is_exist = true;
            for(key in array_option){
                if (array_option[key] == input_val){
                    is_exist = false;
                    alert(input_val+" 标签已经存在");
                }
            }
            //处理结果
            if (is_exist)
            {
                $("#tag_broder").append(tag);
                $(" #add_tag_input ").val("")
            }
        });
    });
</script>
