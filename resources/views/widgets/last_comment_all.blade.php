@if(!empty($comments))
	@foreach($comments as $comment)
		<ul>
			<li class="comment-info">
				<span class="comment-name">{{$comment->user_name}}</span>
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