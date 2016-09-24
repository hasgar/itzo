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
						<li class="active">
							<a href="#" role="tab" data-toggle="tab">
								Users
							</a>
						</li>
						<li >
							<a href="/admin/settings" role="tab" data-toggle="tab">
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
									<div class="col-md-8"><h3 class="padding-top-35 padding-bottom-35">All Users</h3></div><div class="col-md-4"><div class="price-plan-button  pull-right">
									<a href="/logout" class="lp-secondary-btn btn-second-hover">Sign Out</a>
								</div></div><div class="user-recent-listings-inner">
									<div class="row lp-list-page-list">
									@if(count($users) > 0)
										@foreach($users as $user)
										<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix">
												
												<div class="lp-list-view-content">
													<div class="lp-list-view-content-upper">
													<h3 class="booking-id">User ID: U{{$user['user_id']}}</h3>
														<h4>{{$user['name']}}</h4>
														<div class="user-portfolio-stat padding-top-0">
												<ul>
													<li>
														<i class="fa fa-phone"></i>
														<span>{{$user['mobile']}}</span>
													</li>
													<li>
														<i class="fa fa-info-circle"></i>
														<span>{{$user['email']}}</span>
													</li>
													
												</ul>
											</div>
													</div>
													<div class="lp-list-view-content-bottom">
														<ul class="list-style-none list-pt-display">
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-calendar"></i>
																</span>
																<span class="lp-list-sp-text">
																	{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user['created_at'])->format('M d, Y') }}
												
																</span>
															</li>
															<li>
																<span class="lp-list-sp-icon">
																	<i class="fa fa-calendar"></i>
																</span>
																<span class="lp-list-sp-text">
																	{{count($user['bookings'])}} Bookings
												
																</span>
															</li>
															
															
														</ul> 
													</div>
												</div>
												<div class="lp-list-view-paypal">
													<div class="lp-list-view-paypal-inner">
														<h4>Manage User</h4>
														<div>
															<p></p>
														</div>
														<div class="lp-list-pay-btn">
															 <a href="/admin/bookings/{{$user['id']}}/{{urlencode($user['name'])}}" > 
																<i class="fa fa-wechat"></i>
																<span>See Bookings</span>
														 </a> 
														</div>
														
														<div class="lp-list-pay-btn">
															@if($user['status'] == 1)  <a href="/admin/block/{{$user['id']}}/{{urlencode($user['name'])}}" onclick="return confirm('Are you sure?')"> <i class="fa fa-close"></i>
																<span>Block</span>
															  </a> @else <a href="/admin/unblock/{{$user['id']}}/{{urlencode($user['name'])}}" onclick="return confirm('Are you sure?')"> <i class="fa fa-check"></i>
																<span>Unblock</span>
															  </a> 
															  @endif
														</div>
													</div>
												</div>
											</div>
										</div>
@endforeach
@else 
<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix no-bookings" align="center">
<h4 class="no-bookings">No Bookings available</h4>
											</div>
											</div>
@endif
									</div>
								</div>
							</div>
						</div>
					</div>			
					
					
				</div>
			</div>
	</section>

@endsection