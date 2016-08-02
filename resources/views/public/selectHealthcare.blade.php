@extends('public.layouts.master')

@section('title', 'Select your healthcare - Chikitzo')


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
									<li><a href="/user/dashbaord">Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashbaord">  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashbaord">  Dashboard</a></li>
									</li>
									@endif
									@endif

								</ul>
							</div>
		<div class="lp-menu-bar  lp-menu-bar-color">
			<div class="container">
					<div class="row">
						<div class="col-md-4 col-xs-6 lp-logo-container">
							<div class="lp-logo">
								<a href="/">
									<h2 class="main-logo"><i class="fa fa-heartbeat" aria-hidden="true"></i> Chikitzo</h2>
								</a>
							</div>
						</div>
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
									<li><a href="/user/dashbaord"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('healthcare'))
									<li><a href="/healthcare/dashbaord"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
									</li>
									@endif
									@if(Sentinel::findById(Auth::user()->id)->inRole('admin'))
									<li><a href="/admin/dashbaord"><i class="fa fa-dashboard user-plus-icon"></i>  Dashboard</a></li>
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
				<h1>{{$type_sel['name']}}</h1>
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>{{$type_sel['name']}}</span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div><!-- ../Home Search Container -->
	</header>
	<!--==================================Header Close=================================-->

	<!--==================================Section Open=================================-->
	<section>
		<div class="container page-container">
			<div class="row">
				<div class="col-md-12 search-row margin-top-subtract-35  margin-bottom-35">
					<form class="form-inline clearfix">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon lp-border "><i class="fa fa-crosshairs"></i></div>
									<div class="ui-widget border-dropdown">
									  <select class="comboboxs state">
											
											<option value="{{$state_sel['id']}}">{{$state_sel['name']}}</option>
										@foreach ($states as $state)
										<option value="{{$state['id']}}">{{$state['name']}}</option>
										@endforeach
									  </select>
									</div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon lp-border"><i class="fa fa-crosshairs"></i></div>
									<div class="ui-widget border-dropdown">
									  <select class="comboboxs city-filter">
											<option value="{{$city_sel['id']}}">{{$city_sel['name']}}</option>
										@foreach ($cities as $city)
										<option value="{{$city['id']}}">{{$city['name']}}</option>
										@endforeach
									  </select>
									</div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon lp-border"><i class="fa fa-list"></i></div>
									<div class="ui-widget comboboxCategory border-dropdown">
									  <select id="comboboxCategory" class="hospital-type">
										<option value="{{$type_sel['id']}}">{{$type_sel['name']}}</option>
										@foreach ($types as $type)
										<option value="{{$type['id']}}">{{$type['name']}}</option>
										@endforeach
										 </select>
									</div>

							</div>
						</div>
						<div class="form-group margin-right-0">
							<div class="input-group margin-right-0">
								<div class="input-group-addon lp-border"><i class="fa fa-tag"></i></div>
									<select data-placeholder="Tags" class="chosen-select tag-select-one" multiple >

										@foreach ($fecilities as $fecility)
										<option value="{{$fecility['id']}}">{{$fecility['name']}}</option>
										@endforeach
									
									</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="LPtagsContainer "></div>
				</div>
			</div>
			<!-- <div class="row listing-page-result-row margin-bottom-25">
				<div class="col-md-4 col-sm-4 text-left">
					<p>10 Results</p>
				</div>
				<div class="col-md-4 col-sm-4  text-center">
					<p class="view-on-map">
						

					</p>
				</div>
				<div class="col-md-4 col-sm-4  text-right">
					<p>Showing all Hospital Listings <a href="/listing.html#" class="achor-color">Reset</a></p>
				</div>
			</div> -->
			<div class="mobile-map-space">

					<!-- Popup Open -->

					<div class="md-modal md-effect-3 mobilemap" id="modal-4">
						<div class="md-content mapbilemap-content">
							<div id='map' class="listingmap"></div>
							<a class="md-close mapbilemap-close"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<!-- Popup Close -->
					<div class="md-overlay md-overlayi"></div> <!-- Overlay for Popup -->
			</div>
					<div class="row lp-list-page-grid">
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer lp-grid-box-contianer1" data-title="The Dorchester grill" data-reviews="4" data-number="+007-123-4567-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$200" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14" data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="40.6700" data-longitute="-73.9400"  data-id="11"  data-posturl="post-detail.html" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container" >
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-1" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Brighton, The City of Brighton</span>
									</p>
									<ul class="lp-grid-box-price">
										<li class="category-cion"><a href="listing.html">
										<!-- Food icon by Icons8 -->
										<img class="icon icons8-Food" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADaklEQVRoQ+1aQVbbMBD9013YlJ6gUS9AOAHKCZoscRZNT0B6AuAENSdoukhYAiewOQHhAlU4QWEDu07fKLZxDI4jm5S2T14ltjTSn5k/kr5NemKuiNDBK1wMnMeB6ueHlvnI/3igdl3uU3dq+BUwZENGgaL8+Ol8XO9nQIodNw2u7oTLAHogTSPmI1LCKZ9aPrUSD3iOeI40JUNJf59aPrV8aq32wAqOzKRnFKilo0V3asru2937X7eyuyZA6hAPxNVzxfZlqeVq9zEikx9zEL1ngor31dzVUJ32+tS0iWHAfBMNPrTr2Ej75FMrBrDHhG68r+T3xi99ajQxIgCXUaB03QFzdq5JT01IwAEzjuOBOqpr1KWfnpgjIhwycBIHauTSd0mQmJqIAC1zFyA9As6aesdlMqlyw0A/DtS5S9+0rZ6YIRG+AXzHLWqTPjPb9MBzgN7+CZ5k/EgmEPfVrQuQ7tTsMTAioGdBEPWEElaKyYX6exyooYth17Z6asYEfHJNZZ2kUTYe8w2DevFA2YVyAcRWEZ4lUdkY6R/JaT3ZcamSaXVixgVE2Buocd6JmTimp0bC9ZWBOVrYdQ15VWQkhfGAKwLaDHyJAxVW9ck/r1p3iirfohQzZthC96XAWBD3iBJptlbJdQKyID4EzA4DMVroNwVTAHHNLeg6Np2AWL4sg5mD0U8J5ZIKSRHpgHAm6QSgNgix5QwkBYN7jInwUf4zY4w3OF6XnFI88AuHRLAV0BJ0C8M6kShuRco06iWOFD2+WHQ4lGqWTEhKnYC6KIJKJi/AZaFKzhJ8x0yjYoVxjWztiCxtAxZEHRF4KJvLBNBtPFDvltpNzE8ibNt7ixo/xhbCJlGoXbWqPKUnpkME+yKmTN5nxm5dTq0avxZH6hisGqjKSVXPq+yv5Mhzxl31qKoJrvvcAynzlI/IujlU0s6nlk+tgsjcMKOy7j61/uvUym1RrktE5p1/YouSCQfP6FGZPgZsRMB4MY7oiTkgQphIME+EgyUBgyFb95OXInqjbXxyUpRUkVOeCBNWo2XG57LzxaNoBlgRgxESYRYF6rIpKOeIlH6/JWcMolGVMmiVS+YwPbvkAYioUfwOa12AzkCSN0M7yQCX1rOLD8ScpE0BBEDkWInkXmLvSZFwAPLsG6u0/288R19KOGbU8gAAAABJRU5ErkJggg==" alt="restaurents"></a></li>
										<li><span>$$$$<span class="dollar-color">$</span></span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<span class="rating-ratio">4.0</span>
									</div>
									<div class="pull-right">
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer" data-title="3 Bed Detached House" data-reviews="5" data-number="+001-587-4567-89" data-email="russel@example.com" data-website="www.example.com" data-price="$50,000" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14"  data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.516576" data-longitute="-0.137508"  data-id="12"  data-posturl="post-detail.html" data-authorurl="author.html" >
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-2" />
									</a>
									</div><!-- ../grid-box-thumb -->
								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Newcastle, Tyne and Wear</span>
									</p>
									<ul class="lp-grid-box-price">
										<li class="category-cion"><a href="listing.html">
											<!-- Home icon by Icons8 -->
											<img class="icon icons8-Home" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACVElEQVRoQ+3YvXnbMBAG4O9Ku4kyAiaIvAG4QVJGKiJvYE+SbGClEFtlA2EDyxNghNhNVCIPIEKmGJIHKgDFAu5s0gTeOxz+CAl/5FbPcMAWBjPcolBfxGuq5ijVhx3iD3ZEmNs2jME+JSYdZKOfjwjzdgwWfbAYtRR3KYKXBCI3+okIK4swhqRjkFEVZq2W4j42JjqkiVBLsbedlhs9T4mJCulC+OhzmKLUpi1Tu4Vg+8m+EDoEOEQI5uqQUASH8RCfgebvfUH974y8I9wUe+drgsvkcZjhuZqa3QQgS70m4NvoEFnqBwK+V525V0ux5gD153KjV0R4cv8PPKqF+GExaiFW9m+jZOSsEwaDEbVh9o5pfCc5JBaCwySFxEb0YZo1E63YUyH6MEWp1W4h3O4gCiQ1oguDW/wK2TUHTb+y1J8J2Fazy08/q3BRuvS5H1KuPUKhvgrFfYuF2PkecNvxmQGSI06ZqdYUY2DPMAW3PvVCroW4BNMJuTZiKKYVMhXEEMw/kKkhQjFnkDrCfiDkHMDNJjGf+5W+bQI4QZqXBVOGVJvUs8sMB2kgXgB8mjjE9bF+M0NNhLmBpAN+TxlibvCRDrCL5AlD8nRtgxeLsNuBIbvOmDXAfaveL5uAOoaq7cDcI4YeaLjGYz5vBthjDLBvXUcuyUjXxQEHGTIz9vUrQ5qRHprFoe9zQz56RkKHSoZ07DhyRnKNVBHINZJrhFuaLxwqeWjloZWHVn8Eco3kGsk1kmukMwKjHnUnebAKLI/RX2sLVu/BavQeBjbYBvkLODEBNn2o34UAAAAASUVORK5CYII=" alt="realestate">
										</a></li>
										<li><span>$$$$$</span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<span class="rating-ratio">3.0</span>
									</div>
									<div class="pull-right">
										<span class=" simptip-position-top simptip-movable" data-tooltip="Marked as hot" >
										<i class="fa fa-fire hot-post" title=""></i>
										</span>
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer"  data-title="Photography" data-reviews="4" data-number="+007-123-4567-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$20/h" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14"  data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.514070" data-longitute="-0.142292"  data-id="10"  data-posturl="post-detail.html" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-3" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Brighton, The City of Brighton</span>
									</p>
									<ul class="lp-grid-box-price">
										<li  class="category-cion"><a href="listing.html">
											<!-- Camera icon by Icons8 -->
