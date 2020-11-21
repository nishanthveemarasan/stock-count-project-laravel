<?php
    namespace App\classes;
    use App\classes\functionClass;
    
    $code = new functionClass();
    $getUser = $code->getUsersOnly();
    $getPost = $code->getPosts();
    
         
?>

@extends('layouts.user')

@section('title' , 'Notification')
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
    <div class="pd-ltr-20 height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Posts</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Relaxhouse</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Notification</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="container pd-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-list">
                                <ul>
                                    
                                   
                                    @foreach($getPost as $post)
                                    <li>
                                        <div class="row no-gutters">
                                            
                                        
                                            <div class="blog-caption">
                                                <h4>{{$post->title}}<small> <span class="font-italic">BY {{$getUser[$post->user_id]}}</span></small></h4>
                                                <small><span class="font-italic">On {{$post->created_at}}</span></small>
                                                
                                                <div class="blog-by">
                                                    <br ><p class="text-justify"> {{$post->content}}</p>
                                                    <div class="pt-10">
                                                        @php $type = 'like';
                                                            $user_id = session('user_id');
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
                                                        @php $comments = $code->getCommentsPost($post->id); @endphp
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
                                                    @if(isset($user_id))
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
                                                    @endif
                                                </div>
                                            </div>
                                            <br>
                                            
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                   
                                </ul>
                            </div>
                            <div class="text-center">
                                {{ $getPost->links() }}
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Presented By RelaxHouse 
        </div>
    </div>
            
    @endsection
	