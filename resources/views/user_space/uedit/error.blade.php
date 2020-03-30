{{--错误提示--}}
<div class="row">
    <div class="form-group col">
        @if(Session::get('successs'))
            <div class="row">
                <div class="col alert alert-danger">
                    {{Session::get('error')}}
                </div>
            </div>
        @endif
        {{--格式是验证错误--}}
        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

