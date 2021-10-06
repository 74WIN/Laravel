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
                        <h4>Edit & Update Student
                            <a href="{{ url('elementsData') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-elements/'.$element->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">elementname</label>
                                <input type="text" name="elementname" value="{{$element->elementname}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element type</label>
                                <input type="text" name="elementtype" value="{{$element->elementtype}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element img</label>
                                <input type="text" name="elementimg" value="{{$element->elementimg}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element lore</label>
                                <input type="text" name="elementlore" value="{{$element->elementlore}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Element</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
