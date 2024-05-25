<nav class="navbar navbar-dark navbar-expand px-3 border-bottom bg-gray">
  <button class="btn text-light" id="sidebar-toggle" type="button">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse navbar">
      <ul class="navbar-nav d-flex">
          <li class="nav-item dropdown">
              <a href="#" data-bs-toggle="dropdown" class="nav-icon text-light pe-md-0">
                <img src="{{ asset('image/profile.png') }}" class="ms-3 avatar img-fluid rounded" alt="">
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-left me-3"></i>Logout</button>
                  </form>
              </div> 
          </li>
      </ul>
  </div>
</nav>