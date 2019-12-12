@extends('layouts.app')

@section('content')
<h1>ADD BOOK</h1>
<form  method="POST" action="/Products" enctype="multipart/form-data" >
    @csrf
    
    <div class="form-group">
            <label for="productName">Book Name</label>
            <input class="form-control" type="text" name="productName" >
        
    </div>
    <div class="form-group">
        <label for="details">details</label>
        <input class="form-control" type="text" name="details" placeholder="Details">

    </div>
    <div class="form-group">
            <label for="quantity">quantity</label>
            <input class="form-control" type="number" name="quantity" >
        
    </div>
    
    <div class="form-group">
            <label for="price">price</label>
            <input class="form-control-file" type="number" name="price" >
        
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