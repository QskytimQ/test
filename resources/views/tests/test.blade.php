<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
test 測試

	{{ Form::open(["route"=>"routeTest"])}}
		{{ Form::text('str1')}}
		{{ Form::submit('submit')}}
	{{ Form::close() }}

</body>
</html>