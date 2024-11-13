<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title') | Administration</title>
   
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color:aliceblue">ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/" style="color:aliceblue">AGENCES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.property.index')}}" style="color:aliceblue">BIENS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.option.index')}}" style="color:aliceblue">OPTIONS</a>
            </li>
          </ul>
          <div class="ms-auto">
            @auth
                <ul class="navbar-bar">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="logout-button">Se déconnecter</button>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    
        </div>
      </div>
    </nav>
  <div class="container mt-5">
    @include('shared.flash')
  </div>
</body>

</html> 