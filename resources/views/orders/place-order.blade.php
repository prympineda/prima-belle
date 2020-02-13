@extends('layouts.master-admin')

@section('title') Place Order ({{$item->name}}) @endsection

@section('content')
    <h1>Place Order for {{$item->name}}</h1>
    <h2>Price: {{$item->price}} </h2>
    <h3>Size: {{$item->size}} / Available Stock: {{$item->stock}} </h3>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('admin.checkout-orders', $item->uid) }} " method="post" enctype="multipart/form-data">
                        @csrf      
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Quantity<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="quantity" min="1" max=" {{$item->stock}} " value="{{ old('quantity') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Customer Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" placeholder="Customer Name.." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Customer Address
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Customer Contact Details
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="contact_details" value="{{ old('contact_details') }}" placeholder="Contact Details..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Note
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" name="description" rows="5" placeholder="(Optional/This will not shown in our Website.)">{{ old('description') }}</textarea>
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