<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">

	<meta charset="UTF-8">
	<title>Document</title>
	
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/adminEstilos.css">
	<link rel="stylesheet" href="/css/animate.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	
	@yield('content')


	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/confirmar.js"></script>
	<script type="text/javascript" src="/js/alertar.js"></script>
	
	@yield('scripts')


</body>
</html>