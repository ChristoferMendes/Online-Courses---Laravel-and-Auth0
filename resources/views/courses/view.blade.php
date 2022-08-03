@extends("layouts.main")

@section("title", "Courses")

@section("content")

<div id="courses-container" class="col-md-12">
  <h2>All courses</h2>
  <p class="home-subtitle">See everything we have</p>
  
  <div id="cards-container" class="row">
      @foreach($courses as $course)
          <div class="card col-md-3">
              <img src="/img/courses/{{ $course->image }}" alt="{{ $course->title }}">
              <div class="card-body">
                                              {{-- Here I replace the original "01-30-2022" for "01/30/2022" and also replace Y-m-D to m-d-Y! --}}
                  <p class="card-date">Created at: {{ $course->created_at->format("m/d/Y") }}</p>
                  <h5 class="card-title"> {{ $course->title }}</h5>
                  <p class="card-participants">Participants: {{ count($course->users) }}</p>
                  <a href="/courses/{{ $course->id }}" class="btn btn-primary">More</a>
              </div>
          </div>
      @endforeach
      @if(count($courses) == 0 && $search)
          <p>There's no <strong style="color: red;">{{ $search }}</strong> course! <a href="/">See all</a></p>
      @elseif(count($courses) == 0)
          <p>There's no courses available</p>
      @endif
  </div>
</div>


@endsection