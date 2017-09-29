<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Khoa Pham</title>
	<!-- asset di thang vao thu muc public ko can dien het url chi can thu muc css/style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	@include('layouts.header')
	
	<div id="container">
		<h1>Khoa Pham</h1>

	<!-- phan noi dung thay doi lay tu file laravel.blade.php -->
	@yield('NoiDung')
	</div>
	
	@include('layouts.footer')

</body>
</html>