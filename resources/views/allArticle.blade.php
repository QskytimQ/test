@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article</div>
                @foreach($show as $data)
                    <div class="panel-body">
                        <a href="article/{{$data->id}}">{{$data->title}}</a>
                        <div style="float:right">
                        作者: {{$data->user->name}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div style="text-align:center;">{{$show->links()}}</div>{{--顯示分頁按鍵--}}
@endsection
