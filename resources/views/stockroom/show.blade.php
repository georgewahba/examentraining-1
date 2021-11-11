@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>All stockrooms</h1>
        </div>
        <div>
            @foreach ( $stockrooms as $stockroom )
                <a class="btn btn-primary" style="margin: 2px"href="/stockroom/show/{{ $stockroom->id }}">{{ $stockroom->name }}</a>
                <br>
            @endforeach
            <a href="/stockroom/create" class="btn btn-danger">Add Stockroom</a>
        </div>
    </div>
@endsection