<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\IndexController;

    $items = new IndexController;
    $getChairs = $items->chairs();
    $getCushions = $items->cushions();
    $page = "index";
?>

@extends('layouts.user')

@section('title' , 'Products')

@section('loader')
    @include('sidebar.loader');
@endsection	
    @section('header')
    <div class="login-header box-shadow">
        
		<div class="header-right">
                        
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="">
                        </span>
                        <span class="user-name">Ross C. Lopez</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                        <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <div class="github-link">
                <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
            </div>
        </div>
    </div>
    @endsection
    @section('content')
     <div class="row align-items-center">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Chairs</h4>
					</div>
					<div class="pb-20">
                        <div class="pd-20">
                            <h4 class="badge table-warning">.</h4><span class="font-italic font-bold text-primary">  => these highlighted items have <= 25 in the stocks at this moment</span>
                            <br>
                            <h4 class="badge table-danger">.</h4><span class="font-italic font-bold text-primary">  => these highlighted items doesnt have anything the stocks at this moment</span>
                        </div>
                        <table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Item Name</th>
									<th>Item Code</th>
									<th>Last Updated</th>
									<th>Current Stock</th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach($getChairs as $chair)
                                    <tr class="@if($chair->count <= 25 and $chair->count > 0) table-warning @elseif($chair->count == 0) table-danger @endif">
                                        <td class="table-plus">{{ $chair->itemname}}</td>
                                        <td>{{ $chair->itemcode}}</td>
                                        <td>{{ $chair->updated_at}}</td>
                                        <td>{{ $chair->count}}</td>
                                        
                                    </tr>
                                @endforeach
								
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Cushions</h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Item Name</th>
									<th>Item Code</th>
									<th>Last Updated</th>
									<th>Current Stock</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($getCushions as $cushion)
                                    <tr class="@if($cushion->count <= 25) table-warning @elseif($chair->count == 0) table-danger @endif">
                                        <td class="table-plus">{{ $cushion->itemname}}</td>
                                        <td>{{ $cushion->itemcode}}</td>
                                        <td>{{ $cushion->updated_at}}</td>
                                        <td>{{ $cushion->count}}</td>
                                        
                                    </tr>
                                @endforeach
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
            <div class="col-md-1">

            </div>
        </div>
            
    @endsection
	