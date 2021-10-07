@extends ("layouts.app")
@section ('content')
    <div>
        @foreach($element as $item)
            <p>{{ $item->id }}</p>
            <img src="{{ $item->elementimg }}">
            <p>{{ $item->elementname }}</p>
            <p>{{ $item->elementtype }}</p>
            <p>{{ $item->elementlore }}</p>
        @endforeach
    </div>
@endsection
