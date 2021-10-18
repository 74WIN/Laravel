@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
    <div class="input-group">
        <form class="form-outline" method="GET" action="#">
            <input type="text" name="search" id="form1" class="form-control" value="{{ request('search') }}" />
            <label class="form-label" for="form1">Search</label>
        </form>
        <button type="button" class="btn btn-primary" >
            <i class="fas fa-search"></i>
        </button>
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
