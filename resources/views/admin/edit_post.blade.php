<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    
    $get_id = request('id');
    $getType = request('type');
    $getDetail = $code->getPostDetail($get_id);
    session(['get_post_id' => $get_id , 'userType' => $getType]);
    $getUser = $code->getUsersOnly();
    $status_type = $code::POST_STATUS;
   // print_r($getDetail);exit();
?>
@extends('master')

@section('title' , 'Edit Status')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>CHANGE Post STATUS</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Posts</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/view_post')}}">All Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Post Status</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
            <form action="{{url('update_post_status_data')}}" method="POST">
                @csrf @method('post')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Author Name</label>
                    <div class="col-sm-12 col-md-4">
                    <input class="form-control" type="text" readonly="" placeholder="Write the Item Name.." name="item_name" value="{{$getUser[$getDetail->user_id]}}" disabled="">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Title</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control " readonly="" type="text" placeholder="Write the Order Number.." name="order_number" value="{{$getDetail->title}}" disabled="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Content</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control " readonly="" type="text" placeholder="Write the Order Number.." name="order_number" value="{{$getDetail->content}}" disabled="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Date Created</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control " readonly="" type="text" placeholder="Write the Order Number.." name="order_number" value="{{$getDetail->created_at}}" disabled="">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Status</label>
                    <div class="col-sm-12 col-md-4">
                        <select class="custom-select col-12 " name="status_type" readonly="">
                            @foreach($status_type as $status)
                                <option value="{{$status}}" @if($status != $getDetail->status) selected @endif>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Change Status</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection
