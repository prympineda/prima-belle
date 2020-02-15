@extends('layouts.master-admin')

@section('title') All Products @endsection

@section('custom-css')
<link href="{{ asset('dashboard/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (count($all_products) == 0)
        <h1>No Products</h1>
        <a href=" {{ route('admin.add-proucts')}} "></a>
    @else
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>All Products</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Old Price</th>
                                    <th>Stocks</th>
                                    <th>Ribbon Tag</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_products as $product)
                                <tr class="text-center">
                                    <td class="text-center"> <img src="/images/{{$product->photo_name}}" height="150" width="150" alt=""> </td>
                                    <td> {{ ucwords($product->name) }} </td>
                                    <td>{{ $product->code }}</td>
                                    <th> {{ $product->size }} </th>
                                    <td> {{ $product->price }} </td>
                                    <td> {{ $product->old_price }} </td>
                                    <td> {{ $product->stock }} </td>
                                    <td> {{ $product->ribbon_tag ?: '...'}} </td>
                                    <td> {{ ($product->updated_at)}} </td>
                                    <td> <a href=" {{ route('admin.edit-product', $product->uid) }} " class="btn btn-primary btn-edit" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endif
@stop



@section('custom-js')

<script src="{{ asset('dashboard/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>


@endsection