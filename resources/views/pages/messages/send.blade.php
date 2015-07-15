@extends('layout.master')
@section('content')
<div class="row">
<!--start left sidebar-->
	<div class="col-md-3">
		<ul class="list-group">
			<li class="list-group-item">
				<span class="badge">{{$msgCountConf}}</span>
				<a href="{{route('user.messages.show')}}">Мои сообщения</a>
			</li>
		 	<li class="list-group-item">
				<a href="">Мои публикации</a>
			</li>
			<li class="list-group-item">
				<span class="badge">14</span>
				<a href="">Мои Отзывы</a>
			</li>
			<li class="list-group-item">
				<a href="">Мои закладки</a>
			</li>
	</ul>
</div>
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
			<div class="message-send-input">
				<div>
					<textarea id="msg"></textarea>
				</div>
				<div>
					<button onClick="send()" id="send">Отпавить</button>
				</div>
				<div id="con-status"></div>
			</div>
			<ul id="chat" class="messages-list">
				@foreach($userMsg as $item)
					@if($item->message_type === 'out')
						<li class="message-out">
							<span>отправил кто:{{$item->user->name}}<span><br>
							<span>кому:{{$item->userSend->name}}<span><br>
							<span>Сообщение:{{$item->text}}<span><br>
						</li>
					@endif
						
					@if($item->message_type === 'in')
						<li class="message-in">
							<span>отправил кто:{{$item->userSend->name}}<span><br>
							<span>кому:{{$item->user_id}}<span><br>
							<span>Сообщение:{{$item->text}}<span><br>
						</li>
					@endif
				@endforeach
			</ul>		
		</main>
	</div>
	<div class="push"></div>
</div>
	<script>
		  
		  var chat = document.getElementById('chat');
		  var con = document.getElementById('con-status');
		  var userIn = {
				id:'{{$userPage->id}}',
				name:'{{$userPage->name}}',
				ava:'ava_test',
			}
		  
		  socket.on('send', function (data) {

			var li = document.createElement('li');
			var html = '';
			
			li.className = "message-out";
			html+='<span>Отправил кто:'+data.user.name+'</span><br>';
			html+='<span>ава:'+data.user.avatar+'</span><br>';
			html+='<span>Кому:'+data.userSend.name+'</span><br>';
			html+= '<span>Сообщение:'+data.text+'</span><br>';
			li.innerHTML = html;
			
			chat.appendChild(li);
		  });


		  
		socket.on('in',function(data){
			socket.emit('messageTake',_app.getUser());
			var li = document.createElement('li');
			var html = '';
			li.className = "message-in";
			html+='<span>Отправил кто:'+data.userSend.name+'</span><br>';
			html+='<span>ава:'+data.userSend.avatar+'</span><br>';
			html+='<span>Кому:'+data.user.name+'</span><br>';
			html+= '<span>Сообщение:'+data.text+'</span><br>';
			li.innerHTML = html;
			chat.appendChild(li);
		});		  
					
		function send(){
			var msg = document.getElementById('msg').value;
			var sendMsg = {
				'incom':{
					'user':userIn,
					'userSend': _app.getUser(),
					'text':msg,
					'message_type':'in',
				},
				'out':{
					'user': _app.getUser(),
					'userSend':userIn,
					'text':msg,
					'message_type':'out'	
				}
			};
			socket.emit('send',sendMsg);
		  }
		</script>
@endsection