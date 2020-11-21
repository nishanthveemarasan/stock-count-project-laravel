<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getItem = $code->getSellHistory();
    
    //history_sell_item.blade.php
?>
@extends('master')

@section('title' , 'Sell History')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>VIEW ALL SELL HISTORY</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Sell</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View History</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
            <div class="pd-20">
                <h4 class="text-blue h4">Chairs/Cushions</h4>
            </div>
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">#</th>
                            <th>Order Number</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Sell Date</th>
                            <th>Sell Type</th>
                            <th>Packed By</th>
                            <th>Remark</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($getItem as $sell)
                            <tr>
                                <td class="table-plus">{{ $i}}</td>
                                <td>{{ $sell->order_number}}</td>
                                <td>{{ $sell->itemname}}</td>
                                <td>{{ $sell->sellcount}}</td>
                                <td>{{ $sell->created_at}}</td>
                                <td>@if($sell->sell_type == 'received') <span class="badge badge-warning">Received</span> 
                                    @elseif($sell->sell_type == 'packed') <span class="badge badge-danger">Ready to Sent</span> 
                                    @else <span class="badge badge-success">Sent</span>
                                    @endif</td>
                                <td>@if(!empty($sell->packed_by))
                                    @php 
                                        $user = implode(',' , json_decode($sell->packed_by));
                                    @endphp
                                    {{$user}}
                                    @endif</td>
                                <td>{{ $sell->note}}</td>
                                <td>
                                    <a href='{{ url('/update_sell_item' , ['id' => Crypt::encryptString($sell->id)])}}' title="View details" class="btn btn-sm btn-success ">
                                        Adjust</i>
                                    </a>
                                    <a  href='{{ url('/delete_sell_item' , ['id' => $code->encrypt($sell->id)])}}' title="Edit details" class="btn btn-sm btn-danger">
                                        Cancel</i>
                                    </a>
                                </td>
                                
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                        
                        
                    </tbody>
                </table>
        </div> 
        
        </div>
    </div>
    
@endsection


