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
					<div class="comments-list">
						<br><b>Список комментариев</b></br>
						<ul class="row">
							<li class="col-md-12">
								Комментарий1
							</li>
						</ul>
						
						<ul class="row">
							<li class="col-md-12">
								Комментарий2
							</li>
						</ul>
					</div>
				</div>
			</div>
		</main>
	</div>
	<div class="push"></div>
</div>
<script>
var commentMessage = $('#comment-message').val();
$('#comment-add').click(function(){
	socket.emit('commentAdd',{user:_app.getUser(),message:commentMessage})
});
</script>
@endsection