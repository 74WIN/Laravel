@extends ("layouts.app")
@section ('content')
    <div>
        @foreach($weapon as $item)
            <p>{{ $item->id }}</p>
            <img src="{{ $item->weaponimg }}">
            <p>{{ $item->weaponname }}</p>
            <p>{{ $item->weapontype }}</p>
            <p>{{ $item->weaponlore }}</p>
        @endforeach
    </div>
@endsection
