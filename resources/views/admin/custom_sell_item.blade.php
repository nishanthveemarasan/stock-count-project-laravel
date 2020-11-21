<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getName = $code->getItemName();
    
    //history_sell_item.blade.php
?>
@extends('master')

@section('title' , 'Track History')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>SELL HISTORY OF AN ITEM</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Sell</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Track History</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <form action="track_history_data" method="POST">
                @csrf @method('post')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right">Item Name</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control @error('item_name') is-invalid @enderror" list="list_of_name" type="text" placeholder="Write the Item Name.." name="item_name">
                        <datalist id="list_of_name">
                            @foreach($getName as $name)
                                <option value="{{$name}}">{{$name}}</option>
                            @endforeach
                        </datalist>
                        @error('item_name')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right">Choose an Option</label>
                    <div class="custom-control custom-radio mb-5 col-md-2">
                        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input @error('customRadio') is-invalid @enderror" value="wholehistory" checked>
                        <label class="custom-control-label" for="customRadio4">Whole History</label>
                        @error('customRadio')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="custom-control custom-radio mb-5 col-md-2">
                        <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input" value="customhistory">
                        <label class="custom-control-label" for="customRadio5">Custom History</label>
                    </div>
                </div>
                <div class="form-group row" id="custom_date_range" style="display: none;">
                    <label class="col-sm-12 col-md-2 col-form-label text-right">Date Range</label>
                    <div class="col-sm-12 col-md-3">
                        <input class="form-control date-picker @error('fromdate') is-invalid @enderror" placeholder="From Date" name="fromdate" type="text">
                        @error('fromdate')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <input class="form-control date-picker @error('todate') is-invalid @enderror" placeholder="To Date" name="todate" type="text">
                        @error('todate')
                        <div class='text-danger'>{{ $message }}</div>
                    @enderror
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
                
            </form>
           @if(isset($trackHistory))
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Order Number</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Sell Date</th>
                            <th>Sell Type</th>
                            <th>Remark</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trackHistory as $item)
                            <tr>
                                <td class="table-plus">{{ $item->order_number}}</td>
                                <td>{{ $item->itemname}}</td>
                                <td>{{ $item->sellcount}}</td>
                                <td>{{ $item->created_at}}</td>
                                <td>@if($item->sell_type == 'book') {{'Reserved'}} @else {{'Sold'}} @endif</td>
                                <td>{{ $item->note}}</td>
                                <td>
                                    <a href='{{ url('/update_sell_item' , ['id' => $code->encrypt($item->id)])}}' title="View details" class="btn btn-sm btn-success ">
                                        Adjust</i>
                                    </a>
                                    <a  href='{{ url('/delete_sell_item' , ['id' => $code->encrypt($item->id)])}}' title="Edit details" class="btn btn-sm btn-danger">
                                        Cancel</i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            @endif
        </div> 
        
        </div>
    </div>
    
@endsection


