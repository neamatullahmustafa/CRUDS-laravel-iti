@extends('layouts/main')
@section('title')
create
@endsection
@section('header')
<h1 class="text-center">create posts</h1>

@endsection
@section('content')
    <form action={{url('/posts')}} method="POST" class="container" enctype="multipart/form-data">
@csrf
      <div class="mb-3">
            <label for="InputTitle" class="form-label">title</label>
            <input type="text" name="title" class="form-control"  id="InputTitle">
          </div>
        <div class="mb-3">
          <label for="InputBody" class="form-label">body</label>
          <textarea type="text" name="body" class="form-control" id="InputBody">
          </textarea>
        </div  class="mb-3">
        <div>  <label for="InputFile" class="form-label">title</label>
            <input type="file" name="img" class="form-control"  id="InputTitle">
         </div>
        <select class="form-select" name ="user_id" aria-label="Default select example">
            <option selected>user name</option>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      @if ($errors->any() )
      @foreach($errors->all() as $error)
      <p class="text-danger text-center ">{{$error}}</p>
      @endforeach
          @endif
          </form>
@endsection
