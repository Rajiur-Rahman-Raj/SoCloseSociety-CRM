
    @php
        $users_permission = json_decode(Auth::user()->permission);
        $role_id = Auth::user()->role_id;
    @endphp

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text active"><i
    class="fa-solid fa-house me-2"></i> Dashboard <span class="badge ms-3">2</span></a>

    @foreach ($users_permission as $item)
        @php
            $navigation_data = App\Models\Navigation::find($item);
        @endphp
        <a href="{{ route($navigation_data->route.'.index') }}"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold">{!! $navigation_data->icon !!} {{ $navigation_data->name }}
        </a>
    @endforeach

    @if ($role_id == 1)
        <a href="{{ route('navigation.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-user me-2"></i>Create Navigation</a>
    @endif






