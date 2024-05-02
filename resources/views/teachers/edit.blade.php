@extends('layout/header')

@section('content')
<div class="card text-center">
    <form action="{{url('teachers-update')}}/{{$data->id}}" method="post"> 
        @csrf
        <div class="card-body d-flex justify-content-center align-items-center flex-column">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$data->name}}" id="name">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" value="{{$data->age}}" class="form-control" id="age">
                    </div>
                </div>
            </div>
            <div class="row text-center">

                <div class="col-md-12 text-center">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city"  value="{{$data->city}}" class="form-control" id="city">
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>


@endsection