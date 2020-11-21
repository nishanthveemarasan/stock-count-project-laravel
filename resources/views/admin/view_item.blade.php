<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    $items = new IndexController;
    $getChairs = $items->chairs();
    $getCushions = $items->cushions();

    $code = new functionClass();
    $getCode = $code->getItemCode();
?>
@extends('master')

@section('title' , 'View All Item')

@section('loader')
    @include('sidebar.loader')
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>VIEW ALL ITEMS</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Item</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
            <div class="pd-20">
                <h4 class="text-blue h4">Chairs</h4>
            </div>
                <table class="data-table table hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Item Name</th>
                            <th>Item Code</th>
                            <th>Last Updated</th>
                            <th>Current Stock</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getChairs as $chair)
                            <tr>
                                <td class="table-plus">{{ $chair->itemname}}</td>
                                <td>{{ $chair->itemcode}}</td>
                                <td>{{ $chair->updated_at}}</td>
                                <td>{{ $chair->count}}</td>
                                <td>
                                <a href='{{ url('/update_item' , ['id' => Crypt::encryptString($chair->id)])}}' title="View details" class="btn btn-sm btn-success ">
                                        Update</i>
                                    </a>
                                    <a href="{{ url('/delete_item' , ['id' => Crypt::encryptString($chair->id)])}}" title="Edit details" class="btn btn-sm btn-danger">
                                        Delete</i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
        </div> 
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
            <div class="pd-20">
                <h4 class="text-blue h4">Cushions</h4>
            </div>
                <table class="data-table table hover multiple-select-row nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Item Name</th>
                            <th>Item Code</th>
                            <th>Last Updated</th>
                            <th>Current Stock</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getCushions as $cushion)
                            <tr>
                                <td class="table-plus">{{ $cushion->itemname}}</td>
                                <td>{{ $cushion->itemcode}}</td>
                                <td>{{ $cushion->updated_at}}</td>
                                <td>{{ $cushion->count}}</td>
                                <td>
                                    <a href='{{ url('/update_item' , ['id' => Crypt::encryptString($cushion->id)])}}' title="View details" class="btn btn-sm btn-success ">
                                            Update</i>
                                    </a>
                                    <a href="{{ url('/delete_item' , ['id' => Crypt::encryptString($cushion->id)])}}" title="Edit details" class="btn btn-sm btn-danger">
                                        Delete</i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
        </div>    
           
        </div>
    </div>
    
@endsection


