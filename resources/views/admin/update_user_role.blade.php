<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    
    $get_id = request('id');
    $getDetail = $code->getUserDetail($get_id);
    session(['update_user_id' => $get_id]);
    $get_type = $code::ROLE_TYPE;
    
?>
@extends('master')

@section('title' , 'Update Role')

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
                            <li class="breadcrumb-item"><a href="javascript:;">Users</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{url('/view_users')}}">All Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Role</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
            <form action="{{url('update_user_role_data')}}" method="POST">
                @csrf @method('post')
                
               
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Name</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control " readonly="" type="text" placeholder="Write the Order Number.." name="user_name" value="{{$getDetail->name}}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Email</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control " readonly="" type="text" placeholder="Write the Order Number.." name="email" value="{{$getDetail->email}}" readonly="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Roles</label>
                    <div class="col-sm-12 col-md-4">
                        <select class="custom-select col-12 " name="role_type">
                            @foreach($get_type as $role)
                                <option value="{{$role}}" @if($role == $getDetail->roles) selected @endif>{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Change Role</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection

@if(isset($user_id))
    @php 
        $checkExist = $code->checkLikeOrUnlike($user_id , $post->id);
    @endphp
    @if($checkExist == 1)
        @php 
            $type = 'unlike';
        @endphp
        <button href="javascript:;" class="btn btn-outline-primary">{{$type}}</button>
    @endif
@endif
