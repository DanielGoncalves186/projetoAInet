@extends('layouts.app')
@section('iconref')
"/home"
@endsection
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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
            @yield('conteudo')
        </div>
    </div>
@endsection
