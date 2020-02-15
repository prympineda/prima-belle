@extends('layouts.master-admin')

@section('title') Doll Shoes @endsection

@section('content')
    @if (count($doll_shoes) == 0)
    <h1>No Doll Shoes Product</h1>
    @else
    <h1>Doll Shoes Products</h1>

                {{-- Doll Shoes --}}
                <div class="container">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="row">
                                @foreach ($doll_shoes as $doll_shoe)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="product-wrapper mb-45">
                                        <div class="product-img">
                                            <a>
                                                <img src="/images/{{ $doll_shoe->photo_name }}" alt="">
                                            </a>
                                            @if ($doll_shoe->ribbon_tag != null)
                                            <span> {{$doll_shoe->ribbon_tag}} </span>
                                            @endif
                                        </div>
                                        <div class="product-content text-center">
                                            <a href="{{ route('admin.edit-product', $doll_shoe->uid) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                            <h4><a data-toggle="modal" data-target="#exampleModal" href="#">
                                                    {{ucwords($doll_shoe->name)}} </a></h4> 
                                                    <h5 class="p-0 m-0"> {{$doll_shoe->code}} </h5>

                                            <h4 class="text-muted">Size: <span> {{$doll_shoe->size}} @if ($doll_shoe->stock != 0) /
                                                </span> Stock: <span> {{$doll_shoe->stock}}</span>@endif</h4>
                                            <!-- <div class="product-rating">
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                            </div> -->
                                            <div class="product-price">
                                                @if ($doll_shoe->old_price != null)
                                                <span class="old"> P{{$doll_shoe->old_price}} </span>
                                                @endif
                                                <span>P{{$doll_shoe->price}}</span>
                                                @if ($doll_shoe->stock == 0)
                                                <span class="text-danger">Sold Out</span>
                                                @endif
                                            </div>
                                            @if ($doll_shoe->stock != 0)
                                                <a href=" {{route('admin.place-orders',$doll_shoe->uid)}} " class="btn btn-success"><span class="text-white">Place Order</span></a>
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