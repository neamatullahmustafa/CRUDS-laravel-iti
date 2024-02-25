@extends('layouts/main')
@section('title')
create
@endsection
@section('header')
<h1 class="text-center">create Users</h1>

@endsection
@section('content')
    <form action={{url('/user/store')}} method="GET" class="container">
@csrf
      <div class="mb-3">
            <label for="InputName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control"  id="InputName">
          </div>
        <div class="mb-3">
          <label for="InputEmail" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="InputEmail">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      @if ($errors->any() )
      @foreach($errors->all() as $error)
      <p class="text-danger text-center ">{{$error}}</p>
      @endforeach
          @endif
          </form>
@endsection
