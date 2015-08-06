@extends('layout.master')
@section('content')

<div class="row">
	<!--start left sidebar-->
	<div class="col-md-3">
	{!!Menu::handler('category')!!}
	</div>
	<!--end left sidebar-->
	<div class="col-md-9">
		<main class="content">
			<div class="row">
				<div class="col-md-4">
					<img src="{{Html::showUserImage('normal',$publication->user->id,'files',$publication->image)}}">
				</div>
				<div class="col-md-8">
					{!! Html::showPublicProperty([
							'Название'=>'name',
							'Автор'=>'user_name',
							'Создан'=>'created_at',
							'Рейтинг'=>'rang',
						],$publication) !!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<br>
						<b>Описание</b><br>
					{{$publication->description}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="comments-form">
						<textarea id="comment-message"></textarea>
						<button id="comment-add">Добавить</button>
					</div>
					<br><b>Список комментариев</b></br>
					<div id="comments-list">
						@foreach($comments as $comment)
						<ul class="row">
							<li class="col-md-12">
								{{$comment->user->name}}
							</li>
							<li class="col-md-12">
								{{$comment->created_at}}
							</li>
							<li class="col-md-12">
								{{$comment->message}}
							</li>
						</ul>
						@endforeach
					</div>
				</div>
			</div>
		</main>
	</div>
	<div class="push"></div>
</div>
<script>

$('#comment-add').click(function(){
	var commentMessage = $('#comment-message').val();
	var pub_id = {{$publication->id}};
	socket.emit('commentAdd',{user:_app.getUser(),message:commentMessage,publication_id:pub_id});
});
socket.on('commentAdd',function(data){
	var commentList = $('#comments-list');
	var html = '';
		html+='	<ul class="row">';
			html+='<li class="col-md-12">';
			html+='<li>'+data.user.name+'</li>';
			html+='<li>'+data.dateF+'</li>';
			html+=data.message;
			html+='</li>';
		html+='</ul>';
	commentList.append(html);
	

});
</script>
@endsection