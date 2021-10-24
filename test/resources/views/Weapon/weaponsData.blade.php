@extends('layouts.app')

@section('content')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
                                <th>weapon name</th>
                                <th>weapon type</th>
                                <th>weapon lore</th>
                                <th>weapon img</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($weapon as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->weaponname }}</td>
                                    <td>{{ $item->weapontype->name }}</td>
                                    <td><details><summary>Lore</summary>{{ $item->weaponlore }}</details></td>
                                    <td>{{ $item->weaponimg }}</td>
                                    <td>
                                        <input type="checkbox" checked data-toggle="toggle">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-weapons/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete-weapons/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
