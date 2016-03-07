
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="https://www.gravatar.com/avatar/b3bcbfc4d90f78902eaebf6d5e23d346?s=160" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->

              @include('vendor.laravel-menu.admin-navbar-items', array('items' => $AdminNavigation->roots()))


          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->