@extends('frontend.layouts.master')

@section('left')
	<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a  href="{{route('frontend.account')}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Account
										</a>
									</h4>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a  href="{{route('frontend.account.product')}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											My products
										</a>
									</h4>
								</div>
								
							</div>
							
							
						</div><!--/category-products-->
					
						
					
					</div>
				</div>
@endsection
@section('content')
<div class="col-sm-9 padding-right">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
				
				<h2>Chỉnh sửa thông tin</h2>
				<form method="post" action="{{route('account.edit')}}" enctype="multipart/form-data">
					@csrf
					<input type="text" name="name" placeholder="" value="{{Auth::user()->name}}" />@error('name')
                                            <div class="alert">{{ $message }}</div>
                                        @enderror
					<input type="email" name="email" placeholder="Email Address" value="{{Auth::user()->email}}" />@error('email')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
					<input type="text" name="phone" placeholder="Email Address" value="{{Auth::user()->phone}}" />
					<input type="password" name="password" placeholder="Password" value=""/>@error('password')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
					<label>Avatar</label><img src="/upload/user/avatar/{{Auth::user()->avarta}}" alt="" width="100" height="100">
					<input type="file" name="avarta" />@error('avarta')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
					<div class="form-group">
	            <label class="col-sm-12">Select Country</label>
	            <div class="col-sm-12">
	                <select name="id_country" class="form-control form-control-line">
	                    @foreach($countrys as $c)
	                    @if($c->id == Auth::user()->id_country)
	                    <option selected value="{{$c->id}}">{{$c->name}}</option>
	                    @else
	                    <option value="{{$c->id}}">{{$c->name}}</option>
	                    @endif
	                    @endforeach
	                </select>
	            </div>
	        </div>
					<button type="submit" name="submit" class="btn btn-default">Sign up</button>
				</form>
				
			</div><!--/login form-->
		</div>
	</div>
</div>
@endsection