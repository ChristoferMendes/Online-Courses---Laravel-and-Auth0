@extends("layouts.main")

@section("title", "Editing: " . $course->title)

@section("content")


<div id="course-create-container" class="col-md-6 offset-md-3">
  <h1>Editing: {{$course->title}}</h1>
  <form action="/courses/update/{{ $course->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Image of the course</label>
      <input type="file" id="image" name="image" class="form-control-file upload-button">
      <img src="/img/courses/{{ $course->image }}" alt="{{ $course->title }} Image" class="img-preview">
    </div>

    <div class="form-group">
      <label for="title">Course</label>
      <input type="text" class="form-control inputCreate" id="title" name="title" placeholder="Title of the Course" maxlength="30" value="{{ $course->title }}">
    </div>

    <div class="form-group">
      <label for="title">Description</label>
      <textarea name="descriptions" id="descriptions" class="form-control inputCreate" placeholder="Description of the Course" maxlength="80" name="descriptions">{{ $course->descriptions }}</textarea>
    </div>

    <div class="form-group">
      <label for="title">Course Level</label>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Basic"> Basic
      </div>  
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Intermediary"> Intermediary
      </div>  
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Advanced"> Advanced
      </div>  
    </div>

    <input type="submit" class="btn btn-primary" value="Edit Course">

  </form>
</div>

@endsection