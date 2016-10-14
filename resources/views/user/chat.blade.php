@extends('public.layouts.master')

@section('title', 'Chat - Chikitzo')


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
				<h1>Chat</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Chat</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->
	
	<!--==================================Section Open=================================-->
	<section>
		
		<div class="lp-section-row aliceblue">
			<div class="lp-section-content-container-one">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="login-form-popup lp-border-radius-8">
								<div class="siginincontainer chat-window">
									<h1 class="text-center">Chat</h1>

									
									<form class="form-horizontal margin-top-30" role="form" method="POST" action="{{ url('/user/chatSend') }}">
										{{ csrf_field() }}
										<input type="hidden" value="{{$booking[0]['id']}}" name="id" >
										<div class="col-md-10"><div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
											<input type="text" class="form-control chat-msg" placeholder="Type your message" id="message" name="message" value="{{ old('message') }}"/>
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
										</div>
										</div>
										<div class="col-md-2">
										<div class="form-group">
											<input type="submit" class="btn btn-warning chat-send" value="Send" class="btn btn-warning" /> 
										</div>
										</div>
									</form>	
									<div class="chat-box">
									@foreach($chat as $c)
									@if($c['from_user'] == 'user')
									<div class="alert alert-success">
  <strong>You:</strong> {{$c['message']}}
</div>
@endif
@if($c['from_user'] == 'healthcare')
									<div class="alert alert-warning">
  <strong>They:</strong> {{$c['message']}}
</div>
@endif
@if($c['from_user'] == 'admin')
									<div class="alert alert-info">
  <strong>You:</strong> {{$c['message']}}
</div>
@endif
@endforeach
									</div>
									<div class="pop-form-bottom">
									

									</div>
								<a class="md-close"><i class="fa fa-close"></i></a>
								</div>
								
								
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div><!-- ../section-row -->
	
	</section>
	
@endsection