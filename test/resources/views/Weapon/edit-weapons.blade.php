<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<style>
    .container {
        max-width: 450px;
    }
    .push-top {
        margin-top: 50px;
    }
</style>
<body>
<div class="container">
    <div class="card push-top">
        <div class="card-header">
            Edit & Update
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('make-weapons.update', $weapon->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="weaponname">Name</label>
                    <input type="text" class="form-control" name="weaponname" value="{{ $student->weaponname }}"/>
                </div>
                <div class="form-group">
                    <label for="weapontype">Type</label>
                    <input type="email" class="form-control" name="weapontype" value="{{ $student->weapontype }}"/>
                </div>
                <div class="form-group">
                    <label for="weaponimg">Phone</label>
                    <input type="tel" class="form-control" name="weaponimg" value="{{ $student->weaponimg }}"/>
                </div>
                <div class="form-group">
                    <label for="weaponlore">Password</label>
                    <input type="text" class="form-control" name="weaponlore" value="{{ $student->weaponlore }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
</body>
</html>


