@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
    <div class="input-group row height d-flex justify-content-center align-items-center">
        <form class="form-outline" method="GET" action="#">
            @csrf
            <input type="text" name="searchWeapons" id="form1" class="form-control" value="{{ request('searchWeapons') }}"/>
            <select type="text"  name="filter" id="form1" class="form-control">
                <option value="">Select Weapon Type</option>
                @foreach($weapontypes as $weapontype)
                    <option value="{{$weapontype->id}}">{{$weapontype->name}}</option>
                @endforeach()
            </select>
            <button type="submit" class="btn btn-primary align-items-center ">Search</button>
        </form>
    </div>
    <div class="row">
        @foreach($weapon as $weapon)
        <div class="card col-lg-4">
            <div class="image-box">
            <img class="" src="{{ asset("/storage/weaponImages/".$weapon->weaponimg) }}" alt="" height="300px">
            </div>
            <div class="card-body">
                <p class="card-title">Weapon name: {{ $weapon->weaponname }}</p>
                <p class="card-title">Weapon type: {{ $weapon->weapontype->name }}</p>
                <details class="card-text">
                    <summary>Weapon Lore</summary>
                    {{ $weapon->weaponlore }}
                </details>
            </div>
        </div>
        @endforeach
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
