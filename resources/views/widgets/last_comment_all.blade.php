@if(!empty($comments))
	@foreach($comments as $comment)
		<ul>
			<li class="comment-info">
				<a class="comment-name" href="{{route('user.profile',['id'=>$comment->user_id])}}">{{$comment->user_name}}</a>
				<span class="comment-data">{{$comment->comment_created_at}}</span>
			</li>
			<li>
				{{str_limit($comment->comment_message,70)}}
				->
				<a href="{{route('publication.detail',[$comment->category_slug,$comment->publication_id])}}">{{$comment->publication_name}}</a>
			</li>
		</ul>
	@endforeach
@endif