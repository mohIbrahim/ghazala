<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Title of the document</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<style>
			.page-break {
			    page-break-after: always;
			}
		</style>
	</head>

	<body>
		@foreach($units as $unit)
			@foreach($unit->owners as $owner)
			




				<div class="page-break"></div>
			@endforeach
		@endforeach
	
	</body>

</html>







		



