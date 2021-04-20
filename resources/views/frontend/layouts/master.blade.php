@include('frontend.layouts.header')
@yield('slide')
<section>
		<div class="container">
			<div class="row">
				@yield('left')
				@yield('content')
				
				
				</div>
			</div>
		</div>
</section>

@include('frontend.layouts.footer')	