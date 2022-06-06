    
    
    @php
        $loged_in_user_role_id = Auth::user()->role_id;
        $user_role_id = App\Models\UserRole::find($loged_in_user_role_id)->id;
        $user_role_permission = App\Models\UserRole::find($loged_in_user_role_id)->permission;
    @endphp

    {{-- @if ($loged_in_user_role_id == $user_role_id && $user_role_permission == 1)
            <span>Access all</span>
        @else
        <a href="{{ route('priority.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Priorities {{ $loged_in_user_role_id }}</a>
    @endif

    @if ($loged_in_user_role_id == $user_role_id && $user_role_permission == 2)
            <span>only access agent data</span>
        @else
        <a href="{{ route('priority.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Priorities {{ $loged_in_user_role_id }}</a>
    @endif

    @if ($loged_in_user_role_id == $user_role_id && $user_role_permission == 3)
            <span>only create ticket</span>
        @else
        <a href="{{ route('priority.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Priorities {{ $loged_in_user_role_id }}</a>
    @endif --}}

    
    <a href="{{ route('priority.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-user me-2"></i>Priorities</a>
    <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
    class="fa-solid fa-user me-2"></i>Users</a>