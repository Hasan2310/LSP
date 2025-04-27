@extends('components.layout')

@section('content')
<h2>Selamat Datang di dashboard {{ Auth::user()->name }}</h2>
<p>Role: {{ Auth::user()->role }}</p>

@endsection