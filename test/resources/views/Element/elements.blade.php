@extends ("layouts.app")
@section ('content')
    <head>
        <link rel="stylesheet" href="public/css/app.css">
    </head>
    <div class="row height d-flex justify-content-center align-items-center">
        <form class="form-outline" method="GET" action="#">
            @csrf
            <input type="text" name="searchElements" id="form1" class="form-control" value="{{ request('searchElements') }}"/>
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
    </div>
    <div class="row">
        @foreach($element as $item)
            <div class="card col-lg-4">
                {{--            <div class="image-box">--}}
                <img class="" src="{{ asset("/storage/weaponImages/".$item->elementimg) }}" alt="" height="300px">
                {{--            </div>--}}
                <div class="card-body">
                    <p class="card-title">Element name: {{ $item->elementname }}</p>
                    <p class="card-title">Element type: {{ $item->elementtype }}</p>
                    <details class="card-text">
                        <summary>Element Lore</summary>
                        {{ $item->elementlore }}
                    </details>
                </div>
            </div>
        @endforeach
    </div>
@endsection
