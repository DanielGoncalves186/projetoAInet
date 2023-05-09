
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{{ $pageTitle }}</title>
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
<h1>{{ $pageTitle }}</h1>
<hr>
<p>
@yield('content')
</p>
</body>
</html>