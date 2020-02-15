@extends('layouts.master-admin')

@section('title') Mules @endsection

@section('content')
    @if (count($mules) == 0)
    <h1>No Mules Product</h1>
    @else
    <h1>Mules Products</h1>

                {{-- Mules --}}
                <div class="container">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="row">
                                @foreach ($mules as $mule)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="product-wrapper mb-45">
                                        <div class="product-img">
                                            <a>
                                                <img src="/images/{{ $mule->photo_name }}" alt="">
                                            </a>
                                            @if ($mule->ribbon_tag != null)
                                            <span> {{$mule->ribbon_tag}} </span>
                                            @endif
                                        </div>
                                        <div class="product-content text-center">
                                            <a href="{{ route('admin.edit-product', $mule->uid) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                            <h4><a data-toggle="modal" data-target="#exampleModal" href="#">
                                                    {{ucwords($mule->name)}} </a></h4>
                                                    <h5 class="m-0 p-0"> {{$mule->code}} </h5>
                                            <h4 class="text-muted">Size: <span> {{$mule->size}} @if ($mule->stock != 0) /
                                                </span> Stock: <span> {{$mule->stock}}</span>@endif</h4>
                                            <!-- <div class="product-rating">
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                            </div> -->
                                            <div class="product-price">
                                                @if ($mule->old_price != null)
                                                <span class="old"> P{{$mule->old_price}} </span>
                                                @endif
                                                <span>P{{$mule->price}}</span>
                                                @if ($mule->stock == 0)
                                                <span class="text-danger">Sold Out</span>
                                                @endif
                                            </div>
                                            @if ($mule->stock != 0)
                                                <a href=" {{route('admin.place-orders',$mule->uid)}} " class="btn btn-success"><span class="text-white">Place Order</span></a>
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