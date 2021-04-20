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
				
				<h2>Thêm sản phẩm</h2>
			
				@if (session('success'))
			    <div class="success">
			        {{ session('success') }}
			    </div>
			@endif
				@if (session('msg'))
				  <div class="alert">
				  	{{session('msg')}}
				  </div>
				@endif
			 <!-- @if ($errors->any())
			    <div class="alert">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif  -->
	
			@php 
					$images = json_decode($item->img,true);
			@endphp
				<form method="post" action="{{route('frontend.account.product.edit',[$item->id])}}" enctype="multipart/form-data">
					@csrf
					<input type="text" name="name" placeholder="Tên sản phẩm" value="{{$item->name}}" />
					@error('name')
            <div class="alert">{{ $message }}</div>
          @enderror
					<input type="text" name="price" placeholder="Price" value="{{$item->price}}" />
					@error('price')
            <div class="alert">{{ $message }}</div>
          @enderror
					<input type="text" name="qty" placeholder="Quantity" value="{{$item->qty}}" />
					@error('qty')
            <div class="alert">{{ $message }}</div>
          @enderror
					<label>Choose Image</label>
					<div class="img">
						@if(is_array($images) && !empty($images))
						   @foreach ($images as $image)
						     <img class="imgC" width="100" height="100" src="{{ asset('upload/product/'.$image)}}">
						     <input type="checkbox" name="imgCheck[]" value="{{$image}}"/>

						   @endforeach
					  @endif
					</div>
					<label>Replace with</label>
					<input type="file" name="img[]" multiple />
					@error('img')
            <div class="alert">{{ $message }}</div>
          @enderror
					@error('img.1')
            <div class="alert">Ảnh 1: {{ $message }}</div>
          @enderror
          @error('img.2')
            <div class="alert">Ảnh 2:{{ $message }}</div>
          @enderror
          @error('img.3')
            <div class="alert">Ảnh 3:{{ $message }}</div>
          @enderror

					
          <div class="form-group" >
	            <label class="col-sm-12">Select Status</label>
	            <div class="col-sm-12">
	                <select id="status" name="status" class="form-control form-control-line">
	                	@php
	                	$new='';
	                	$sale='';
	                		if($item->status == 0){
	                		$new='selected';
	                		}
	                		if($item->status == 1){
	                		$sale='selected';
	                		}
	                	@endphp
	                    
	                  	
	                    <option {{$new}} value="0">New</option>
	                    
	                    <option {{$sale}} value="1" id="sale" >Sale</option>
	                    
	                </select>
	            </div>
	            @error('status')
		          	<div class="alert">{{ $message }}</div>
		          @enderror
	            <input type="number" id="saleA" name="sale" placeholder="% Sale" value="{{$item->sale}}" />
	             @error('sale')
		          	<div class="alert">{{ $message }}</div>
		          @enderror
	        </div>
	        
					<div class="form-group">
	            <label class="col-sm-12">Select Brand</label>
	            <div class="col-sm-12">
	                <select name="brand_id" class="form-control form-control-line">
	                    @foreach($brands as $b)
	                    @php
	                    $select='';
	                    if($b->id == $item->brand_id){
	                    	$select = 'selected';
	                  	}
	                    @endphp
	                    <option {{$select}} value="{{$b->id}}">{{$b->name}}</option>
	                    
	                    @endforeach
	                </select>
	                @error('brand_id')
		          	<div class="alert">{{ $message }}</div>
		          @enderror
	            </div>
	        </div>
	        
	        <div class="form-group">
	            <label class="col-sm-12">Select Category</label>
	            <div class="col-sm-12">
	                <select name="cat_id" class="form-control form-control-line">
	                    @foreach($cats as $c)
	                   	@php
	                    $select='';
	                    if($c->id == $item->cat_id){
	                    	$select = 'selected';
	                  	}
	                    <option {{$select}} value="{{$c->id}}">{{$c->name}}</option>
	                   
	                    @endforeach
	                </select>
	                @error('cat_id')
		          	<div class="alert">{{ $message }}</div>
		          @enderror
	            </div>
	        </div>
					<button type="submit" name="submit" class="btn btn-default">Sign up</button>
				</form>
				
			</div><!--/login form-->
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	// var hidden = true;
	// $('#saleA').hide();
	// $('#status').on('change', function(e) 
 //  {
 //  	if(hidden){
	//   	$('#saleA').show();
	//   	$('#saleA').attr('value','');
	//   	hidden = false;
 //  	}
 //  	else{
 //  		$('#saleA').hide();
	//   	$('#saleA').attr('value','0');
	//   	hidden = true;
 //  	}
 //  });
</script>
@endsection