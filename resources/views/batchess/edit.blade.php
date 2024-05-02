@extends('layout/header')

@section('content')
<?php //dd($data_2); ?>
<div class="card text-center">
    <form action="{{url('batchess-update')}}/{{$data->id}}" method="post">
        @csrf
        <div class="card-body d-flex justify-content-center align-items-center flex-column">
            
            <div class="row">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="course" class="form-label">Course Name</label>
                        <br>
                        <?php 
                            $unique_courses = [];
                        ?>
                        <select name="course_name">
                            <option value="{{$data->c_name}}">{{$data->c_name}}</option>
                             @foreach($data_2 as $course)
                             @if ($course->c_name !== $data->c_name && !in_array($course->c_name, $unique_courses))  
                                    <option value="{{$course->c_name}}">{{$course->c_name}}</option>
                                    <?php 
                                    $unique_courses[] = $course->c_name; ?> 
                                @endif
                         @endforeach 
                        </select>
                        
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
                            <option value="{{$data->t_name}}">{{$data->t_name}}</option>
                             @foreach($data_2 as $course)
                             @if ($course->t_name !== $data->t_name && !in_array($course->t_name, $unique_teachers))  
                                    <option value="{{$course->t_name}}">{{$course->t_name}}</option>
                                    <?php 
                                    $unique_teachers[] = $course->t_name; ?> 
                                @endif
                         @endforeach 
                        </select>
                        
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="session" class="form-label">Session</label>
                        <br>
                        <select name="session" id="session">
                            <option value="{{$data->session}}">{{$data->session}}</option>
                            <option value="morning">morning</option>
                            <option value="evening">Evening</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="time_slot" class="form-label">Time Slot</label>
                        <br>
                        <select name="time_slot" id="time_slot">
                            <option value="{{$data->time_slot}}">{{$data->time_slot}}</option>
                            <optgroup label="Morning" id="morningOptions">
                                <option value="7 to 9">7 to 9 AM</option>
                                <option value="9 to 11">9 to 11 AM</option>
                            </optgroup>
                            <optgroup label="Evening" id="eveningOptions">
                                <option value="4 to 6">4 to 6 PM</option>
                                <option value="7 to 9">7 to 9 PM</option>
                            </optgroup>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sessionSelect = document.getElementById('session');
        const morningOptions = document.getElementById('morningOptions');
        const eveningOptions = document.getElementById('eveningOptions');

        sessionSelect.addEventListener('change', function() {
            const selectedSession = sessionSelect.value;

            if (selectedSession === 'morning') {
                morningOptions.style.display = 'block';
                eveningOptions.style.display = 'none';
            } else if (selectedSession === 'evening') {
                morningOptions.style.display = 'none';
                eveningOptions.style.display = 'block';
            } else {
                morningOptions.style.display = 'none';
                eveningOptions.style.display = 'none';
            }
        });
    });
    function updateTeacher(select) {
        var teacherName = select.options[select.selectedIndex].getAttribute('data-teacher');
        var teacherSelect = document.getElementById('teacher_name');
        
        // Clear existing options
        teacherSelect.innerHTML = '<option value="">Select Teacher</option>';
        
        // Add new option
        if (teacherName) {
            var option = document.createElement('option');
            option.value = teacherName;
            option.text = teacherName;
            teacherSelect.add(option);
        }
    }
</script>


@endsection