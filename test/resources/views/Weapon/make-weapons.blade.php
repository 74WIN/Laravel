<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>weapons</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Name</td>
                <td>Type</td>
                <td>image</td>
                <td>Lore</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($weapon as $weapons)
                <tr>
                    <td>{{$weapons->id}}</td>
                    <td>{{$weapons->weaponname}}</td>
                    <td>{{$weapons->weapontype}}</td>
                    <td>{{$weapons->weaponimg}}</td>
                    <td>{{$weapons->weaponlore}}</td>
                    <td class="text-center">
                        <a href="{{ route('make-weapons.edit', $weapons->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('make-weapon.destroy', $weapons->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
</body>
</html>
