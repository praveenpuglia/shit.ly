<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Shit.ly</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/cssshake.css')}}">
		<link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<noscript>
			<p class="noscript">No javascript...No goodies. Boo! :(</p>
		</noscript>
	</head>
	<body>
		<div class="container">
			@yield('content')

			<div class="footer">
			<hr>
				Having Fun @ 2014. Project by - <a href="http://praveenpuglia.com">Praveen Puglia</a>
			</div>
		</div>


		
	</body>
</html>