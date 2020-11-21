
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    
    
    <title>Relax house Admin Panel</title>

    <style>
        .error{
            color: red;
        }
       
    </style>
</head>



<body>

    <div class="dashboard-wrapper">
        <aside class="page-aside">
            <div class="aside-content">
                <div class="aside-header">
                    <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title">Message Service</span>
                    <p class="description">Service description</p>
                </div>
                <div class="aside-compose"><a class="btn btn-lg btn-secondary btn-block" href="create_message.php">Send a Message</a></div>
                <div class="aside-nav collapse">
                    <ul class="nav">
        <li  class='active' ><a href=""><span class="icon  "><i class="fas fa-fw fa-inbox"></i></span>Inbox<span class="badge badge-primary float-right">5</span></a></li>
                        <li ><a href=""><span class="icon"><i class="fas fa-fw  fa-envelope"></i></span>Sent Mail</a></li>
                        <li><a href=""><span class="icon"><i class="fas fa-fw fa-trash"></i></span>Trash</a></li>
                    
                </div>
            </div>
        </aside>
    </div>
    
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('assets/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/summernote/js/summernote-bs4.js')}}"></script>
    <script src="{{ asset('assets/libs/js/main-js.js')}}"></script>
    
</body>
 
</html>