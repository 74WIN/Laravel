@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="input-group row height d-flex justify-content-center align-items-center">
    </div>
    <div class="row">
        @if($weapon->user()->find(auth()->id()))
        @foreach($favorites as $favorite)
            <div class="card col-lg-4">
                <div class="image-box">
                <img src="{{ asset("/storage/weaponImages/".$favorite->weapon->weaponimg) }}" width="300px" height="150px">
                </div>
                <div class="card-body">
                    <p class="card-title">Weapon name: {{ $favorite->weapon->weaponname }}</p>
                    <p class="card-title">Weapon type: {{ $favorite->weapon->weapontype->name }}</p>
                    <details class="card-text">
                        <summary>Weapon Lore</summary>
                        {{ $favorite->weapon->weaponlore }}
                    </details>
                </div>
            </div>
        @endforeach
            @endif
    </div>
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center align ">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
@endsection
