<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href='/home'>Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='/home'>Home</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Users
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item " href="/">Users List</a></li>
                <li><a class="dropdown-item" href="/user/create">New User</a>
              </li></ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Posts
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item " href="/posts">Posts List</a></li>
                <li><a class="dropdown-item" href="/posts/create">New Post</a>
              </li></ul>
          </li>
          @guest


          <li class="nav-item">
            <a class="nav-link" href='/login'>login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='/register'>register</a>
          </li>
          @endguest
          @auth

          <li class="nav-item ">
            <form action="{{url('logout')}}" method="post">
                @csrf <input type="submit" class="nav-link bg-light border-0" value='logout'></form>

          </li>
          @endauth
        </ul>
    </div>
  </nav>


