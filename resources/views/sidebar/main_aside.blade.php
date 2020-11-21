{{-- <aside class="page-aside">
    <div class="aside-content">
        <div class="aside-header">
            <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title">Message Service</span>
            <p class="description">Service description</p>
        </div>
    <div class="aside-compose"><a class="btn btn-lg btn-secondary btn-block" href="{{ url('create_send_mail')}}">Send a Message</a></div>
        <div class="aside-nav collapse">
            <ul class="nav">
                <li  @if($type == 'inbox')class='active'@endif ><a href="{{ url('view_inbox_mail' , ['link'=>'inbox'])}}"><span class="icon  "><i class="fas fa-fw fa-inbox"></i></span>Inbox<span class="badge badge-primary float-right">{{$code->getInboxTotal()}}</span></a></li>
                <li @if($type == 'sent')class='active'@endif><a href="{{ url('view_sent_mail' , ['link'=>'sent'])}}"><span class="icon"><i class="fas fa-fw  fa-envelope"></i></span>Sent Mail</a></li>
                <li @if($type == 'trash')class='active'@endif><a href="{{ url('view_trash_mail' , ['link'=>'trash'])}}"><span class="icon"><i class="fas fa-fw fa-trash"></i></span>Trash</a></li>
            
        </div>
    </div>
</aside> --}}

<div class="card-box mb-30">
    <h5 class="pd-20 h5 mb-0 text-center">Relaxhouse Mail Service</h5>
    <div class="list-group">
        <a href="{{ url('create_send_mail' )}}" class="list-group-item d-flex align-items-center justify-content-between @if($type == 'create') active @endif">Send a Message</a>
        <a href="{{ url('view_inbox_mail')}}" class="list-group-item d-flex align-items-center justify-content-between @if($type == 'inbox') active @endif" >Inbox 
            <span class="badge  @if($type == 'inbox') badge-light @else badge-primary @endif badge-pill">{{$code->getInboxTotal()}}</span></a>
        <a href="{{ url('view_sent_mail')}}" class="list-group-item d-flex align-items-center justify-content-between @if($type == 'sent')class='active'@endif">Sent Messages </a>
        <a href="{{ url('view_trash_mail')}}" class="list-group-item d-flex align-items-center justify-content-between @if($type == 'trash')class='active'@endif">Trash Messages </a>
    </div>
</div>