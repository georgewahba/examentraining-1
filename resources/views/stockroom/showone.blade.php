@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Stockroom {{$stockroom->name}}</h1>
        </div>
        <div>
            <a class="btn btn-primary" href="/stockroom/edit/{{$stockroom->id}}">Edit stockroom name</a>
        </div>
        <div>
            <form action="/stockroom/destroy/{{$stockroom->id}}" method="post">
            @csrf
                <input class="btn btn-primary" type="submit" name="delete" value="Delete stockroom">
            </form>
        </div>
        <div>
            <a class="btn btn-primary" href="/stockroomflowers/create/{{$stockroom->id}}">Add flowers to this stockroom</a>
        </div>
        <div>
        <table class="table table-striped">
            <tr>
                <th>flower name</th>
                <th>amount</th>
                <th>edit</th>
            </tr>
            @foreach ($flowers as $flower)
            <tr>
                <th>{{$flower->name}}</th>
                <th>{{$flower->aantal}}</th>
                <th><a href = "/stockroomflowers/edit/{{$flower->id}}">edit amount</a></th>
            <tr>
            @endforeach
            <tr>
                <th>totaal</th>
                <th>{{$total_flowers}}</th>
                <th></th>
            </tr>
        </table>
        </div>
    </div>
@endsection