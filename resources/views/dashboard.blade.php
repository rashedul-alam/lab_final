@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($products)>0)
                        
                    <h3>Your inserted Books</h3>
                    <table class="table table-striped">
                        <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">DETAILS</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ENTRY</th>
                                <th scope="col">ACTION</th>


                        </tr>
                        @foreach ($products as $product)
            
                        <tbody>
                        
                            <td scope="row">{{ $product->id }}</td>
                            <td>{{ $product->productName }}</td>
                            <td>{{ $product->details}}</td>
                            <td>{{ $product->quantity}}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at}}</td>
                            <td><a href="{{ route('Products.show', $product->id) }}">SHOW</a></td>
                            

                            {{-- <a href="{{ route('Products.show', $product->id) }}"> Show </a> | 
                                    <a href="{{ route('Products.destroy', $product->id) }}"> DELETE </a> --}}
                        
                        </tbody>
                        
                        </tbody>
                        @endforeach

                    </table>
                    
                        
                    @else
                    <h3>Your added products list EMPTY.</h3>
                    <a class="btn btn-primary" href="/Products/create">Add Product</a>
                        
                    @endif
                        
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
