
<div class="row">
    <div class="col">
        {{--标题--}}
        <h3>{{ $detail['article']['title'] }}</h3>
    </div>
</div>

<div class="row">
    <div class="col">
        <h6 style="float:right"> <a href="#" >作者:{{ $detail['author']['name'] }}</a></h6>
        <h6 style="float:right">创建时间:{{ $detail['article']['created_at'] }}&nbsp;&nbsp;</h6>
    </div>
</div>

<div class="card bg-light text-dark">
    <div class="card-body" style="min-height: 700px;">
        {!! $detail['article']['content'] !!}
    </div>
</div>

<br>
<br>








