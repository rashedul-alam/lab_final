@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>
    
     <div class="jumbotron text-center">
        <h1 class="display">If You should not registered , you cant login</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
        </p>
        </p>
        
    
    
    </div>

@endsection

