<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"> -->
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>

		<style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtOxrot7xZqWgX7OI6fjgljtI4_BPCEMA&sensor=false"></script>
	</head>

	<body>
		<div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>



	</body>

</html>