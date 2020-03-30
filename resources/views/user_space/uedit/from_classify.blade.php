{{--标签--}}

<div class="row col">
    <div class="form-inline mb-2">
        <div class="form-group">
            <H5 >分类:</H5>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <select class="form-control" id="select_border"  name="classify">

                @if(isset($classify_list) && count($classify_list))
                    @foreach($classify_list as $value)
                        <option >{{$value}}</option>
                    @endforeach
                @else
                    <option>默认</option>
                @endif
            </select>
        </div>
        {{--添加分类--}}
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">添加分类</label>
            <input type="text" class="form-control" id="add_classify_input"  placeholder="添加分类">
        </div>
        <div id="add_classify_btn" class="btn btn-primary mb-2" href="#">添加</div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // 点击添加tag按钮
        $("#add_classify_btn").click(function(){

            var input_val  =  $(" #add_classify_input ").val();

            var tag  =    '<option  selected>'+input_val+'</option> &nbsp;';

            //获得option一组值
            var array_option = [];
            $('option').each(function ()
            {
                array_option.push($(this).val())
            });

            //判断是否存在
            var is_exist = true;
            for ( key in array_option){
                if (array_option[key] == input_val){
                    is_exist = false;
                    alert(input_val + " 分类已经存在");
                }
            }

            //处理判断结果
            if (is_exist)
            {
                $("#select_border").append(tag);
                $(" #add_classify_input ").val("");
            }
        });
    });
</script>