<img class="icon icons8-Camera" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEXUlEQVRoQ+1ZTVrbSBB9xWrMJswJQs8FhpwgrRPELCMvQk4QcwIyJ4g5AWRhZYlyAjcnIFxgmpxgzCbJipqv2mohbP20bIn444MlVv+8rupXr14TnsgfPREceAaybZHsJSL6wu7hFz7gDkMiHLQBzYxv2EGKP3BqDtU8dGznQByIH5i1BbC8YQdoF1EomO6BJHZCwAeAb5loaN4qE3qq8p3+YjUxpwC9YODUxGocMr4UiE7sjABdNQEDqYnV4fLv+ovdJ4aV/zPjlRmpbyGbWJlnag+IcOXmISjzVt00zVMKJEosNw2cxWplrJ7aj0Q4YeCzidVR0xx1v+vEnhPwjhn/mJH62DTX6mYS+46AcxlYttkQkAwcmlilTYs3ABkScFF6d0rIIAeip/YAhAsC9rPB17NYrTBOlFjJ+dc1mygdtw6oKLGSmn+XjWXGHIT3/sAcEAcCjmn2mPEVhPNNT3SdjYeMETLAHcZEeOPuUBZ9cnT5E1cSidB8DFmw72/01B4R4cxFZheK/AUFcDmLVSVTbbIxYTPc4Q0IQzD2fI1xtYIwByPFDr6GsFNxH3pqU4mMBIB8zhcvqAsf48wNkjxsWQv8Ytk8J3VUXtwYAwaM41DaXtQczORAJCL/ubsxwJ++iurEWn/pGbgxsVJtI6IT+4mArJjxLYOExVIwbvxGM4IRchkSeChFMMv7iYnVcciankUlIq5mFKk2Sv6d+0nB/H02+sszWePc2Z0T9tOuujNNsItJk9TIpM2YiMdZVTcY4LBpXC0QF7I7drWEd+ioTWrdqwIHQoemSZ6Orqqz8WBMrKK606sF0njsFR/oos4a0H7TaVatI9Ghn3wTorc6B+IvXpZOrSOxDEruTx6ZGt3WPZBMaHZZiwrazVSlWKdA7lUv3/IGKbUSlWKKVajgboEkdkzApy5U7woYr4KBYxOryfLvnQIpK6rrEkYJEK+CS5VHp0D01F6J7NikmapksKzJkuptRupV3xFZKapdRUTmKSvafv5OI1K3UBeAHhOIa4D6TC0AVY2ey4ZSrdX2FJ/OZX8q9OsLou/W1tVYZQURP2Bdm/EYBTFjFmdK9CFR6rrXTllLgCxEHq5cVICorXwvE40FQ6TS7OsciAOTyfhNUyxrshYp1WCb9gJkKcXWikzRmgoxRHoDsmiKIP253Jc5djAJeSIoPEWIZ7UnIHiAYRNx9AYkb1nzbtEZ2hKdlICUge9F84GAlwwMnQGxACCmW7AL3zuQAgGI9K6zWIv3/JIZ4zZEUQSykBeEqI3J0Kb6O4OOxfJxJy+n7v3cawBzeaYAIW1t0GW+lsiX3GmsevNos+HH/tY7Ns5pfOBYMN6bkXI20Lb/ee/XmR0D2l+48YnN3yIkMgRMZrG63EYwUWJfMyCttaTpvRtfYBmxLc9zh3EbUTzYk7Nhjx68j+RgFi+ywuOCtvSBZQvwXbO490s2bOevur8L6DOQ33XyVes+R+Q5Ij2dwP9TYAKAKNjkVAAAAABJRU5ErkJggg==" alt="camera">
										</a></li>
										<li  class="category-cion"><a href="listing.html">
											<!-- Camera icon by Icons8 -->
