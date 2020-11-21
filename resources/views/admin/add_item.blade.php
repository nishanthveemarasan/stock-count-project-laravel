<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    $getCode = $code->getItemCode();
?>
@extends('master')

@section('title' , 'Add Item')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>ADD AN NEW ITEM</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Item</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
            <form action="add_item_data" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Item Type</label>
                    <div class="col-sm-12 col-md-4">
                        <select class="custom-select col-12 @error('item_type') is-invalid @enderror" name="item_type">
                            <option value="">Choose an Item</option>
                            <option value="CH">Chair</option>
                            <option value="CU">Cushion</option>
                        </select>
                        @error('item_type')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Item Name</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control @error('item_name') is-invalid @enderror" type="text" placeholder="Write the Item Name.." name="item_name">
                        @error('item_name')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Item Code</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control @error('item_code') is-invalid @enderror" type="text" list="list_of_code" placeholder="Write the item code..." name="item_code">
                        <datalist id="list_of_code">
                            @foreach($getCode as $code)
                                <option value="{{$code}}">{{$code}}</option>
                            @endforeach
                        </datalist>
                        @error('item_code')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Number</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control @error('number') is-invalid @enderror" placeholder="Give the number of items..." type="number" name="number">
                        @error('number')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection
