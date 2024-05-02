<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">Student Managment System</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Info</a>
                          </li>
                        </div>
                    </div>
                  </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="w3-sidebar w3-bar-block" style="width:25%">
                    <a href="{{url('show')}}" class="w3-bar-item w3-buttonw3-bar-item w3-button w3-hover-blue">Students</a>
                    <a href="{{url('teachers/show')}}" class="w3-bar-item w3-buttonw3-bar-item w3-button w3-hover-blue">Teachers</a>
                    <a href="{{url('courses/show')}}" class="w3-bar-item w3-buttonw3-bar-item w3-button w3-hover-blue">Course</a>
                    <a href="#" class="w3-bar-item w3-buttonw3-bar-item w3-button w3-hover-blue">Batches</a>
                    <a href="#" class="w3-bar-item w3-buttonw3-bar-item w3-button w3-hover-blue">Enrollement</a>
                    <a href="#" class="w3-bar-item w3-buttonw3-bar-item w3-button w3-hover-blue">Payment</a>
                  </div>
                 </div>
            <div class="col-md-9">
                
                
                    @yield('content')
                    
                
            </div>
        </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>