<!DOCTYPE html>
<html>
<head>
	<title>Rigester User</title>
</head>
<body>
	{{ Form::open(["route"=>"routAdduser",'method'=>'GET']) }}
		<p>user:</p>
		{{ Form::text("auth") }}
		<br/>
		<p>passwd:</p>
		{{ Form::password("passwd")}}
		<br/>
		{{ Form::submit() }}
	{{ Form::close() }}
</body>
</html>