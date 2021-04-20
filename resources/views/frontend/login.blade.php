@extends('frontend.layouts.master')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						<form method="post" action="{{route('frontend.login')}}" enctype="multipart/form-data">
							@csrf
							<input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" />
							<input type="password" name="password" placeholder="Password" value="{{old('password')}}" />
							<span>
								<input type="checkbox" name="remember_me" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
	
	@endsection