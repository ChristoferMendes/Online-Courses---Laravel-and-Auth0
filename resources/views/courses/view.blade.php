@extends("layouts.main")

@section("title", "Courses")

@section("content")




{{-- @foreach ($products as $product)
  <pre>{!! print_r($product->toArray()) !!}</pre>
  
@endforeach --}}

{{-- @foreach($courses as $course)
<p>
  title: {{ $course->title }} <br>
 descrition: {{ $course->descriptions }} <br>
</p>
@endforeach --}}






{{-- @foreach($courses as $course)
  <div>
    <p> title: {{ $course->title }} <br> 
      id: {{ $course->id }}<br>
      description: {{ $course->descriptions }} <br>
    
      created at: {{ $course->created_at }}
      
    </p>
    
  </div>
@endforeach --}}



@endsection