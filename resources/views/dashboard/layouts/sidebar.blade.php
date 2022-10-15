<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <!-- <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ route('products.indexs') }}">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Request
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('unitkerjas') ? 'active' : '' }}"" href="{{ route('unitkerjas.indexs') }}">
              <span data-feather="folder" class="align-text-bottom"></span>
              Unit Kerja
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{ Request::is('jabatans') ? 'active' : '' }}"" href="{{ route('jabatans.indexs') }}">
              <span data-feather="layers" class="align-text-bottom"></span>
              Jabatan
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('layanans') ? 'active' : '' }}"" href="{{ route('layanans.indexs') }}">
              <span data-feather="book-open" class="align-text-bottom"></span>
              Layanan
            </a>
          </li>
        </ul>
        
      </div>
    </nav>