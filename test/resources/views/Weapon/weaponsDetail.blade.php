@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
        <div class="container-sm ">
            <div class="card " value="{{$weapon->id}}">
                <div class="image-box p-4">
                <img src="{{ asset("/storage/weaponImages/".$weapon->weaponimg) }}" width="500px" height="250   px">
                </div>
                <div class="card-body">
                    <p class="card-title">Name: {{ $weapon->weaponname }}</p>
                    <p class="card-title">Type: {{ $weapon->weapontype->name }}</p>
                    <p class="card-title">Lore: {{ $weapon->weaponlore }}</p>
                    @auth()
                        @if(auth()->user()->role === 'admin')
                    <a href="{{ url('edit-weapons/'.$weapon->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endif
                    @endauth
                </div>
            </div>
@endsection
