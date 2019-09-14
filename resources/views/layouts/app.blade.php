<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta name="description" content="Sistem Informasi Kelompok Tani Perkebunan">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="{{ asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/customize.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/custom.css')}}" rel="stylesheet" type="text/css">
	@stack('css')
	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="{{ asset('simponi-new.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('simponi-new.png') }}" type="image/x-icon">

	<!--begin::Customize Css -->

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">

					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-light ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="#" class="m-brand__logo-wrapper">
									<img alt="" src="{{ asset('assets/demo/default/media/img/logo/logo.svg')}}" />
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">

								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
									<span></span>
								</a>

								<!-- END -->

								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>

								<!-- END -->

								<!-- BEGIN: Responsive Header Menu Toggler -->
								<!--<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>-->

								<!-- END -->

								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="la la-ellipsis-v "></i>
								</a>

								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>

					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general m-stack--fluid">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline flex">
									<li id="avatar" class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__username">{{ Auth::guest() == true ? "Tamu" : Auth::user()->name }}</span>
											<span class="m-topbar__userpic">
												<img src="{{ asset('photo_profile.jpeg')}}" class="m--img-rounded m--marginless" alt="" />
											</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center m-image-cover">
													<div class="m-card-user m-card-user--skin-light">
														<div class="m-card-user__pic">
															<img src="{{ asset('photo_profile.jpeg')}}" class="m--img-rounded m--marginless" alt="" />
														</div>
														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">{{ Auth::guest() == true ? "Tamu" : Auth::user()->name }}</span>
															<a href="" class="m-card-user__email m-link">{{ Auth::guest() == true ? "Tamu" : Auth::user()->email }}</a>
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">Section</span>
															</li>
															{{-- <li class="m-nav__item">
																<a href="#!" class="m-nav__link">
																	<i class="m-nav__link-icon la la-user"></i>
																	<span class="m-nav__link-text">My Profile</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="#!" class="m-nav__link">
																	<i class="m-nav__link-icon la la-share-alt"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">Activity</span>
																			<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="#!" class="m-nav__link">
																	<i class="m-nav__link-icon la la-comments"></i>
																	<span class="m-nav__link-text">Messages</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit">
															</li>
															<li class="m-nav__item">
																<a href="#!" class="m-nav__link">
																	<i class="m-nav__link-icon la la-question-circle"></i>
																	<span class="m-nav__link-text">FAQ</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="#!" class="m-nav__link">
																	<i class="m-nav__link-icon la la-life-bouy"></i>
																	<span class="m-nav__link-text">Support</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit">
                                                            </li> --}}
                                                            @if (Auth::check())

															<li class="m-nav__item">
																<a href="{{ route('logout') }}" class="m-nav__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
																	<i class="m-nav__link-icon la la-sign-out"></i>
																	<span class="m-nav__link-text">Keluar</span>
																</a>
																<form action="{{route('logout')}}" method="post" id="logout-form">
																	@csrf
																</form>
                                                            </li>
                                                            @else
                                                            <li class="m-nav__item">
																<a href="{{ url('/guest/forget/cookie') }}" class="m-nav__link">
																	<i class="m-nav__link-icon la la-sign-out"></i>
																	<span class="m-nav__link-text">Keluar Halaman Tamu</span>
																</a>
															</li>
                                                            <li class="m-nav__item">
																<a href="{{ route('login') }}" class="m-nav__link">
																	<i class="m-nav__link-icon la la-sign-in"></i>
																	<span class="m-nav__link-text">Login Halaman Admin</span>
																</a>
															</li>
                                                            @endif
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">

				<!-- BEGIN: Aside Menu -->
				@include('layouts.partialsAdmin.sidemenu')
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">

				<!-- BEGIN: Subheader -->
				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="m-subheader__title ">@yield('subHeaderTitle')</h3>

							@yield('widgetsBreadcumbs')
						</div>
					</div>
				</div>

				<div class="m-content">
					@include('layouts.partialsAdmin.notification')
					<div class="m-portlet__body">
                        <div id="app"></div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Body -->

		<!-- begin::Footer -->
		<footer class="m-grid__item		m-footer ">
			<div class="m-container m-container--fluid m-container--full-height m-page__container">
				<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
					<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
						<span class="m-footer__copyright">
							2019 &copy; Developed by <a href="http://disbun.jabarprov.go.id/" class="m-link">Dinas Perkebunan Provinsi Jawa Barat</a>
						</span>
					</div>
					<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
						<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
							{{-- <li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">About</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">Privacy</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">T&C</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">Purchase</span>
								</a>
							</li>
							<li class="m-nav__item m-nav__item">
								<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
									<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
								</a>
							</li> --}}
						</ul>
					</div>
				</div>
			</div>
		</footer>

		<!-- end::Footer -->
	</div>

	<!-- end:: Page -->


	<!-- begin::Scroll Top -->
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>
	<script src="{{ asset('js/webfont.js') }}"></script>
	<script src="{{ asset('js/forWebFont.js') }}"></script>
	<script src="{{ asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/fill.box.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/customize.js') }}" type="text/javascript"></script>
	@stack('javascript')
</body>

<!-- end::Body -->

</html>
