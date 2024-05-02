@extends('layout/header')
@section('title')
Add courses

@endsection

@section('content')
<div class="card text-center">
    <div class="card-header text-center">
      courses Record
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
            <a href="{{ url('courses/add')}}"><button class="btn btn-primary mb-2">Add Course</button></a>

        </div>
      <table class="table table-bordered table-striped  table-hover table-responsive ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Course Name</th>
            <th scope="col">Teachers Name</th>
            {{-- <th scope="col">City</th> --}}
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->name}}</td>
              <td>
                  @if ($item->teacher)
                      {{$item->teacher->name}}
                  @else
                      No Teacher Assigned
                  @endif
              </td>
              <td>
                  <a href="{{url('courses/edit/'.$item->id)}}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                  <a href="{{url('courses/delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
              </td>
          </tr>
      @endforeach
      
      
      
          
        </tbody>
      </table>
    </div>
      {{-- <div class="card-footer text-muted">
        2 days ago
      </div> --}}
  </div>
@endsection