<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    $status_type = $code::POST_STATUS;
   // print_r($getDetail);exit();
?>
@extends('master')

@section('title' , 'View All Item')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Change Password</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">USer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
            <form action="{{url('change_password_data')}}" method="POST">
                @csrf @method('post')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Current Password</label>
                    <div class="input-group custom col-sm-12 col-md-6">
                        <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" id="current_password" >
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i toggle="#current_password" class="icon-copy fa fa-lock toggle-password"></i></span>
                        </div>
                    </div>
                    @error('current_password')
                        <div class='text-danger'>{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">New Password</label>
                    <div class="input-group custom col-sm-12 col-md-6">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="new_password" >
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i toggle="#new_password" class="icon-copy fa fa-lock toggle-password"></i></span>
                        </div>
                    </div>
                    @error('password')
                        <div class='text-danger'>{{ $message }}</div>
                    @enderror
                    
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Confirm Password</label>
                    <div class="input-group custom col-sm-12 col-md-6">
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="confirm_password" >
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i toggle="#confirm_password" class="icon-copy fa fa-lock toggle-password"></i></span>
                        </div>
                        @error('password_confirmation')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection
