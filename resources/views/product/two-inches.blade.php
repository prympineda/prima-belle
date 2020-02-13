@extends('layouts.master-admin')

@section('title') Two Inches @endsection

@section('content')
@if (count($two_inches) == 0)
<h1>No Two Inches Heels Products</h1>
@else

<h1>Half Inch Heels Products</h1>

            {{-- Half Inch --}}
            <div class="container">
                <div class="tab-content">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <div class="row">
                            @foreach ($two_inches as $ti)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-wrapper mb-45">
                                    <div class="product-img">
                                        <a>
                                            <img src="/images/{{ $ti->photo_name }}" alt="">
                                        </a>
                                        @if ($ti->ribbon_tag != null)
                                        <span> {{$ti->ribbon_tag}} </span>
                                        @endif
                                    </div>
                                    <div class="product-content text-center">
                                        <a href="{{ route('admin.edit-product', $ti->uid) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="JavaScript:Void(0);" data-toggle="tooltip" data-placement="top" title=" {{$ti->description}} "><i class="far fa-comment-alt"></i></a>
                                        <h4><a data-toggle="modal" data-target="#exampleModal" href="#">
                                                {{ucwords($ti->name)}} </a></h4> 

                                        <h4 class="text-muted">Size: <span> {{$ti->size}} @if ($ti->stock != 0) /
                                            </span> Stock: <span> {{$ti->stock}}</span>@endif</h4>
                                        <!-- <div class="product-rating">
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                            <i class="ion-ios-star-outline"></i>
                                        </div> -->
                                        <div class="product-price">
                                            @if ($ti->old_price != null)
                                            <span class="old"> P{{$ti->old_price}} </span>
                                            @endif
                                            <span>P{{$ti->price}}</span>
                                            @if ($ti->stock == 0)
                                            <span class="text-danger">Sold Out</span>
                                            @endif
                                        </div>
                                        @if ($ti->stock != 0)
                                            <a href=" {{route('admin.place-orders',$ti->uid)}} " class="btn btn-success"><span class="text-white">Place Order</span></a>
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