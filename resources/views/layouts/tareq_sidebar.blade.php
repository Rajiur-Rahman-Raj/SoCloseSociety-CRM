    @php
        $loged_in_user_permission = json_decode(Auth::user()->permission);
    @endphp

    @foreach ($loged_in_user_permission as $item)
    
    @if($item == 5)
        <a href="{{ route('status.index') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>Status</a>
    @endif

    @if($item == 6)
        <a href="{{ route('department.index') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>Department</a>
    @endif

    @endforeach
