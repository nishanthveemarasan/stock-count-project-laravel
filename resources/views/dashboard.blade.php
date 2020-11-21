<?php
    namespace App\classes;
    use App\classes\functionClass;
    use Illuminate\Support\Facades\Auth;
    $code = new functionClass();
    
    $userCount = Auth::user()->count();
    $topSell = $code->topSellingItem();
    $resentOrder = $code->resentOrders();
    $totalUsers = $code->allUsers();
    $recentUsers = $code->recentUsers();
    $totalOrders = $code->allOrders();
    $recentOrders = $code->recentOrders();
    $totalProducts = $code->allProducts();
    $recentProducts = $code->recentProducts();
    $totalPosts = $code->allPosts();
    $recentPosts = $code->recentPosts();

        
    
?>

@extends('master')

@section('title' , 'Dashboard')

@section('loader')
    @include('sidebar.loader');
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>WELCOME TO RELAXHOUSE ADMIN PANEL</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
           
            <div class="pd-20">
                <div class="row">
                    <div class="col-xl-3 mb-30">
                        {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12"> --}}
                           
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <h5 class="text-muted">Total Users</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1 text-primary">{{$totalUsers}} </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success">
                                        <i class="fa fa-fw fa-caret-up"></i><span>{{$recentUsers}}</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-2"></div>
                                </div>
                            {{-- </div> --}}
                    </div>
                    <div class="col-xl-3 mb-30">
                        <div class="card">
                            <div class="card-body bg-light">
                                <h5 class="text-muted">Total Orders</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{$totalOrders}} </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success">
                                    <i class="fa fa-fw fa-caret-up"></i><span>{{$recentOrders}}</span>
                                </div>
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 mb-30">
                        <div class="card">
                            <div class="card-body bg-light">
                                <h5 class="text-muted">Total Products</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{$totalProducts}} </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success">
                                <i class="fa fa-fw fa-caret-up"></i><span>{{$recentProducts}}</span>
                                </div>
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 mb-30">
                        <div class="card">
                            <div class="card-body bg-light">
                                <h5 class="text-muted">Total Posts</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">{{$totalPosts}} </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success">
                                    <i class="fa fa-fw fa-caret-up"></i><span>{{$totalPosts}}</span>
                                </div>
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            


    </div>
    <div class="min-height-200px">
       
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
            <div class="pd-20">
                <div class="row">
                    <div class="col-xl-6 mb-30">
                        <div class="card card-box ">
                            <h5 class="card-header weight-500">Top 10 Selling Items</h5>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Total Sell Count</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($topSell as $item)
            
                                            <tr>
                                            <th scope="row">{{$i}}</th>
                                                <td>{{$item->itemname}}</td>
                                                <td>{{$item->total}}</td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-30">
                        <div class="card card-box ">
                            <h5 class="card-header weight-500">Most Recent Orders</h5>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($resentOrder as $order)
            
                                            <tr>
                                            <th scope="row">{{$i}}</th>
                                                <td>{{$order->order_number}}</td>
                                                <td>{{$order->itemname}}</td>
                                                <td>{{$order->sellcount}}</td>
                                                <td>@if($order->sell_type == 'received') <span class="badge badge-warning">Received</span> 
                                                    @elseif($order->sell_type == 'packed') <span class="badge badge-danger">Ready to Sent</span> 
                                                    @else <span class="badge badge-success">Sent</span>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
    </div>
    
@endsection



