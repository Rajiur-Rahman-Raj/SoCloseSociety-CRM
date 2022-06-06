    
    
    @php
        $loged_in_user_permission = json_decode(Auth::user()->permission);
    @endphp

    @foreach ($loged_in_user_permission as $item)

        {{-- @if($item == 1)
        <a href="{{ route('user_role.index') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>User Role
        </a>
        @endif --}}


        @if($item == 2)
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Users</a>
        @endif


        @if($item == 4)
            <a href="{{ route('priority.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Priorities</a>
        @endif


    @endforeach
    

    
    