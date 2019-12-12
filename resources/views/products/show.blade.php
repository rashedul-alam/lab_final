@extends('layouts.app')

@section('content')
<div class="well">
    <div class="row">
        <div  class="Col-md-4 Col-sm-4">
        {{-- <img style="width: 95%" src="/storage/cover_image/{{ $product->cover_image }}"> --}}

        </div>
        <div class="Col-md-8 Col-sm-8">
                <h1>{{ $product->productName }}</h1>
                <h4>ID : {{ $product->id }}</h4>
                <div>
                    <p>Details</p>
                    <p>{{ $product->details}}</p>
                    
                </div>
                
                <p>Quantity : {{ $product->quantity}}</p>
                <p>PRICE : {{ $product->price }}</p>
                <p>ENTRY :  <br>By: {{ $product->user->name }} <br> At: {{ $product->created_at}}</p>
                <hr>
                @if (!Auth::guest())
                @if (Auth::user()->id == $product->user_id)
                    <div>
                    <p><a href="/Products/{{$product->id}}/edit" class="btn btn-secondary">Edit</a></p>

                <form  action="{{ route('Products.destroy', $product['id']) }}"  method="POST" class="pull-right">
                    {{method_field('DELETE')}}
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                 </form>
                </div>
                @endif
                
                @endif
            
        </div>


    </div>
    

</div>

    

   
            
           
              
                
                
                
              
              
       
    
       

        
                
                
            
        
            
    
    
@endsection