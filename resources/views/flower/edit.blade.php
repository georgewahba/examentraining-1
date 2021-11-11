@extends('layouts.app')

@section('content')
<div class="container">
     <form action="/flower/editname/{{ $flower->id }}" enctype="multipart/form-data" method="post">
            @csrf
         
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Name flower</label>

                        <input id="name"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="name"
                            value="{{$flower->name}}"
                            required autocomplete="title" autofocus>
                        <input id="id" type="hidden" name="id" value ="{{$flower->id}}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Add Image</label>

                    <input id="image"
                            type="file"
                            class="form-control-file"
                            name="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                 </div>

             </div>
         </div>

         <div class="row">
             <button class="btn btn-primary offset-2" type="submit">Edit Flower</button>
         </div>
    </form>
@endsection