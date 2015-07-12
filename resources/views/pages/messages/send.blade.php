@extends('layout.master')
@section('content')
	<div><textarea id="msg"></textarea></div>
	<div><button onClick="send()" id="send">Отпавить</button></div>
	<div id="con-status"></div>	
	<ul id="chat">
		@foreach($userMsg as $item)
			<li>
				@if($item->message_type === 'out')
					<span>отправил кто:{{$item->user_id}}<span><br>
					<span>кому:{{$item->user_send_id}}<span><br>
					<span>Сообщение:{{$item->text}}<span><br>
				@endif
				
				@if($item->message_type === 'in')
					<span>отправил кто:{{$item->user_send_id}}<span><br>
					<span>кому:{{$item->user_id}}<span><br>
					<span>Сообщение:{{$item->text}}<span><br>
				@endif
			</li>
		@endforeach
	</ul>
	
	<script>
		  var socket = io('http://localhost:81');
		  var chat = document.getElementById('chat');
		  var con = document.getElementById('con-status');
		 
		  var curUser = {{Auth::user()->id}};
		  var userSend = {{$id}};
		  var curUserName = '{{Auth::user()->name}}';
		  
		  socket.on('connect', function () {
			  socket.emit('join',curUser)
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

			if(data.message_type == "out"){
				html+='<span>Отправил кто:'+data.user_id+'</span><br>';
				html+='<span>Кому:'+data.user_send_id+'</span><br>';
				html+= '<span>Сообщение:'+data.text+'</span><br>';
			}
			
			if(data.message_type == "in"){
				html+='<span>Отправил кто:'+data.user.send_id+'</span><br>';
				html+='<span>Кому:'+data.user_send_id+'</span><br>';
				html+= '<span>Сообщение:'+data.text+'</span><br>';
			}
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