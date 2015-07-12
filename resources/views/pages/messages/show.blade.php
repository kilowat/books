@extends('layout.master')
@section('content')
<ul id="chat">
</ul>
	<script>
		  var socket = io('http://localhost:81');
		  var chat = document.getElementById('chat');

		  socket.on('con', function (data) {
			var li = document.createElement('li');
				li.innerHTML = data.msg;
			chat.appendChild(li);
		  });

		  socket.on('send', function (data) {
				var li = document.createElement('li');
					li.innerHTML =data.msg;
				chat.appendChild(li);
			  });	
	</script>
@endsection