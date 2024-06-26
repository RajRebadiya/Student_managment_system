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
                        <br>
                        <?php 
                            $unique_teachers = [];
                        ?>
                        <select name="teacher_name">
                            <option value="">Select Teacher</option>
                            @foreach($data as $course)
                                 @if (!in_array($course->t_name, $unique_teachers))
                                    <option value="{{$course->t_name}}">{{$course->t_name}}</option>
                                    <?php $unique_teachers[] = $course->t_name; ?> // Add teacher name to the list
                                @endif
                            @endforeach
                        </select>
                        
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