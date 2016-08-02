<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	@include('public.layouts.headerFiles')

	<!-- IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body  data-userimg="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEGUlEQVRoge1ZLWwcRxQ+cMCVItXAIKDgQKQaGBQYtFLBm4mBgYFBQSoZGBgYGAQYFBhYOhAQYBBgqa204G7fWGdg4EqWUrCwqgpcqYoiy975xnKlAIMDAQYGWzAzd6vmfnb39rxX1Z+07L2n7828N+9na7VHPOK/A2IsEusNCuN9qRBIhUMK9S4x1inAXNX8RoKiqE5tbAuF3wQjGfGd09HVUtV8B4I6754IxlmfrLlxt7BHITYp1DtSmTdCmUsncyeVeU2Mxaq590AB5gSbv7wD1I7XKIrqA2WjqC7Z/JS+IanMm2HyDwqpzGvnxB/UwdNx8hRFdVLxslSmKdjcWmcQPATX4aQUGoLNvWBzXyTuibEoGF3BSCjEV9PgmI1IG9suPI4L2wjjfcFIJEOVyS0XJOPEneZmURt0dLXk8gUlUssHwYgEI6EWaEI7iWAkJdEqQMA9p6TQmMhO5Y64Z3eSRKUA8zPgiP7FJer3hW209JeCkQhl/i6TWy744kaMH4raoDa+9q1LmdzykQj1riuGPxa1IZXZdbd6UCa3XKCj6zVH4m1hG6yPBSN5ztcbZXLLSQKrLiy6xfQvFmxngITCeKVsfpnhO14K9V4RfdtE4pW71ZOy+WWGYLwXjGSS+YJaIHerUZncckEqc2xfLV04vinE5qT92sQg1hu+T6JQ7+bWD/WeYGDSw5gYFEV1qcypK2iXefV9Cy8YZ5UPV990bj4TjD/tqcbfZtUT6vq5c+L3afLLBakQuDhvZtcxTTcdHk6TWy6kXp4uBZgfK28bxW4ZI0Dp8LOJVOZ0VLy72nFS+ZM7DNSO11KbkVPii4VPZALMp5xISMXLVXAdCbfbukvttm6J9RYpNEihQay3BJub9O6ras5D4WuCr/gDv/6SrroZfRx6DSBfLBDrDRtG5sbtr86ojW1qXT2baUdS25C7kXIdPPVyM7UyrdVqNVLxsg+nLAOSZNPyITgTCU9HV0u2GNqQco68Gqtneyyf9PdSIXjwTaP9faC/6/VYnozNB7s+DfFiqH4Yr3g5ezP9QxCMMwrxYqr/UCjAHDFe+sWzr+SScUCtq2e1Wr/t6G3Z2/GaTfyLBWKsSsZBr4a4YYwUGm4R3hXppzuM97N0CfmcsO36h5QD7ynUO9R59+QT2VDvCDYfhz6/NslfDjyoNrb7vyhcyzNANr8DUVSXCocpw+fEWB/vOBalMk0bfuZWsLmVypxKZZpZpklirAvGeT/vTGvQoWVGPw/MR2K9VdhQQdhI6N1uVGhm8SOoYMDnQBVwBRQur/JNodS+/KLXZjNWp8QxO5/+mHCXa2Huf+AINr9Oj14++DDPlfxCmZ9zK00ZMjQ7bknRyqz0r6d21r4PmZxI/6+Y1W+lE39e9GYf8Yj/K/4BSKKZsGt5SOsAAAAASUVORK5CYII=" data-userlink ="login.html">
