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
                            <a href="{{ url('elementsData') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-elements/'.$element->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="">element name</label>
                                <input type="text" name="elementname" value="{{$element->elementname}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element type</label>
                                <select type="text" name="elementtype" id="form1" class="form-control">
                                    <option value="">Select Weapon Type</option>
                                    @foreach($elementtypes as $elementtype)
                                        <option value="{{$elementtype->id}}">{{$elementtype->name}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element image</label>
                                <input type="file" name="elementimg" value="{{$element->elementimg}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element lore</label>
                                <input type="text" name="elementlore" value="{{$element->elementlore}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update element</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
