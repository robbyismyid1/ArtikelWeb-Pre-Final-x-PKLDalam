<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="/assets/front/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="/assets/front/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="/assets/front/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/front/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="/assets/front/css/nouislider.min.css">
	<link rel="stylesheet" href="/assets/front/css/ionicons.min.css">
	<link rel="stylesheet" href="/assets/front/css/plyr.css">
	<link rel="stylesheet" href="/assets/front/css/photoswipe.css">
	<link rel="stylesheet" href="/assets/front/css/default-skin.css">
	<link rel="stylesheet" href="/assets/front/css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="/assets/front/icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="/assets/front/icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/front/icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/front/icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/front/icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">
	
	<!-- header -->
	@include('layouts.front.header')
	<!-- end header -->

	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="{{ asset('assets/img/artikel/'.$artikel->foto)}}"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">{{ $artikel->judul }}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{ asset('assets/img/artikel/'.$artikel->foto)}}" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>{{ $artikel->rating }}</span>

										<ul class="card__list">
											
											<li>{{ $artikel->kategori->nama}}</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span>
										@foreach($artikel->tag as $item)
                                    		<a href="#">{{ $item->name }}</a>
                            			@endforeach
										<li><span>Release year:</span> {{ $artikel->rilis->nama }}</li>
										<li><span>Running time:</span> {{ $artikel->durasi }} min</li>
										<li><span>Country:</span>
										@foreach($artikel->negara as $item)
                                    		<a href="#">{{ $item->name }}</a>
                            			@endforeach
									</ul>

									<div class="card__description card__description--details">
										{!! $artikel->konten !!}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
				<iframe width="560" height="315" src="{{ $artikel->embed }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Discover</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a>
							</li>

							
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

									
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
										<ul class="comments__list">
											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="/assets/front/img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">30.08.2018, 17:53</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>12</button>

														<button type="button">7<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item comments__item--answer">
												<div class="comments__autor">
													<img class="comments__avatar" src="/assets/front/img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">24.08.2018, 16:41</span>
												</div>
												<p class="comments__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>8</button>

														<button type="button">3<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item comments__item--quote">
												<div class="comments__autor">
													<img class="comments__avatar" src="/assets/front/img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">11.08.2018, 11:11</span>
												</div>
												<p class="comments__text"><span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</span>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>11</button>

														<button type="button">1<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="/assets/front/img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">07.08.2018, 14:33</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>99</button>

														<button type="button">35<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="/assets/front/img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">02.08.2018, 15:24</span>
												</div>
												<p class="comments__text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>74</button>

														<button type="button">13<i class="icon ion-md-thumbs-down"></i></button>
													</div>
													
													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>
										</ul>

										<form action="#" class="form">
											<textarea id="text" name="text" class="form__textarea" placeholder="Add comment"></textarea>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
								</div>
								<!-- end comments -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
										<ul class="reviews__list">
											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="/assets/front/img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="/assets/front/img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>9.0</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="/assets/front/img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>7.5</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>
										</ul>

										<form action="#" class="form">
											<input type="text" class="form__input" placeholder="Title">
											<textarea class="form__textarea" placeholder="Review"></textarea>
											<div class="form__slider">
												<div class="form__slider-rating" id="slider__rating"></div>
												<div class="form__slider-value" id="form__slider-value"></div>
											</div>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">You may also like...</h2>
						</div>
						<!-- end section title -->

						<!-- card -->
						@foreach ($artikel1 as $data)
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{ asset('assets/img/artikel/'.$data->foto)}}" alt="">
									<a href="{{ $data->slug }}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="{{ $data->slug }}">{{ $data->judul }}</a></h3>
									<span class="card__category">
										@foreach($data->tag as $item)
                                    		<a href="#">{{ $item->name }}</a>
                            			@endforeach
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>{{ $data->rating }}</span>
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforeach
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->

	<!-- footer -->
	@include('layouts.front.footer')
	<!-- end footer -->

	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<!-- Preloader -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="/assets/front/js/jquery-3.3.1.min.js"></script>
	<script src="/assets/front/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/front/js/owl.carousel.min.js"></script>
	<script src="/assets/front/js/jquery.mousewheel.min.js"></script>
	<script src="/assets/front/js/jquery.mCustomScrollbar.min.js"></script>
	<script src="/assets/front/js/wNumb.js"></script>
	<script src="/assets/front/js/nouislider.min.js"></script>
	<script src="/assets/front/js/plyr.min.js"></script>
	<script src="/assets/front/js/jquery.morelines.min.js"></script>
	<script src="/assets/front/js/photoswipe.min.js"></script>
	<script src="/assets/front/js/photoswipe-ui-default.min.js"></script>
	<script src="/assets/front/js/main.js"></script>
</body>

</html>