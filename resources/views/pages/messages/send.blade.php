@extends('layout.master')
@section('content')
<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-6">
		<main class="content">
			<div>
				Переписка с {{$userPage->name}}
				<div class="user-item" id="id_{{$userPage->id}}">
					<img  src="{{ Html::avatar('mini',$userPage->id,$userPage->avatar) }}">
					<div class="user-status-online">offline</div>
				</div>
			</div>
			<div class="message-send-input">
				<div>
					<textarea id="msg"></textarea>
				</div>
				<div>
					<button onClick="send()" id="send" class="btn btn-default">Отпавить</button>
				</div>
				<div id="con-status"></div>
			</div>
			<ul id="chat" class="messages-list">
				@foreach($userMsg as $item)
					@if($item->message_type === 'out')
						<li class="message-out row">
							<div class="col-md-3">
								<span>{{$item->user->name}}</span><br>
								<img  src="{{ Html::avatar('mini',$item->user->id,$item->user->avatar) }}"><br>
							</div>
							<div class="col-md-9">
								<div>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d-m-Y H:i:s')}}</div>
								<span>{{$item->text}}<span><br>
							</div>
						</li>
					@endif
						
					@if($item->message_type === 'in')
						<li class="message-in row">
							<div class="col-md-3">
								<span>{{$item->userSend->name}}<span><br>
								<img  src="{{ Html::avatar('mini',$item->userSend->id,$item->userSend->avatar) }}"><br>
							</div>
							<div class="col-md-9">
								<div>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d-m-Y H:i:s')}}</div>
								<span>{{$item->text}}<span><br>
							</div>
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
			
			li.className = "message-out row";
			
			html+= '<div class="col-md-3">';
			html+='<span>'+data.user.name+'</span>';
				html+='<img src="'+_app.getAvatar('mini',data.user.id,data.user.avatar)+'">';
			html+='</div>';
			html+= '<div class="col-md-9">';
				html+= '<div>'+data.dateF+'</div><span>'+data.text+'</span>';
			html+='</div>';
			
			li.innerHTML = html;
			chat.appendChild(li);
			$('#chat').scrollTop(+999999);
		  });


		  
		socket.on('in',function(data){
			socket.emit('messageTake',_app.getUser());
			var li = document.createElement('li');
			var html = '';
			li.className = "message-in row";
			
			html+= '<div class="col-md-3">';
			html+='<span>'+data.userSend.name+'</span>';
			html+='<img src="'+_app.getAvatar('mini',data.userSend.id,data.userSend.avatar)+'">';
			html+='</div>';
			html+= '<div class="col-md-9">'; 
				html+= '<div>'+data.dateF+'</div><span>'+data.text+'</span>';
			html+='</div>';
			
			li.innerHTML = html;
			chat.appendChild(li);
			$('#chat').scrollTop(+999999);
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
		  $(document).ready(function(){
			  $('#chat').scrollTop(+999999);
			 var pageUserId = {{$userPage->id}};
			socket.emit('msgConfirm',{'pageUserId':pageUserId,'curUser':_app.getUser()});
		  });
		</script>
@endsection