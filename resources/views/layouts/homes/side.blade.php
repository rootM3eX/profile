<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('profile')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
		  </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-file-alt"></i>
              <p>
                Portofolio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('porto/show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('porto/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data</p>
                </a>
              </li>
            </ul>
		  </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-tags"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('category/show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('category/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data</p>
                </a>
              </li>
            </ul>
		  </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-pager"></i>
              <p>
                Post Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('post/show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('post/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('thumbnail')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thumbnail</p>
                </a>
              </li>
            </ul>
		  </li>
      <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-ellipsis-h"></i>
              <p>
                Custom Navbar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('navbar/show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('navbar/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data</p>
                </a>
              </li>
            </ul>
		  </li>
          <li class="nav-item">
            <a href="{{ url('exit')}}" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>