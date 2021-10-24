@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
    <div class="row height d-flex justify-content-center align-items-center">
        <form class="form-outline" method="GET" action="#">
            @csrf
            <input type="text" name="searchWeapons" id="form1" class="form-control" value="{{ request('searchWeapons') }}"/>
            <label class="form-label" for="form1">Search</label>
        </form>
    </div>
    <div class="row height d-flex justify-content-center align-items-center">
        <form class="form-outline" method="GET" action="#">
            @csrf
            <select type="text" name="filter" id="form1" class="form-control" value="{{ request('filter') }}">
                <option value="">Select Weapon type</option>
                <option value="Auto rifle">Auto rifle</option>
                <option value="Scout rifle">Scout rifle</option>
                <option value="SMG">SMG</option>
                <option value="sniper">Sniper</option>
            </select>
            <label class="form-label" for="form1">filter</label>
        </form>
{{--        <form action="{{ url('filter') }}" method="GET">--}}
{{--            <select name="type_id" id="input">--}}
{{--                <option value="0">Select Price</option>--}}
{{--                @foreach (\App\Models\Weapontype::select('id','weapontype')->get() as $weapontype)--}}
{{--                    <option value="{{ $weapontype->id }}" {{ $weapontype->id == $selected_id['$weapontype_id'] ? 'selected' : '' }}>--}}
{{--                        {{ $weapontype['$weapontype'] }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <input type="submit" class="btn btn-danger btn-sm" value="Filter">--}}
{{--        </form>--}}
        <a class="btn btn-primary" href="#" role="button">Link</a>
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
