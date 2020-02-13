@extends('layouts.master-admin')

@section('title') Dashboard @endsection

@section('content')
    <h1>Primabelle Dashboard</h1>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Available Items</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"> {{$prod}} </h2>
                        <p class="text-white mb-0">February 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fas fa-boxes fa-2x"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Items Sold</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"> {{$sold_i}}</h2>
                        <p class="text-white mb-0">February 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fas fa-file-invoice-dollar fa-2x"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Resereved Items</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"> {{$res_i}}</h2>
                        <p class="text-white mb-0">February 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fas fa-shopping-cart fa-2x"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-7">
                <div class="card-body">
                    <h3 class="card-title text-white">All Items</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"> {{$all}}</h2>
                        <p class="text-white mb-0">February 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fas fa-chart-pie fa-2x"></i></span>
                </div>
            </div>
        </div>
    </div>
@stop