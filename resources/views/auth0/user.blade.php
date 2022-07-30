@extends("layouts.main")

@section("title", "User")

@section("content")

        <p>Welcome {{Auth::user()->given_name}}, You are authenticated. <a href="{{ route('logout') }}">Log out</a></p>
      
        <div>
           <pre><?php print_r(Auth::user()) ?></pre>

          
          
        </div>

@endsection