@extends ("layouts.app")
@section ('content')
    <div>
        <input placeholder="Search" name="search" type="text" value="" id="search">
        <label class="hide-text" for="search">Search on words</label>
    </div>
    <div class="container-sm">
        @foreach($weapon as $item)
            <div class="image-box">
                <img src="{{ asset("/storage/images/".$item->weaponimg) }}" alt="" height="300px">
            </div>
            <p>weapon name: {{ $item->weaponname }}</p>
            <p>weapon type: {{ $item->weapontype }}</p>
            <p>weapon lore: {{ $item->weaponlore }}</p>
        @endforeach
    </div>
@endsection
