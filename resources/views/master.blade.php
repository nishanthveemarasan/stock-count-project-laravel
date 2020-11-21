<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-asColorPicker/dist/css/asColorPicker.css')}}">

	
    
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	@livewireStyles
</head>
<body>
	@yield('loader')
	
	<div class="header">
		@include('sidebar.header')
	</div>
	

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>
	<div class="left-side-bar">
		@include('sidebar.leftSideBar')
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
			@yield('content')
	</div>
	
	@livewireScripts
	<!-- js -->
	<script src="{{ asset('vendors/scripts/core.js')}}"></script>
	<script src="{{ asset('vendors/scripts/script.min.js')}}"></script>
	<script src="{{ asset('vendors/scripts/process.js')}}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js')}}"></script>
	<!-- js -->
	
	<script src="{{ asset('vendors/scripts/dashboard.js')}}"></script>
	
	<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js')}}"></script>
	<!-- Datatable Setting js -->
	<script src="{{ asset('vendors/scripts/datatable-setting.js')}}"></script>
	<script src="{{ asset('src/plugins/jquery-asColor/dist/jquery-asColor.js') }}"></script>
	<script src="{{ asset('src/plugins/jquery-asGradient/dist/jquery-asGradient.js') }}"></script>
	<script src="{{ asset('src/plugins/jquery-asColorPicker/jquery-asColorPicker.js') }}"></script>
	<script src="{{ asset('vendors/scripts/colorpicker.js') }}"></script>

	
	<script>
    

		$(document).ready(function() {
			$("input[type='radio']").click(function(){
				var value = $(this).val();
				if(value == 'customhistory')
				{
					$('#custom_date_range').show();
				}
				else
				{
					$('#custom_date_range').hide();
				}
			});

			$("#example-select-all").click(function(){
				if(this.checked)
				{
					$(".checkBoxes").each(function(){
						this.checked = true;
					});
				}
				else
				{
					$(".checkBoxes").each(function(){
						this.checked = false;
					});
				}
				
				
			});

			$('.like_button').click(function(){
			var id = $(this).attr('id');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
			$.ajax({
					type:'POST',
					url:"{{ url('/like_unlike_post') }}",
					data:{'_token' : '<?php echo csrf_token() ?>' ,
						'id':id},
					dataType:'json',
					
					success:function(data) {
						if(data.err == 'success')
						{
							$('.like_button_'+id).html(data.type);
							$('.like_type_'+id).html(data.like);
						}
						
					}

				});
			
		});
		
		$('.submit_comment_post').click(function(){
			var id = $(this).attr('id');
			var comment = $('.add_comment_post_'+id).val();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});

			$.ajax({
					type:'POST',
					url:"{{ url('/add_comment_to_post') }}",
					data:{'_token' : '<?php echo csrf_token() ?>' ,
						'id':id,
						'comment':comment},
					dataType:'json',
					
					success:function(data) {
						if(data.err == 'success')
						{
							location.reload();
						}
						
					}

				});
			
		});
			
		});

		$('.assign_role').click(function()
		{
			var id = $(this).attr('rel');
			$('#user_id').val(id);
			$("#confirmation-modal").modal('show');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
			$.ajax({
					type:'POST',
					url:"{{ url('/get_user_role') }}",
					data:{'_token' : '<?php echo csrf_token() ?>' ,
						'id':id},
					dataType:'json',
					
					success:function(data) {
						$('#sell_type').val(data.value);
						
					}

				});
			
		});

		$(".toggle-password").click(function() {
			$(this).toggleClass("icon-copy fa fa-lock icon-copy fa fa-unlock-alt");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
			input.attr("type", "text");
			} else {
			input.attr("type", "password");
			}
		});

		$('#category').change( function(){
			var value = $(this).val();
			//$('#category').prop('disabled' , true);
			//alert(value);
			var favorite = [];
                $.each($("input[type='checkbox']:checked"), function(){
                    if($(this).val() !== 'check_all')
                    {
                        favorite.push($(this).val());
                    }
                    
                });
				if(favorite.length > 0)
                {
                    $.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						}
					});
					$.ajax({
							type:'POST',
							url:"{{ url('/read_unread_trash') }}",
							data:{'_token' : '<?php echo csrf_token() ?>' ,
								'action':value,
								'array':favorite},
							dataType:'json',
							beforeSend:function()
							{
								$('#category').prop('disabled' , true);
							},
							success:function(data) {
								if(data.err == 'success')
								{
									$('#category').prop('disabled' , false);
									location.reload();
								}
								
							}

					});
                }
		});

			
	
	</script>
	
</body>
</html>