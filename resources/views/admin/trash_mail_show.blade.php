<?php
    namespace App\classes;
    use App\classes\functionClass;
    $code = new functionClass();
    $getUser = $code->getUsersOnly();
    $allMailInbox = $code->getAllTrashMails();
    $type = 'trash';
?>
@extends('master')

@section('title' , 'Trash Mail')

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
                            <select class="selectpicker form-control" data-style="btn-outline-primary"  id="category">
                                <optgroup  >
                                    <option value='' >With Selected</option>
                                </optgroup>
                                <optgroup >
                                    <option value='active' >Move to Inbox</option>
                                </optgroup>
                                <optgroup >
                                    <option value='delete' >Delete Permanently</option>
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
                                        <input type="checkbox" class="check_all" name="check_all" value="{{$mail->id}}" id="example-select-all">
                                            <span class="dt-checkbox-label"></span>
                                        </div>  
                                    </div>
                                    <div class="col-11">
                                        <p class="card-title">{{$getUser[$mail->from]}} <small><span class="font-italic">On {{$mail->created_at}}</span></small></p>
                                            <p class="card-text">{{substr($mail->content , 0 , 50)}}....</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
                {{ $allMailInbox->links() }}
            </div>
        </div>
        
    </div>
        
@endsection


