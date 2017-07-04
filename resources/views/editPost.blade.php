@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Article</div>

                <div class="panel-body">
                    {{ Form::open(["route"=>["routeUpdateArticle",$show->id],'method'=>'put',"property enctype"=>"multipart/form-data"]) }}
                        {{ Form::file('image')}}
                        <br/>
                        title:
                        {{ Form::text("title",$show->title) }}
                        <br/>
                        <br/>
                        <p>article:</p>
                        {{ Form::textarea("article",$show->article)}}
                        <br/>
                        {{ Form::submit('update') }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
