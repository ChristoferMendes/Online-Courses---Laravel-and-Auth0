@extends("layouts.main")

@section("title", $course->title )

@section("content")

<div class="col-md-10 offset-md-1">
  <div class="row">
    <div id="image-container" class="col-md-6">
      <img src="/img/courses/{{ $course->image }}" class="img-fluid" alt="{{ $course->image }}">
    </div>
    <div id="info-container" class="col-md-6">
      <h1>{{ $course->title }}</h1>
      <p class="course-hours "> <i class="fa-solid fa-graduation-cap fa-bounce" style="--fa-animation-iteration-count: 1;"></i> 
        
        x Hours
    
      </p>
      <p class="course-participants"><i class="fa-solid fa-users fa-flip" style="--fa-animation-iteration-count: 1; --fa-animation-duration: 3s;"></i> 
      
        Participants: {{ count($course->users) }}
      
    </p>
    <p class="course-owner"> Owner Name: {{$courseOwner['name'] }}</p>
    @if(Auth::check())
      @if($courseOwner['email'] == Auth::user()->email)
        <a href="/dashboard" class="btn btn-primary" id="course-edit">Edit Course</a>
      @endif
    @endif
    <form action="/courses/join/{{ $course->id }}" method="POST">
      @csrf
      <a href="/courses/join/{{ $course->id }}" 
        class="btn btn-primary" 
        id="course-submit"
        onclick="event.preventDefault();
        this.closest('form').submit();">
        Join course
      </a>
    </form>
    <h3>Course level: </h3>
    <ul id="items-list">
      @foreach($course->items as $item)
        <li>{{ $item }}</li>
      @endforeach
    </ul>
  </div>
    <div class="col md-12" id="description-container">
      <h3>About the course:</h1>
      <p class="course-description">{{ $course->descriptions }}</p>
    </div>
  </div>
</div>

@endsection