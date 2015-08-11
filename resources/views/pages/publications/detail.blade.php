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
				<div class="col-md-12 comment-section">
					<div class="row comment-section-head">
						<b>Комментарии</b>
					</div>
					@if(Auth::user())
						<div class="comments-form">
							<textarea id="comment-message" class="form-control"></textarea>
							<button id="comment-add" class="btn btn-default">Добавить</button>
						</div>
					@else
						<div class="alert alert-danger">Для того чтобы оставить комментарий зарегестрируйтесь</div>
					@endif
					
					<div id="comments-list">
						@foreach($comments as $comment)
						<ul class="row comment-items">
							<li class="col-md-12 comment-info">
								<span class="comment-name">{{$comment->user->name}}</span>
								<span class="comment-data">{{$comment->created_at}}</span>
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
	if(commentMessage.length<3){
		$('.comment-section').prepend('<div id="comment-error" class="alert alert-danger">Введите сообщение<div>');
		return
	}
	var pub_id = {{$publication->id}};
	socket.emit('commentAdd',{user:_app.getUser(),message:commentMessage,publication_id:pub_id});
});
socket.on('commentAdd',function(data){
	var commentList = $('#comments-list');
	var html = '';
		html+='	<ul class="row comment-items">';
			html+='<li class="col-md-12 comment-info">';
			html+='<li><span class="comment-name">'+data.user.name+'</span><span class="comment-data">'+data.dateF+'</span></li>';
			html+=data.message;
			html+='</li>';
		html+='</ul>';
	commentList.append(html);
	

});
</script>
@endsection