<h2>{{$count}} RESPONSES</h2>
	<ul class="media-list" id="comment-place">
		@foreach($data as $item)
	 
		
		@include('frontend.blog.container',['comment'=>$item])
		
	    
	@endforeach
</ul>

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
					<input type="hidden" name="blog_id" value="{{$req->blog_id}}" >
					<input type="hidden" name="parent_id" value="0" >
					<textarea name="cmt" class="cmt" id="reply_box" rows="11"></textarea>
					<button type="submit" id="postcmt" class="btn btn-primary" href="">Post</button>
				</div>
			</form>
		</div>
	</div>
</div><!--/Repaly Box -->

		
 
		
<script src="{{ asset('frontend/js/blog.js')}}" type="text/javascript"></script>