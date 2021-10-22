@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Weapon</h4>
                        <a href="{{ url('weaponsData') }}" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('make-weapons') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                <label for="">Weapon Name</label>
                                <input type="text" name="weaponname" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Weapon type</label>
                                <select type="text" name="weapontype" id="form1" class="form-control">
                                    <option value="">Select Weapon type</option>
                                    <option value="Auto rifle">Auto rifle</option>
                                    <option value="Scout rifle">Scout rifle</option>
                                    <option value="SMG">SMG</option>
                                    <option value="Sniper">Sniper</option>
                                    <option value="Pistol">Pistol</option>
                                    <option value="Shotgun">Shotgun</option>
                                    <option value="LMG">LMG</option>
                                    <option value="Bow">Bow</option>
                                    <option value="Rocket Launcher">Rocket Launcher</option>
                                    <option value="Grenade">Grenade</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Weapon image</label>
                                <input type="file" name="weaponimg" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Weapon lore</label>
                                <input type="text" name="weaponlore" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Weapon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
