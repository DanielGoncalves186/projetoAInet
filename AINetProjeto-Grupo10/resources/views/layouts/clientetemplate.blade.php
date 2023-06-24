@extends('layouts.app')
@section('iconref')
"/home"
@endsection
@section('content')
    <div class="container-fluid">
        <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="btn btn-light" href="/catalogo">New Order</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/orders/history/{{ Auth::user()->id }}">Order History</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/tshirt/create">Add Image</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light" href="/customers/edit/{{ Auth::user()->id }}">User Settings</a>
                </li>
            </ul>
        </div>
        <div class="col-10 content">
            <!-- Content of the page goes here -->
            @yield('conteudo')
        </div>
    </div>
@endsection
