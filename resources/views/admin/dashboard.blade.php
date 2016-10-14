@extends('public.layouts.master')

@section('title', 'Admin Dashboard')


@section('content')
<div id="page">
	<!--==================================Header Open=================================-->
	<header class="">


		
		<div class="md-overlay"></div> <!-- Overlay for Popup -->
							<div id="menu">
								@include('public.layouts.headerMob')
							</div>
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						@include('public.layouts.logo')
						
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
						<li class="active">
							<a href="#" role="tab" data-toggle="tab">
								Bookings
							</a>
						</li>
						<li>
							<a href="/admin/users" role="tab" data-toggle="tab">
								Users
							</a>
						</li>
						<li>
							<a href="/admin/healthcares" role="tab" data-toggle="tab">
								Healthcares
							</a>
						</li>
						<li>
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
									<div class="col-md-8"><h3 class="padding-top-35 padding-bottom-35">All Bookings</h3></div><div class="col-md-4"><div class="price-plan-button  pull-right">
									<a href="/logout" class="lp-secondary-btn btn-second-hover">Sign Out</a>
								</div></div><div class="user-recent-listings-inner">
									<div class="row lp-list-page-list">
									@if(count($booking) > 0)
										@foreach($booking as $book)
										<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
											<div class="lp-list-view-inner-contianer lp-border lp-border-radius-8 clearfix">
												<div class="lp-list-view-thumb">
													<div class="lp-list-view-thumb-inner">
														<img height="50" src="/images/healthcare/{{$book['healthcare'][0]['pro_pic']}}" alt="list-1">
													</div>
													
												</div>
												<div class="lp-list-view-content">
													<div class="lp-list-view-content-upper">
													<h3 class="booking-id">Booking ID: CH{{$book['id']}}</h3>
														<h4>{{$book['user'][0]['name']}}</h4>
														<div class="user-portfolio-stat padding-top-0">
												<ul>
													<li>
														<i class="fa fa-phone"></i>
														<span>{{$book['user'][0]['mobile']}}</span>
													</li>
													<li>
														<i class="fa fa-info-circle"></i>
														<span>{{$book['user'][0]['email']}}</span>
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
																	{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $book['created_at'])->format('M d, Y') }}
												
																</span>
															</li>
															
															<li>
															@if($book['is_confirmed'] == 0)
																<span class="lp-list-sp-icon">
																	<i class="fa fa-history"></i>
																</span>
																<span class="lp-list-sp-text">
																	Confirmation Pending
																</span>
																@elseif($book['is_confirmed'] == 2)
																<span class="lp-list-sp-icon">
																	<i class="fa fa-close"></i>
																</span>
																<span class="lp-list-sp-text">
																	Cancelled by Healthcare
																</span>
																@elseif($book['is_confirmed'] == 4)
																<span class="lp-list-sp-icon">
																	<i class="fa fa-close"></i>
																</span>
																<span class="lp-list-sp-text">
																	Cancelled by Admin
																</span>
																@elseif($book['is_confirmed'] == 3)
																<span class="lp-list-sp-icon">
																	<i class="fa fa-close"></i>
																</span>
																<span class="lp-list-sp-text">
																	Cancelled by You
																</span>
														 @elseif($book['is_confirmed'] == 1)
																<span class="lp-list-sp-icon">
																	<i class="fa fa-check"></i>
																</span>
																<span class="lp-list-sp-text">
																	Confirmed
																</span>
														  @endif
															</li>
															
														</ul>
													</div>
												</div>
												<div class="lp-list-view-paypal">
													<div class="lp-list-view-paypal-inner">
														<h4>Manage Booking</h4>
														<div>
															<p></p>
														</div>
														<div class="lp-list-pay-btn">
															 <a href="/admin/chat/{{$book['id']}}/{{urlencode($book['user'][0]['name'])}}/{{urlencode($book['healthcare'][0]['name'])}}" > 
																<i class="fa fa-wechat"></i>
																<span>See Chat</span>
														 </a> 
														</div>
														<!-- <div class="lp-list-pay-btn">
															@if($book['is_confirmed'] == 0 || $book['is_confirmed'] == 1)  <a href="/healthcare/confirm/{{$book['id']}}/{{urlencode($book['user'][0]['name'])}}" onclick="return confirm('Are you sure?')"> @else <a href="javascript::void(0)" onclick="alert('Its already cancelled'); return false">  @endif
																<i class="fa fa-check"></i>
																<span>Confirm</span>
															  </a> 
														</div> -->
														<div class="lp-list-pay-btn">
															@if($book['is_confirmed'] == 0 || $book['is_confirmed'] == 1)  <a href="/admin/cancel/{{$book['id']}}/{{urlencode($book['user'][0]['name'])}}" onclick="return confirm('Are you sure?')"> @else <a href="javascript::void(0)" onclick="alert('Its already cancelled'); return false">  @endif
																<i class="fa fa-close"></i>
																<span>Cancel</span>
															  </a> 
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