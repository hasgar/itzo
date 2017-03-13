<div class="col-md-4 col-xs-6 lp-logo-container">
							<div class="lp-logo white-logo">
								<a href="/">
									<img src="/images/logo.png" />
								</a>
							</div>
						</div>
<div class="col-xs-6 mobile-nav-icon">
							<a href="#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>
						<div id="menu">
							<ul>
									<li><a href="/">Home</a>
									</li>
									@if (Auth::guest())
									<li><a href="/signin">Login</a> / <a href="/signup">Sign Up</a></li>
									</li>
									@else
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard">Dashboard</a></li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard">  Dashboard</a></li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard">  Dashboard</a></li>
									@endif
									<li><a href="/logout">Logout</a></li>
									@endif
								</ul>
						</div>
						<div class="col-md-8 col-xs-12 lp-menu-container">
							<div class="pull-right lp-add-listing-btn">
							<ul>

									<li><a href="/add-health-care"><i class="fa fa-plus"></i> Register Health care Provider</a></li>
								</ul>
							</div>
							<div class="lp-menu pull-right menu">
								<ul>
									@if (Auth::guest())
									<li><a href="/signin"><i class="fa fa-user user-plus-icon"></i>  Login</a> / <a href="/signup"><i class="fa fa-user-plus user-plus-icon"></i>  Sign up</a></li>
									@else
									@if(Sentinel::findById(Auth::user()->id)->inRole('user'))
									<li><a href="/user/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>

									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>

									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashboard"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									@endif
									<li><a href="/logout">Logout</a></li>
									@endif

								</ul>
							</div>
						</div>
