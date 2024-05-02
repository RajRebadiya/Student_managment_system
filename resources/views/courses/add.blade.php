@extends('layout/header')

@section('content')
<div class="card text-center">
    <form action="{{url('submit')}}" method="post">
        @csrf
        <div class="card-body d-flex justify-content-center align-items-center flex-column">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="teacher" class="form-label">Teacher Name</label>
                        <select name="teacher" class="form-select" id="teacher">
                            <option value="">Select Teacher</option>
                            @foreach($data as $idd)
                                <option value="{{ $idd }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="row text-center">

                <div class="col-md-12 text-center">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city">
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