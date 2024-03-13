<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/student*') ? 'active' : '' }}" href="/dashboard/student">
              <span data-feather="file-text"></span>
             Student
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kelas*') ? 'active' : '' }}" href="/dashboard/kelas">
              <span data-feather="file-text"></span>
             kelas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/teacher*') ? 'active' : '' }}" href="/dashboard/teacher">
              <span data-feather="file-text"></span>
             Teacher
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/study*') ? 'active' : '' }}" href="/dashboard/study">
              <span data-feather="file-text"></span>
             Study
            </a>
          </li>
        </ul>
      </div>
    </nav>