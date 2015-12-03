<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    	@include('flash::message')
        @yield('content')
    </div>
    
<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
</body>
</html>