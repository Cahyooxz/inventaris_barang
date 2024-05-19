<aside id="sidebar" class="js-sidebar">
  <!-- Content For Sidebar -->
  <div class="h-100">
      <div class="sidebar-logo">
          <a href="#">CV Ogah Rugi</a>
      </div>
      <ul class="sidebar-nav">
          <li class="sidebar-item">
              <a href="{{ route('dashboard') }}" class="sidebar-link">
                  <i class="fa-solid fa-list pe-2"></i>
                  Dashboard
              </a>
          </li>
          @if(auth()->user()->hasRole('admin'))
          <li class="sidebar-item">
              <a href="{{ route('users.index') }}" class="sidebar-link">
                <i class="bi bi-people-fill pe-2"></i>
                  Users
              </a>
          </li>
          @endif
          <li class="sidebar-item">
              <a href="{{ route('barang.index') }}" class="sidebar-link">
                <i class="fa-solid fa-box pe-2"></i>
                  Data Barang
              </a>
          </li>
          <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-target="#pages"
                  data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-people-carry-box pe-2"></i>
                  Transaksi
              </a>
              <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('pembelian.index') }}" class="sidebar-link">
                      <i class="fa-solid fa-cart-shopping pe-2"></i>
                        Data Pembelian
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('peminjaman.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-people-carry-box pe-2"></i>
                        Data Peminjaman
                    </a>
                </li>
              </ul>
          </li>
          <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-target="#posts"
                  data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                  Posts
              </a>
              <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link">Post 1</a>
                  </li>
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link">Post 2</a>
                  </li>
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link">Post 3</a>
                  </li>
              </ul>
          </li>
          <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-target="#auth"
                  data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                  Auth
              </a>
              <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link">Login</a>
                  </li>
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link">Register</a>
                  </li>
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link">Forgot Password</a>
                  </li>
              </ul>
          </li>
          <li class="sidebar-header">
              Multi Level Menu
          </li>
          <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-target="#multi"
                  data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-share-nodes pe-2"></i>
                  Multi Dropdown
              </a>
              <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                  <li class="sidebar-item">
                      <a href="#" class="sidebar-link collapsed" data-bs-target="#level-1"
                          data-bs-toggle="collapse" aria-expanded="false">Level 1</a>
                      <ul id="level-1" class="sidebar-dropdown list-unstyled collapse">
                          <li class="sidebar-item">
                              <a href="#" class="sidebar-link">Level 1.1</a>
                          </li>
                          <li class="sidebar-item">
                              <a href="#" class="sidebar-link">Level 1.2</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
      </ul>
  </div>
</aside>