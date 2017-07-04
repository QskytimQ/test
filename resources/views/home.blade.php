@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article</div>
                {{-- {{dd($show->isEmpty())}} --}}
                @if(!$show->isEmpty())
                    @foreach($show as $data)
                        <div class="panel-body">
                            <a href="article/{{$data->id}}">{{$data->title}}</a>
                            <div style="float:right">日期: {{$data->updated_at}}</div>
                        </div>
                    @endforeach
                @else
                    <div class="panel-body">
                        未有新增文章        
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
