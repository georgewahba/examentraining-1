@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Flower: {{$flower->name}}</h1>
        </div>
        <div>
            <img src="{{asset('storage/' . $flower->image) }}""></img>
        </div>
        <div>
            <a class="btn btn-primary" href="/flower/edit/{{$flower->id}}">Edit flower</a>
        </div>
        <div>
            <form action="/flower/destroy/{{$flower->id}}" method="post">
            @csrf
                <input class="btn btn-primary" type="submit" name="delete" value="Delete flower">
            </form>
        </div>
        <div>
        <table class="table table-striped">
            <tr>
                <th>stockroom name</th>
                <th>amount</th>
            </tr>
            @foreach ($stockrooms as $stockroom)
            <tr>
                <th>{{$stockroom->name}}</th>
                <th>{{$stockroom->aantal}}</th>
            <tr>
            @endforeach
            <tr>
                <th>totaal</th>
                <th>{{$total_flowers}}</th>
            </tr>
        </table>
        @if ($total_flowers == 0)
            <h1 style="color:red;">GEEN MAGAZIJN HEEFT DEZE BLOEM MEER<h1>
        @endif
        </div>
    </div>
@endsection