<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         

          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('service.index')}}">service</a>
            </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              projet
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('project.index')}}">Categorie1</a></li>
              <li><a class="dropdown-item" href="{{route('project.create')}}">Categorie2</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              employee
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('employee.index')}}">Categorie1</a></li>
              <li><a class="dropdown-item" href="{{route('employee.create')}}">Categorie2</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              reclamation
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('reclamation.index')}}">Categorie1</a></li>
              <li><a class="dropdown-item" href="{{route('reclamation.create')}}">Categorie2</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              event
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('fullcalendar.index')}}">Categorie1</a></li>
              <li><a class="dropdown-item" href="{{route('fullcalendar.create')}}">Categorie2</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              task
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('task.index')}}">index</a></li>
              <li><a class="dropdown-item" href="{{route('task.create')}}">Add</a></li>
            </ul>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
           
        </ul>
    </div>
    </div>
  </nav>
