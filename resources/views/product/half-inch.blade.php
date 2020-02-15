@extends('layouts.master-admin')

@section('title') Half Inch @endsection

@section('content')
@if (count($half_inch) == 0)
<h1>No Half Inch Heels Products</h1>
@else

<h1>Half Inch Heels Products</h1>

            {{-- Half Inch --}}
            <div class="container">
                <div class="tab-content">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <div class="row">
                            @foreach ($half_inch as $hi)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-wrapper mb-45">
                                    <div class="product-img">
                                        <a>
                                            <img src="/images/{{ $hi->photo_name }}" alt="">
                                        </a>
                                        @if ($hi->ribbon_tag != null)
                                        <span> {{$hi->ribbon_tag}} </span>
                                        @endif
                                    </div>
                                    <div class="product-content text-center">
                                        <a href="{{ route('admin.edit-product', $hi->uid) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <h4><a data-toggle="modal" data-target="#exampleModal" href="#">
                                                {{ucwords($hi->name)}} </a></h4> 
                                                <h5 class="p-0 m-0"> {{$hi->code}} </h5>
                                        <h4 class="text-muted">Size: <span> {{$hi->size}} @if ($hi->stock != 0) /
                                            </span> Stock: <span> {{$hi->stock}}</span>@endif</h4>
                                        <!-- <div class="product-rating">
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                        </div> -->
                                        <div class="product-price">
                                            @if ($hi->old_price != null)
                                            <span class="old"> P{{$hi->old_price}} </span>
                                            @endif
                                            <span>P{{$hi->price}}</span>
                                            @if ($hi->stock == 0)
                                            <span class="text-danger">Sold Out</span>
                                            @endif
                                        </div>
                                        @if ($hi->stock != 0)
                                            <a href=" {{route('admin.place-orders',$hi->uid)}} " class="btn btn-success"><span class="text-white">Place Order</span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


@endif
@stop