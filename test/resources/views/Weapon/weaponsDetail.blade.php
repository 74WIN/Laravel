@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
            <div class="card col-lg-4" value="{{$weapon->id}}">
                <div class="image-box">
                <img src="{{ asset("/storage/weaponImages/".$weapon->weaponimg) }}" width="500px" height="250   px">
                </div>
                <div class="card-body">
                    <p class="card-title">Weapon name: {{ $weapon->weaponname }}</p>
                    <p class="card-title">Weapon type: {{ $weapon->weapontype->name }}</p>
                    <p class="card-title">Weapon Lore: {{ $weapon->weaponlore }}</p>
                </div>
@endsection
