<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getUser = $code->getUsersOnly();
    $getPost = $code->getPostsView();
   
?>
@extends('master');

@section('title' , 'View Posts');

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>VIEW ALL Posts</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
            <div class="pd-20">
                {{-- <h4 class="text-blue h4">Chairs/Cushions</h4> --}}
            </div>
                <table class="data-table table stripe hover nowrap" id="view_table">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Author</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Comments</th>
                            <th>Likes</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getPost as $post)
                            <tr>
                                <td class="table-plus">{{ $getUser[$post->user_id]}}</td>
                                <td>{{ $post->title}}</td>
                                <td>{{ substr($post->content , 0 , 20)}}...</td>
                                
                                <td>@if($post->status == 'publish') {{'published'}} @elseif($post->status == 'draft') {{'drafted'}} @else {{'disabled'}} @endif
                                </td>
                                <td>{{ $post->created_at}}</td>
                                <td>{{ $code->getCommentTotal($post->id)}}</td>
                                <td>{{ $code->getLikesPost($post->id)}}</td>
                                <td>
                                    @if($post->status == 'publish')
                                        <a href='{{ url('/edit_post_status' , ['type' => 'all' ,'id' => $code->encrypt($post->id)])}}' title="View details" class="btn btn-sm btn-warning ">
                                            Draft</i>
                                        </a>
                                    @else
                                        <a href='{{ url('/edit_post_status' , ['type' => 'all' ,'id' => $code->encrypt($post->id)])}}' title="View details" class="btn btn-sm btn-success ">
                                            Publish</i>
                                        </a>
                                    @endif
                                    <a href='{{ url('/edit_post' , ['type' => 'all' ,'id' => $code->encrypt($post->id)])}}' title="View details" class="btn btn-sm btn-info ">
                                        Edit</i>
                                    </a>
                                    <a  href='{{ url('/delete_post' , ['type' => 'all' ,'id' => $code->encrypt($post->id)])}}' title="Edit details" class="btn btn-sm btn-danger">
                                        Remove</i>
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


