<nav class="navbar navbar-dark navbar-expand px-3 border-bottom bg-gray">
  <button class="btn text-light" id="sidebar-toggle" type="button">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse navbar">
      <ul class="navbar-nav d-flex">
          <li class="nav-item dropdown">
              <a href="#" data-bs-toggle="dropdown" class="nav-icon text-light pe-md-0">
                {{ $user }}
                <img src="../image/profile.jpg" class="ms-3 avatar img-fluid rounded" alt="">
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                  <a href="#" class="dropdown-item"><i class="bi bi-person-fill me-3"></i>Profile</a>
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