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
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			@if(!$items->isEmpty())
			<table class="table table-bordered">
				<thead >
					<tr>
						<th >ID</th>
						<th >Title</th>
						<th >Image</th>
						<th >Price</th>
						<th >Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($items as $item)
					@php 
						$images = json_decode($item->img,true); 
					@endphp
					  
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->name}}</td>
						<td >
						<div class="img">
						@if(is_array($images) && !empty($images))
						   @foreach ($images as $image)

						     <img class="imgC" width="100" height="100" src="{{ asset('upload/product/'.$image)}}">
						   @endforeach
					  	@endif
						<div>	
						</td>
						<td>$ {{$item->price}}</td>
						<td>
							<a href="{{route('frontend.account.product.edit',[$item->id])}}">Edit</a>
    								<a href="{{route('frontend.account.product.del',[$item->id])}}"> Delete</a>
    							</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<p>Bạn chưa có sản phẩm nào<p>
					
			@endif
			<button class="btn btn-default"><a href="{{route('frontend.account.product.add')}}">Add product</a></button>
		</div>
	</div>
</div>
@endsection