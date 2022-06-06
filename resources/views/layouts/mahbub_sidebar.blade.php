
    @php
        $loged_in_user_permission = json_decode(Auth::user()->permission);
    @endphp

    @foreach ($loged_in_user_permission as $item)

    @if($item == 0)
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text active"><i
        class="fa-solid fa-house me-2"></i>Dashboard <span class="badge ms-3">2</span></a>
    @endif
    
    @if($item == 3)
        <a href="{{ route('ticket.index') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>Tickets
        </a>
    @endif

    @if($item == 1)
        <a href="{{ route('user_role.index') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>User Role
        </a>
    @endif
    

    @endforeach
