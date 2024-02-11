@extends('layouts/main')
@section('title')
list
@endsection
@section('header')
<h1 class="text-center">List Users</h1>

@endsection
@section('content')
<table class="table container">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td><a href="/user/show/{{$user->id}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td class="d-flex"><a href="/user/edit/{{$user->id}}" class="btn btn-primary m-1">Edit</a>
            <form action="{{url("/user/delete/$user->id")}}" method="post">
@csrf
@method("delete")
            <input type="submit" class="btn btn-danger m-1" value="Delete">
</form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection



