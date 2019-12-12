@extends('layouts.app')

@section('content')
<h1>EDIT Book Details</h1>
<form  method="POST" action="{{ route('Products.update', $product['id']) }}" >
    @method('PUT')
    @csrf
    
    
    <div class="form-group">
            <label for="productName">BookName</label>
            <input class="form-control" type="text" name="productName" value="{{$product['productName']}}" >
        
    </div>
    <div class="form-group">
        <label for="details">details</label>
        <input class="form-control" type="text" name="details" placeholder="Details" value="{{$product['details']}}">

    </div>
    <div class="form-group">
            <label for="quantity">quantity</label>
            <input class="form-control" type="number" name="quantity" value="{{$product['quantity']}}">
        
    </div>
    
    <div class="form-group">
            <label for="price">price</label>
            <input class="form-control" type="number" name="price" value="{{$product['price']}}">
        
    </div>
    {{-- <div class="form-group">
            <label for="price">Image</label>
            
            <input class="form-control" type="file" name="cover_image">
        
    </div> --}}
    <div class="form-group">
           
        <input class="btn btn-outline-primary" type="submit" name="submit" value="Submit" >
        
    </div>


</form>


              



@endsection