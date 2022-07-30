@extends("layouts.main")

@section("title", "Create Course")

@section("content")


<div id="course-create-container" class="col-md-6 offset-md-3">
  <h1>Create your course</h1>
  <form action="/courses/create" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="title">Image of the course</label>
      <input type="file" id="image" name="image" class="form-control-file upload-button">
    </div>

    <div class="form-group">
      <label for="title">Course</label>
      <input type="text" class="form-control inputCreate" id="title" name="title" placeholder="Title of the Course" maxlength="30">
    </div>

    <div class="form-group">
      <label for="title">Description</label>
      <textarea name="descriptions" id="descriptions" class="form-control inputCreate" placeholder="Description of the Course" maxlength="80"></textarea>
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

    
    <input type="submit" class="btn btn-primary" value="Create Course">

  </form>
</div>

@endsection