<!DOCTYPE html>
<html>
<head>
	<title>showUser</title>
</head>
<body>
	<table border="1">
			<thead>
				<th>user</th>
				<th>pwd</th>
			</thead>
			<tbody>
				@foreach($show as $data)
				<tr>
					<td>{{$data->auth}}</td>
					<td>{{$data->passwd}}</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</body>
</html>