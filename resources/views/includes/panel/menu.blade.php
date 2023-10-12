<ul class="navbar-nav">
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Dispositivos</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="{{url('/dispositivos')}}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">usb</i>
        </div>
        <span class="nav-link-text ms-1">Ver dispositivos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="{{url('/dispositivos/create')}}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">add</i>
        </div>
        <span class="nav-link-text ms-1">Añadir Nuevo</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pragramacion de Horarios</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="{{url('/horarios')}}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">alarm</i>
        </div>
        <span class="nav-link-text ms-1">Ver Horarios</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="{{url('/horarios/create')}}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">add</i>
        </div>
        <span class="nav-link-text ms-1">Añadir Horario</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Gestionar Perfil</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">person</i>
        </div>
        <span class="nav-link-text ms-1">Perfil</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">exit_to_app</i>
        </div>
        <span class="nav-link-text ms-1">Cerrar sesión</span>
        <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
          @csrf
        </form>
      </a>
    </li>
  </ul>
