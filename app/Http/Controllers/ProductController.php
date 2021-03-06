<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $product = Product::all();
        return view('products.index')->with('product', $product)
                                    ->with('image', ProductImage::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
                                        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title'=> 'required|max:200',
        'sku'=> 'required',
        'price'=> 'required',
        'stock'=> 'required',
        'description'=> 'required',
      ]);
      $product = Product::create([
        'title'=> $request->title,
        'sku'=> $request->sku, 
        'price'=> $request->price, 
        'stock'=> $request->stock, 
        'description'=> $request->description,
      ]);

      if($request->image) {
          $image_new_name = time().'-'.$image->getClientOriginalName();
          $image->move('upload/product/',$image_new_name);
          $product_image = new ProductImage;
          $product_image->product_id = $product->id;
          $product_image->image = $image_new_name;
          $product_image->save();
       }
    //    dd($product);
      return back();
  }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::findOrFail($id);
        return view('products.edit')->with('product', $product)
                                    ->with('image', ProductImage::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
     $product = Product::findOrFail($id);

     $product->fill([
       'title'=> $request->title,
       'description'=> $request->description,
       'price'=> $request->price,
       'sku'=> $request->sku,
       'stock'=> $request->stock,
       'description'=> $request->description,
     ])->save();

    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
