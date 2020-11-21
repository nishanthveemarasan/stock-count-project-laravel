<?php
    namespace App\classes;
    use App\classes\functionClass;
    use Illuminate\Support\Facades\Auth;

    if(Auth::check()){
        $name = Auth::user()->name;
        $id = Auth::user()->id;
        $photo = Auth::user()->profile_photo_path;
        session(['user_id' => $id]);
        session(['user_name' => $name]);
    }
    $code = new functionClass();
    $getPostTotal = $code->getNewPostTotal() ?? '0';
?>
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="{{asset('vendors/images/relax.JPG')}}" alt="">
            </a>
        </div>
        <div class="header-right">
    
            <div class="user-notification">
                <a class="" href="{{ url('/posts')}}" id="" >Posts 
                    @if(session('user_id'))
                <span class="badge badge-primary">{{$getPostTotal}}</span>
                    @endif
                </a>
            </div>
            <div class="user-notification">
                <a class="" href="{{ url('/products')}}" id="" >Products</a>
            </div>
            @if(session('user_id'))
                <div class="user-notification">
                    <a class="" href="{{ url('/dashboard')}}" id="" >Admin</a>
                </div>
                <div class="user-notification">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="{{ url('view_inbox_mail')}}" >
                            <i class="icon-copy dw dw-notification"></i>
                            @if($code->getInboxTotal() > 0)
                                <span class="badge text-danger"></span>
                            @endif
                        </a>
                    </div>
                </div>
            @else
                <div class="user-notification">
                    <a class="" href="{{ url('/signin')}}" id="" >Login</a>
                </div>
                <div class="user-notification">
                    <a class="" href="{{ url('/registration')}}" id="" >Registration</a>
                </div>
            @endif
            
            @if(session('user_id'))
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img src="{{ asset('storage/'.$photo)}}" alt="">
                            </span>
                            <span class="user-name">{{session('user_name')}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ url('/profile')}}"><i class="dw dw-settings2"></i> Account Setting</a>
                            <a class="dropdown-item" href="{{ url('/logOut')}}"><i class="dw dw-logout"></i> Log Out</a>
                        </div>
                    </div>
                </div>
                <div class="github-link">
                    <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
                </div>
            @endif
        </div>
    </div>
</div>
