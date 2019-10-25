<!doctype html>
<html lang="en">

<head>
	<title>Notifications | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="csrf-token" content="{{csrf_token()}}">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="{{asset('DataTables/css/dataTables.bootstrap4.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700')}}" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
    
</head>

<body >
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top" style ="background-color:#2F4F4F">
			<div class="brand">
				<a href="{{ url('/index') }}"><img src="{{asset('assets/img/download1.jpg')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				{{-- <form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form> --}}
				<div class="navbar-btn navbar-btn-right">
					{{-- <a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a> --}}
				</div>
				{{--<div id="navbar-menu">--}}
					{{-- <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul> --}}
				{{--</div>
			</div>
		</nav>--}}
		<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

					<!-- Authentication Links -->
					@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
							<!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
							-->
							 
                    @else

						<!--

						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>

						-->

						
						<li class="nav-item">
                                <a class="nav-link" href="{{url('/addNewUser')}}">{{ __('New User') }}</a>
                        </li>
						<li class="dropdown">
                                
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<img src="{{asset('assets/img/Capture.png')}}" class="img-circle" alt="Avatar" >
									{{ Auth::user()->name }}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
								<!--
									<li>
                                        <a class="dropdown-item" href="#">
											<i class="lnr lnr-user"></i> <span>My Profile </span>
                                        </a>
									</li>
								-->
									<li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
														 <i class="lnr lnr-exit"></i><span>
                                            {{ __('Logout') }}
											</span>
                                        </a>
									</li>	

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    
								</ul>   
                                
                                
                         </li>
                        @endguest
                    
						
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar" style ="background-color:#2F4F4F">
			<div class="sidebar-scroll" >
				<nav >
					<ul class="nav">
						<li><a href="{{route('dashboard')}}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>View Timetable</span></a></li>
						<li><a href="{{route('relief')}}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Relief Table</span></a></li>
						<li><a href="{{route('attendance')}}" class="{{ Request::is('attendences') ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Attendance</span></a></li>
						<li><a href="{{route('teacher.index')}}" class="{{ Request::is('teacher') ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Teachers</span></a></li>
						<li><a href="{{route('subject.index')}}" class="{{ Request::is('subject') ? 'active' : '' }}"><i class="lnr lnr-book"></i> <span>Subjects</span></a></li>
						<!--  request ia as if condition , : is like or -->
						<li><a href="{{route('grade.index')}}" class="{{ Request::is('grade') ? 'active' : '' }}"><i class="lnr lnr-book"></i> <span>Grades</span></a></li>
						<li><a href="{{route('gradeSubject.index')}}" class="{{ Request::is('gradeSubject') ? 'active' : '' }}"><i class="lnr lnr-book"></i> <span>Subjects of Grade</span></a></li>
						
						<li><a href="{{route('teacherSubject.index')}}" class="{{ Request::is('teacherSubject') ? 'active' : '' }}"><i class="fa fa-file-excel-o"></i> <span>Subjects of teachers</span></a></li>
						<li><a href="{{route('period.index')}}" class="{{ Request::is('period') ? 'active' : '' }}"><i class="fa fa-file-excel-o"></i> <span>period</span></a></li>
						<li><a href="{{route('timetable.index')}}" class="{{ Request::is('timetable') ? 'active' : '' }}"><i class="fa fa-file-excel-o"></i> <span>Timetable</span></a></li>
						<li><a href="{{route('group.index')}}" class="{{ Request::is('group') ? 'active' : '' }}"><i class="fa fa-file-excel-o"></i> <span>group</span></a></li>
						<li><a href="{{route('groupSubject.index')}}" class="{{ Request::is('groupSubject') ? 'active' : '' }}"><i class="fa fa-file-text"></i> <span>Group Subjects</span></a></li>
						
						{{--<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Grades</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{route('grade.index')}}" class="">Grades/a></li>
															
								</ul>
							</div>
						</li>--}}				
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
            
            <div style="background-color:lavender">
			<div class="main-content">

				<div class="container-fluid">
                
                @yield('content')
                </div>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			{{-- <div class="container-fluid">
				<p class="copyright">J/Skanthavarothaya College <i class="fa fa-love"></i><a href="skantha@gmail.com">e-mail</a>
				</p>
			</div> --}}
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>
	<script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
	<script src="{{asset('DataTables/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('DataTables/js/dataTables.bootstrap4.js')}}"></script>

	<script>
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
@stack('script')


</body>

</html>
