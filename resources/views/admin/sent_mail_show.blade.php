<?php
    namespace App\classes;
    use App\classes\functionClass;
    $code = new functionClass();
    $getUser = $code->getUsersOnly();
    $allMailInbox = $code->getAllSentMails();
    $type = 'sent';
?>
@extends('master')

@section('title' , 'Sent Mail')

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
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-1">
                            <div class="dt-checkbox">
                                <input type="checkbox" class="check_all" name="check_all" id="example-select-all" value="check_all">
                                <span class="dt-checkbox-label"></span>
                            </div>  
                        </div>
                        <div class="col-5">
                            <select class="selectpicker form-control" data-style="btn-outline-primary" data-size="5" id="category">
                                <optgroup  data-max-options="2">
                                    <option value='' >With Selected</option>
                                </optgroup>
                                <optgroup data-max-options="2">
                                    <option value='deletep' >Delete</option>
                                </optgroup>
                            </select>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="card card-box mb-1 bg-light">
                    @if(isset($allMailInbox))
                        @foreach($allMailInbox as $mail)
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-1">
                                        <div class="dt-checkbox">
                                        <input type="checkbox" class="checkBoxes" name="check_all" value="{{$mail->id}}" id="example-select-all">
                                            <span class="dt-checkbox-label"></span>
                                        </div>  
                                    </div>
                                    <div class="col-11">
                                        <a href="{{ url('create_send_mail' , ['id' => $mail->id])}}">
                                            <p class="card-title">{{$getUser[$mail->from]}} <small><span class="font-italic">On {{$mail->created_at}}</span></small></p>
                                            <p class="card-text">{{substr($mail->content , 0 , 50)}}...</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
                <br>
                <div class="float-right">
                    {{ $allMailInbox->links() }}
                </div>
                
            </div>
        </div>
        
    </div>
        
@endsection