<img class="icon icons8-Camera" src="data:image/png;base64,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" alt="camera">
										</a></li>
										<li><span>$$<span class="dollar-color">$</span><span class="dollar-color">$</span><span class="dollar-color">$</span></span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<span class="rating-ratio">5.0</span>
									</div>
									<div class="pull-right">
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer"  data-title="Hotel Rammizine" data-reviews="3" data-number="+041-923-4367-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="Price on call" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14" data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.512306" data-longitute="-0.119221"  data-id="1"  data-posturl="post-detail.html" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-4" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Brighton, The City of Brighton</span>
									</p>
									<ul class="lp-grid-box-price">
										<li  class="category-cion"><a href="listing.html">
											<!-- 5 Star Hotel icon by Icons8 -->
<img class="icon icons8-5-Star-Hotel" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACWUlEQVRoQ+1ZvXnbMBB95zKN5REwQZQJAk0QuwxZRJnAHsEj2BNYKciUsScQNrAzAUZI0qQ0/IEy80E0IQIgKOhTwE68H9w7HN7hKMLAw79LrlXEZyb6VFPL25hoEEgt1w2Qgi16gSSW7wTCKznHCT5BYU7AuVZWwD0IT3jGQ2OcUC5K9tRNqnVHeC1XBHwxDRTwTRRsqd+lljsD0YqLWmrk71+Nfq4LNjcdpJabsew8I7ySvwjqz6a06FSU7Mw0Ti13AsJ/yBn+4kqU7LoppUpe4x1uxAX73fxOLHcqreawA5cAzokwG2K2fciVgk7gPYBbp8POK7kkwt0+ggtdQyl8FSVbWUtL7wQRHl/p9hYKqz70oQGMsWuqhLCkTaVAKXwwY9s67C2lKr19Bbsas/BUtryWNxqM2Qr0WttANEsRZl20UwUV4retGn1mTBbdArKopdLO1wUbvLqEBBHLpi9OJyC8ko9E2GqGbVD66iIKdtHpL5PqBwNpDW0Z7e7gvvTNdZ12xFZyh/T+/wRyDKWlp8OPfUCUwoMoWTOztM+illPrv2FXp9KKRZux/ASzVqwAYvkJBpL7iGULYvWd3EdsmTyE906sta8rh2+fCimtqfuCr//cR2K1gCh+ch85psPeOwLneaTzTSBGQnIf+ffxIc8j4UwcTL/hS05jGQwkzyN5HtlkwIeWvej3EOYOG0AvIGPmBZcMj/HvCmT0vDAAZLR/JyC+JOpT276+R5WW72IZiGPGghuio3/z26/XtT+G/+M+I74ZSqW/63OQlQZTBWtbt/t3xgvz/SNvFqVEmwAAAABJRU5ErkJggg==" alt="hotels">
										</a></li>
										<li><span>Price on call/email</span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<span class="rating-ratio">3.0</span>
									</div>
									<div class="pull-right">
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer lp-grid-box-contianer1" data-title="5th Generation Laptop" data-reviews="4" data-number="+007-123-4567-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$200.00" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14" data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="40.6700" data-longitute="-73.9400" data-id="2"  data-posturl="post-detail.html" data-authorurl="author.html" >
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container" >
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-5" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Brighton, The City of Brighton</span>
									</p>
									<ul class="lp-grid-box-price">
										<li class="category-cion"><a href="listing.html">
										<!-- Food icon by Icons8 -->
										<img class="icon icons8-Food" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABYUlEQVRoQ+1Y0VGDQBTcTQNqBYoVxA6wAv01aUIr0SbUX60glJAKgqnA0IDrQEYnAnKTOcgdmccv947dt3vvmCVG/nDk+GEEQitoCkSpQPqaX0B4hJCSOA0JUsIGRAbiIbtLPupYGhYqwVPIQ4Ju+3ZFZIKrOokmgef8jcRNbARKPBLes3lyu4utjcBnaNv817xShWyenHUSuH7JtbtgMUuCTioXngY4V8GhreXCYwSGVsQUsEPs6TGzkFnILNT9Z2AXmadDnOU2hWwKOU3SvcAsZBYyC+19ka02AE88GzdQuYrF7PJPTnWEsUqkwRagQuTUGWyV2lfR4heeSKXh7aRCYoYJ7lujxfpFMZB5B9uWR0Ag5qnjEE5aM404zHX5rgx7uY3TtQx/WF1w6++3U6m6B36nDjQFeb7vVgddL60FLn+mUtDkuQ/iRqCPLvrsYQr4dK+PWlOgjy767DF6Bb4BAAIIyCXX8RcAAAAASUVORK5CYII=" alt="restaurents"></a></li>
										<li><span>$$$<span class="dollar-color">$</span><span class="dollar-color">$</span></span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<span class="rating-ratio">4.0</span>
									</div>
									<div class="pull-right">
										<span class=" simptip-position-top simptip-movable" data-tooltip="Marked as hot" >
										<i class="fa fa-fire hot-post" title=""></i>
										</span>
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer" data-title="Takai Car 2000" data-reviews="5" data-number="+001-587-4567-89" data-email="russel@example.com" data-website="www.example.com" data-price="$50,000" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14"  data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.516576" data-longitute="-0.137508" data-id="3"  data-posturl="post-detail.html" data-authorurl="author.html" >
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-6" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Newcastle, Tyne and Wear</span>
									</p>
									<ul class="lp-grid-box-price">
										<li class="category-cion"><a href="listing.html">
											<!-- Home icon by Icons8 -->
											<img class="icon icons8-Home" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADRUlEQVRoQ+1YzXnaQBB941PkS0gF8VZgXIGXCoyPgYPtCkIHcSoIqSD4gHzErkByBRYNZJ0OnIu5efLNIhHCh5C0K4jjaC/wgTRv37z52yW8kkWvhAcaIi9NyUaRRpEteaAJrS051tlso4iz67b0YmVF9Ni0AXwE0CVCy3VfDNwAuIp7Sj69VyUiemzOifDNG3XJADNGcV9d+NosTURfmwM8415UYOArCMP4g3pYt4FOaFh+j3pqrX09MS3McE7AF3mOGRdxX418yJQnEpqIAM2M27ivuptAi4hk72YKM+MRQCfuq8SVTCkiv0OKf3JAB/GpEuDcVZaIGNChGRFwxowE++gU2c4DLSRiw+AJxoZUyRCoRGRiWjRDDODQJ1+KiaQeA3AX9ZQuI30VIlaVsWkTcQzQ27LOWt3HRiL62mhiRDYhCSovuVeNViWSkrEV0TVf/iBie8QeTsCQXtGS5C6jwDaeYSAGQ6piQoSEA0w35Y8lkpbWCZEl8GKXVYsglS0hRhz11W22WVpOZjD/YKIbSAXZwwPeIHGtIj7esI4FpG9pEA5IvgPHqzZtpYPtQQnp0AxpPnLccYDu39h4WdLLBAl8DqL3VqV9KNJjI926zYwjn4ZUdjN1PqfH5oYIJwxckUuFqXMzPrbmZRv3EmL/NBFxQibE/0NEh+YMjEFWmm2lkMm3p658wiLv3ap4hYqkZTnK6y2+Q94qEVe8YiJpNUt7ywCBHeyAGTQxD9PSl8R9dVSHMln1rIq3kchibJcGuU/t1d4i3qMnTlIy3ociH7wlIt8f06lz0UcWvQU4zTtT69B0CZhUmYpz8yLrZRXxsvIrKkpDvCTCp3UgHOBdXqeXLksMU0dYZTZc8ZjxeT40Cpm05S9vzNWwK7nKeBL6ILm8uFx7HumERhL7mCtK7UqgDrz1txzptQ8DDwhwtC7ZMcO9TKWuJ7pl0otLCA+83BNiJzQyIh8KGWIMeA9TAadnHDJBJmYZradRT9VyhvHFyyViS2x6KZATMlMOoOsa+33xii8f5mE2EHVSQlNmDH0v1DaUYie8QiKuCbzr9xoiu/Z4EV6jSJGHdv1/o8iuPV6E1yhS5KFd/98osmuPF+H9AkKsIa0CLZEmAAAAAElFTkSuQmCC" alt="realestate">
										</a></li>
										<li class="category-cion"><a href="listing.html">
											<!-- Home icon by Icons8 -->
											<img class="icon icons8-Home" src="data:image/png;base64,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" alt="realestate">
										</a></li>
										<li><span>$$$$$</span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<span class="rating-ratio">5.0</span>
									</div>
									<div class="pull-right">
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer"  data-title="Suny Mobile for sale" data-reviews="4" data-number="+007-123-4567-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$150.00" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14"  data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.514070" data-longitute="-0.142292" data-id="4"  data-posturl="post-detail.html" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-7" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
										Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Brighton, The City of Brighton</span>
									</p>
									<ul class="lp-grid-box-price">
										<li  class="category-cion"><a href="listing.html">
