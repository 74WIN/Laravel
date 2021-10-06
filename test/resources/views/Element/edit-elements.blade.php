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
                            <a href="{{ url('Element/make-elements') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-element/'.$element->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">elementname</label>
                                <input type="text" name="name" value="{{$student->elementname}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element type</label>
                                <input type="text" name="email" value="{{$student->elementtype}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element img</label>
                                <input type="text" name="course" value="{{$student->elementimg}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">element lore</label>
                                <input type="text" name="section" value="{{$student->elementlore}}" class="form-control">
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
