@extends("layouts.app")
@section("content")
    <div class="container">
    <div class="card push-top">
        <div class="card-header">
            Add Weapon
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('make-weapons.store') }}">
                @csrf
                <div class="form-group">
                    <label for="weaponname">Name</label>
                    <input type="text" class="form-control" name="weaponname" id="weaponname"/>
                </div>
                <div class="form-group">
                    <label for="weapontype">type</label>
                    <input type="text" class="form-control" name="weapontype" id="weapontype"/>
                </div>
                <div class="form-group">
                    <label for="weaponimg">image</label>
                    <input type="file" class="form-control" name="weaponimg" id="weaponimg"/>
                </div>
                <div class="form-group">
                    <label for="weaponlore">lore</label>
                    <input type="text" class="form-control" name="weaponlore" id="weaponlore"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create User</button>
            </form>
        </div>
    </div>
    </div>
@endsection