<!-- iPhone icon by Icons8 -->
<img class="icon icons8-iPhone" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACCElEQVRoQ+1awVUCMRD94QYnSzBWoBW4VCAcXQ5qBWIH2IFWIB5Yj0IFmw60g0AHevE6voRdRR7LMtkFfLzhCEMyf/6fCeGvwoG81IHggABxTEYjewvgWimcVmGWgCmAMZq4N139EbJWECPRqz3CF9KqAJYTJoID0TY9/c4FEwZkZN/mIOiTSPXRwji0kp7ZFxspwgDAuQfTguauxwYSjayT0lMGIgqpXlG124k1HgzwaGLd57ASAsSzQcCdifUDZ7Oy2IyZ1PWMibUui1/8nA2knVhyC5CCNpd6Gv3IjLPt31gCxibWXfduvn4aa1ZurOBVG+Ubh8OYfzNPfO9AuBXMgS8nLkC4kqirgsJIQeVra3bpkWycy9TKpCbSqioFmVoytZYqIAdigSTqKoxMLZlaW+o5kZZIS6S1/gooPSI9Ij0iPbK6AnX9yJOLlVystjRl/q20uH+9LsdXPZfqONm9y1QFCBEmpqc7e/VHygBEib1yMSbWz2WxuwYy9/kIN6anh+uS+/UbgY3i56ZoCqJZ2js53gR4HsOWVp6cd18bOHP2W9GGbCCJTRUQ7cQMzejPWXG++AANTIoAOTBeWmvYayfWObkDB8K7xU11vHV72iWVPTAwVAoXHPrLY71vH2R5s6W1mExW7U5lQEQzUso9wjHgMhHcI+VV3U9EJUb2k/LqXQ8GyDfcDKhRa+yP+gAAAABJRU5ErkJggg==" alt="mobile">
										</a></li>
										<li><span>$$<span class="dollar-color">$</span><span class="dollar-color">$</span><span class="dollar-color">$</span></span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<span class="rating-ratio">4.0</span>
									</div>
									<div class="pull-right">
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>
						<div class="col-md-3 col-sm-6 lp-grid-box-contianer"  data-title="Luxury Spa in London" data-reviews="3" data-number="+041-923-4367-89" data-email="jhonruss@example.com" data-website="www.example.com" data-price="$60/h" data-pricetext="Text about your price" data-description="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi archeum" data-userimage="images/user-thumb-94x94.png" data-username="Jhon Russel" data-userlisting="14" data-fb="www.facebook.com" data-gplus="www.plus.google.com" data-linkedin="www.linkedin.com" data-instagram="www.instagram.com" data-twitter="www.twitter.com" data-lattitue="51.512306" data-longitute="-0.119221"  data-id="5"  data-posturl="post-detail.html" data-authorurl="author.html">
							<div class="lp-grid-box lp-border lp-border-radius-8">
								<div class="lp-grid-box-thumb-container">
									<div class="lp-grid-box-thumb">
										<a href="post-detail.html">
										<img src="images/grid/grid-8.png" alt="grid-8" />
									</a>
									</div><!-- ../grid-box-thumb -->

								</div>
								<div class="lp-grid-box-description ">
									<h4 class="lp-h4">
										<a href="post-detail.html">
											Hospital Name
										</a>
									</h4>
									<p>
										<i class="fa fa-map-marker"></i>
										<span>Brighton, The City of Brighton</span>
									</p>
									<ul class="lp-grid-box-price">
										<li  class="category-cion"><a href="listing.html">
											<!-- 5 Star Hotel icon by Icons8 -->
