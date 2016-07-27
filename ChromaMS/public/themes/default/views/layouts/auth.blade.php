<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') &mdash; ChromaMS</title>
	<link rel="stylesheet" href="{{ theme('css/backend.css') }}">
</head>
<body>
	<div class="container">
		<div class="row vertical-center">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-{{$errors->any() ? 'danger':'default'}}">
					<div class="panel-heading">
						<h2 class="panel-title">@yield('heading')</h2>
					</div>
					<div class="panel-body">
						@if($errors->any())
						<div class="alert alert-danger">
							<strong>We Found Errors</strong>
							<ul>
								@foreach($errors->all() as $error)
								<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if($status)
							<div class="alert alert-info">
								{{ $status }}
							</div>
						@endif
						
						@yield('content')

					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>