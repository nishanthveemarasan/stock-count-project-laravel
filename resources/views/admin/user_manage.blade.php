<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

    
    $code = new functionClass();
    $getUser = $code->getUsers();
    $role_type = $code::ROLE_TYPE;
    //history_sell_item.blade.php
?>
@extends('master')

@section('title' , 'Users')

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>VIEW ALL USERS</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Users</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
           <table class="data-table table hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Date Created</th>
                            <th>Action</th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getUser as $user)
                            <tr>
                               
                                <td class="table-plus">{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->roles}}</td>
                                <td>{{ $user->created_at}}</td>
                                <td>
                                    <a href='{{ url('/assign_user_role' , ['id' => $code->encrypt($user->id)])}}'  title="View details" class="btn btn-sm btn-success">
                                        assign role</i>
                                    </a>
                                    <a  href='{{ url('/delete_user' , ['id' => $code->encrypt($user->id)])}}' title="Edit details" class="btn btn-sm btn-danger">
                                        Delete</i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            
        </div> 
        
        </div>
    </div>
    <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                    <form action="">
                        <input type="hidden" id="user_id">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-2"></div>
                           <div class="col-sm-12 col-md-8">
                                <select class="custom-select col-12 " name="sell_type" id="sell_type">
                                    @foreach($role_type as $role)
                                        <option value="{{$role}}" >{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-2"></div>
                        </div>
                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                            <div class="col-4">
                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="submit_role"><i class="fa fa-check"></i></button>
                                
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection


