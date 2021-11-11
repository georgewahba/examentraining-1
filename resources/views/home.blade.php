@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" style="margin:5px" href="/stockroom/create" class="pt-2 d-flex">Add Stockroom</a>
                    <a class="btn btn-primary" style="margin:5px" href="/allstockroom" class="pt-2 d-flex">go to all stockrooms</a>
                    <a class="btn btn-primary" style="margin:5px" href="/flower/create" class="pt-2 d-flex">Add Flowers</a>
                    <a class="btn btn-primary" style="margin:5px" href="/allflower" class="pt-2 d-flex">go to all Flowers</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
