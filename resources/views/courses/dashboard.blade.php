@extends("layouts.main")

@section("title", "Dashboard")

@section("content")

<div class="col-md-10 offset-md-1 dashboard-title-container">
  <h1>My courses</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-courses-container">
  @if(count($courses) > 0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Participants</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($courses as $course)
        <tr>
          <td scope="row">{{ $loop->index + 1 }}</td>
          <td><a href="/courses/{{ $course->id }}">{{ $course->title }}</a></td>
          <td>0</td>
          <td><a href="#">Edit</a><a href="#">Delete</a></td>

        </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <p>You don't have any courses yet, <a href="/courses/create">Create Event</a></p>
  @endif
</div>

@endsection