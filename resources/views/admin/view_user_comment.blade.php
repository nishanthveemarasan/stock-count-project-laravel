<?php
    namespace App\classes;
    namespace App\Http\Controllers;
    use App\classes\functionClass;
    use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Crypt;

   $code = new functionClass();
    $getUser = $code->getUsersOnly();
    $getComment = $code->getUsersComments();
?>
@extends('master');

@section('title' , 'Your Comments');

@section('loader')
    {{-- @include('sidebar.loader'); --}}
@endsection

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>VIEW ALL COMMENTS</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">Comments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Your Comments</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
        <form action="{{url('mass_update_comment' , ['type' => 'user'])}}" method="POST">
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
            
                @csrf @method('post')
                          
                <div class="form-group row">
                    <div class="col-sm-12 col-md-3">
                        <select class="custom-select col-12 " name="operation_type" >
                            <option value="">Choose an Opertaion</option>
                            <option value="approve">Enable</option>
                            <option value="disapprove">Disable</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Perform</button>
                    </div>
                </div>
                
                                
            
        </div>
        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            @include('sidebar.session')
       
            <div class="pd-20">
                {{-- <h4 class="text-blue h4">Chairs/Cushions</h4> --}}
            </div>
                <table class="data-table table hover nowrap">
                    <thead>
                        <tr><th class="table-plus datatable-nosort"><div class="dt-checkbox">
											<input type="checkbox" class="selectAllBoxes" name="select_all" value="1" id="example-select-all">
											<span class="dt-checkbox-label"></span>
										</div>
									</th>
                            <th class="table-plus datatable-nosort">Author</th>
                            <th>Comment</th>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getComment as $comment)
                            <tr>
                                <td class="table-plus"><div class="dt-checkbox">
                                <input type="checkbox" class="checkBoxes" name="check_box[]" value="{{$code->encrypt($comment->id)}}" id="example-select-all">
                                    <span class="dt-checkbox-label"></span>
                                </div></td>
                                <td >{{ $getUser[$comment->user_id]}}</td>
                                <td>{{ $comment->content}}</td>
                                <td><a href='{{ url('/view_post_only' , ['id' => $code->encrypt($comment->post_id)])}}' title="View details" class="btn btn-sm btn-primary " target="_blank">
                                    View</i>
                                    </a>
                                </td>
                                <td>@if($comment->status == 'approve') {{'Enabled'}} @else {{'Disabled'}} @endif</td>
                                <td>{{ $comment->created_at}}</td>
                                <td>
                                    @if($comment->status == 'approve')
                                        <a href='{{ url('/edit_comment_status' , ['type' => 'user' ,'id' => $code->encrypt($comment->id)])}}' title="View details" class="btn btn-sm btn-warning ">
                                            Disable</i>
                                        </a>
                                    @else
                                        <a href='{{ url('/edit_comment_status' , ['type' => 'user' ,'id' => $code->encrypt($comment->id)])}}' title="View details" class="btn btn-sm btn-success ">
                                            Enable</i>
                                        </a>
                                    @endif
                                    <a  href='{{ url('/delete_comment' , ['type' => 'user' ,'id' => $code->encrypt($comment->id)])}}' title="Edit details" class="btn btn-sm btn-danger">
                                        Remove</i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
        </div> 
    </form>
        </div>
    </div>
    
@endsection


