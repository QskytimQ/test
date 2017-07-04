@extends('layouts.app')

@section('content')

<script type="text/javascript">
	function updateArticle(){
		location.href = "{{route('routeEdit',$show->id)}}" ;
	}

	function deleteArticle(){
		confirm("確定刪除文章?");
		location.href = "{{route('routeDeleteArticle',$show->id)}}";
	}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <img src="{{$show->image_path}}" alt="未上傳圖片" width="120px" height="120px">
            <div class="panel panel-default">
                <div class="panel-heading">
                Title : {{$show->title}}
                	<div style="float:right">
                    作者: {{$show->user->name}}
                    </div>
                </div>
                <div class="panel-heading"> {{$show->article}}</div>
            </div>

        </div>
    </div>
</div>
@if( (Auth::user() != null) && (Auth::user()->id) === ($show->user_id) )
	<div style="text-align:center;" >
		<input type="submit" name="update" class="btn btn-default btn-success" value="編輯" onclick="javascript:updateArticle()"/>
		<input type="submit" name="delete" class="btn btn-default btn-success" value="刪除" onclick="javascript:deleteArticle()"/>
		{{-- <a href="{{route('routeEdit',$show->id)}}" class="btn btn-default btn-success">submit</a> --}}
	</div>
	</br>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">留言</div>
                @foreach($show->messages as $data)
                	<div class="panel-heading">
                		<b>{{$data->user->name}}--></b>{{$data->message}}
                	</div>
                @endforeach
                <div class="panel-heading">
                {{Form::open(["route"=>["routeCreatMessage",$show->id],'method'=>'POST'])}}
                	{{Form::text('message')}}
                {{Form::close()}}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
