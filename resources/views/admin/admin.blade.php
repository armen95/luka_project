<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Laravel</title>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style type="text/css">
    	body {
		    margin: 0;
		    font-size: .9rem;
		    font-weight: 400;
		    line-height: 1.6;
		    color: #212529;
		    text-align: left;
		    background-color: #f5f8fa;
		}
		.navbar-laravel
		{
		    box-shadow: 0 2px 4px rgba(0,0,0,.04);
		}
		.page_wrapper{
			padding-top: 25px;
		}
    </style>
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
	    <div class="container">
	    <a class="navbar-brand" href="#">Laravel</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav ml-auto">
	            <li class="nav-item">
	                <a class="nav-link" href="{{URL::to('/logout')}}">Logout</a>
	            </li>
	        </ul>

	    </div>
	    </div>
	</nav>
	
	<div class="container page_wrapper">
		<div class="row">
			<h4>{{ Auth::user()->firstname.' '. Auth::user()->lastname }}</h4>
		</div>
	</div>

</body>
</html>