@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Database all elements</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>element img</th>
                                <th>element name</th>
                                <th>element type</th>
                                <th>element lore</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($element as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->elementimg }}</td>
                                    <td>{{ $item->elementname }}</td>
                                    <td>{{ $item->elementtype }}</td>
                                    <td>{{ $item->elementlore }}</td>
                                    <td>
                                        <a href="{{ url('edit-elements/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete-elements/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
