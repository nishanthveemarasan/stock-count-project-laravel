<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    $getName = $code->getItemName();
?>
@extends('master')

@section('title' , 'Sell Item')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>SELL AN ITEM</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sell</li>
                            <li class="breadcrumb-item active" aria-current="page">Sell an Item</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @if(session('error'))
                 @if(session('error') == 'success')
                    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
                    {{session('msg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @else
                <div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
                   {{session('msg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            @endif
            @php $code->forgetSession(); @endphp
            
            @livewire('products')
        </div>
    </div>
    
@endsection
