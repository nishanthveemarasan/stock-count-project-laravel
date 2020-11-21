<?php
    namespace App\classes;
    use App\classes\functionClass;

    $code = new functionClass();
    $status_type = $code::POST_STATUS;
   
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
                        <h4>Create / Edit the Post</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create / Edit Post</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
            <form action="{{url('create_post_data')}}" method="POST">
                @csrf @method('post')
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Author Name</label>
                    <div class="col-sm-12 col-md-4">
                    <input class="form-control" type="text" readonly="" placeholder="" name="post_name" value="{{session('user_name')}}" disabled="">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Title</label>
                    <div class="col-sm-12 col-md-4">
                        <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Write the Post Title.." name="title" >
                        @error('title')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Content</label>
                    <div class="col-sm-12 col-md-10">
                        
                            <textarea class="form-control border-radius-0 @error('content') is-invalid @enderror" placeholder="Enter text ..." name='content'></textarea>
                            @error('content')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-md-right">Post Status</label>
                    <div class="col-sm-12 col-md-4">
                        <select class="custom-select col-12 " name="status_type">
                            @foreach($status_type as $status)
                                <option value="{{$status}}" @if($status == 'publish') selected @endif >{{$status}}</option>
                            @endforeach
                        </select>
                        @error('status_type')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
@endsection
