@extends('layouts.app')
@section('iconref')
"/admin"
@endsection
@section('content')
    <div class="container-fluid">
        <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-light" href="/users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/customers">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/orders">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/colors">Colors</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/admintshirt">TshirtImages</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/prices">Prices</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="#">Statistics</a>
                </li>
            </ul>
        </div>
        <div class="col-10 content">
            <!-- Content of the page goes here -->
            @yield('conteudo')
        </div>
    </div>
@endsection
