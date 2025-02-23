<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			
		<ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.donations.index') }}" class="nav-link">Donaciones</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link">Usuarios</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.medicines.index') }}" class="nav-link">Medicinas</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.equipments.index') }}" class="nav-link">Equipos Médicos</a>
        </li>
		<li class="nav-item">
            <a href="{{ route('admin.benefactors.index') }}" class="nav-link">Benefactores</a>
        </li>
		<li class="nav-item">
            <a href="{{ route('admin.solicitudes.index') }}" class="nav-link">Solicitudes</a>
        </li>
    </ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->