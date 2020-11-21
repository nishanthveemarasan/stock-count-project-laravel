<?php
    namespace App\classes;
    use App\classes\functionClass;
    $code = new functionClass();
    $getCode = $code->getItemCode();

    $get_id = request('id');
    
    
    $get_item = $code -> getId($get_id);
?>
@extends('master')

@section('title' , 'Delete Item')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>UPDATE AN NEW ITEM</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="index.html">View Item</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delete Item</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
           
            
            <form action="{{ url('delete_item_data')}}" method="post">
                @csrf @method('post')
            <input class="form-control" type="hidden" name="delete_item_id" value="{{$get_id}}">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right">Item Name</label>
                    <div class="col-sm-12 col-md-4">
                    <input class="form-control" type="text" readonly="" value="{{$get_item->itemname}}" placeholder="Write the Item Name.." name="item_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right">Item Code</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control" readonly="" value="{{$get_item->itemcode}}" type="text" placeholder="Write the item code..." name="item_code">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right">Number</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control" readonly="" value="{{$get_item->count}}" placeholder="Give the number of items..." type="number" name="number">
                       
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
