@extends('public.layouts.master')

@section('title', 'Admin Dashboard')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								<ul>
									<li><a href="/">Home</a>
									</li>
									@if (Auth::guest())
									<li><a href="/signin">Sign In</a> / <a href="/signup">Sign Up</a></li>
									</li>
									@else 
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard">Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard">  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard">  Dashboard</a></li>
									</li>
									@endif
									@endif

								</ul>
							</div>
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						@include('public.layouts.logo')
						<div class="col-xs-6 mobile-nav-icon">
							<a href="#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>s
						</div>
						<div class="col-md-8 col-xs-12 lp-menu-container">
							<div class="pull-right lp-add-listing-btn">
								<ul>

									<li><a href="/add-health-care"><i class="fa fa-plus"></i> Add your health care service</a></li>
								</ul>
							</div>
							<div class="lp-menu pull-right menu">
								<ul>
									@if (Auth::guest())
									<li><a href="/signin"><i class="fa fa-user user-plus-icon"></i>  Login</a> / <a href="/signup"><i class="fa fa-user-plus user-plus-icon"></i>  Register</a></li>
									@else 
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div><!-- ../menu-bar -->
		<div class="page-heading listing-page archive-page ">
			<div class="page-heading-inner-container text-center">
				<h1>Admin Dashboard</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Admin Dashboard</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->
	
	<!--==================================Section Open=================================-->
	<section class="aliceblue">
			<div class="dashboard-tabs">
				<div class="container">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li>
							<a href="/admin/dashboard" role="tab" data-toggle="tab">
								Bookings
							</a>
						</li>
						<li >
							<a href="/admin/users" role="tab" data-toggle="tab">
								Users
							</a>
						</li>
						<li>
							<a href="/admin/healthcares" role="tab" data-toggle="tab">
								Healthcares
							</a>
						</li>
						<li class="active">
							<a href="#" role="tab" data-toggle="tab">
								Account Settings
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="container">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade active in" id="dashborad">
						<div class="dashboard-tab">
							
							
							<div class="user-recent-listings-container">
									<div class="col-md-8"><h3 class="padding-top-35 padding-bottom-35">Account Settings</h3></div><div class="col-md-4"><div class="price-plan-button  pull-right">
									<a href="/logout" class="lp-secondary-btn btn-second-hover">Sign Out</a>
								</div></div><div class="user-recent-listings-inner">
									
											
											
										<div class="tab-header margin-top-45" style="clear:both">
											<h3>Update Password</h3>
											<p>Change and update your login password</p>
										</div>
										<div class="page-innner-container padding-40 lp-border lp-border-radius-8 margin-bottom-30">
										<form class="form-horizontal" action="/admin/updatePassword" method="POST">
										{{ csrf_field() }}
											<div class="form-group">
												<div class="col-sm-4">
													<label for="cpass">Current Password *</label>
													<input type="password" class="form-control" name="cpass" id="cpass" placeholder="write current password">
												</div>
												<div class="col-sm-4">
													<label for="npass">New Password *</label>
													<input type="password" class="form-control" name="npass" id="npass" placeholder="write new password">
												</div>
												<div class="col-sm-4">
													<label for="nnpass">Repeat Password *</label>
													<input type="password" class="form-control" name="nnpass" id="nnpass" placeholder="write again your new password">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<p class="paragraph-form">Enter ols password in first field and new same password in next fields. Use an uppercase letter and a number for stronger password.</p>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="submit" value="Update password" class="lp-secondary-big-btn btn-first-hover"> 
												</div>
											</div>
											</form>
										</div>


										<div class="tab-header margin-top-45">
											<h3>Update Email</h3>
											<p>Change and update your account email</p>
										</div>
										<div class="page-innner-container padding-40 lp-border lp-border-radius-8 margin-bottom-30">
										<form class="form-horizontal" action="/admin/updateEmail" method="POST">
										{{ csrf_field() }}
											<div class="form-group">
												<div class="col-sm-4">
													<label for="cemail">Current Email *</label>
													<input type="text" class="form-control" name="cemail" id="cemail" placeholder="write current email">
												</div>
												<div class="col-sm-4">
													<label for="nemail">New Email *</label>
													<input type="text" class="form-control" name="nemail" id="nemail" placeholder="write new email">
												</div>
												<div class="col-sm-4">
													<label for="cpass">Current Password *</label>
													<input type="password" class="form-control" name="cpass" id="cpass" placeholder="write your password">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<p class="paragraph-form">Enter current email, new email and your current password.</p>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="submit" value="Update Email" class="lp-secondary-big-btn btn-first-hover"> 
												</div>
											</div>
											</form>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>			
					
					
				</div>
			</div>
	</section>

@endsection