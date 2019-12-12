@extends('layouts.app')

@section('content')
<h1>Books</h1>
@if (!Auth::guest())
    <a class="btn btn-primary" href="/Products/create">Add Book</a>
@endif

    @if (count($products)>0)

    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">DETAILS</th>
                <th scope="col">QUANTItY</th>
                <th scope="col">PRICE</th>
                <th scope="col">ENTRY</th>
                <th scope="col">Image</th>
                <th scope="col">ACTION</th>

              </tr>
            </thead>
            @foreach ($products as $product)
            
            <tbody>
              <a  href="/product/{{ $product->id }}">
                <td scope="row">{{ $product->id }}</td>
                <td>{{ $product->productName }}</td>
                <td>{{ $product->details}}</td>
                <td>{{ $product->quantity}}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at}}</td>
                {{-- <td><img style="width: 10%" src="/storage/cover_image/{{ $product->cover_image }}"></td> --}}
                <td><a href="{{ route('Products.show', $product->id) }}">SHOW</a></td>
                

                {{-- <a href="{{ route('Products.show', $product->id) }}"> Show </a> | 
				        <a href="{{ route('Products.destroy', $product->id) }}"> DELETE </a> --}}
              
              </tbody>
              
            </tbody>
            @endforeach
          </table>
    
       

        
                
                
            
        
            
    @else
    <h2>Empty Enventory</h2>
        
    @endif
    
@endsection