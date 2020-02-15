@extends('layouts.master-admin')

@section('title') Edit Product @endsection

@section('content')
    <h1>Edit Product</h1>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   
                    <form action=" {{ route('admin.update-product', $product->uid) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Shoes Category <span class="text-danger">*</span> </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="sc_id">
                                    <option value="">Please select</option>
                                    @foreach ($shoe_cats as $sc)
                                    <option value="{{ $sc->id }}" {{ $sc->id == $product->sc_id ? 'selected' : '' }}>{{ $sc->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Upload Image <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo_name" value="{{ $product->photo_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Product Code <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="code" placeholder="Enter a product code.." value="{{ $product->code }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Product Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Product Name.." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Size<span class="text-danger">*</span> </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" value="{{ $product->size }}"  name="size" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Price<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" value="{{ $product->price }}"  name="price" placeholder="PHP" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Old Price </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="old_price" value="{{ $product->old_price }}"  placeholder="PHP (optional)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Stock <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="stock" placeholder="How many are they?" value="{{ $product->stock }}"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Ribbon Tag </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="ribbon_tag" placeholder="eg '30%', 'Best Seller' (optional)" value="{{ $product->ribbon_tag }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label"><a href="#">Place on Sales Item (optional)</a>
                                </label>
                                <div class="col-lg-8">
                                    <label class="css-control css-control-primary css-checkbox" >
                                        <input type="checkbox" class="css-control-input" name="is_sale" value="1"> <span class="css-control-indicator"> YES </span></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" value="true" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>


@stop