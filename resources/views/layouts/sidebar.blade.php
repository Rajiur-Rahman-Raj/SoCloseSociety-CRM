

<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center primary-text me-auto fw-bold text-uppercase">
        <a style="text-decoration: none;" href="index.html">LOGO</a>
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fa-solid fa-house me-2"></i>Dashboard <span class="badge ms-3">2</span></a>

        <a href="{{ route('ticket') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-ticket me-2"></i>Tickets</a>


        <a href="{{ route('team') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fa-solid fa-users me-2"></i>Team</a>

        <a href="{{ route('user') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fa-solid fa-user me-2"></i>User</a>
        <a href="{{ route('settings') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fa-solid fa-gear me-2"></i>Settings</a>

        @include('layouts.raju_sidebar')

        @include('layouts.mahbub_sidebar')

        @include('layouts.tareq_sidebar')

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();"><i
                class="fas fa-power-off me-2"></i>Logout</a>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->
