@extends('layouts/main')
@section('title')
edit
@endsection
@section('header')
<h1 class="text-center">edit posts</h1>

@endsection
@section('content')
<form action={{url("/posts/$post->id")}} method="POST" class="container MY-3">
    @csrf
    @method( 'PUT' )
      <div class="mb-3">
            <label for="InputTitle" class="form-label">title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}" id="InputTitle">
          </div>
        <div class="mb-3">
          <label for="InputBody" class="form-label">body</label>
          <textarea type="text" name="body" class="form-control" id="InputBody">{{$post->body}}
          </textarea>
        </div>
        <select class="form-select" name ="user_id" aria-label="Default select example">
            <option value="{{$post->user->id}}" selected>{{$post->user->name}}</option>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      {{-- @if ($errors->any() )
      @foreach($errors->all() as $error)
      <p class="text-danger text-center ">{{$error}}</p>
      @endforeach
          @endif --}}
     </form>
@endsection
