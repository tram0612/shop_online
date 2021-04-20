@extends('frontend.layouts.master')

@section('content')	
	<section id="form"><!--form-->
		
			
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>New User Signup!</h2>
						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						<form method="post" action="{{route('frontend.signup')}}" enctype="multipart/form-data">
							@csrf
							<input type="text" name="name" placeholder="Name" value="{{old('email')}}" />
							<input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" />
							<input type="password" name="password"  placeholder="Password"/>
							<input type="text" name="phone" placeholder="Phone" value="{{old('phone')}}" />
							<input type="text" name="address" placeholder="Address" value="{{old('address')}}" />
							<div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select name="id_country" class="form-control form-control-line">
                                                @foreach($countrys as $c)
                                                
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                               
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
							<label>Avatar</label>
							<input type="file" name="avarta" /><p></p>
							<button type="submit" name="submit" class="btn btn-default">Sign up</button>
						</form>
					</div><!--/login form-->
				</div>
				
			
		
	</section><!--/form-->
	
	
	@endsection