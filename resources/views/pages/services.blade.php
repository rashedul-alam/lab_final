@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    @if (count($services)>0)
        {{-- <ul class="list-group">
            <li class="list-group-item active">Active item</li>
            <li class="list-group-item">Item</li>
            <li class="list-group-item disabled">Disabled item</li>
        </ul> --}}
            <ul class="list-group">
                @foreach ($services as $service)
                <li class="list-group-item">{{ $service }}</li>
            @endforeach

        </ul>
            
        
    @else
        
    @endif
@endsection