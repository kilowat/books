@extends('layout.master')
@section('content')
<div class="row">
<!--start left sidebar-->
	<div class="col-md-3">
		<ul class="list-group">
			<li class="list-group-item">
				<span class="badge">14</span>
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
			<ul id="chat" class="messages-list">
				@foreach($userMsg as $item)
					@if($item->message_type === 'out')
						<li class="message-out">
							<span>отправил кто:{{$item->user_id}}<span><br>
							<span>кому:{{$item->user_send_id}}<span><br>
							<span>Сообщение:{{$item->text}}<span><br>
						</li>
					@endif
						
					@if($item->message_type === 'in')
						<li class="message-in">
							<span>отправил кто:{{$item->user_send_id}}<span><br>
							<span>кому:{{$item->user_id}}<span><br>
							<span>Сообщение:{{$item->text}}<span><br>
						</li>
					@endif
				@endforeach
			</ul>
			
			<div class="message-send-input">
				<div>
					<textarea id="msg"></textarea>
				</div>
				<div>
					<button onClick="send()" id="send">Отпавить</button>
				</div>
				<div id="con-status"></div>
			</div>
				
		</main>
	</div>
	<div class="push"></div>
</div>
	<script>
		  var socket = io('http://localhost:81');
		  var chat = document.getElementById('chat');
		  var con = document.getElementById('con-status');
		 
		  var curUser = {{Auth::user()->id}};
		  var userSend = {{$id}};
		  var curUserName = '{{Auth::user()->name}}';
		  
		  socket.on('connect', function (data) {
			  socket.emit('join',curUser);
			  socket.id = curUser; 
			  con.innerHTML = 'Подключились';
		  });
		
		  socket.on('disconnect', function (data) {
			  socket.emit('leave',curUser)
			  con.innerHTML ='Отключились';	
		  });
		  
		  
		  socket.on('send', function (data) {
			var li = document.createElement('li');
			var html = '';
			
			li.className = "message-out";
			html+='<span>Отправил кто:'+data.user_id+'</span><br>';
			html+='<span>Кому:'+data.user_send_id+'</span><br>';
			html+= '<span>Сообщение:'+data.text+'</span><br>';
			li.innerHTML = html;
			
			chat.appendChild(li);
		  });

		socket.on('in',function(data){
			var li = document.createElement('li');
			var html = '';
			li.className = "message-in";
			html+='<span>Отправил кто:'+data.user_id+'</span><br>';
			html+='<span>Кому:'+data.user_send_id+'</span><br>';
			html+= '<span>Сообщение:'+data.text+'</span><br>';
			li.innerHTML = html;
			chat.appendChild(li);
		});		  
					
		function send(){
		  var msg = document.getElementById('msg').value;
			socket.emit('send',{
						user_id:curUser,
						user_send_id:userSend,
						text:msg,
						message_type:'out'
			});
		  }
		</script>
@endsection