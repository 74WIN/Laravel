@extends ("layouts.app")
@section ('content')
    <div>
        <input placeholder="Search" name="search" type="text" value="" id="search">
        <label class="hide-text" for="search">Search on words</label>
    </div>
    <div class="container-sm">
        @foreach($weapon as $item)
            <img src="{{ $item->weaponimg }}">
            <p>weapon name: {{ $item->weaponname }}</p>
            <p>weapon type: {{ $item->weapontype }}</p>
            <p>weapon lore: {{ $item->weaponlore }}</p>
        @endforeach
    </div>
@endsection
