@extends("layouts.main")

@section("title", "Guest")

@section("content")

<p> You are a guest → <a href="{{ route('login') }}">Login</a></p>

   

@endsection