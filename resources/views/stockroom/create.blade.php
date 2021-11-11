@extends('layouts.app')

@section('content')
<div class="container">
     <form action="/stockroom" enctype="multipart/form-data" method="post">
            @csrf
         
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <h5 for="name">name stockroom</h5>

                        <input id="name"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="name"
                            required autocomplete="title" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
         <div class="row">
             <button class="btn btn-primary offset-2" type="submit">Add New Stockroom</button>
         </div>
    </form>
@endsection