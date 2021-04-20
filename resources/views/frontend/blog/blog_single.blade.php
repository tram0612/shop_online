@extends('frontend.layouts.master')

@section('left')
	@include('frontend.layouts.left')
@endsection
@section('content')
	@php
	$rate = round($blog->rate, 0 , PHP_ROUND_HALF_UP);
	@endphp
	<div class="col-sm-9">
		<div class="blog-post-area">
			<h2 class="title text-center">Latest From our Blog</h2>
			<div class="single-blog-post">
				<h3>{{$blog->title}}</h3>
				<div class="post-meta">
					<ul>
						<li><i class="fa fa-user"></i>{{$blog->user->name}}</li>
						<li><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($blog->created_at))}}</li>
						<li><i class="fa fa-calendar"></i> {{date('M d, Y', strtotime($blog->created_at)) }}</li>
					</ul>
					<span>
						<div class="rate" blog_id="{{$blog->id}}" route="{{route('frontend.rate')}}">
              <div class="vote">
             
              	@for($i=1; $i<6; $i++)
              		@php
              		$ratings_over='';
              		
	              	 if($i<=$rate){
	              	 	$ratings_over='ratings_over';
	              	 }
	              	 @endphp
                  <div value_rate="{{$i}}" class="star_{{$i}} ratings_stars {{$ratings_over}}"></div>
                 
                  <!-- <div class="star_3 ratings_stars "><input value="3" type="hidden"></div>
                  <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                  <div class="star_5 ratings_stars"><input value="5" type="hidden"></div> -->
                  @endfor
                  <span class="rate-np">{{$blog->rate}}</span>
              	
              </div> 
            </div>
          </span>
				</div>
				<a href="">
					<img src="/upload/user/blog/{{$blog->image}}" alt="">
				</a>
				<p>
					{!!$blog->content!!}
				</p>
				<div class="pager-area">
					<ul class="pager pull-right">
						<li><a href="#">Pre</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
		</div><!--/blog-post-area-->

		<div class="rating-area">
			<ul class="ratings">
				<li class="rate-this">Rate this item:</li>
				<li>
					<i class="fa fa-star color"></i>
					<i class="fa fa-star color"></i>
					<i class="fa fa-star color"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</li>
				<li class="color">(6 votes)</li>
			</ul>
			<ul class="tag">
				<li>TAG:</li>
				<li><a class="color" href="">Pink <span>/</span></a></li>
				<li><a class="color" href="">T-Shirt <span>/</span></a></li>
				<li><a class="color" href="">Girls</a></li>
			</ul>
		</div><!--/rating-area-->

		<div class="socials-share">
			<a href=""><img src="/frontend/images/blog/socials.png" alt=""></a>
		</div><!--/socials-share-->

		<div class="media commnets">
			<a class="pull-left" href="#">
				<img class="media-object" src="/frontend/images/blog/man-one.jpg" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Annie Davis</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="blog-socials">
					<ul>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble"></i></a></li>
						<li><a href=""><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<a class="btn btn-primary" href="">Other Posts</a>
				</div>
			</div>
		</div><!--Comments-->
		<div class="response-area">
			
			<h2>{{$count}} RESPONSES</h2>
			<ul class="media-list" id="comment-place">
			@foreach($comment as $item)
    			@include('frontend.blog.container',['comment'=>$item])
    
			@endforeach

			</ul>

			
 			@if(Auth::check())
		<div class="replay-box">
			<div class="row">
				<div class="col-sm-12">
					<h2 id="leavecm">Leave a comment</h2>
					<form id="form_reply1" class="form_reply" action="{{route('comment.add')}}" method="POST" >
						@csrf
						<div class="text-area">
							<div class="blank-arrow">
								<label>Your Name</label>
							</div>
							<span>*</span>
							<input type="hidden" name="user_id" value="{{Auth::id()}}" >
							<input type="hidden" name="blog_id" value="{{$blog->id}}" >
							<input type="hidden" name="parent_id" value="0" >
							<textarea name="cmt" class="cmt" id="reply_box" rows="11"></textarea>
							<button type="submit" id="postcmt" class="btn btn-primary" href="">Post</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/Repaly Box-->
		@endif
			
							
		</div><!--/Response-area-->
		
	</div>	
@endsection
@section('js')

<script type="text/javascript">
$('.form_reply').hide();
$('#form_reply1').show();
	// $('.second-media').hide();
</script>
<script src="{{ asset('frontend/js/blog.js')}}" type="text/javascript"></script>
@endsection

	
	
	