<div id="page">
	<!--==================================Header Open=================================-->
	
  @section('content')
  @show
	<!--==================================Section Close=================================-->

	<!--==================================Footer Open=================================-->
	<footer class="text-center">
		<div class="footer-upper-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="footer-menu">
							<li><a href="/">Home</a></li>
							<li><a href="/add-health-care">Add your health care service</a></li>
							<li><a href="/contact">Contact</a></li>
							@if (Auth::guest())
                       			 <li><a href="/auth">Login / Register</a></li>
                    		@endif
							
							
						</ul>
						<ul class="footer-menu text-below-footer" >
							<li>Find the best health care service in India based on customer reviews and ratings.Get more information about the health care service, contact them and book appointment directly</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- ../footer-upper-bar -->
		<div class="footer-bottom-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="footer-about-company">
							<li>Copyright © 2016 Chikitzo</li>
							<li>45 B Road KZ. INDIA</li>
							<li>Tel: +91-9999-999-999</li>
						</ul>
						<p class="credit-links">Made with <i class="fa fa-heart" style="color: #e74c3c"></i> in India</p>
						<ul class="social-icons footer-social-icons">
							<li><a href="#"><!-- Facebook icon by Icons8 -->
								<img class="icon icons8-Facebook" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAC10lEQVRoQ+1ai3HTQBTc7QAqgFQQqADoAFcAHZBUAFRAUgGkApIKCBUkqYCkA6hgmVXuPGf7ZF0snyTP6GY8ceyT7+17+z7Se0TLkvQBwFsAr8KrbesQn98C8OuS5FXuQK5/KOk9gG8AXg4h4Q5n3AM4JXmZXrsCRJIBnIQNDwDOAFyTtDZGW5LMCrPDsr0IgpyRPI1CLYFIstCfwhdG7P8ntyQZjBXudU6yUXwDJNDpZ/jy9dgW6NJesNBN2LcwzSKQP8EnJmuJjC9Hy9yTPKKkjwC+A3ggOVUHzxpJkh3fPrMwkB8AHGoPxhoRVeIvFwZirjkqTN43MvSy3Jb/1kDUeD25kVO6nG4K3y/lHwNIqBqceK3R1C+vAZj3zlu/S6LnKEBC2HSYLw0qTUTaZvnBgQQQvwA8s7YBOMi4dvqbOK+zt0H6rwNQJ+XHABKDygVJh/ytq5TygwJJKofiXDVVIE/OVVMF4mj0BsA7kn6/XJLsM58BOIptBIGutDA0tVpzVVJZZH3mkIA0IHPW6goIoXJ/VFIpF0t+tG3PtjP6nj8lavUqkaoDiQekVsrxPbdvzbLP06SZKRzrUmtfQEZ39j7cl+QSxeWMC0e/b12DUatLozkJJX0JuaWznJk6kFgJfCVpUAdrkdZK4FCd/Yikb7TGt0iP8PuPpOuwrau6j6Snz5m9yxyPT0nrJsTZIgVWyCqpTwYuPXP2kQJNzT5SoKSNLTO1CrQ2U6tASTO1eilJkh/hH9ds9NRy9qQpejdI660ikNgQbVpvflTpnkVnL2IX0/uaikBiN3oR29OxO1qlIVoDSNIIbZ7wDzIwsG8grQMDwfzpCMcJyfNdqdR6X51puD61aJXkMZM4XrI6whEPXptHMd18QVFTsui+ekcgwQJuS9i5Y+thCcJnt405GUCcwtmXYfb1O55aMmPax5zWblgczWIL2XlmzHWXDJ6tAIhC/QfJdOM+5ZDCYAAAAABJRU5ErkJggg==" alt="facebook"></a></li>
							<li><a href="#"><!-- Google Plus icon by Icons8 -->
								<img class="icon icons8-Google-Plus" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEFElEQVRoQ+2a8VEVQQzGkwqUCoQKhArUCpQKhAqECoQK1AqECsQKlArUCsQKhAri/J7Jzd6+23t3B3dv/yAzzGOYPV6+TfbLl+ypFMzM9kXkrYjw+bK0bqG/fxeRnyJyqap8rpnmf3EAHypwvrRHgDrNAbWAmNkbEfksIk9F5E5ELkTkSlV5eGtmZmQEvh2JyBMRuRWRY1W9CqcaIGbGIkBglyJyoqo8UI2ZGRv80VMevw4DzAqIme2KyA+PBEiJRLWWbDobfaCqNwHkm58JDhORqd7MjLR67al/qB6N334mdmtLp9KOeprd+JnZAwg5905EPqnqSfWhSBxs+W5mMNILEXm1bXYau4nOZhyLayLy1w/52P9T0/pbgFhNHk31pQGiqmtVfuo/XfK5CMQjkCV3ve+7HiNSSyTCj3tHxMyQB8gZdBo9S8muReRsrho1GYgXIVQyMh9VgExIJTaAaH5OkdulRuihIjsJSKI6r1W11TV6Q4ZKoF/ALlT1+KEc7tFcqzo4mH4TcclznXLGzNBqdJdhs8ue0RFJZLP0FU8zI9WeOZKvqkrazWZTgDRSZgOQUNM4f6Oqe7Oh+N8UDk+tRGWGTzulvsX7/i+xcG7pc18gTa+c73YGeo0UHjo6o4Dw5ZlKLrbEGZBzVT0b4nyuwodGcgoQBhIM7MJo+teGZQlFU2cGt85LAmEUEz1yFD3otRkZeR/NNGaHYcaYYrgYEE8v5AjTi+ceFkCshnhJdf/D74xohqRUrFkUSPKl1AYqOxqLSAUwlnSm3CZQWwGSOjWFbqe2110EMPqwl3Y0G7WyjAEzRbFotQLh3MBeIRYB0CsYqwNiZszDMCKQ9ySAa7Fa6WBvOj99KmFSarkCppZw2HEchgp2ir4kjUwRTIciaI2l5iyI7+n03IFzT58WxXpPAh2nLDaoui/CWmZGRxhT+l569aJIg9XUGlWlQPba7EAyVho06HYwpFX0JXubCuQSQLhygJmwwR1ftgEbi+QSQNJDOAYIlZ9J+Z2qUv1nscGsZWboqWCiQQcXj5P+fdZbsBTIytES3ZlZKt9ZS1Q677qTOkEEiAZt7mApPzZkfha5FrljitJ70ZNdcfFdgIGG2em1W19vrJikAGKUlJ8AJNJ3ddGz8erN6wPropIHICITd/AUyJg6LnK9nV+94QDNELsLTRbv1n23qSc8kxY9KnyA4gWDUb3I2Ej4GSR9YVQ+D+J6OtJrkengFMc7JE0U6dWAI31hIBQsA2ckSLVmZiGXmAvsNy8MeKgQgjGPgqnoK2p8hQMiCbnUfoUjoU3AACJeXIl+/Ne2QDlrch5j4h8v/Bx1vlSTgIF5AJAyVE1pxn0LIFqEUrzJdcoNhoKl0j5jSWCcA84vP5BRZzH+B8zg25A0mqpxAAAAAElFTkSuQmCC" alt="google-plus"></a></li>
							<li><a href="#"><!-- LinkedIn icon by Icons8 -->
								<img class="icon icons8-LinkedIn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADv0lEQVRoQ+1a7VEbMRTcrSDpIFBBoIKQCoIrSKggUEGggkAFgQogFYRUELuCQAUJFbzMnp8uurNOJxv7Ds9YM/6B0fm02vf2fUhExzCzjwCOABz4p2vqEN9PAehzT/Im9UK2vzSzYwBfAewNscIV3vEA4IzkXfxsA4iZCcCpT5gBuPZd0G6MNsxMViHr+ATgrS/kkuRZWFQNxMwuAXwG8ATgnKT+fnHDzLTR5wBeAbgiWW18BcTN6dZBHJEclYG+3XOGfvm8icwsAPntPiHbe5FMJHxZTMgVHkju08xkd98AzEjKFrdmmJksRz4zERA5tKR2a9gIO+3+IlZuBES2JiYOu3zDY4qoDIxpJ6QaSU0fitLIV6YCYpXXkwsxxYVAZifzS41rkidDLTz1nnr9OSARdZJkMRKCkIKmREESeEJS5jnKKAUSzK6SuHilkUhMSR6OgmIeOuYW1cNIp9mZ2WsAf3JmOQS4UiB/3Xz2SSrHqYeZKRdT/HkiKVCjjFIgQZrvSE5aQJQJyFduSHaJwcbBlQLRrktq5dRiJHZ2/U8icNBma+Orb1pGv4+4/Cp2CMCb1gIfxcjYeVkRIy1TUhqtj4aUqqFiQ7LQWlc/I1HUz62z8p8l52pDPkQVqH5fwiIz1gZ9LzXXIkbCpL7dVlZQOtcXKpHIDYFSCnTR9+6lgGTSlzrOFKQ61VwfEgllBmKzqn08LokpgVQSW5kwgPckBSw5xgSiElrFW25xEph7V8sF6V/FR/oSymUYCVVnFkRYpAfcIP2d+dzgjPTZeur/UT5XVYEdc4pUa22MRDv9xcsCBVQFWWUPaiIkTc3MNEcxbCFxdd8aHkhGojud2szUMRH4umMyto+EZkGdEbgfKG6o7r4gqUU3hplJyX4A+EkyBOR6zuA+ErHRcNyoFZWsa6JyIeknYwDJ1TbFvphgbFgfWbWAazh0oq+wYySpGFGuVZLOdJpHdyen3yzXRXlprpUCupZnd0DiVszOtObesjOtdTTo2ju5ll3dqdYzWqY7RnJpxjNNKxxfLRz0lHZGlumi5AJiXxXZfjY66Jllj97MTA2Adz0vUA/qeJm5iRSl+D2tFCnUONXRWzgMHfWco4+Njnr9//mNO22oi7fmQDQ6TXskude+MKAGgBpi23lhwFkJVzgERlc4rlahe9PPmJmumYRLDc0rHFGrJoDRV2JFrRoV/aMy5Ook0ZE/hyPyRlel65qTALXPQza92aW/ry7MafaaU0vahD5cPAtXi0pftu556heHi2fJo/B/rbIkXGKb1eoAAAAASUVORK5CYII=" alt="linkedin"></a></li>
							<li><a href="#"><!-- Instagram icon by Icons8 -->
								<img class="icon icons8-Instagram" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAFNUlEQVRoQ9WagVUUQQyGkwqUCpQKlArUCoQKxAqUCoQKhAqECsQK1AqECtQKxAri+8ZkzQ67d3vL3HHOe/dg7/Z25k/+JP9kTmVkmNkrEXkuIk/9NXbrJt6/EhFel6r6aWhCrd80s30ReS8ijzexwhlz/BCRI1W9zN/tATEzALz1G36KyKmIfFFVrHFvw8xgBexgbY98IaeqehSL6oCYGYt+4x+AmOutG2YGGAzOOFPVYvgCxOn00T/cu28PLLOee+ib33cAzQLId4+JrfGEmT0UkQ8iQszmQWy8FpFD98wPVd1VM+MNvvBTVbcmwM3ss8fFkIM+qeq+mRH4xMwBQM5FhFS7Nd5wupsj2FHVG38PL/0qMaHK2iNeLriAa2SFrYoNMytAWHB2SX4/xcoVQAa/sCzg1v35FCDZc82BuJWgKl6GCvxlUIugCH8vlmXGACIio9RaCxAze+eZZGrCIFDPVfVkyLtm9kVEno14vgR7UyBmRsUl6wUAFAEpktdNWN49hYdYAK+o0AB6raosvBuefklELyswaK3DlAD+hsZdYqSSNF9F5Lhe0FgsuQGOk9XfqurZqrHXrX8uEDPDC9QgRi91mxlWxOp4KccI1u8p2EpyQDWK3eQxCiSl4ykP+82Cwwsu/dFoUGjRIOjxwIXzHHpCxQdTJnUh+2JhjKRsMeWZLwDhfKYSh/WhGfy+qmKEz/FiBDEZjGfcONV4xqQR9WWRR0brii+YAgplCp0qENdu6V7g1ivzReO5J56OA0xUaihIgS4VPY86FOYCIThJs19VFTqgnEMZAOL50ORDJnYDALiAUdU9f16k3RNVZb61AAmVHJQKYCuBiJVVYMrCE8WKqm0OJO1Zikr2RQCMwC7AJpH7toXxLLEBjXY9Xv6p2mpLe2dqpR1k2ZUl+d/RbA6Qik4UxvN6rqYxkiRD0Ip0Sb0ok88F4UBiTxT7jPDSLSO18Aj7AGhU5H5L+d+T46p76RqJs9PaI720PFcRjHlu1NIL9iOTCuKiDU3vAdVEcym2SSBUYXJ+UKt3PReAG4WKTz26VtWniVrlujW1olD998EeDbw6/dKJLAJu7kgdk42k33B/qbheEClcKNYWBREl/dgLYiiIWw2RO6df5zLVt1u4mYVE6VTsKl6pBGctUQb7bK2AxMILnWrhF5J8CphaNUdQp/q0PtHoXgkdlGV8UAzP8P4UGU8jGrpmSoWMH+16NvGIA2ELGw3vvLEKSc5t/I9sIX2WIwlPqaRv5EjZAvB5SP9qY1Ua00OebQbEFxUUI2aYNHaJWJTXsi0rXiALcsYRu0OMgwQapFSAagrEwUTPmMuuA+Lcj5YPO0m8ENYvzQdvQEQ/lzOZOIuhcRcNjcFQaw6k8kzQCWtO2pc4lSJO+P5CT6zNI+nBWB+L5oZbNOh+VzEC5bK3eAwNPTw6GBO1W9bikTyJ15Qp8RFfK3EytC9flL7XDiR5KFo+0cTOMRJNbBpxsw5YVwbi+2eCc2uGmZE8kC/duUluB9XyPLawW3WC5cklCmZsif/J//roLTUVoAEFbxYFWrvRCyrdFmpNqOTe0VtU6q6PlBoNgKH4YYF7oZnTiSYH6wBEPhsJlXwQx9ND+gmKjR20tDb41Od1ZyOpi1902cIfDDjN8Fh92DJ14lb3AYDjiNJ2Gv3BgH+Yf8Ix69Cl1aqX1JEsafo/4Ug1IIOBblzTJLvXgHcPQHOCO474OhAlHQ9IgFpybMLQq8wxKGluAak0FKDI1VGdV5mw5b3sW+KHZ4Oa7A8mMc1cZlo+UAAAAABJRU5ErkJggg==" alt="instagram"></a></li>
							<li><a href="#"><!-- Tumblr icon by Icons8 -->
								<img class="icon icons8-Tumblr" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADeUlEQVRoQ+2ajXHTQBCF91UAVACpAKgAOgBXQFIBSQWECkgqIKkgSQWECnAqIKmApIJlPs2d5uScrL8jthndjMdjSzrtu919tz8naxnu/snM3pvZm/Bpu/Up/l+aGZ9LSVe5F2r1T3f/aGbfzOzVU0g44h23ZnYk6TJ9tgHE3QFwGG64M7MTM7uWxGpsbLg7VoF1INvLIMiJpKMoVA3E3RH6c7gAYn5v3XB3wLDgjFNJ1cJXQII5XYSLbzetga7VCxr6Fe5bYGYRyO/gE1uriYwvR83cStqTu++b2Xczu5O0rQ6eVZK74/j4zAIgZ2YG1e6MNiKqxF/OAYKtwQqTfcPdj83sS2b5aqfssv8h1xNfWQLEK6+XHu0pQyYNpPHHzJ7nnisxf27eWv5SQNwdAAB5kFSDKTV/26L+CyBEBFD4T0lsXtXYRSBZ0tgpIInTPbAfSbrfOY0E34D52IO+SoK56rETGnF3hMcvoO8bSXw3xtYDCfkKgSUMdUN0mprUqmmtofIzSQdDqf6R6Q5dseAPRJ+RmUh09nMgAmtdm9m7dYJO2WNG06+7xwCTfOVYEmw1agxdxKIbYomXl2S0KRopGdJMnmsGEldgxV6pbixabPhHQgxZX9qUs6e5fS1YmzAtwFNA55JI7kaN0aY1dMMrSQ5FWWsGUiBxmzXSx/u6fKDrep93rLtndvbZ2WdnX+9Fs4+M8BF6K6+r+uxKcyYkXiRotDMIVRrNmz6MVlIjUdBsyTWpz1JZoYJO4Zlcn/yeWlgsnN9LetFH+PSekkBYxQ9mdtCWLSaF8pycZJpVF2pMFFwSSOxTXElihbMjNJOiBtAKH8L/5ZRNsySQWPMFwJ4kBBw0tgJIcNhYLm1NsHqFGSP2mmIaCUBwWJz+mZn1rlO5O4xFP4XvRhW/r0pTIGtZZ8CECIPjAwbzonRK9bFubbs79S1MkXvjYQReQc2Y2tgg+k1qzjdFW29hYoSJvfCudYCxMEt65nXhu+uheH219Rb7GlV3tO8kHTZPDs68rDoaioPSKtqKxzEmHURIioWL2J6O3dGdaYgm2qi60f/XgYHAPGmZ51DSaQkzKz2HuxOXxeMlzSMcifOkYDA3ftMTnGTLU8EEEoHxiCJibNZoebcdcwJAX+aZKufQ52E6LKb9mFM6YxIbEaUShm9ywHaR6bJ7zV8Cie0+55PMmQAAAABJRU5ErkJggg==" alt="tumblr"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- ../footer-bottom-bar -->
	</footer>
	<!-- <a href="/add-health-care" class="add-listing-mobile lp-search-btn">Add your health care service</a> -->
</div>
	<!--==================================Footer Close=================================-->


	<!--==================================Javscript=================================-->

 @include('public.layouts.footerScripts')
@section('addition_scripts')
  @show
</body>
</html>

