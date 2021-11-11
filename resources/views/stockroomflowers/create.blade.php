@extends('layouts.app')

@section('content')
<div class="container">
     <form action="/stockroomflowers" enctype="multipart/form-data" method="post">
            @csrf
         
            <div class="row">
                <div class="col-8 offset-2">
                    <h3 >stockroom {{$stockroom->name}}</h3><br>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Flower:</label>
                    </div>
                    <div>
                        <select class="form-select" id="flowers" name="flower_id ">
                        @foreach ($flowers as $flower)
                            <option name="flower_id" value="{{$flower->id}}">{{$flower->name}}</option>
                        @endforeach
                        </select>
                        <input type="hidden" name="stockroom_id" value ="{{$stockroom->id}}">
                    </div>
                    <div>
                        <label for="name" class="col-md-4 col-form-label">Amout of this flower</label>
                        <input name="aantal" type="number" min="0" class="form-control">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
         <div class="row">
             <button class="btn btn-primary offset-2" type="submit">Add Flower to Stockroom</button>
         </div>
    </form>
@endsection