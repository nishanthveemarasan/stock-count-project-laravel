<?php
namespace App\classes;
use App\classes\functionClass;

$code = new functionClass();
$getUser = $code->getUsersOnly();

$id = request('id');
$post = $code->getPostDetail($id);

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
                        <h4>VIEW A POST</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Comments</a></li>
                        <li class="breadcrumb-item" ><a href="{{ url('/view_comment')}}">All Comments</a>  </li>
                        <li class="breadcrumb-item active" aria-current="page">View Post</li>
                        </ol>
                    </nav>
                    
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="row no-gutters">
                                                
                                            
                <div class="blog-caption">
                   
                    <h4>{{$post->title}}<small> <span class="font-italic">BY {{$getUser[$post->user_id]}}</span></small></h4>
                    <small><span class="font-italic">On {{$post->created_at}}</span></small>
                                                    
                    <div class="blog-by">
                        <br ><p class="text-justify"> {{$post->content}}</p>
                        <div class="pt-10">
                            @php $type = 'like';
                                $user_id = session('user_id');
                                //print_R($user_id );exit();
                            @endphp
                         @if(isset($user_id))
                            @php 
                                $checkExist = $code->checkLikeOrUnlike($user_id , $post->id);
                            @endphp
                            @if($checkExist == 1)
                                @php 
                                    $type = 'unlike';
                                @endphp
                                
                            @endif
                        <button id="{{$post->id}}" class="btn btn-outline-primary like_button"><span class="like_button_{{$post->id}}">{{$type}}</span></button>
                         @endif
                        &nbsp;<span class="text-success like_type_{{$post->id}}">{{$code->getLikesPost($post->id)}}&nbsp;likes</span>
                        </div>
                        <div class="pt-10">
                            @php $comments = $code->getCommentsPost($post->id); 
                            //print_r($comments);exit();
                            @endphp
                            @if(isset($comments))
                                @foreach($comments as $comment)
                                    <div class="card card-box mb-1 bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$getUser[$comment->user_id]}} <small><span class="font-italic">On {{$comment->created_at}}</span></small></h5>
                                            <p class="card-text">{{$comment->content}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            
                        </div>
                        
                        <div class="pt-10">
                            <br>
                            <div class="title">
                                <h4>Leave your comment here</h4>
                            </div>
                            <form action="" method="POST">
                                <div class="row col-md-6">
                                    <textarea class="form-control add_comment_post_{{$post->id}}" placeholder="Enter your comment ..." name='content'></textarea>
                                </div>
                                <br>
                                <div class="row col-md-6">
                                    
                                        <button type="button" id="{{$post->id}}" class="btn btn-primary btn-block submit_comment_post">Submit Your Comment</button>
                                
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                
            </div>
        </div>
    </div>
    
@endsection
