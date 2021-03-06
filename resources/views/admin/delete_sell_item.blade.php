<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    
    $get_id = request('id');
    $getDetail = $code->getSellItemDetail($get_id);
    session(['delete_sell_item_id' => $get_id]);
    session(['delete_sell_item_name' => $getDetail->itemname]);
    $get_type = $code::SELL_TYPE;
    
?>
@extends('master')

@section('title' , 'Cancel Order')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>CANCEL AN ORDER</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sell</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{url('/view_history')}}">View History</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cancel an Order</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
            <form action="{{url('delete_sell_item_data')}}" method="POST">
                @csrf @method('post')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Item Name</label>
                    <div class="col-sm-12 col-md-4">
                    <input class="form-control" type="text" readonly="" placeholder="Write the Item Name.." name="item_name" value="{{$getDetail->itemname}}">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Order NUmber</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control " readonly="" type="text" placeholder="Write the Order Number.." name="order_number" value="{{$getDetail->order_number}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Sell Type</label>
                    <div class="col-sm-12 col-md-4">
                        <select class="custom-select col-12 " name="sell_type" disabled="">
                            @foreach($get_type as $key => $value)
                                <option value="{{$key}}" @if($key == $getDetail->sell_type) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Number</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control @error('number') is-invalid @enderror" readonly="" value="{{$getDetail->sellcount}}" placeholder="Give the number of items..." type="number" name="number">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Note</label>
                    <div class="col-sm-12 col-md-4">
                        <textarea class="form-control" value="{{$getDetail->note}}" readonly="" placeholder="Write your Notes here..." name="note"></textarea>
                    
                    </div>
                   
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection
