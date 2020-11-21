<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getUser = $code->getUsersOnly();

    $getComment = $code->getComments();
    $type = 'inbox';
    $id = request('id');
    $read = $code -> moveToRead($id);
    $getDetails = $code -> getMailId($id);
   // print_r($getDetails);exit();
    
    
?>
@extends('master')

@section('title' , 'Send Message')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        
        <div class="row">
            <div class="col-md-4 col-sm-12">
                @include('sidebar.main_aside')
            </div>
            <div class="col-md-8 col-sm-12">
                
                
                <div class="card card-box">
                <h5 class="card-header weight-500">{{strtoupper($getUser[$getDetails->from])}} to ME</h5>
                    <div class="card-body">
                        <p class="card-text">{{$getDetails->content}}</p>
                        <a href="{{ url('create_send_mail' , ['id' => $id , 'reply' => 'reply'])}}" class="btn btn-primary">Reply</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{$getDetails->created_at}}
                    </div>
                </div>
                    
            </div>
        
        </div>
            
    </div>
        
@endsection


