@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
    </div>
    <div id="app">
        
        <div class="row" >
            <form action="{{ route('product.update',['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data" class="col-md-12">
            @csrf
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body" >
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="title"  class="form-control" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Product SKU</label>
                            <input type="text" name="sku" value="{{ $product->sku }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Product Price</label>
                            <input type="text" name="price" value="{{ $product->price }} " class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Product Stock</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="4" class="form-control">{{ $product->description  }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>Select Images</label>
                            <div class="" style="border: .5px solid lightgray; border-radius: 5px; padding: 5px;">
                                <input name="image[]" type="file" class="form-control-file">
                            </div>
                        </div> --}}
                    </div>
                </div>

            
            </div>

            {{-- <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Variants</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Option</label>
                                    <select class="form-control">
                                        <option>1
                                        </option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer" >
                        <button class="btn btn-primary">Add another option</button>
                    </div>

                    <div class="card-header text-uppercase">Preview</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Variant</td>
                                    <td>Price</td>
                                    <td>Stock</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="variant_price in product_variant_prices">
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <button type="submit" class="btn btn-lg btn-primary">Save</button>
       </form>
    </div>
@endsection
