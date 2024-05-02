@extends('layout/header')
@section('title')
Add Students

@endsection

@section('content')
<div class="card text-center">
    <div class="card-header text-center">
      Students Record
    </div>

    <div class="card-body">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
  
  @if(session('up_success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('up_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif



        <div class="data text-end">
            <a href="{{ url('students/add')}}"><button class="btn btn-primary mb-2">Add Student</button></a>

        </div>
      <table class="table table-bordered table-striped  table-hover table-responsive ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $count = 1;
          ?>
            @foreach ($data as $item)
            <tr>
              <th scope="row">{{$count}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->age}}</td>
              <td>{{$item->city}}</td>
              <td><a href="{{url('students/edit/'.$item->id)}}"><button class='btn btn-warning'>Edit</button></a></td>
              <td><a href="{{url('students/delete/'.$item->id)}}"><button class='btn btn-danger'>Delete</button></a></td>
            </tr>
            <?php
              $count++;
            ?>
            @endforeach
          
        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
@endsection