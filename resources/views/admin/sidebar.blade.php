  
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-users"></i>
                    Artistas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.canciones') }}">
                    <i class="fas fa-music"></i>
                    Canciones
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.imagenes') }}">
                    <i class="far fa-images"></i>
                    Imagenes
                </a>
            </li>
        </ul>
    </div>
</nav>