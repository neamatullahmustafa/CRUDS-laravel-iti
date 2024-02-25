@extends('layouts/main')
@section('title')
edit
@endsection
@section('header')
<h1 class="text-center">edit Users</h1>

@endsection
@section('content')
<form action={{url("/user/update/$user->id")}} method="GET" class="container">
    @csrf
    <div class="mb-3">
        <label for="InputName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="InputName">
      </div>
    <div class="mb-3">
      <label for="InputEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{$user->email}}" id="InputEmail">
    </div>
    <input type="num" name="id" class="d-none" value="{{$user->id}}" >

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

  {{-- @if ($errors->any() )
  @foreach($errors->all() as $error)
  <p class="text-danger text-center ">{{$error}}</p>
  @endforeach
      @endif --}}
     </form>
@endsection
