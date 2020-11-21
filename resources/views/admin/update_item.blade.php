<?php
    namespace App\classes;
    use App\classes\functionClass;
  

    $code = new functionClass();
    $get_id = request('id');
   
    $get_item = $code -> getId($get_id);
?>
@extends('master')

@section('title' , 'Update Item')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>UPDATE AN ITEM</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/view_item')}}">View Item</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Item</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @if(isset($_GET['err']))
                 @if($_GET['err'] == 'success')
                    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
                    <strong>{{$_GET['item']}}</strong> {{$_GET['msg']}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @else
                <div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
                   {{$_GET['msg']}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            @endif
            
            <form action="{{ url('update_item_data')}}" method="post">
                @csrf @method('post')
            <input class="form-control" type="hidden" name="update_item_id" value="{{$get_id}}">
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
                        <input class="form-control" value="{{$get_item->count}}" placeholder="Give the number of items..." type="number" name="number">
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection
