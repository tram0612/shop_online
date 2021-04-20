@extends('frontend.layouts.master')
@section('slide')
	@include('frontend.layouts.slide')
@endsection
@section('left')
	@include('frontend.layouts.left')
@endsection
@section('content')
	<div class="col-sm-9">
		<div class="blog-post-area">
			<h2 class="title text-center">Latest From our Blog</h2>

			@foreach($items as $item)
			@php
				$rate = round($item->rate, 0 , PHP_ROUND_HALF_UP);
				$route = route('frontend.blog.single',[$item->id]);
			@endphp
			<div class="single-blog-post">
				<h3>{{$item->title}}</h3>
				<div class="post-meta">
					<ul>
						<li><i class="fa fa-user"></i> {{$item->user->name}}</li>
						<li><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($item->created_at))}}</li>
						<li><i class="fa fa-calendar"></i>{{date('F d, Y', strtotime($item->created_at)) }}</li>
					</ul>
					<span>
						<div class="rate" blog_id="{{$item->id}}" route="{{route('frontend.rate')}}">
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
                  <span class="rate-np">{{$item->rate}}</span>
              	
              </div> 
            </div>
          </span>
					<!-- <span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
					</span> -->
				</div>
				<a href="">
					<img src="upload/user/blog/{{$item->image}}" alt="">
				</a>
				<p>{{$item->description}}</p>
				<a  class="btn btn-primary" href="{{$route}}">Read More</a>
			</div>
			@endforeach

			
			<div class="pagination-area">
				<ul class="pagination">
					{{$items->links()}}
					<!-- <li><a href="" class="active">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href=""><i class="fa fa-angle-double-right"></i></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	
@endsection
@section('js')
<
<script src="{{ asset('frontend/js/blog.js')}}" type="text/javascript"></script>
<script type="text/javascript">
	
	    	
	$('.ratings_stars').on('click', function(e) 
  {
    if(user_id === ''){
        alert("Vui lòng đăng nhập để đánh giá"); 
    }else{  
        	var blog_id = $(this).closest('.rate').attr('blog_id');
					//alert(blog_id);
					// alert(user_id);
			var route = $(this).closest('.rate').attr('route');
					//alert(route);
			var value =  $(this).attr('value_rate');
			        //alert(value);
    		if ($(this).hasClass('ratings_over')) {
	        	$(this).prevAll().nextAll().andSelf().removeClass('ratings_over');
	        	$(this).prevAll().andSelf().addClass('ratings_over');
	        } else {
	        	$(this).prevAll().andSelf().addClass('ratings_over');
	        }

            $.ajax({

                url: "/ajaxRate",

                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    'blog_id':blog_id, 
                    'user_id':user_id,
                    'value':value,
                    
                },
                dataType: 'JSON',
                success: function (data) {
                	if(data.tc){
                		alert(data.tc);
                		
            
                	}
                },

                error: function (data) {

                    alert(data.responseText);

                }

            });
        }
	});

</script>

@endsection