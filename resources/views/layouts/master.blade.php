<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="stylesheeta384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--網頁上小圖片-->
	<link rel="shortcut icon" href="https://img.icons8.com/ios-glyphs/100/000000/y-coordinate.png">
	<title>Y MemberSystem</title>
</head>
<body>
	@include('inc.navbar')
	@include('inc.showcase')
	<div class="container">
		@yield('content')
	</div>
	<footer class="text-center" style="margin-top:20px ;">
        <p>Copyright 2019 &copy; Yuan</p>
    </footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>