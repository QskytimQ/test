@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">POST Article</div>

                <div class="panel-body">
                    {{ Form::open(["route"=>"creatpost",'method'=>'POST',"property enctype"=>"multipart/form-data"]) }}
                        {{ Form::file('image')}}
                        <br>
                        title:
                        {{ Form::text("title") }}
                        <br/>
                        <p>article:</p>
                        {{ Form::textarea("article")}}
                        <br/>
                        {{ Form::submit() }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
