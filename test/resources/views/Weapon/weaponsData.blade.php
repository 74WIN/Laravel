@extends('layouts.app')
@section('head')
{{--    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Database all weapons</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>weapon img</th>
                                <th>weapon name</th>
                                <th>weapon type</th>
                                <th>weapon lore</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($weapon as $weapon)
                                <tr>
                                    <td>{{ $weapon->id }}</td>
                                    <td>  <img src="{{ asset("/storage/weaponImages/".$weapon->weaponimg) }}" width="150px" height="75px"></td>
                                    <td>{{ $weapon->weaponname }}</td>
                                    <td>{{ $weapon->weapontype->name }}</td>
                                    <td><details><summary>Lore</summary>{{ $weapon->weaponlore }}</details></td>
                                    <form id="{{$weapon->id}}" action="{{url('weaponsData/'. $weapon->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <td>
                                            <input type="checkbox"
                                                   id="active-{{$weapon->id}}"
                                                   name="active" class="switch"
                                                   onchange="this.form.submit()"
                                                {{ $weapon->active === 1 ? 'checked' : '' }}>
                                        </td>
                                    </form>
                                    <td>
                                        <a href="{{ url('edit-weapons/'.$weapon->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete-weapons/'.$weapon->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
    </script>
{{--    <script src="{{asset("js/main.js")}}"></script>--}}
@endsection




