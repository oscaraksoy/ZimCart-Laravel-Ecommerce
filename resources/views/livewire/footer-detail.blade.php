<section class="footer-section">
	<div class="container">
		<div class="footer-logo text-center">
			<a href="/"><img src="" alt=""></a>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>About</h2>
					<p>{{ $systemDetail->description }}</p>
					<img src="{{ asset('frontend/img/cards.png') }}" alt="">
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>Useful Links</h2>
					<ul>
						<li><a href="">About Us</a></li>
						<li><a href="">Track Orders</a></li>
						<li><a href="">Returns</a></li>
						<li><a href="">Jobs</a></li>
						<li><a href="">Shipping</a></li>
						<li><a href="">Blog</a></li>
					</ul>
					<ul>
						<li><a href="">Partners</a></li>
						<li><a href="">Bloggers</a></li>
						<li><a href="">Support</a></li>
						<li><a href="">Terms of Use</a></li>
						<li><a href="">Press</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>Blog</h2>
					<div class="fw-latest-post-widget">
						<div class="lp-item">
							<div class="lp-thumb set-bg" data-setbg="{{ asset('frontend/img/blog-thumbs/1.jpg') }}"></div>
							<div class="lp-content">
								<h6>How to order?</h6>
								<span>July 11, 2020</span>
								<a href="#" class="readmore">Read More</a>
							</div>
						</div>
						<div class="lp-item">
							<div class="lp-thumb set-bg" data-setbg="{{ asset('frontend/img/blog-thumbs/2.jpg') }}"></div>
							<div class="lp-content">
								<h6>Returns</h6>
								<span>July 11, 2020</span>
								<a href="#" class="readmore">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget contact-widget">
					<h2>Contact</h2>
					<div class="con-info">
						<span>C.</span>
						<p>{{ $systemDetail->name }} </p>
					</div>
					<div class="con-info">
						<span>B.</span>
						<p>{{ $systemDetail->address }} </p>
					</div>
					<div class="con-info">
						<span>T.</span>
						<p>{{ $systemDetail->tel }}</p>
					</div>
					<div class="con-info">
						<span>E.</span>
						<p>{{ $systemDetail->email }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="social-links-warp">
		<div class="container">
			<div class="social-links">
				<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
				<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
				<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
				<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
				<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
			</div>

			<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Eloquent Geeks</a></p>

		</div>
	</div>
</section>
