@extends('layout/header')
@section('title')
Add batchs

@endsection

@section('content')
<div class="card text-center">
    <div class="card-header text-center">
      batches Record
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
            <a href="{{ url('batchess/add')}}"><button class="btn btn-primary mb-2">Add batche</button></a>

        </div>
      <table class="table table-bordered table-striped  table-hover table-responsive ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Course Name</th>
            <th scope="col">Teachers Name</th>
            <th scope="col">Session</th>
            <th scope="col">Time_Slot</th>
            {{-- <th scope="col">City</th> --}}
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($data as $item)
          <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->c_name}}</td>
              
               <td>{{$item->t_name}}</td>
               <td>{{$item->session}}</td>
               <td>{{$item->time_slot}}</td>
              
              <td>
                  <a href="{{url('batchess/edit/'.$item->id)}}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                  <a href="{{url('batchess/delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
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