
<li class="media">
	<a class="pull-left" href="#">
		<img width="100" height="100" class="media-object" src="/upload/user/avatar/{{$comment->user->avarta}}" alt="">
	</a>
	<div class="media-body">
		<ul class="sinlge-post-meta">
			<li><i class="fa fa-user"></i>{{$comment->user->name}}</li>
			<li><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($comment->created_at))}}</li>
			<li><i class="fa fa-calendar"></i> {{date('M d, Y', strtotime($comment->created_at)) }}</li>
		</ul>
		<p>{{ $comment->cmt}} </p>
		<a class="btn btn-primary reply" parent_id="{{$comment->id}}" href=""><i class="fa fa-reply"></i>Replay</a>
		@if(Auth::check())
		<form class="form_reply" action="{{route('comment.add')}}" method="POST" >
			@csrf
			<div class="text-area">
				<div class="blank-arrow">
					<label>{{Auth::user()->name}}</label>
				</div>
				
				<input type="hidden" name="user_id" value="{{Auth::id()}}" >
				<input type="hidden" name="blog_id" value="{{$comment->blog_id}}" >
				<input type="hidden" name="parent_id" value="{{$comment->id}}" >
				<textarea class="cmt" name="cmt" rows="1"></textarea>
				<button type="submit" class="postcmta" class="btn btn-primary" href="">Post</button>
			</div>
		</form>
		@endif
	</div>
	@if(!$comment->childrenComments->isEmpty())
	@include('frontend.blog.comment',['comment2'=>$comment->childrenComments])
	@endif
</li>
