@extends('layouts.master-admin')

@section('title') Add Product @endsection

@section('content')
    <h1>Add Product</h1>

 

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   
                    <form action=" {{ route('admin.store-product') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Shoes Category <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="sc_id">
                                    <option value="">Please select</option>
                                    @foreach ($shoe_cats as $sc)
                                    <option value=" {{ $sc->id }} ">{{ ucwords($sc->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Upload Image <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Product Code <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="code" placeholder="Enter a product code.." value="{{ old('code') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Product Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Product Name.." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Size<span class="text-danger">*</span> </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" value="{{ old('size') }}"  name="size" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Price<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" value="{{ old('price') }}"  name="price" placeholder="PHP" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Old Price </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="old_price" value="{{ old('old_price') }}"  placeholder="PHP (optional)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Stock <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="stock" placeholder="How many are they?" value="{{ old('stock') }}"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Ribbon Tag </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="ribbon_tag" placeholder="eg '30%', 'Best Seller' (optional)" value="{{ old('ribbon_tag') }}" >
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