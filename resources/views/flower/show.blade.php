@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>All Flowers</h1>
        </div>
        <div>
            @foreach ( $flowers as $flower )
                <a class="btn btn-primary" style="margin: 2px"href="/flower/show/{{ $flower->id }}">{{ $flower->name }}</a>
                <br>
            @endforeach
            <a href="/flower/create" class="btn btn-danger">add flower</a>
        </div>
    </div>
@endsection