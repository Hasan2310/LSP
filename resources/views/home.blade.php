@extends('components.layout')

@section('content')
@auth
    <h2>Selamat Datang di Dashboard {{ Auth::user()->name }}</h2>
    <p>Role: {{ Auth::user()->role }}</p>
@endauth

@guest
    <h2>Selamat Datang</h2>
    <a href="/login">Login</a>
@endguest

@auth    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endauth
@endsection