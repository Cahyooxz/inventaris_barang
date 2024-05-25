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
          @if(auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('ruangan.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-house-chimney-window pe-2"></i>
                    Data Ruangan
                </a>
            </li>
          @endif
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
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator'))
                    <li class="sidebar-item">
                        <a href="{{ route('pemakaian.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-people-carry-box pe-2"></i>
                            Data Pemakaian
                        </a>
                    </li>
                @endif
              </ul>
          </li>
      </ul>
  </div>
</aside>