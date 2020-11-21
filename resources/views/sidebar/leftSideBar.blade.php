<div class="brand-logo">
    <a href="{{ route('dashboard')}}">
        <img src="{{ asset('vendors/images/relax.JPG')}}" alt="" class="light-logo W-100">
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
    </div>
</div>
<div class="menu-block customscroll">
    <div class="sidebar-menu">
        <ul id="accordion-menu">
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon fa fa-list"></span><span class="mtext">Item</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{url('/view_item')}}">View Items</a></li>
                    <li><a href="{{url('/add_item')}}">Add Items</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon micon dw dw-shopping-cart"></span><span class="mtext">Sell Item</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{url('/sell_item')}}">Sell Item</a></li>
                    <li><a href="{{url('/view_history')}}">Sell History</a></li>
                    <li><a href="{{url('/track_item')}}">Track an Item</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-user1"></span><span class="mtext">Users</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{url('/view_users')}}">View All Users</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon fa fa-comments-o"></span><span class="mtext">Comments</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{url('/view_user_comment')}}">Your Comments</a></li>
                    <li><a href="{{url('/view_comment')}}">View All Comments</a></li>
                    
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-edit-1"></span><span class="mtext"> Posts </span>
                </a>
                <ul class="submenu">
                    
                    <li><a href="{{url('/view_user_post')}}">Your Posts</a></li>
                    <li><a href="{{url('/view_post')}}">All Posts</a></li>
                    <li><a href="{{url('/create_post')}}">Write a Post</a></li>
                    
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-diskette"></span><span class="mtext">User Logs</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{url('/view_user_log')}}">Your History</a></li>
                    <li><a href="{{url('/view_logs')}}">View All Logs</a></li>
                   
                </ul>
            </li>
                        
            
        </ul>
    </div>
</div>
