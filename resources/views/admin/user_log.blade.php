<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getUser = $code->getUsersOnly();
    //$getLog = $code->getLogs();
   
?>
@extends('master')

@section('title' , 'User Logs')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>User Logs</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">User Logs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <form action="{{url('get_user_logs')}}" method="POST">
                     @csrf @method('post')
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-3">
                                <select class="custom-select col-12 " name="user_type" >
                                    <option value="">All Users</option>
                                    @foreach($getUser as $name => $id)
                                        <option value="{{$code->encrypt($name)}}">{{$id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <button type="submit" class="btn btn-primary">Perform</button>
                            </div>
                        </div>
                    </form>   
                </div>
            <div class="pd-20">
                {{-- <h4 class="text-blue h4">Chairs/Cushions</h4> --}}
            </div>
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Action</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getLog as $log)
                            <tr>
                                <td class="table-plus">{{ $getUser[$log->user_id]}}</td>
                                <td>{{ $log->action}}</td>
                                <td>{{ $log->description}}</td>
                                <td>{{ $log->created_at}}</td>
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
        </div> 
        
        </div>
    </div>
    
@endsection


