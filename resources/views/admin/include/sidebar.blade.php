<!-- Register Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-2 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('admin.index.page')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Управление пользователями
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.users.banned')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Заблокированные пользователи
                    </p>
                </a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
