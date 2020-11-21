<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getUser = $code->getUsersOnly();

    $getComment = $code->getComments();
    $type = 'create';
    $id = request('id') ?? '';
    $reply =  request('reply') ?? '';
    $getDetails = array();
    if(isset($id) and !empty($id))
    {
        $getDetails = $code -> getMailId($id);
    }
    //print_r($getDetails);exit();
    
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
                <div class="card card-box mb-1 bg-light">
                    
                    <div class="card-body bg-light">
                        @if(session('error'))
                            @if(session('error') == 'success')
                                <div class="alert alert-success alert-dismissible fade show " role="alert">
                                {{session('msg')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    {{session('msg')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                        @endif
                        @php $code->forgetSession();@endphp
                        <form action="{{url('send_message_to_user')}}" method="POST">
                            @csrf @method('post')
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label text-md-right">Receiver</label>
                                <div class="col-sm-12 col-md-8">
                                    <select class="custom-select2 form-control" multiple="multiple" name="sender[]">
                                        <option value='all' >All</option>
                                        @foreach($getUser as $user)
                                            @if($user != session('user_name'))
                                                <option value='{{$user}}' 
                                                @if(isset($getDetails) and !empty($getDetails))
                                                    @if(isset($reply) and !empty($reply) and $getUser[$getDetails->from] == $user)
                                                        selected 
                                                    @elseif($getUser[$getDetails->to] == $user) 
                                                        selected 
                                                    @endif
                                                @endif>{{$user}}
                                            </option>
                                            @endif
                                        @endforeach
                                    </select>
                                @error('sender')
                                    <div class='text-danger'>{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label text-md-right">From</label>
                                <div class="col-sm-12 col-md-8">
                                    <input class="form-control " readonly="" type="text" name="add_sender_name" value="{{session('user_name')}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label text-md-right">Message</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea class="form-control @error('description') is-invalid @enderror"  placeholder="Write your Notes here..." rows="1" name="description">
                                        @if(isset($getDetails) and !empty($getDetails)) {{ trim($getDetails->content) }} @endif
                                    </textarea>
                                @error('description')
                                    <div class='text-danger'>{{ $message }}</div>
                                @enderror
                                </div>
                                
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label text-right"></label>
                                <div class="col-sm-12 col-md-4">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </div>
                            
                        </form>  
                    </div>
                            
                </div>
            </div>
        </div>
        
    </div>
        
@endsection


