
<nav id="sidebarMenu" class="nav-pills bg-dark ps-3 col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Dashboard")? 'active': '' }}" aria-current="page" href="/admin">
              Dashboard
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Kelas")? 'active': '' }}" href="{{ route('grade.index') }}">
              Kelas
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Materi")? 'active': '' }}" href="#">
              Materi
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Jadwal")? 'active': '' }}" href="#">
              Jadwal
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Data Guru")? 'active': '' }}" href="{{ route('teacher.index') }}">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Data Guru
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a href="{{ route('student.index') }}" class="nav-link {{ ($title === "Data Siswa")? 'active': '' }}" >
              <span data-feather="layers" class="align-text-bottom"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Data Akun")? 'active': '' }}" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Data Akun
            </a>
          </li>
          <li class="nav-item nav-dark">
            <a class="nav-link {{ ($title === "Aktivitas")? 'active': '' }}" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Aktivitas
            </a>
          </li>

        </ul>

      </div>
    </nav>