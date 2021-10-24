@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Weapon
                            <a href="{{ url('weaponsData') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-weapons/'.$weapon->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group mb-3">
                                <label for="">weapon name</label>
                                <input type="text" name="weaponname" value="{{$weapon->weaponname}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">weapon type</label>
                                <select type="text" name="weapontype" id="form1" class="form-control">
                                    @foreach($weapontypes as $weapontype)
                                        <option value="{{$weapontype->id}}">{{$weapontype->name}}</option>
                                @endforeach()
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">weapon image</label>
                                <input type="file" name="weaponimg" value="{{$weapon->weaponimg}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">weapon lore</label>
                                <input type="text" name="weaponlore" value="{{$weapon->weaponlore}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update weapon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
