<!DOCTYPE html>
<html>
<head>
    <title>Program Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/clienteTemplate.css')}}">
    <style>
    
        </style>
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/TShirt.png')}}" alt="Logo" height="50" width="50">
            template
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/edit">Nome Do User</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="btn btn-light" href="/catalogo">New Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/orders/history/id">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/images/create">Add Image</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/user/settings">User Settings</a>
                    </li>
                </ul>
            </div>
            <div class="col-10 content">
                <!-- Content of the page goes here -->
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>