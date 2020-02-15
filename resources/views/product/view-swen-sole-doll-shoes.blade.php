@extends('layouts.master-admin')

@section('title') Swen Sole Doll Shoes @endsection

@section('content')
@if (count($ssd) == 0)
<h1>No Swen Sole Doll Shoes Products</h1>
@else

<h1>Swen Sole Doll Shoes Products</h1>

            {{-- Half Inch --}}
            <div class="container">
                <div class="tab-content">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <div class="row">
                            @foreach ($ssd as $ss)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-wrapper mb-45">
                                    <div class="product-img">
                                        <a>
                                            <img src="/images/{{ $ss->photo_name }}" alt="">
                                        </a>
                                        @if ($ss->ribbon_tag != null)
                                        <span> {{$ss->ribbon_tag}} </span>
                                        @endif
                                    </div>
                                    <div class="product-content text-center">
                                        <a href="{{ route('admin.edit-product', $ss->uid) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <h4><a data-toggle="modal" data-target="#exampleModal" href="#">
                                                {{ucwords($ss->name)}} </a></h4> 
                                                <h5 class="p-0 m-0"> {{$ss->code}} </h5>
                                        <h4 class="text-muted">Size: <span> {{$ss->size}} @if ($ss->stock != 0) /
                                            </span> Stock: <span> {{$ss->stock}}</span>@endif</h4>
                                        <!-- <div class="product-rating">
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                        </div> -->
                                        <div class="product-price">
                                            @if ($ss->old_price != null)
                                            <span class="old"> P{{$ss->old_price}} </span>
                                            @endif
                                            <span>P{{$ss->price}}</span>
                                            @if ($ss->stock == 0)
                                            <span class="text-danger">Sold Out</span>
                                            @endif
                                        </div>
                                        @if ($ss->stock != 0)
                                            <a href=" {{route('admin.place-orders',$ss->uid)}} " class="btn btn-success"><span class="text-white">Place Order</span></a>
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