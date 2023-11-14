<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="template" content="sahils bazar">
	<meta name="title" content="Sahil's bazar - Food & Meet">
	<meta name="keywords" content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
	<title>Sahil's Bazaar</title>
	<link rel="icon" href="{{ url('/') }}/frontend/images/favicon.png">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/fonts/flaticon/flaticon.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/fonts/icofont/icofont.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/fonts/fontawesome/fontawesome.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/vendor/venobox/venobox.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/vendor/slickslider/slick.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/vendor/niceselect/nice-select.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/css/main.css">
	<link rel="stylesheet" href="{{ url('/') }}/frontend/css/home-standard.css">
</head>

<body>
	<div class="backdrop"></div>
	<a class="backtop fas fa-arrow-up" href="#"></a>
	<div class="header-top alert fade show">
		<p>20% Discount All New Customers <a href="register.html">get register</a></p>
		<button data-bs-dismiss="alert"><i class="fas fa-times"></i></button>
	</div>
	@include('front/components/header')
	
	@yield('content')
    
	@include('front/components/footer')
	<script src="{{ url('/') }}/frontend/vendor/bootstrap/jquery-1.12.4.min.js"></script>
	<script src="{{ url('/') }}/frontend/vendor/bootstrap/popper.min.js"></script>
	<script src="{{ url('/') }}/frontend/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="{{ url('/') }}/frontend/vendor/countdown/countdown.min.js"></script>
	<script src="{{ url('/') }}/frontend/vendor/niceselect/nice-select.min.js"></script>
	<script src="{{ url('/') }}/frontend/vendor/slickslider/slick.min.js"></script>
	<script src="{{ url('/') }}/frontend/vendor/venobox/venobox.min.js"></script>
	<script src="{{ url('/') }}/frontend/js/nice-select.js"></script>
	<script src="{{ url('/') }}/frontend/js/countdown.js"></script>
	<script src="{{ url('/') }}/frontend/js/accordion.js"></script>
	<script src="{{ url('/') }}/frontend/js/venobox.js"></script>
	<script src="{{ url('/') }}/frontend/js/slick.js"></script>
	<script src="{{ url('/') }}/frontend/js/main.js"></script>
</body>
</html>