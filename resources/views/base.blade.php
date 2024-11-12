<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title') | Mon agence</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg  navbar bg-primary">
        <div class="container-fluid">
     
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/" style="color: aliceblue">AGENCES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.property.index')}}" style="color: aliceblue">BIENS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.option.index')}}" style="color: aliceblue">OPTIONS</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        @yield('content')
    
</body>
</html> 