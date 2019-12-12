<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'productName' => 'required',
            'details'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'cover_image'=>'image|nullable|max:1999'

        ]);
        //file upload
        if($request -> hasFile('cover_image')){

            //get file name with ext
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension() ;
            //file Name To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //file upload
            $path= $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

        }
        else{
            $fileNameToStore ='noimage.jpg';
        }

        // die($request);
        $product = new product();
        $product->productName = request('productName');
        $product->details = request('details');
        $product->quantity = request('quantity');
        $product->price = request('price');
        $product->user_id = auth()->user()->id; 
        $product->cover_image = $fileNameToStore;

        //die($product);
        $product->save();
    
        
        return redirect()->route('Products.index')->with('success','Product Added');
       
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        return view('products.show')->with('product',$product);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = product::find($id);
        //die($product);
        //checked fof user
        if (Auth()->user()->id !== $product->user_id){
            return redirect('/Products')->with('error','Unauthorized PAGE');

        }

        return view('Products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'productName' => 'required',
            'details'=>'required',
            'quantity'=>'required',
            'price'=>'required'

        ]);
         //file upload
         if($request -> hasFile('cover_image')){

            //get file name with ext
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension() ;
            //file Name To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //file upload
            $path= $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

        }
        

        // die($request);
        $product = product::find($id);;
        $product->productName = request('productName');
        $product->details = request('details');
        $product->quantity = request('quantity');
        $product->price = request('price');
        if($request -> hasFile('cover_image')){
            $product->cover_image =$fileNameToStore;
        }

        //die($product);
        $product->save();
    
        
        return redirect()->route('Products.index')->with('success','Product Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        if (Auth()->user()->id !== $product->user_id){
            return redirect('/Products')->with('error','Unauthorized PAGE');

        }
        if($product->cover_image != 'noimage.jpg'){
            //Delete img
            Storage::delete('public/cover_image/'.$product->cover_image);

        }
        $product -> delete();
        

        return redirect()->route('Products.index')->with('success','Product Deleted');
        
    }
    // public function delete($id)
    // {
    //     $product = product::find($id);
    //     return view('products.delete')->with('product',$product);
        
    // }
}