<img class="icon icons8-5-Star-Hotel" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACcElEQVRoQ+1awXXTQBD9kxsnQgV4KyAdsK4Ac4xywFQQpwN3gKmA+GBxTKiApYKECjZUAJy4MbxZbD/i7GqkjZB5ZHX0jFb/z/wZ7Y5MaLhs7V8BmIBhiXDY5Nu3jYEbMBwOsHTHxmnrU8zBXvhD/MAFAVZbYAg7AwtXmbOmZ8WJrPwVEY4A/s5MMxzAuWNzMwTozTPsyh+JGoh4BtBjBt66ysxSGO4QsSs/JcK7QOIRjdxL821IArvPEkJEuJLfmTBOySxG5JIIL5jx2p2Y86FJ2NpPAJyKrJkhQbwE8CRgApauMtMYphiRr1LYTDCDy6n2MwLepIInDcBVxrQiMq49i+PHykTr529lyL73I2L4ICHgzFVmsW46cwJON89N4boDdm9Ear8QwDH5jGsv7fd5U4DJbjvU7VgPnZE/wXbNOjOuaVz7awDPdm/eA5Eg6czr8z8jLU3Smr0QyZRA8jYt4pq9ZKRkJBEBTTqavUirSKtIq3kzW2qk1EipkVIjwx51tTe3Zle71nraON0M6xiQY+e5q8wyJvdM/wnJRLNhVpBNhAEZu8jBfxQDHEaawByET8HO4Ux9b//UyTSbyBY88xcGzWXaGH77CUvgOYieRhtQpv/voWB6epNNhBkfZDiWGtKtJ5KStTDduK+/BlSzqzXS94svtZ4GVLM/HCKZXahrlytdayPVpLRK10p8itC6nFbMmv3hFHtpvx0joElHs///0uoY0N7c+9w0br8O9Yau5UKyX3MnJmznd6/O0srdC7XEmu1WiHRNbXaoW95YMlIy0lIqXd16l1ZXAH37t/7nQ0P73dv7ZYOp6T3zC1HtqHqb2BmDAAAAAElFTkSuQmCC" alt="hotels">
										</a></li>
										<li><span>$$$<span class="dollar-color">$</span><span class="dollar-color">$</span></span></li>
									</ul>
								</div><!-- ../grid-box-description-->
								<div class="lp-grid-box-bottom">
									<div class="pull-left">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<span class="rating-ratio">3.0</span>
									</div>
									<div class="pull-right">
										<a href="listing.html#" class="lp-add-to-fav simptip-position-top simptip-movable" data-tooltip="Add to favorites">
										<i></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div><!-- ../grid-box-bottom-->
							</div><!-- ../grid-box -->
						</div>




					</div>
		</div>
	</section>
	
@endsection