  <!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-light-warning elevation-4"> --}}
  <aside class="main-sidebar sidebar-light-green elevation-4">
      {{-- <aside class="main-sidebar elevation-4" style="background-color: #27ae60;"> --}}
      {{-- <aside class="main-sidebar elevation-4" style="background-color: #8dc63f;"> --}}
      {{-- <aside class="main-sidebar elevation-4" style="background-color: #343a40;"> --}}
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light"><i>ثانويّة القصّاب الشّرعيّة</i></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar" dir="rtl">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/img/logo2.png') }}" class="brand-image img-circle elevation-3"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">أمين السر</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              لوحة التحكم
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="./index.html" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v1</p>
                              </a>
                          </li>

                      </ul>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
