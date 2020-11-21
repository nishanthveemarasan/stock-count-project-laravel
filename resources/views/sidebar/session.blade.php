@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
   </div>
@elseif(session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
    {{session('fail')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
         </button>
     </div>

@endif
               