@extends('layouts.app')

@section('content')

    

   
            
           
              
                
                {{-- <h1>Name: {{ $product->productName }}</h1>
                <h4>ID : {{ $product->id }}</h4>
                <div>
                    <p>{{ $product->details}}</p>
                    
                </div>
                
                <p>DETAILS : {{ $product->quantity}}</p>
                <p>PRICE : {{ $product->price }}</p>
                <p>ENTRY : {{ $product->created_at}}</p>
                 --}}
                {{-- <form method="post">
                        @method('delete')
                        @csrf
                        <h3>Are you sure?</h3>
                        <input class="btn btn-primary" type="submit" name="submit" value="Confirm">
                    </form> --}}
                    <form action="{{url('Products', [$product->id])}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_token}}
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                         </form>
              
              
       
    
       

        
                
                
            
        
            
    
    
@endsection