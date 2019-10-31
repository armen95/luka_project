<!DOCTYPE html>
<html>
	<head>
	    <title>Dashboard</title>
		<meta charset="utf-8">
	    <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<link href="/css/style.css" rel="stylesheet">
	</head>
	<body>

		<div class="d-flex" id="wrapper">
		    <div class="bg-light border-right" id="sidebar-wrapper">
		      	<div class="sidebar-heading">Admin Panel</div>
		      	<div class="list-group list-group-flush">
					<a href="/admin/profile" class="list-group-item list-group-item-action bg-light">Dashboard</a>
					<a href="/admin/freelancers" class="list-group-item list-group-item-action bg-light">Freelancers</a>
					<a href="/admin/clients" class="list-group-item list-group-item-action bg-light">Clients</a>
					<a href="#" class="list-group-item list-group-item-action bg-light">Projects</a>
					<a href="#" class="list-group-item list-group-item-action bg-light">Orders</a>
					<a href="/admin/settings" class="list-group-item list-group-item-action bg-light">Settings</a>
		      	</div>
		    </div>
		    <div id="page-content-wrapper">
				<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
		        <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->

			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			          <span class="navbar-toggler-icon"></span>
			        </button>

			        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			          	<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
			            	<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{ Auth::user()->firstname.' '. Auth::user()->lastname }}
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{URL::to('/logout')}}">Logout</a>
								</div>
			            	</li>
			          	</ul>
			        </div>
		      	</nav>

		      	<div class="container-fluid">
					@yield('content')
		      	</div>
		    </div>
		</div>

		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src = "http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="/js/script.js"></script>

		<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});

			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        $('#freelancersTable').DataTable();
		</script>
	</body>
</html>