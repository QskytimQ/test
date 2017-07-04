<!DOCTYPE html>
<html>
<head>
	<title>show</title>
</head>
<body>
	<table border="1">
			<thead>
				<th>str1</th>
			</thead>
			<tbody>
				@foreach($show as $data)
				<tr>
					<td>{{$data->str1}}</td>
				</tr>
				@endforeach
			</tbody>
	</table>
</body>
</html>